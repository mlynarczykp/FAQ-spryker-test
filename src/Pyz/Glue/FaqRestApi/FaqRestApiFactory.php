<?php

namespace Pyz\Glue\FaqRestApi;

use Pyz\Glue\FaqRestApi\Processor\Faq\FaqReader;
use Pyz\Glue\FaqRestApi\Processor\Faq\FaqReaderInterface;
use Pyz\Glue\FaqRestApi\Processor\Mapper\FaqResourceMapper;
use Pyz\Glue\FaqRestApi\Processor\Faq\FaqSaverInterface;
use Pyz\Glue\FaqRestApi\Processor\Faq\FaqSaver;
use Pyz\Glue\FaqRestApi\Processor\Faq\FaqUpdaterInterface;
use Pyz\Glue\FaqRestApi\Processor\Faq\FaqUpdater;
use Pyz\Glue\FaqRestApi\Processor\Faq\FaqDeleterInterface;
use Pyz\Glue\FaqRestApi\Processor\Faq\FaqDeleter;
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

    public function createFaqSaver(): FaqSaverInterface
    {
        return new FaqSaver(
            $this->getClient(),
            $this->getResourceBuilder()
        );
    }

    public function createFaqUpdater(): FaqUpdaterInterface
    {
        return new FaqUpdater(
            $this->getClient(),
            $this->getResourceBuilder()
        );
    }

    public function createFaqDeleter(): FaqDeleterInterface
    {
        return new FaqDeleter(
            $this->getClient(),
            $this->getResourceBuilder()
        );
    }
}
