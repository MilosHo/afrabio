<?php
declare(strict_types=1);

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

ExtensionUtility::registerPlugin(
    'rttemplate',
    'ProductFeed',
    'Product Feed - Google',
    'rt_template'
);