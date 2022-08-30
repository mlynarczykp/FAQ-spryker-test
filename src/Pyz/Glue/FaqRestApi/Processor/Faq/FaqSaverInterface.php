<?php

namespace Pyz\Glue\FaqRestApi\Processor\Faq;

use Generated\Shared\Transfer\FaqTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

interface FaqSaverInterface
{
    /**
     * * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function saveFaq(RestRequestInterface $restRequest, FaqTransfer $faqTransfer): RestResponseInterface;
}
