<?php

namespace Pyz\Client\FaqRestApi;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Generated\Shared\Transfer\FaqTransfer;

interface FaqRestApiClientInterface
{
    /**
     * @return \Generated\Shared\Transfer\FaqCollectionTransfer
     * @api
     */
    public function getFaqCollection(FaqCollectionTransfer $faqCollectionTransfer): FaqCollectionTransfer;

    /**
     * @return \Generated\Shared\Transfer\FaqTransfer
     * @api
     */
    public function getOneFaq(FaqTransfer $faqTransfer): FaqTransfer;

    /**
     * @return \Generated\Shared\Transfer\FaqTransfer
     * @api
     */
    public function saveFaq(FaqTransfer $faqTransfer): FaqTransfer;

    /**
     * @return \Generated\Shared\Transfer\FaqTransfer
     * @api
     */
    public function updateFaq(FaqTransfer $faqTransfer): FaqTransfer;

    /**
     * @return \Generated\Shared\Transfer\FaqTransfer
     * @api
     */
    public function deleteFaq(FaqTransfer $faqTransfer): FaqTransfer;
}
