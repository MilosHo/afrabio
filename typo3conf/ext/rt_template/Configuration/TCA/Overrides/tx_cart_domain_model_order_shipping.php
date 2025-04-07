<?php
defined('TYPO3') or die();

$fields = [
   'packeta_id' => [
      'exclude' => 1,
      'label' => 'Packeta ID',
      'config' => [
         'type' => 'input',
         'size' => 15
      ],
   ],
   'packeta_text' => [
      'exclude' => 1,
      'label' => 'Packeta Text',
      'config' => [
         'type' => 'input',
         'size' => 15
      ],
   ],
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_cart_domain_model_order_shipping', $fields);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tx_cart_domain_model_order_shipping', 'packeta_id, packeta_text');
