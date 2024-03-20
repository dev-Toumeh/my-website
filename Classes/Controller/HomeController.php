<?php

namespace Toumeh\MyWebsite\Controller;


use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Domain\Repository\PageRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extensionmanager\Controller\AbstractController;
use TYPO3\CMS\Fluid\View\StandaloneView;


class HomeController extends AbstractController
{
    const string TEMPLATE_PATH = __DIR__ . '/../../Resources/Private/Templates/Home/';
    const string LAYOUT_PATH = __DIR__ . '/../../Resources/Private/layout/Default/';
    const string PARTIALS_PATH = __DIR__ . '/../../Resources/Private/partials/';

    const array HOME_SECTIONS = ["header", "about"];

    public function indexAction(): ResponseInterface
    {
        //   debugUtility::debug(, 'context');
        $view = $this->getView();
        $pageRepository = GeneralUtility::makeInstance(PageRepository::class);
        $page = $pageRepository->getPage(1);
        $this->view->assign('sections', self::HOME_SECTIONS);
        $this->view->assign('page', $page);
        $this->view->assign('id', $this->request);
        return $this->htmlResponse($view->render());
    }

    public function resumeAction(): ResponseInterface
    {
        $view = $this->getView();
        $pageRepository = GeneralUtility::makeInstance(PageRepository::class);
        $page = $pageRepository->getPage(7);
        $this->view->assign('sections', ['resume']);
        $this->view->assign('page', $page);
        $this->view->assign('id', $this->request);
        return $this->htmlResponse($view->render());
    }

    public function contactAction(): ResponseInterface
    {
        $view = $this->getView();
        $pageRepository = GeneralUtility::makeInstance(PageRepository::class);
        $page = $pageRepository->getPage(8);
        $this->view->assign('sections', ['contact']);
        $this->view->assign('page', $page);
        $this->view->assign('id', $this->request);
        return $this->htmlResponse($view->render());
    }

    public function projectsAction(): ResponseInterface
    {
        $view = $this->getView();
        $pageRepository = GeneralUtility::makeInstance(PageRepository::class);
        $page = $pageRepository->getPage(9);
        $this->view->assign('sections', ['projects']);
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

        return $view;
    }
}