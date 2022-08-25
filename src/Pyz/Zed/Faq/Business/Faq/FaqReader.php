<?php

namespace Pyz\Zed\Faq\Business\Faq;

use Generated\Shared\Transfer\FaqTransfer;
use Pyz\Zed\Faq\Persistence\FaqRepositoryInterface;
use Generated\Shared\Transfer\FaqCollectionTransfer;

class FaqReader implements FaqReaderInterface
{
    /** @var \Pyz\Zed\Faq\Persistence\FaqRepositoryInterface */
    private FaqRepositoryInterface $faqRepository;

    /**
     * @param \Pyz\Zed\Faq\Persistence\FaqRepositoryInterface $faqRepository
     */
    public function __construct(FaqRepositoryInterface $faqRepository)
    {
        $this->faqRepository = $faqRepository;
    }

    /**
     * @param int $idFaqq
     *
     * @return \Generated\Shared\Transfer\FaqTransfer|null
     */
    public function findFaqById(int $idFaq): ?FaqTransfer
    {
        return $this->faqRepository->findFaqById($idFaq);
    }

    /**
     * @param \Generated\Shared\Transfer\FaqCollectionTransfer $faqRestApiTransfer
     * @return \Generated\Shared\Transfer\FaqCollectionTransfer $faqRestApiTransfer
     */
    public function getFaqCollection(FaqCollectionTransfer $faqRestApiTransfer): FaqCollectionTransfer
    {
        return $this->faqRepository->getFaqCollection($faqRestApiTransfer);
    }

}
