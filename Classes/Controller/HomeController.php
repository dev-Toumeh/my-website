<?php

namespace Toumeh\MyWebsite\Controller;


use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Log\LogManager;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Fluid\View\StandaloneView;


class HomeController extends ActionController
{
    CONST string TEMPLATE_PATH = __DIR__ . '/../../Resources/Private/Templates/';
    CONST string LAYOUT_PATH = __DIR__ . '/../../Resources/Private/layouts/';
    CONST string PARTIALS_PATH = __DIR__ . '/../../Resources/Private/partials/';
    public function indexAction(): ResponseInterface
    {
//        $logger = GeneralUtility::makeInstance(LogManager::class)->getLogger(__CLASS__);
//        $logger->info('The listAction method has been called.');


        return $this->htmlResponse($this->getView()->render());

    }

    private function getView(): StandaloneView
    {
        $view = GeneralUtility::makeInstance(StandaloneView::class);
//        $view->setTemplateRootPaths([self::TEMPLATE_PATH]);
        $view->setTemplatePathAndFilename(self::TEMPLATE_PATH);
        $view->setLayoutRootPaths([self::LAYOUT_PATH]);
//        $view->setPartialRootPaths([self::PARTIALS_PATH]);
   //     $view->setTemplate('Home');

        return $view;
    }

}