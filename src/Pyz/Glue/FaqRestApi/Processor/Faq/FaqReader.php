<?php

namespace Pyz\Glue\FaqRestApi\Processor\Faq;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Pyz\Client\FaqRestApi\FaqRestApiClientInterface;
use Pyz\Glue\FaqRestApi\FaqRestApiConfig;
use Pyz\Glue\FaqRestApi\Processor\Mapper\FaqResourceMapperInterface;
use Pyz\Glue\FaqRestApi\Processor\Mapper\FaqResourceMapper;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

class FaqReader implements FaqReaderInterface
{
    /** @var \Pyz\Client\FaqRestApi\FaqRestApiClientInterface */
    private FaqRestApiClientInterface $faqRestApiClient;

    /** @var \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface */
    private RestResourceBuilderInterface $restResourceBuilder;

    /** @var \Pyz\Glue\FaqRestApi\Processor\Mapper\FaqResourceMapper */
    private FaqResourceMapper $faqMapper;

    /**
     * @param \Pyz\Client\FaqRestApi\FaqRestApiClientInterface $faqRestApiClient
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface $restResourceBuilder
     * @param \Pyz\Glue\FaqRestApi\Processor\Mapper\FaqResourceMapperInterface $faqMapper
     */
    public function __construct(
        FaqRestApiClientInterface $faqRestApiClient,
        RestResourceBuilderInterface $restResourceBuilder,
        FaqResourceMapperInterface $faqMapper
    ) {
        $this->faqRestApiClient = $faqRestApiClient;
        $this->restResourceBuilder = $restResourceBuilder;
        $this->faqMapper = $faqMapper;
    }

    /**
     * @param RestRequestInterface $restRequest
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function getFaq(RestRequestInterface $restRequest): RestResponseInterface
    {
        $restResponse = $this->restResourceBuilder->createRestResponse();

        $faqCollectionTransfer = $this->faqRestApiClient->getFaqCollection(new FaqCollectionTransfer());

        foreach ($faqCollectionTransfer->getFaq() as $faqTransfer) {
            $restResource = $this->restResourceBuilder->createRestResource(
                FaqRestApiConfig::RESOURCE_FAQ,
                $faqTransfer->getIdQuestion(),
                $this->faqMapper->mapFaqDataToFaqRestAttributes($faqTransfer->toArray())
            );
            $restResponse->addResource($restResource);
        }

        return $restResponse;
    }
}
