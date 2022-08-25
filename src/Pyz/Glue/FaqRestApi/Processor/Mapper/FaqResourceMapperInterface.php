<?php

namespace Pyz\Glue\FaqRestApi\Processor\Mapper;

use Generated\Shared\Transfer\RestFaqResponseAttributesTransfer;

interface FaqResourceMapperInterface
{
    public function mapFaqDataToFaqRestAttributes(array $faqData): RestFaqResponseAttributesTransfer;
}
