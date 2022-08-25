<?php

namespace Pyz\Zed\Faq\Communication\Controller;

use Generated\Shared\Transfer\FaqCollectionTransfer;
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
}
