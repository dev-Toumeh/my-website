<?php

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

ExtensionUtility::configurePlugin(
    'Mywebsite',
    'Index',
    [
        Toumeh\MyWebsite\Controller\HomeController::class => 'index',
    ]
);