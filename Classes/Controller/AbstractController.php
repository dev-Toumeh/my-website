<?php

namespace Toumeh\MyWebsite\Controller;


use Psr\Log\LoggerInterface;
use Toumeh\MyWebsite\Domain\Repository\ProjectsRepository;
use Toumeh\MyWebsite\Domain\Repository\QualificationsRepository;
use Toumeh\MyWebsite\Domain\Repository\SkillsRepository;
use Toumeh\MyWebsite\Domain\Repository\UrlsRepository;
use Toumeh\MyWebsite\Service\MyWebsiteService;
use \TYPO3\CMS\Extensionmanager\Controller\AbstractController as OriginalAbstractController;


class AbstractController extends OriginalAbstractController
{
    public const string TEMPLATE_PATH = __DIR__ . '/../../Resources/Private/Templates/Home/';
    public const string LAYOUT_PATH = __DIR__ . '/../../Resources/Private/layout/Default/';
    public const string PARTIALS_PATH = __DIR__ . '/../../Resources/Private/partials/';


    protected const string SECTIONS = "sections";
    protected const array HOME_SECTIONS = ["header", "about"];
    protected const array RESUME_SECTIONS = ['resume'];
    protected const array PROJECTS_SECTIONS = ['projects', 'Call-to-action'];
    protected const array CONTACT_SECTIONS = ['contact'];

    // json Controller Constants
    protected const string MESSAGE = "message";
    protected const string SUCCESS = "success";
    protected const string ERROR_PREDEFINED_MESSAGE = 'There was a problem sending your message. Please try again later.';
    protected const string SUCCESS_MESSAGE = 'Your message has been sent successfully.';

    protected UrlsRepository $urlsRepository;
    protected QualificationsRepository $qualificationRepository;
    protected SkillsRepository $skillsRepository;
    protected ProjectsRepository $projectsRepository;

    protected MyWebsiteService $myWebsiteService;

    public function injectRepositories(
        UrlsRepository           $urlsRepository,
        QualificationsRepository $qualificationRepository,
        SkillsRepository         $skillsRepository,
        ProjectsRepository       $projectRepository
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

    public function __construct(protected LoggerInterface $logger){}
}
