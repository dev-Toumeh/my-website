<?php

namespace Toumeh\MyWebsite\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

class SkillsRepository extends Repository
{
    public const string CATEGORY = "Category";
    public const string NAME = "name";
    public const string CATEGORY_LANGUAGE = "language";
    public const string CATEGORY_TECHNOLOGY = "technology";

    public function getSkills(): array|QueryResultInterface
    {
        $query = $this->createQuery();
        $this->setDefaultQuerySettings($query->getQuerySettings()->setRespectStoragePage(false));
        return $this->findAll();
    }

}