<?php

namespace Pyz\Client\FaqRestApi;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Generated\Shared\Transfer\FaqTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \Pyz\Client\FaqRestApi\FaqRestApiFactory getFactory()
 */
class FaqRestApiClient extends AbstractClient implements FaqRestApiClientInterface
{
    /**
     * @param FaqCollectionTransfer $faqCollectionTransfer
     * @return \Generated\Shared\Transfer\FaqCollectionTransfer
     * @api
     */
    public function getFaqCollection(FaqCollectionTransfer $faqCollectionTransfer): FaqCollectionTransfer
    {
        return $this->getFactory()
            ->createFaqZedStub()
            ->getFaqCollection($faqCollectionTransfer);
    }

    /**
     * @return \Generated\Shared\Transfer\FaqTransfer
     * @api
     */
    public function getOneFaq(FaqTransfer $faqTransfer): ?FaqTransfer
    {
        return $this->getFactory()
            ->createFaqZedStub()
            ->getOneFaq($faqTransfer);
    }

    /**
     * @param FaqTransfer $faqTransfer
     * @return \Generated\Shared\Transfer\FaqTransfer
     * @api
     */
    public function saveFaq(FaqTransfer $faqTransfer): FaqTransfer
    {
        return $this->getFactory()
            ->createFaqZedStub()
            ->saveFaq($faqTransfer);
    }

    /**
     * @return \Generated\Shared\Transfer\FaqTransfer
     * @api
     */
    public function updateFaq(FaqTransfer $faqTransfer): FaqTransfer
    {
        return $this->getFactory()
            ->createFaqZedStub()
            ->updateFaq($faqTransfer);
    }

    /**
     * @return \Generated\Shared\Transfer\FaqTransfer
     * @api
     */
    public function deleteFaq(FaqTransfer $faqTransfer): FaqTransfer
    {
        return $this->getFactory()
            ->createFaqZedStub()
            ->deleteFaq($faqTransfer);
    }
}
