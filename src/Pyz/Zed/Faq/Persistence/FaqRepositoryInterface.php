<?php

namespace Pyz\Zed\Faq\Persistence;

use Generated\Shared\Transfer\FaqTransfer;
use Generated\Shared\Transfer\FaqCollectionTransfer;

interface FaqRepositoryInterface
{
    /**
     * @param int $idFaq
     *
     * @return \Generated\Shared\Transfer\FaqTransfer|null
     */
    public function findFaqById(int $idFaq): ?FaqTransfer;

    /**
     * @param \Generated\Shared\Transfer\FaqCollectionTransfer $faqRestApiTransfer
     * @return \Generated\Shared\Transfer\FaqCollectionTransfer $faqRestApiTransfer
     */
    public function getFaqCollection(FaqCollectionTransfer $faqRestApiTransfer): FaqCollectionTransfer;

}
