<?php

namespace Pyz\Zed\Faq\Business;

use Generated\Shared\Transfer\FaqTransfer;
use Generated\Shared\Transfer\FaqCollectionTransfer;

interface FaqFacadeInterface
{
    /**
     * Specification:
     * - stores Faq to the database based on input transfer
     * - returns enhanced `FaqTransfer` with ID
     *
     * @param \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     *
     * @return \Generated\Shared\Transfer\FaqTransfer
     * @api
     *
     */
    public function saveFaq(FaqTransfer $faqTransfer): FaqTransfer;

    /**
     * Specification:
     * - returns Faq if exists based on theirs ID
     * - returns null if no such record is found
     *
     * @param int $idFaq
     *
     * @return \Generated\Shared\Transfer\FaqTransfer|null
     */
    public function findFaqById(int $idFaq): ?FaqTransfer;

    /**
     * Specification:
     * - delete Faq with specific ID
     *
     * @param \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     *
     * @return void
     * @api
     *
     */
    public function deleteFaq(FaqTransfer $faqTransfer): void;

    /**
     * @param \Generated\Shared\Transfer\FaqCollectionTransfer $faqRestApiTransfer
     * @return \Generated\Shared\Transfer\FaqCollectionTransfer $faqRestApiTransfer
     */
    public function getFaqCollection(FaqCollectionTransfer $faqRestApiTransfer): FaqCollectionTransfer;

    /**
     * @param \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     * @return \Generated\Shared\Transfer\FaqTransfer|null
     */
    public function getOneFaq(FaqTransfer $faqTransfer): ?FaqTransfer;
}
