<?php

namespace Toumeh\MyWebsite\Controller;


use Psr\Http\Message\ResponseInterface;
use Toumeh\MyWebsite\Domain\Repository\QualificationsRepository;
use Toumeh\MyWebsite\Domain\Repository\UrlsRepository;
use TYPO3\CMS\Core\Domain\Repository\PageRepository;
use TYPO3\CMS\Core\Http\JsonResponse;
use TYPO3\CMS\Core\Utility\DebugUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\View\StandaloneView;


class HomeController extends AbstractController
{

    public function indexAction(): ResponseInterface
    {
        $view = $this->getView();
        $pageRepository = GeneralUtility::makeInstance(PageRepository::class);
        $page = $pageRepository->getPage(1);
        $this->view->assign(self::SECTIONS, self::HOME_SECTIONS);
        //     debugUtility::debug( $page, 'context');
        $this->view->assign('id', $this->request);
        return $this->htmlResponse($view->render());
    }

    public function resumeAction(): ResponseInterface
    {
        $view = $this->getView();
        $pageRepository = GeneralUtility::makeInstance(PageRepository::class);
        $page = $pageRepository->getPage(7);
        $this->view->assign(self::SECTIONS, self::RESUME_SECTIONS);
        $this->view->assign('page', $page);
        $this->view->assign('id', $this->request);
        return $this->htmlResponse($view->render());
    }

    public function contactAction(): ResponseInterface
    {
        $method = $this->request->getMethod();

        // You can now check the request method and behave accordingly
        $view = $this->getView();
        $pageRepository = GeneralUtility::makeInstance(PageRepository::class);
        $page = $pageRepository->getPage(8);
        $this->view->assign(self::SECTIONS, self::CONTACT_SECTIONS);
        $this->view->assign('page', $page);
        $this->view->assign('id', $this->request);

        return $this->htmlResponse($view->render());
    }

    public function projectsAction(): ResponseInterface
    {
        $view = $this->getView();
        $pageRepository = GeneralUtility::makeInstance(PageRepository::class);
        $page = $pageRepository->getPage(9);
        $this->view->assign(self::SECTIONS, self::PROJECTS_SECTIONS);
        $this->view->assign('page', $page);
        $this->view->assign('id', $this->request);
        return $this->htmlResponse($view->render());
    }

    private function getView(): StandaloneView
    {
        $view = GeneralUtility::makeInstance(StandaloneView::class);
        $view->setTemplatePathAndFilename(self::TEMPLATE_PATH);
        $view->setLayoutRootPaths([self::LAYOUT_PATH]);
        $view->setPartialRootPaths([self::PARTIALS_PATH]);

        // home view variables
        $this->view->assign('pages', $this->urlsRepository->getUrls());
        $this->view->assign('externUrls', $this->urlsRepository->getUrls(UrlsRepository::TYPE_EXTERNAL));

        // resume viewy variables
        $this->view->assign('experiences', $this->qualificationRepository->getQualifications());
        $this->view->assign('educations', $this->qualificationRepository->getQualifications(QualificationsRepository::CATEGORY_EDUCATION));

        $this->view->assign('skills', $this->myWebsiteService->formatSkillsForDisplay($this->skillsRepository->getSkills()));
        $this->view->assign('projects', $this->myWebsiteService->formatProjectsForDisplay($this->projectsRepository->getProjects()) );

       // debugUtility::debug($this->myWebsiteService->formatProjectsForDisplay($this->projectsRepository->getProjects()) , 'test');

        return $view;
    }
}