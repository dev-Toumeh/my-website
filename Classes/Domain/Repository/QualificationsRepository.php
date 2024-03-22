<?php

namespace Toumeh\MyWebsite\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

class QualificationsRepository extends Repository
{
    protected const string CATEGORY = "Category";
    public const string CATEGORY_EDUCATION = "education";
    public const string CATEGORY_EXPERIENCE = "experience";

    public function getQualifications($Category_type = self::CATEGORY_EXPERIENCE): array|QueryResultInterface
    {
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
        $query->matching(
            $query->equals(self::CATEGORY, $Category_type)
        );
        return $query->execute()->toArray();
    }
}
