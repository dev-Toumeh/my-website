<?php

namespace Toumeh\MyWebsite\ViewHelpers;

use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class SkillsViewHelper extends AbstractViewHelper
{
    /**
     * Initialize the arguments that your ViewHelper accepts.
     */
    public function initializeArguments(): void
    {
        $this->registerArgument('skills', QueryResultInterface::class, 'Skills to format for display', true);
    }

    /**
     * Render the organized skills array.
     *
     * @return array Organized skills data
     */
    public function render(): array
    {
        $skills = $this->arguments['skills'];
        $result = [
            'technology' => [],
            'language' => [],
        ];

        foreach ($skills as $skill) {
            $category = $skill->getCategory();
            $name = $skill->getName();

            if ($category == 'technology' || $category == 'language') {
                $this->appendToCategory($result[$category], $name);
            }
        }
        return $result;
    }

    /**
     * Append skills to the appropriate category, grouping them.
     *
     * @param array &$categoryArray The array of categories to append to
     * @param string $skillName The name of the skill to add
     */
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