<?php

namespace Pyz\Client\Faq;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Generated\Shared\Transfer\FaqVoteTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \Pyz\Client\Faq\FaqFactory getFactory()
 */
class FaqClient extends AbstractClient implements FaqClientInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\FaqCollectionTransfer $faqCollectionTransfer
     *
     * @return \Generated\Shared\Transfer\FaqCollectionTransfer
     */
    public function getFaqCollection(FaqCollectionTransfer $faqCollectionTransfer): FaqCollectionTransfer
    {
        return $this->getFactory()
            ->createFaqZedStub()
            ->getFaqCollection($faqCollectionTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\FaqVoteTransfer $faqVoteTransfer
     *
     * @return \Generated\Shared\Transfer\FaqVoteTransfer
     */
    public function addVote(FaqVoteTransfer $faqVoteTransfer): FaqVoteTransfer {

        return $this->getFactory()->createFaqZedStub()->addVote($faqVoteTransfer);
    }
}
