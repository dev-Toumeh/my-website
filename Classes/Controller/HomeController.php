<?php

namespace Toumeh\MyWebsite\Controller;


use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Log\LogManager;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;



class HomeController extends ActionController
{
    public function indexAction(): ResponseInterface
    {
        $logger = GeneralUtility::makeInstance(LogManager::class)->getLogger(__CLASS__);
        $logger->info('The listAction method has been called.');
        return $this->htmlResponse('<h1>Hello from home</h1>');
    }

    public function showAction()
    {

    }

}