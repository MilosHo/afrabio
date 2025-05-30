<?php

/***************************************************************
 * Extension Manager/Repository config file for ext: "rt_template"
 *
 * Auto generated by Extension Builder 2019-04-26
 *
 * Manual updates:
 * Only the data in the array - anything else is removed by next write.
 * "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = [
    'title' => 'Template',
    'description' => '',
    'category' => 'plugin',
    'author' => '',
    'author_email' => '',
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '1.0.1',
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.0-11.9.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'psr-4' => [
           'RunIT\\RtTemplate\\' => 'Classes'
        ],
        'classmap' => [
            'Classes',
         ]
     ],
];
