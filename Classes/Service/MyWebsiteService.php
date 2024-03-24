<?php

namespace Toumeh\MyWebsite\Service;

use Toumeh\MyWebsite\Domain\Model\Projects;
use Toumeh\MyWebsite\Domain\Repository\ProjectsRepository;
use Toumeh\MyWebsite\Domain\Repository\SkillsRepository;
use TYPO3\CMS\Core\Log\LogManager;
use TYPO3\CMS\Core\Resource\Exception\ResourceDoesNotExistException;
use TYPO3\CMS\Core\Resource\ResourceFactory;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;

class MyWebsiteService
{
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
        if ($image) {
            try {
                $resourceFactory = GeneralUtility::makeInstance(ResourceFactory::class);
                return  $resourceFactory->getFileReferenceObject($image);
              //  return $fileReference->();
            } catch (ResourceDoesNotExistException $e) {
                $logManager = GeneralUtility::makeInstance(LogManager::class);
                $logger = $logManager->getLogger(__CLASS__);
                $logger->error('FileDoesNotExistException', ['message' => $e->getMessage()]);
            }
        }
        return "";
    }
}