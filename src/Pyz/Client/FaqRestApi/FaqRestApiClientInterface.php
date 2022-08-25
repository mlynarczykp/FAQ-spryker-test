<?php

namespace Pyz\Client\FaqRestApi;

use Generated\Shared\Transfer\FaqCollectionTransfer;

interface FaqRestApiClientInterface
{
    /**
     * @api
     * @return \Generated\Shared\Transfer\FaqCollectionTransfer
     */
    public function getFaqCollection(FaqCollectionTransfer $faqCollectionTransfer): FaqCollectionTransfer;
}
