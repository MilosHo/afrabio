<?php

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:rt_template/Configuration/TsConfig/BackendLayouts.tsconfig">');

    $GLOBALS['TYPO3_CONF_VARS']['LOG']['TYPO3']['CMS']['deprecations']['writerConfiguration'][\TYPO3\CMS\Core\Log\LogLevel::NOTICE] = [];
    $GLOBALS['TYPO3_CONF_VARS']['LOG']['writerConfiguration'] = [];

    $GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\Extcode\CartProducts\ViewHelpers\CanonicalTagViewHelper::class] = array(
        'className' => Runit\RtTemplate\Xclass\CanonicalTagViewHelper::class
    );
    $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['cart']['showCartActionAfterCartWasLoaded'][] = \Runit\RtTemplate\Hooks\FrontendUserHook::class . '->showCartActionAfterCartWasLoaded';
    
    $GLOBALS['TYPO3_CONF_VARS']['MAIL']['layoutRootPaths'][0] = 'EXT:rt_template/Resources/Private/Email/Layouts/';
    $GLOBALS['TYPO3_CONF_VARS']['MAIL']['templateRootPaths']['1728285159'] = 'EXT:rt_template/Resources/Private/Email/Templates/';

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'rttemplate',
    'productfeed',
    [
        \Runit\RtTemplate\Controller\ProductController::class => 'productFeed',
    ],
    [
        \Runit\RtTemplate\Controller\ProductController::class => 'productFeed',
    ]
);    