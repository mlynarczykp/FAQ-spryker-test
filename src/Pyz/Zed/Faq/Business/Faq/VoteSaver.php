<?php

namespace Pyz\Zed\Faq\Business\Faq;

use Generated\Shared\Transfer\FaqVoteTransfer;
use Pyz\Zed\Faq\Persistence\FaqEntityManagerInterface;

class VoteSaver implements VoteSaverInterface
{
    /** @var \Pyz\Zed\Faq\Persistence\FaqEntityManagerInterface */
    private FaqEntityManagerInterface $faqEntityManager;

    /**
     * @param \Pyz\Zed\Faq\Persistence\FaqEntityManagerInterface $faqEntityManager
     */
    public function __construct(FaqEntityManagerInterface $faqEntityManager)
    {
        $this->faqEntityManager = $faqEntityManager;
    }

    /**
     * @param \Generated\Shared\Transfer\FaqVoteTransfer $faqVoteTransfer
     *
     * @return \Generated\Shared\Transfer\FaqVoteTransfer
     */
    public function addVote(FaqVoteTransfer $faqVoteTransfer): FaqVoteTransfer
    {
        return $this->faqEntityManager->addVote($faqVoteTransfer);
    }
}
