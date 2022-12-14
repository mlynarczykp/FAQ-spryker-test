<?php

namespace Pyz\Zed\Faq\Business;

use Generated\Shared\Transfer\FaqTransfer;
use Generated\Shared\Transfer\FaqVoteTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;
use Generated\Shared\Transfer\FaqCollectionTransfer;

/**
 * @method \Pyz\Zed\Faq\Business\FaqBusinessFactory getFactory()
 */
class FaqFacade extends AbstractFacade implements FaqFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @param \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     *
     * @return \Generated\Shared\Transfer\FaqTransfer
     * @api
     *
     */
    public function saveFaq(FaqTransfer $faqTransfer): FaqTransfer
    {
        return $this->getFactory()
            ->createFaqSaver()
            ->save($faqTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @param int $idFaq
     *
     * @return \Generated\Shared\Transfer\FaqTransfer|null
     * @api
     *
     */
    public function findFaqById(int $idFaq): ?FaqTransfer
    {
        return $this->getFactory()
            ->createFaqReader()
            ->findFaqById($idFaq);
    }

    /**
     * {@inheritDoc}
     *
     * @param \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     * @return void
     * @api
     *
     */
    public function deleteFaq(FaqTransfer $faqTransfer): void
    {
        $this->getFactory()
            ->createFaqDeleter()->delete($faqTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\FaqCollectionTransfer $faqRestApiTransfer
     * @return \Generated\Shared\Transfer\FaqCollectionTransfer $faqRestApiTransfer
     */
    public function getFaqCollection(FaqCollectionTransfer $faqRestApiTransfer): FaqCollectionTransfer
    {
        return $this->getFactory()
            ->createFaqReader()
            ->getFaqCollection($faqRestApiTransfer);
    }


    /**
     * @param \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     * @return \Generated\Shared\Transfer\FaqTransfer|null
     */
    public function getOneFaq(FaqTransfer $faqTransfer): ?FaqTransfer
    {
        $result = $this->findFaqById($faqTransfer->getIdQuestion());

        if ($result === null) {
            return null;
        } else {
            return $faqTransfer->fromArray($result->toArray());
        }
    }

    /**
     * @param \Generated\Shared\Transfer\FaqVoteTransfer $faqVoteTransfer
     *
     * @return \Generated\Shared\Transfer\FaqVoteTransfer
     */
    public function addVote(FaqVoteTransfer $faqVoteTransfer): FaqVoteTransfer
    {
        return $this->getFactory()
            ->createVoteSaver()
            ->addVote($faqVoteTransfer);
    }
}
