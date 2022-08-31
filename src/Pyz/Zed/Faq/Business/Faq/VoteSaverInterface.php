<?php

namespace Pyz\Zed\Faq\Business\Faq;

use Generated\Shared\Transfer\FaqVoteTransfer;

interface VoteSaverInterface
{
    /**
     * @param \Generated\Shared\Transfer\FaqVoteTransfer $faqVoteTransfer
     *
     * @return \Generated\Shared\Transfer\FaqVoteTransfer
     */
    public function addVote(FaqVoteTransfer $faqVoteTransfer): FaqVoteTransfer;
}
