<?php

namespace Toumeh\MyWebsite\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

class UrlsRepository extends Repository
{
    public function getUrls(): array|QueryResultInterface
    {
        $query = $this->createQuery();
        $this->setDefaultQuerySettings($query->getQuerySettings()->setRespectStoragePage(false));
        return $this->findAll();
    }
}