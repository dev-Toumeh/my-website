<?php

namespace Toumeh\MyWebsite\Service;

use Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Toumeh\MyWebsite\Domain\Model\Contacts;
use Toumeh\MyWebsite\Domain\Model\Projects;
use Toumeh\MyWebsite\Domain\Model\Urls;
use Toumeh\MyWebsite\Domain\Repository\ProjectsRepository;
use Toumeh\MyWebsite\Domain\Repository\SkillsRepository;
use TYPO3\CMS\Core\Log\LogManager;
use TYPO3\CMS\Core\Resource\Exception\ResourceDoesNotExistException;
use TYPO3\CMS\Core\Resource\ResourceFactory;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;

class MyWebsiteService
{
    private const string SUBJECT = "some one contacted you on you Website";

    public function formatProjectsForDisplay(array|QueryResultInterface $projects): array
    {
        $result = [];
        /** @var Projects $project */
        foreach ($projects as $project) {
            $result[] =
                [
                    ProjectsRepository::UID => $project->getUid(),
                    ProjectsRepository::NAME => $project->getName(),
                    ProjectsRepository::IMAGE => $this->getImagePath($project->getImage()),
                    ProjectsRepository::GITHUB_URL => $project->getGithubUrl(),
                    ProjectsRepository::DESCRIPTION => $project->getDescription(),
                ];
        }
        return $result;
    }

    public function formatUrlsForDisplay(QueryResultInterface|array $urls): array
    {
        $result = [];
        /** @var Urls $url */
        foreach ($urls as $url) {
            $result[$url->getType()] = $url->getUrl();
        }
        return $result;
    }

    public function getContactData(array $parsedBody): array
    {
        $contactModel = new Contacts();
        return $contactModel->getData($parsedBody['tx_mywebsite_index']['contact']);
    }

    public function sendEmail(array $contactData): void
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host = $_ENV['SMTP_HOST'];
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV['SMTP_USER'];
            $mail->Password = $_ENV['SMTP_PASSWORD'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = $_ENV['SMTP_PORT'];

            //Recipients
            $mail->IsHTML();
            $mail->setFrom($_ENV['SMTP_FROM_EMAIL'], $_ENV['SMTP_FROM_NAME']);
            $mail->addAddress($_ENV['SMTP_RECIPIENT']);

            //Content
            $mail->Subject = self::SUBJECT;
            $mail->Body = $this->getBody($contactData);

            $mail->send();

        } catch (Exception $e) {
            echo "Message could not be sent. PHPMailer Exception: {$e->getMessage()}";
        }
    }

    private function getBody($contentData): string
    {
        $body = '<html><body>';
        $body .= '<h2>Contact Details</h2>';
        $body .= '<p><strong>Name:</strong> ' . htmlspecialchars($contentData[CONTACTS::NAME]) . '</p>';
        $body .= '<p><strong>Email:</strong> ' . htmlspecialchars($contentData[CONTACTS::EMAIL]) . '</p>';
        $body .= '<p><strong>Phone:</strong> ' . htmlspecialchars($contentData[CONTACTS::PHONE]) . '</p>';
        $body .= '<p><strong>Message:</strong><br>' . nl2br(htmlspecialchars($contentData[CONTACTS::MESSAGE])) . '</p>';
        $body .= '</body></html>';
        return $body;
    }

    public function formatSkillsForDisplay(array|QueryResultInterface $skills): array
    {
        $result = [
            SkillsRepository::CATEGORY_TECHNOLOGY => [],
            SkillsRepository::CATEGORY_LANGUAGE => [],
        ];

        foreach ($skills as $skill) {
            $category = $skill->getCategory();
            $name = $skill->getName();

            if ($category == SkillsRepository::CATEGORY_TECHNOLOGY || $category == SkillsRepository::CATEGORY_LANGUAGE) {
                $this->appendToCategory($result[$category], $name);
            }
        }
        return $result;
    }

    private function appendToCategory(array &$categoryArray, string $skillName): void
    {
        static $groupSize = 3;

        if (!empty($categoryArray) && count(end($categoryArray)) < $groupSize) {
            $categoryArray[key($categoryArray)][] = $skillName;
        } else {
            $categoryArray[] = [$skillName];
        }
    }

    private function getImagePath($image)
    {

        try {
            $resourceFactory = GeneralUtility::makeInstance(ResourceFactory::class);
            return $resourceFactory->getFileReferenceObject($image);
        } catch (ResourceDoesNotExistException $e) {
            $logManager = GeneralUtility::makeInstance(LogManager::class);
            $logger = $logManager->getLogger(__CLASS__);
            $logger->error('FileDoesNotExistException', ['message' => $e->getMessage()]);
            return "";
        }
    }
}