<?php

namespace Pyz\Yves\Faq;

use Spryker\Yves\Kernel\AbstractFactory;
use Spryker\Client\Customer\CustomerClientInterface;
use Pyz\Yves\Faq\CustomerValidation\CustomerValidationInterface;
use Pyz\Yves\Faq\CustomerValidation\CustomerValidation;

class FaqFactory extends AbstractFactory
{
    /**
     * @throws \Spryker\Yves\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    public function createCustomerValidation(): CustomerValidationInterface
    {
        return new CustomerValidation($this->getCustomerClient());
    }

    /**
     * @throws \Spryker\Yves\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    protected function getCustomerClient(): CustomerClientInterface
    {
        return $this->getProvidedDependency(FaqDependencyProvider::CUSTOMER_CLIENT);
    }
}
