<?php

namespace Pyz\Glue\FaqRestApi\Processor\Mapper;

use Generated\Shared\Transfer\RestFaqResponseAttributesTransfer;

class FaqResourceMapper implements FaqResourceMapperInterface
{
    public function mapFaqDataToFaqRestAttributes(array $faqData): RestFaqResponseAttributesTransfer
    {
        $restFaqAttributesTransfer = (new RestFaqResponseAttributesTransfer())->fromArray($faqData, true);

        return $restFaqAttributesTransfer;
    }
}
