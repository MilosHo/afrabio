<?php

namespace Runit\RtTemplate\EventListener;

use Extcode\Cart\Domain\Repository\Order\ShippingRepository;
use Extcode\Cart\Domain\Repository\Order\ItemRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use Evoweb\SfRegister\Domain\Repository\FrontendUserRepository;
use TYPO3\CMS\Extbase\Domain\Repository\FrontendUserRepository as CoreFrontendUserRepository;
use Evoweb\SfRegister\Domain\Model\FrontendUser;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use TYPO3\CMS\Core\Mail\FluidEmail;
use TYPO3\CMS\Core\Mail\Mailer;
use TYPO3\CMS\Core\Crypto\PasswordHashing\PasswordHashFactory;

/**
 * Description of FinishEvent
 *
 * @author homola@runit.sk
 */
final class FinishEvent
{
    
    public function dispatchEvent($data): void
    {
        $orderItem = $data->getOrderItem();
        $address = $orderItem ->getBillingAddress();
        if ( $_REQUEST['tx_cart_cart']['createUser']) {
                $itemRepository = GeneralUtility::makeInstance(ItemRepository::class);
                $userRepository = GeneralUtility::makeInstance(CoreFrontendUserRepository::class);

                $feUser = $this->createUser($address);
                $coreFeUser = $userRepository->findByUid($feUser->getUid());
                $orderItem->setFeUser($coreFeUser);
                $itemRepository->update($orderItem);
                
                GeneralUtility::getContainer()
                    ->get(PersistenceManager::class)
                    ->persistAll();
        }
        $orderShipping = $data->getOrderItem()->getShipping();
        if (in_array($orderShipping->getServiceId(), [2])) {
            $orderShipping->setPacketaId($_COOKIE['packetaId']);
            $orderShipping->setPacketaText($_COOKIE['packetaText']);
            $shippingRepository = GeneralUtility::makeInstance(
                ShippingRepository::class
            );
            $shippingRepository->update($orderShipping);
            
            $gw = new \SoapClient("http://www.zasilkovna.cz/api/soap.wsdl");
            $apiPassword = "b47ee3e7e61b24f107cbdf626ae67bf6";

            try {
                $packet = $gw->createPacket($apiPassword, array(
                    'number' => $orderItem->getOrderNumber(),
                    'name' => $address->getFirstName(),
                    'surname' => $address->getLastName(),
                    'email' => $address->getEmail(),
                    'phone' => $address->getPhone(),
                    'addressId' => $orderShipping->getPacketaId(),
                    'cod' => $data->getOrderItem()->getPayment()->getServiceId() == 1 ? $data->getOrderItem()->getTotalGross() : 0,
                    'value' => $orderItem->getTotalGross(),
                    'eshop' => "afrabio.sk",
                    'weight' => 0.9,
                ));
            }
            catch(SoapFault $e) {
                var_dump($e->detail); // property detail contains error info
            }            
        }
    }
    
    private function createUser($userData) {
        $userRepository = GeneralUtility::makeInstance(FrontendUserRepository::class);
        $feUser = $userRepository->findByEmail($userData->getEmail());
        if ($feUser) {
        } else {
            $password = $this->randomPassword();
            $user = new FrontendUser();
            $user->setPid( 15 );
            $user->setTitle( $userData->getTitle() );
            $user->setFirstname( $userData->getFirstname() );
            $user->setLastname( $userData->getLastname() );
            $user->setEmail( $userData->getEmail() );
            $user->setUsername( $userData->getEmail() );
            $user->setAddress( $userData->getStreet() );
            $user->setZip( $userData->getZip() );
            $user->setCity( $userData->getCity() );
            $user->setTelephone( $userData->getPhone() );
            $user->setCountry( $userData->getCountry() );
            $user->setCompany( $userData->getCompany() );
            $user->setFax( $userData->getTaxIdentificationNumber() );
            $user->setPassword( $this->encryptPassword($password) );
            $user->setPrivacy( true );
            $userRepository->add($user);
            GeneralUtility::getContainer()
                ->get(PersistenceManager::class)
                ->persistAll();

            $email = GeneralUtility::makeInstance(FluidEmail::class)
                ->to($userData->getEmail())
                ->from('afra@afrabio.sk')
                ->setTemplate('Mail/Register')
                ->format(FluidEmail::FORMAT_HTML)
                ->assign('settings', $this->pluginSettings['settings'])
                ->assign('login', $userData->getEmail())
                ->assign('password', $password);
            GeneralUtility::makeInstance(Mailer::class)->send($email);
            
            return $user;
        }
    }
    
    private function randomPassword() {
        $alphabet = "abcdefghijkmnopqrstuwxyzABCDEFGHIJKMNPQRSTUWXYZ123456789";
        $pass = array(); 
        $alphaLength = strlen($alphabet) - 1; 
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); 
    }
    
    public function encryptPassword(string $password): string
    {
        /** @var PasswordHashFactory $passwordHashFactory */
        $passwordHashFactory = GeneralUtility::makeInstance(PasswordHashFactory::class);
        $passwordHash = $passwordHashFactory->getDefaultHashInstance('FE');
        return $passwordHash->getHashedPassword($password);
    }

}
