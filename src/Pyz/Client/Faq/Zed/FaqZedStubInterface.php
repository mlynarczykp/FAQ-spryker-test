<?php

namespace Pyz\Client\Faq\Zed;

use Generated\Shared\Transfer\FaqCollectionTransfer;

interface FaqZedStubInterface
{
    /**
     * @param \Generated\Shared\Transfer\FaqCollectionTransfer $faqCollectionTransfer
     *
     * @return \Generated\Shared\Transfer\FaqCollectionTransfer
     */
    public function getFaqCollection(FaqCollectionTransfer $faqCollectionTransfer): FaqCollectionTransfer;
}
