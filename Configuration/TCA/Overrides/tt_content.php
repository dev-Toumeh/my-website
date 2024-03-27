<?php

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

ExtensionUtility::registerPlugin(
    'Mywebsite',
    'Index',
    'Active home Page'
);

ExtensionUtility::registerPlugin(
    'Mywebsite',
    'Contact',
    'json response plugin'
);