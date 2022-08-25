<?php

namespace Pyz\Client\FaqRestApi;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \Pyz\Client\FaqRestApi\FaqRestApiFactory getFactory()
 */
class FaqRestApiClient extends AbstractClient implements FaqRestApiClientInterface
{
    /**
     * @api
     * @return \Generated\Shared\Transfer\FaqCollectionTransfer
     */
    public function getFaqCollection(FaqCollectionTransfer $faqCollectionTransfer): FaqCollectionTransfer
    {
        return $this->getFactory()
            ->createFaqZedStub()
            ->getFaqCollection($faqCollectionTransfer);
    }
}
