<?php

namespace Pyz\Zed\Faq\Persistence;

use Generated\Shared\Transfer\FaqTransfer;
use Orm\Zed\Faq\Persistence\PyzFaq;
use Orm\Zed\Faq\Persistence\PyzFaqQuery;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;
use Generated\Shared\Transfer\FaqCollectionTransfer;

class FaqRepository extends AbstractRepository implements FaqRepositoryInterface
{
    /**
     * @param int $idFaq
     * @return \Generated\Shared\Transfer\FaqTransfer|null
     */
    public function findFaqById(int $idFaq): ?FaqTransfer
    {
        $faqEntity = $this->createPyzFaqQuery()
            ->findOneByIdQuestion($idFaq);

        if ($faqEntity == null) {
            $nullEntity = new FaqTransfer();
            $nullEntity->setIdQuestion(0);
            return $nullEntity;
        }

        return $this->mapEntityToTransfer($faqEntity);
    }

    /**
     * @return \Orm\Zed\Faq\Persistence\PyzFaqQuery
     */
    private function createPyzFaqQuery(): PyzFaqQuery
    {
        return PyzFaqQuery::create();
    }

    /**
     * @param \Orm\Zed\Faq\Persistence\PyzFaq $faqEntity
     *
     * @return \Generated\Shared\Transfer\FaqTransfer
     */
    private function mapEntityToTransfer(PyzFaq $faqEntity): FaqTransfer
    {
        return (new FaqTransfer())->fromArray($faqEntity->toArray());
    }

    /**
     * @param \Generated\Shared\Transfer\FaqCollectionTransfer $faqRestApiTransfer
     * @return \Generated\Shared\Transfer\FaqCollectionTransfer $faqRestApiTransfer
     */
    public function getFaqCollection(FaqCollectionTransfer $faqRestApiTransfer): FaqCollectionTransfer
    {
        $faqCollection = $this->createPyzFaqQuery()
            ->find();

        foreach ($faqCollection as $faqEntity) {
            $faqTransfer = (new FaqTransfer())->fromArray($faqEntity->toArray());
            $faqRestApiTransfer->addFaq($faqTransfer);
        }

        return $faqRestApiTransfer;
    }
}
