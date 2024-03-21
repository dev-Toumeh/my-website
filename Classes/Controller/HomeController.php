<?php

namespace Toumeh\MyWebsite\Controller;


use Psr\Http\Message\ResponseInterface;
use Toumeh\MyWebsite\Domain\Repository\UrlsRepository;
use TYPO3\CMS\Core\Domain\Repository\PageRepository;
use TYPO3\CMS\Core\Utility\DebugUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\View\StandaloneView;


class HomeController extends AbstractController
{
    private UrlsRepository $urlsRepository;

    public function injectCarRepository(UrlsRepository $urlsRepository): void
    {
        $this->urlsRepository = $urlsRepository;
    }

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
        $this->view->assign(self::SECTIONS, self::CONTACT_SECTIONS);
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
        $this->view->assign('pages', $this->urlsRepository->getUrls());
        $this->view->assign('externUrls', $this->urlsRepository->getUrls(UrlsRepository::TYPE_EXTERNAL));
        debugUtility::debug($this->urlsRepository->getUrls(UrlsRepository::TYPE_EXTERNAL), 'context');

        return $view;
    }
}