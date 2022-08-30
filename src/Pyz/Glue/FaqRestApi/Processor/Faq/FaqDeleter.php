<?php

namespace Pyz\Glue\FaqRestApi\Processor\Faq;

use Generated\Shared\Transfer\FaqTransfer;
use Generated\Shared\Transfer\RestErrorMessageTransfer;
use Pyz\Client\FaqRestApi\FaqRestApiClientInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

class FaqDeleter implements FaqDeleterInterface
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
    public function deleteFaq(RestRequestInterface $restRequest, FaqTransfer $faqTransfer): RestResponseInterface
    {
        $restResponse = $this->restResourceBuilder->createRestResponse();

        $restApi = $this->faqRestApiClient
            ->deleteFaq($faqTransfer);

        if ($restApi) {
            return $restResponse->addError(
                (new RestErrorMessageTransfer())
                    ->setCode('Question deleted successfully')
                    ->setStatus(201)
            );
        } else {
            return $restResponse->addError(
                (new RestErrorMessageTransfer())
                    ->setCode('An error occurred while deleting')
                    ->setStatus(500)
            );
        }
    }
}
