<?php

namespace Toumeh\MyWebsite\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

class SkillsRepository extends Repository
{
    public function getSkills(): array|QueryResultInterface
    {
        $query = $this->createQuery();
        $this->setDefaultQuerySettings($query->getQuerySettings()->setRespectStoragePage(false));
        return $this->findAll();
    }
}