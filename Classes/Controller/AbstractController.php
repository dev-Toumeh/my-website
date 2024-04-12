<?php

namespace Toumeh\MyWebsite\Controller;

use Psr\Log\LoggerInterface;
use Toumeh\MyWebsite\Domain\Model\Contacts;
use Toumeh\MyWebsite\Domain\Repository\ProjectsRepository;
use Toumeh\MyWebsite\Domain\Repository\QualificationsRepository;
use Toumeh\MyWebsite\Domain\Repository\SkillsRepository;
use Toumeh\MyWebsite\Domain\Repository\UrlsRepository;
use Toumeh\MyWebsite\Service\EmailService;
use TYPO3\CMS\Extbase\Mvc\ExtbaseRequestParameters;
use TYPO3\CMS\Extensionmanager\Controller\AbstractController as OriginalAbstractController;


class AbstractController extends OriginalAbstractController implements ConstantsInterface
{

    protected UrlsRepository $urlsRepository;
    protected QualificationsRepository $qualificationRepository;
    protected SkillsRepository $skillsRepository;
    protected ProjectsRepository $projectsRepository;

    // services
    protected EmailService $emailService;

    public function __construct(
        protected LoggerInterface          $logger,
        protected ExtbaseRequestParameters $extbaseParameters) {}

    public function injectRepositories(
        UrlsRepository           $urlsRepository,
        QualificationsRepository $qualificationRepository,
        SkillsRepository         $skillsRepository,
        ProjectsRepository       $projectRepository
    ): void
    {
        $this->urlsRepository = $urlsRepository;
        $this->qualificationRepository = $qualificationRepository;
        $this->skillsRepository = $skillsRepository;
        $this->projectsRepository = $projectRepository;
    }

    public function injectServices(EmailService $emailService): void
    {
        $this->emailService = $emailService;
    }

    protected function getControllerActionName(): string
    {
        return $this->request->getAttributes()[self::EXTBASE]->getControllerActionName();
    }

    public function getContactData(array $parsedBody): array
    {
        $contactModel = new Contacts();
        return $contactModel->getData($parsedBody['tx_mywebsite_index']['contact']);
    }
}
