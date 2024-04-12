<?php

namespace Toumeh\MyWebsite\ViewHelpers;

use Toumeh\MyWebsite\Domain\Model\Projects;
use TYPO3\CMS\Core\Log\LogManager;
use TYPO3\CMS\Core\Resource\Exception\ResourceDoesNotExistException;
use TYPO3\CMS\Core\Resource\ResourceFactory;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class ProjectsViewHelper extends AbstractViewHelper
{
    /**
     * Initialize arguments to define what should be passed to the render method.
     */
    public function initializeArguments(): void
    {
        $this->registerArgument('projects', QueryResultInterface::class, 'The projects to format', true);
    }

    /**
     * Render the formatted projects array.
     *
     * @return array Formatted array of projects
     */
    public function render(): array
    {
        $projects = $this->arguments['projects'];
        $result = [];
        /** @var Projects $project */
        foreach ($projects as $project) {
            $result[] = $this->formatProject($project);
        }
        return $result;
    }

    /**
     * Formats a single project's data.
     *
     * @param Projects $project The project to format
     * @return array The formatted project data
     */
    protected function formatProject(Projects $project): array
    {
        return [
            'uid' => $project->getUid(),
            'name' => $project->getName(),
            'image' => $this->getImagePath($project->getImage()),
            'githubUrl' => $project->getGithubUrl(),
            'description' => $project->getDescription(),
        ];
    }

    /**
     * Retrieves the image path using TYPO3's ResourceFactory.
     *
     * @param mixed $image The image to retrieve the path for
     * @return string The path to the image or an empty string if not found
     */
    private function getImagePath(mixed $image): string
    {
        try {
            $resourceFactory = GeneralUtility::makeInstance(ResourceFactory::class);
            $fileReference = $resourceFactory->getFileReferenceObject($image);
            return $fileReference->getPublicUrl();
        } catch (ResourceDoesNotExistException $e) {
            $logger = GeneralUtility::makeInstance(LogManager::class)->getLogger(__CLASS__);
            $logger->error('File does not exist', ['message' => $e->getMessage()]);
            return "";
        }
    }
}