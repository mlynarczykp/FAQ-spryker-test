<?php

namespace Pyz\Client\Faq\Zed;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Generated\Shared\Transfer\FaqVoteTransfer;

interface FaqZedStubInterface
{
    /**
     * @param \Generated\Shared\Transfer\FaqCollectionTransfer $faqCollectionTransfer
     *
     * @return \Generated\Shared\Transfer\FaqCollectionTransfer
     */
    public function getFaqCollection(FaqCollectionTransfer $faqCollectionTransfer): FaqCollectionTransfer;

    /**
     * @param \Generated\Shared\Transfer\FaqVoteTransfer $faqVoteTransfer
     *
     * @return \Generated\Shared\Transfer\FaqVoteTransfer
     */
    public function addVote(FaqVoteTransfer $trans): FaqVoteTransfer;
}
