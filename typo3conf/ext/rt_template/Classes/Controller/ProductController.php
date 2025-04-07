<?php

namespace Runit\RtTemplate\Controller;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Http\JsonResponse;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use Extcode\CartProducts\Domain\Repository\Product\ProductRepository;

/**
 * Description of ProductsController
 *
 * @author homola@runit.sk
 */
class ProductController extends ActionController
{
    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * @param EventDispatcherInterface|null $eventDispatcher
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }  
    
    public function productFeedAction(): ResponseInterface
    {
        $this->view->assign('products', $this->productRepository->findAll());
        return $this->htmlResponse()->withHeader('Content-Type', 'application/xml; charset=utf-8');
    }
}
