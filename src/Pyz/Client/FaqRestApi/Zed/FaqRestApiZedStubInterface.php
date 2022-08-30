<?php

namespace Pyz\Client\FaqRestApi\Zed;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Generated\Shared\Transfer\FaqTransfer;

interface FaqRestApiZedStubInterface
{
    public function getFaqCollection(FaqCollectionTransfer $faqCollectionTransfer): FaqCollectionTransfer;

    public function getOneFaq(FaqTransfer $faqTransfer): FaqTransfer;

    public function saveFaq(FaqTransfer $faqTransfer): FaqTransfer;

    public function updateFaq(FaqTransfer $faqTransfer): FaqTransfer;

    public function deleteFaq(FaqTransfer $faqTransfer): FaqTransfer;
}
