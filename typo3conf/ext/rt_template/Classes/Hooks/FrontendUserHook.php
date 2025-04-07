<?php
namespace Runit\RtTemplate\Hooks;

use Extcode\Cart\Domain\Model\Order\BillingAddress;
use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Domain\Model\FrontendUser;
use TYPO3\CMS\Extbase\Domain\Repository\FrontendUserRepository;
use TYPO3\CMS\Extbase\Object\ObjectManager;

/**
 * FrontendUserHook
 */
class FrontendUserHook
{
    /**
     * @param array &$parameters
     */
    public function showCartActionAfterCartWasLoaded(&$parameters, $refObj)
    {
        $billingAddress = $parameters['billingAddress'];
        $request = $parameters['request'];

        if ($request && $request->getOriginalRequest() && $request->getOriginalRequest()->getArguments()) {
            return;
        }

        $context = GeneralUtility::makeInstance(
            Context::class
        );
        $feUserUid = $context->getPropertyFromAspect('frontend.user', 'id');

        $objectManager = GeneralUtility::makeInstance(
            ObjectManager::class
        );
        $frontendUserRepository = $objectManager->get(
            FrontendUserRepository::class
        );
        $frontenUser = $frontendUserRepository->findByUid($feUserUid);

        if ($frontenUser instanceof FrontendUser) {
            $billingAddress = $objectManager->get(
                BillingAddress::class
            );
            $billingAddress->setEmail($frontenUser->getEmail());
            $billingAddress->setTitle($frontenUser->getTitle());
            $billingAddress->setFirstName($frontenUser->getFirstName());
            $billingAddress->setLastName($frontenUser->getLastName());
            $billingAddress->setCompany($frontenUser->getCompany());
            $billingAddress->setStreet($frontenUser->getAddress());
            $billingAddress->setZip($frontenUser->getZip());
            $billingAddress->setCity($frontenUser->getCity());
            $billingAddress->setPhone($frontenUser->getTelephone());
            $billingAddress->setTaxIdentificationNumber($frontenUser->getFax());
            $parameters['billingAddress'] = $billingAddress;
        }     
    }

}