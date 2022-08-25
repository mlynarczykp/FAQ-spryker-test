<?php

namespace Pyz\Client\FaqRestApi\Zed;

use Generated\Shared\Transfer\FaqCollectionTransfer;

interface FaqRestApiZedStubInterface
{
    public function getFaqCollection(FaqCollectionTransfer $faqCollectionTransfer): FaqCollectionTransfer;
}
