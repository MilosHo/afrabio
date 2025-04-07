<?php

namespace Runit\RtTemplate\Xclass;

/*
 * This file is part of the package extcode/cart.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use TYPO3\CMS\Core\Messaging\AbstractMessage;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use TYPO3\CMS\Core\Session\UserSessionManager;

class ShippingController extends \Extcode\Cart\Controller\Cart\ShippingController
{
    const AJAX_CART_TYPE_NUM = '2278001';

    /**
     * Action update
     *
     * @param int $shippingId
     */
    public function updateAction($shippingId)
    {
        $this->cart = $this->sessionHandler->restore($this->settings['cart']['pid']);

        $this->shippings = $this->parserUtility->parseServices('Shipping', $this->pluginSettings, $this->cart);

        $shipping = $this->shippings[$shippingId];
        
        if ($shippingId == 1 && $this->request->hasArgument('packetaId') && $this->request->hasArgument('packetaText')) {
            $userSessionManager = UserSessionManager::create('FE');
            $session = $userSessionManager->createFromGlobalCookieOrAnonymous('fe_typo_user');
            $session->set('packetaId', $this->request->getArgument('packetaId'));
            $session->set('packetaText', $this->request->getArgument('packetaText'));
        }

        if ($shipping) {
            if ($shipping->isAvailable($this->cart->getGross())) {
                $this->cart->setShipping($shipping);
            } else {
                $this->addFlashMessage(
                    LocalizationUtility::translate(
                        'tx_cart.controller.cart.action.set_shipping.not_available',
                        'Cart'
                    ),
                    '',
                    AbstractMessage::ERROR,
                    true
                );
            }
        }

        $this->sessionHandler->write($this->cart, $this->settings['cart']['pid']);

        $pageType = $GLOBALS['TYPO3_REQUEST']->getAttribute('routing')->getPageType();
        if ($pageType === self::AJAX_CART_TYPE_NUM) {
            $this->view->assign('cart', $this->cart);

            $this->parseData();
            $assignArguments = [
                'shippings' => $this->shippings,
                'payments' => $this->payments,
                'specials' => $this->specials
            ];
            $this->view->assignMultiple($assignArguments);
        } else {
            $this->redirect('show', 'Cart\Cart');
        }
    }
}
