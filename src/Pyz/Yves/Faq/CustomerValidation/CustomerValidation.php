<?php

namespace Pyz\Yves\Faq\CustomerValidation;

use Spryker\Client\Customer\CustomerClientInterface;

class CustomerValidation implements CustomerValidationInterface
{
    /** @var \Spryker\Client\Customer\CustomerClientInterface */
    private CustomerClientInterface $customer;

    /**
     * @param \Spryker\Client\Customer\CustomerClientInterface $customer
     **/
    public function __construct(CustomerClientInterface $customer)
    {
        $this->customer = $customer;
    }

    /**
     * @return bool
     */
    public function isCustomerLogged(): bool
    {
        return $this->customer->isLoggedIn();
    }
}
