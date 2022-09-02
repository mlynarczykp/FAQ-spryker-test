<?php

namespace Pyz\Zed\Faq\Persistence;

use Generated\Shared\Transfer\FaqTransfer;
use Generated\Shared\Transfer\FaqVoteTransfer;
use Orm\Zed\Faq\Persistence\PyzFaqQuery;
use Orm\Zed\Faq\Persistence\PyzFaqVotesQuery;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;
use Orm\Zed\Faq\Persistence\PyzFaqVotes;

class FaqEntityManager extends AbstractEntityManager implements FaqEntityManagerInterface
{
    /**
     * @param \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     *
     * @return \Generated\Shared\Transfer\FaqTransfer
     * @throws \Propel\Runtime\Exception\PropelException
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function saveFaq(FaqTransfer $faqTransfer): FaqTransfer
    {
        $faqEntity = $this->createPyzFaqQuery()
            ->filterByIdQuestion($faqTransfer->getIdQuestion())
            ->findOneOrCreate();

        if ($faqEntity->getIdQuestion() !== null) {
            // fill up entity
            $faqEntity->fromArray($faqTransfer->toArray());
            $faqEntity->save();

            // update transfer based on entity (like id_question field)
            $faqTransfer->fromArray($faqEntity->toArray());
        }

        return $faqTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     *
     * @throws \Propel\Runtime\Exception\PropelException
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function deleteFaq(FaqTransfer $faqTransfer): void
    {
        $this->createPyzFaqQuery()
            ->filterByIdQuestion($faqTransfer->getIdQuestion())
            ->delete();
    }

    /**
     * @return \Orm\Zed\Faq\Persistence\PyzFaqQuery
     */
    private function createPyzFaqQuery(): PyzFaqQuery
    {
        return PyzFaqQuery::create();
    }

    /**
     * @param \Generated\Shared\Transfer\FaqVoteTransfer $faqVoteTransfer
     *
     * @return \Generated\Shared\Transfer\FaqVoteTransfer
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function addVote(FaqVoteTransfer $faqVoteTransfer): FaqVoteTransfer
    {
        $voteEntity = new PyzFaqVotes();

        $voteUp = $voteEntity->setVotesUp($faqVoteTransfer->getVoteUp());

        if ($voteUp) {
            $voteEntity->setIdFaq($faqVoteTransfer->getIdFaq());
            $voteEntity->setIdCustomer($faqVoteTransfer->getIdCustomer());
            $voteEntity->setVotesUp($faqVoteTransfer->getVoteUp());
        } else {
            $voteEntity->setIdFaq($faqVoteTransfer->getIdFaq());
            $voteEntity->setIdCustomer($faqVoteTransfer->getIdCustomer());
            $voteEntity->setVotesDown($faqVoteTransfer->getVoteDown());
        }
        $voteEntity->save();

        return $faqVoteTransfer;
    }

    /**
     * @return \Orm\Zed\Faq\Persistence\PyzFaqVotesQuery
     */
    private function createPyzFaqVotesQuery(): PyzFaqVotesQuery
    {
        return PyzFaqVotesQuery::create();
    }
}
