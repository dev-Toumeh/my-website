<?php

namespace Toumeh\MyWebsite\Controller;


use Psr\Http\Message\ResponseInterface;
use Toumeh\MyWebsite\Domain\Repository\QualificationsRepository;
use Toumeh\MyWebsite\Domain\Repository\SkillsRepository;
use Toumeh\MyWebsite\Domain\Repository\UrlsRepository;
use Toumeh\MyWebsite\Service\SkillsService;
use TYPO3\CMS\Core\Domain\Repository\PageRepository;
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
        $this->view->assign(self::SECTIONS, ['projects']);
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

        // resume view variables
        $this->view->assign('experiences', $this->qualificationRepository->getQualifications());
        $this->view->assign('educations', $this->qualificationRepository->getQualifications(QualificationsRepository::TYPE_EDUCATION));

        $this->view->assign('skills', $this->skillsService->formatSkillsForDisplay($this->skillsRepository->getSkills()));

       // debugUtility::debug($this->skillsService->formatSkillsForDisplay($this->skillsRepository->getSkills()), 'test');

        return $view;
    }
}