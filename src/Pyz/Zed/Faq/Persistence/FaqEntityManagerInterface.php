<?php

namespace Pyz\Zed\Faq\Persistence;

use Generated\Shared\Transfer\FaqTransfer;
use Generated\Shared\Transfer\FaqVoteTransfer;

interface FaqEntityManagerInterface
{
    /**
     * @param \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     *
     * @return \Generated\Shared\Transfer\FaqTransfer
     */
    public function saveFaq(FaqTransfer $faqTransfer): FaqTransfer;

    /**
     * @param \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     *
     * @return void
     */
    public function deleteFaq(FaqTransfer $faqTransfer): void;

    /**
     * @param \Generated\Shared\Transfer\FaqVoteTransfer $faqVoteTransfer
     *
     * @return \Generated\Shared\Transfer\FaqVoteTransfer
     */
    public function addVote(FaqVoteTransfer $faqVoteTransfer): FaqVoteTransfer;
}
