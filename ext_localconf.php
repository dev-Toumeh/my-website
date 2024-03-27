<?php

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

ExtensionUtility::configurePlugin(
    'Mywebsite',
    'Index',
    [
        Toumeh\MyWebsite\Controller\HomeController::class => 'index,resume,contact,projects',
    ],
    [
        Toumeh\MyWebsite\Controller\HomeController::class => 'index,resume,contact,projects',
    ]
);

ExtensionUtility::configurePlugin(
    'Mywebsite',
    'Contact',
    [
        Toumeh\MyWebsite\Controller\JsonController::class => 'json',
    ],
    [
        Toumeh\MyWebsite\Controller\JsonController::class => 'json',
    ]
);