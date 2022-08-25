<?php

namespace Pyz\Glue\FaqRestApi;

use Pyz\Glue\FaqRestApi\Processor\Faq\FaqReader;
use Pyz\Glue\FaqRestApi\Processor\Faq\FaqReaderInterface;
use Pyz\Glue\FaqRestApi\Processor\Mapper\FaqResourceMapper;
use Spryker\Glue\Kernel\AbstractFactory;

/**
 * @method \Pyz\Client\FaqRestApi\FaqRestApiClientInterface getClient()
 */
class FaqRestApiFactory extends AbstractFactory
{
    public function createFaqResourceMapper(): FaqResourceMapper
    {
        return new FaqResourceMapper();
    }

    public function createFaqReader(): FaqReaderInterface
    {
        return new FaqReader(
            $this->getClient(),
            $this->getResourceBuilder(),
            $this->createFaqResourceMapper()
        );
    }
}
