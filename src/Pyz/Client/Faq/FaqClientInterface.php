<?php

namespace Pyz\Client\Faq;

use Generated\Shared\Transfer\FaqCollectionTransfer;

interface FaqClientInterface
{
    /**
     * Specification:
     * - Does Zed call.
     * - Gets all FAQ.
     *
     * @param \Generated\Shared\Transfer\FaqCollectionTransfer $faqCollectionTransfer
     *
     * @return \Generated\Shared\Transfer\FaqCollectionTransfer
     * @api
     *
     */
    public function getFaqCollection(FaqCollectionTransfer $faqCollectionTransfer): FaqCollectionTransfer;
}
