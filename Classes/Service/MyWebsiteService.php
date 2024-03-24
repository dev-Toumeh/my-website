<?php

namespace Toumeh\MyWebsite\Service;

use Toumeh\MyWebsite\Domain\Repository\ProjectsRepository;
use Toumeh\MyWebsite\Domain\Repository\SkillsRepository;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;

class SkillsService
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
        **/ @var */
        foreach ($projects as $project) {
         $result[] =
             [
                 ProjectsRepository::NAME => $project->getName(),

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



}