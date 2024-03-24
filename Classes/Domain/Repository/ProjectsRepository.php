<?php

namespace Toumeh\MyWebsite\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

class ProjectsRepository extends Repository
{
    public CONST string NAME = 'name';
    public CONST string IMAGE = 'image';
    public CONST string DESCRIPTION = 'description';
    public CONST string GITHUB_URL = 'githubUrl';
    public CONST string UID = 'uid';

    public function getProjects(): array|QueryResultInterface
    {
        $query = $this->createQuery();
        $this->setDefaultQuerySettings($query->getQuerySettings()->setRespectStoragePage(false));
        return $this->findAll();
    }
}