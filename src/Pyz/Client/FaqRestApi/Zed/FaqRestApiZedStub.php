<?php

namespace Pyz\Client\FaqRestApi\Zed;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Generated\Shared\Transfer\FaqTransfer;
use Spryker\Client\ZedRequest\ZedRequestClientInterface;

class FaqRestApiZedStub implements FaqRestApiZedStubInterface
{
    /**
     * @var \Spryker\Client\ZedRequest\ZedRequestClientInterface
     */
    protected $zedRequestClient;

    /**
     * @param \Spryker\Client\ZedRequest\ZedRequestClientInterface $zedRequestClient
     */
    public function __construct(ZedRequestClientInterface $zedRequestClient)
    {
        $this->zedRequestClient = $zedRequestClient;
    }

    /**
     * @param FaqCollectionTransfer $faqCollectionTransfer
     * @return \Generated\Shared\Transfer\FaqCollectionTransfer
     */
    public function getFaqCollection(FaqCollectionTransfer $faqCollectionTransfer): FaqCollectionTransfer
    {
        /** @var \Generated\Shared\Transfer\FaqCollectionTransfer $faqCollectionTransfer */
        $faqCollectionTransfer = $this->zedRequestClient->call(
            '/faq/gateway/get-faq-collection',
            $faqCollectionTransfer
        );

        return $faqCollectionTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     * @return \Generated\Shared\Transfer\FaqTransfer|null
     */
    public function getOneFaq(FaqTransfer $faqTransfer): ?FaqTransfer
    {
        /** @var null|\Generated\Shared\Transfer\FaqTransfer $faqTransfer */

        $faqTransfer = $this->zedRequestClient->call(
            '/faq/gateway/get-one-faq',
            $faqTransfer
        );

        return $faqTransfer;
    }

    public function saveFaq(FaqTransfer $faqTransfer): FaqTransfer
    {
        /** @var \Generated\Shared\Transfer\FaqTransfer $faqTransfer */

        $faqTransfer = $this->zedRequestClient->call(
            '/faq/gateway/save-faq',
            $faqTransfer
        );

        return $faqTransfer;
    }

    public function updateFaq(FaqTransfer $faqTransfer): FaqTransfer
    {
        /** @var \Generated\Shared\Transfer\FaqTransfer $faqTransfer */

        $faqTransfer = $this->zedRequestClient->call(
            '/faq/gateway/update-faq',
            $faqTransfer
        );

        return $faqTransfer;
    }

    public function deleteFaq(FaqTransfer $faqTransfer): FaqTransfer
    {
        /** @var \Generated\Shared\Transfer\FaqTransfer $faqTransfer */

        $faqTransfer = $this->zedRequestClient->call(
            '/faq/gateway/delete-faq',
            $faqTransfer
        );

        return $faqTransfer;
    }
}
