<?php

namespace Pyz\Yves\Faq;

use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

class FaqDependencyProvider extends AbstractBundleDependencyProvider
{
    public const CUSTOMER_CLIENT = 'faq_customer_client';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     * @throws \Spryker\Service\Container\Exception\FrozenServiceException
     */
    public function provideDependencies(Container $container): Container
    {
        return $this->addCustomerClient($container);
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     * @throws \Spryker\Service\Container\Exception\FrozenServiceException
     */
    protected function addCustomerClient(Container $container): Container
    {
        $container->set(static::CUSTOMER_CLIENT, function (Container $container) {
            return $container->getLocator()->customer()->client();
        });
        return $container;
    }
}
