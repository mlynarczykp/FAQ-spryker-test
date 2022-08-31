<?php

namespace Pyz\Client\Faq;

use Pyz\Client\Faq\Zed\FaqZedStub;
use Pyz\Client\Faq\Zed\FaqZedStubInterface;
use Spryker\Client\Kernel\AbstractFactory;
use Spryker\Client\ZedRequest\ZedRequestClientInterface;

class FaqFactory extends AbstractFactory
{
    /**
     * @return \Pyz\Client\Faq\Zed\FaqZedStubInterface
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    public function createFaqZedStub(): FaqZedStubInterface
    {
        return new FaqZedStub($this->getZedRequestClient());
    }

    /**
     * @return \Spryker\Client\ZedRequest\ZedRequestClientInterface
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    protected function getZedRequestClient(): ZedRequestClientInterface
    {
        return $this->getProvidedDependency(FaqDependencyProvider::CLIENT_ZED_REQUEST);
    }
}
