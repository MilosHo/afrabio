<?php

namespace Runit\RtTemplate\Xclass;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Page\PageRenderer;


class CanonicalTagViewHelper extends \Extcode\CartProducts\ViewHelpers\CanonicalTagViewHelper
{
    public function render(): void
    {
        $product = $this->arguments['product'];
        
        /* get topic category */
        $category = $product->getCategory();

        if (!$category) {
            return;
        }
       
        $pageUid = $category->getCartProductShowPid();

        if (!$pageUid) {
            return;
        }

        $productId = $product->getUid();
        if ($product->getCategory()->getUid() == 4) {
            $productId =$product->getRelatedProducts()[0]->getUid();
        }

        $arguments = [
            'tx_cartproducts_products' =>
                [
                    'product' => $productId
                ]
        ];

        $uriBuilder = $this->renderingContext->getControllerContext()->getUriBuilder();
        $canonicalUrl = $uriBuilder->reset()
            ->setTargetPageUid($pageUid)
            ->setArguments($arguments)
            ->build();
        
        $GLOBALS['TSFE']->page['canonical_link'] = $canonicalUrl;
    }
}