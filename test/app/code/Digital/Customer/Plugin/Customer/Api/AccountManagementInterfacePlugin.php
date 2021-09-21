<?php
namespace Digital\Customer\Plugin\Customer\Api;

use Magento\Framework\Exception\InvalidEmailOrPasswordException;
use Magento\Customer\Model\CustomerFactory;
use Magento\Framework\Exception\LocalizedException;
use Psr\Log\LoggerInterface;

class AccountManagementInterfacePlugin
{
    /**
     * @var LoggerInterface
     */
    private $logger;

	public function __construct(
		CustomerFactory $customerFactory,
        LoggerInterface $logger
	){
		$this->customerFactory = $customerFactory;
        $this->logger = $logger;
	}

	public function beforeAuthenticate(\Magento\Customer\Api\AccountManagementInterface $subject,$email,$password)
	{
		$customer = $this->customerFactory->create();

		try {
			if($email){
				$customer = $customer->getCollection()
					->addAttributeToSelect('*')
					->addFieldToFilter('account_number',['eq' => $email])
					->load()
					->getFirstItem();
			}

			if(!$customer || ($customer && !$customer->getId())){
				$validEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
				$customer = $customer->getCollection()
					->addAttributeToSelect('*')
					->addFieldToFilter('email',['eq' => $validEmail])
					->load()
					->getFirstItem();
			}

			if(!$customer || ($customer && !$customer->getId())){
				$validEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
				$customer = $customer->getCollection()
					->addAttributeToSelect('*')
					->addFieldToFilter('api_email',['eq' => $validEmail])
					->load()
					->getFirstItem();
			}

			if($customer && $customer->getId()){
				if(!$customer->getCustomerIsActive()){
					throw new LocalizedException(__('You are not allowed to login because Your account is not active. Please contact website administrator.'));
				}
				$email = $customer->getEmail();
				return [$email, $password];
			}
		} catch (LocalizedException $e) {
            $this->logger->error($e);
            throw $e;
        } catch (Exception $e) {
        	$this->logger->error($e);
            throw $e;
        }
        
		return [$email, $password];
	}
}