<?php

namespace Toumeh\MyWebsite\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

class UrlsRepository extends Repository
{
    protected Const string TYPE = "type";
    protected Const string TYPE_INTERNAL = "internal";
    public Const string TYPE_EXTERNAL = "external";

    public function getUrls($url_type = self::TYPE_INTERNAL): array|QueryResultInterface
    {
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
        $query->matching(
            $query->equals(self::TYPE, $url_type)
        );
        return $query->execute()->toArray();
    }
}