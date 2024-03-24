<?php

namespace Toumeh\MyWebsite\Controller;


use Toumeh\MyWebsite\Domain\Repository\ProjectsRepository;
use Toumeh\MyWebsite\Domain\Repository\QualificationsRepository;
use Toumeh\MyWebsite\Domain\Repository\SkillsRepository;
use Toumeh\MyWebsite\Domain\Repository\UrlsRepository;
use Toumeh\MyWebsite\Service\MyWebsiteService;
use \TYPO3\CMS\Extensionmanager\Controller\AbstractController as OriginalAbstractController;

class AbstractController extends OriginalAbstractController
{
    public const string TEMPLATE_PATH = __DIR__ . '/../../Resources/Private/Templates/Home/';
    const string LAYOUT_PATH = __DIR__ . '/../../Resources/Private/layout/Default/';
    const string PARTIALS_PATH = __DIR__ . '/../../Resources/Private/partials/';


    protected const string SECTIONS = "sections";
    const array HOME_SECTIONS = ["header", "about"];
    const array RESUME_SECTIONS = ['resume'];
    const array PROJECTS_SECTIONS = ['projects'];
    const array CONTACT_SECTIONS = ['contact'];

    protected UrlsRepository $urlsRepository;
    protected QualificationsRepository $qualificationRepository;
    protected SkillsRepository $skillsRepository;
    protected MyWebsiteService $myWebsiteService;
    protected ProjectsRepository $projectsRepository;

    public function injectRepositories(
        UrlsRepository           $urlsRepository,
        QualificationsRepository $qualificationRepository,
        SkillsRepository         $skillsRepository,
        ProjectsRepository $projectRepository
    ): void
    {
        $this->urlsRepository = $urlsRepository;
        $this->qualificationRepository = $qualificationRepository;
        $this->skillsRepository = $skillsRepository;
        $this->projectsRepository = $projectRepository;
    }

    public function injectServices(MyWebsiteService $myWebsiteService): void
    {
        $this->myWebsiteService = $myWebsiteService;
    }
}
