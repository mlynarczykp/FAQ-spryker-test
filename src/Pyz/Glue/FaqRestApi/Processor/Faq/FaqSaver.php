<?php

namespace Pyz\Glue\FaqRestApi\Processor\Faq;

use Generated\Shared\Transfer\FaqTransfer;
use Generated\Shared\Transfer\RestErrorMessageTransfer;
use Pyz\Client\FaqRestApi\FaqRestApiClientInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

class FaqSaver implements FaqSaverInterface
{
    /** @var \Pyz\Client\FaqRestApi\FaqRestApiClientInterface */
    private FaqRestApiClientInterface $faqRestApiClient;

    /** @var \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface */
    private RestResourceBuilderInterface $restResourceBuilder;

    /**
     * @param \Pyz\Client\FaqRestApi\FaqRestApiClientInterface $faqRestApiClient
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface $restResourceBuilder
     */
    public function __construct(
        FaqRestApiClientInterface $faqRestApiClient,
        RestResourceBuilderInterface $restResourceBuilder
    ) {
        $this->faqRestApiClient = $faqRestApiClient;
        $this->restResourceBuilder = $restResourceBuilder;
    }

    /**
     * @param RestRequestInterface $restRequest
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function saveFaq(RestRequestInterface $restRequest, FaqTransfer $faqTransfer): RestResponseInterface
    {
        $restResponse = $this->restResourceBuilder->createRestResponse();

        $restApi = $this->faqRestApiClient
            ->saveFaq($faqTransfer);

        var_dump($restApi->getIdQuestion());

        if ($restApi) {
            return $restResponse->addResource($restRequest);
//            return $restResponse->addError(
//                (new RestErrorMessageTransfer())
//                    ->setCode('Question created successfully')
//                    ->setStatus(201)
//            );
        } else {
            return $restResponse->addError(
                (new RestErrorMessageTransfer())
                    ->setCode('An error occurred while creating')
                    ->setStatus(500)
            );
        }
    }
}
