<?php

namespace Pyz\Zed\Faq\Communication\Controller;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Generated\Shared\Transfer\FaqTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractGatewayController;

/**
 * @method \Pyz\Zed\Faq\Business\FaqFacadeInterface getFacade()
 */
class GatewayController extends AbstractGatewayController
{
    /**
     * @param \Generated\Shared\Transfer\FaqCollectionTransfer $faqRestApiTransfer
     *
     * @return \Generated\Shared\Transfer\FaqCollectionTransfer $faqRestApiTransfer
     */
    public function getFaqCollectionAction(FaqCollectionTransfer $faqRestApiTransfer): FaqCollectionTransfer
    {
        return $this->getFacade()->getFaqCollection($faqRestApiTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     *
     * @return \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     */
    public function getOneFaqAction(FaqTransfer $faqTransfer): FaqTransfer
    {
        return $this->getFacade()->getOneFaq($faqTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     *
     * @return \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     */
    public function saveFaqAction(FaqTransfer $faqTransfer): FaqTransfer
    {
        return $this->getFacade()->saveFaq($faqTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     *
     * @return \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     */
    public function updateFaqAction(FaqTransfer $faqTransfer): FaqTransfer
    {
        return $this->getFacade()->saveFaq($faqTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     *
     * @return \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     */
    public function deleteFaqAction(FaqTransfer $faqTransfer): FaqTransfer
    {
        $this->getFacade()->deleteFaq($faqTransfer);

        return $faqTransfer;
    }
}
