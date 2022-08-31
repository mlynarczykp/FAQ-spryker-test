<?php

namespace Pyz\Client\Faq;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Generated\Shared\Transfer\FaqVoteTransfer;

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

    /**
     * Specification:
     * - Send user vote to Zed
     *
     * @param \Generated\Shared\Transfer\FaqVoteTransfer $faqVoteTransfer
     *
     * @return \Generated\Shared\Transfer\FaqVoteTransfer
     * @api
     *
     */
    public function addVote(FaqVoteTransfer $faqVoteTransfer): FaqVoteTransfer;
}
