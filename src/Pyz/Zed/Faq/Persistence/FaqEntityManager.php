<?php

namespace Pyz\Zed\Faq\Persistence;

use Generated\Shared\Transfer\FaqTransfer;
use Orm\Zed\Faq\Persistence\PyzFaqQuery;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

class FaqEntityManager extends AbstractEntityManager implements FaqEntityManagerInterface
{
    /**
     * @param \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     *
     * @return \Generated\Shared\Transfer\FaqTransfer
     * @throws \Propel\Runtime\Exception\PropelException
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function saveFaq(FaqTransfer $faqTransfer): FaqTransfer
    {
        $faqEntity = $this->createPyzFaqQuery()
            ->filterByIdQuestion($faqTransfer->getIdQuestion())
            ->findOneOrCreate();

        // fill up entity
        $faqEntity->fromArray($faqTransfer->toArray());
        $faqEntity->save();

        // update transfer based on entity (like id_question field)
        $faqTransfer->fromArray($faqEntity->toArray());

        return $faqTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     *
     * @throws \Propel\Runtime\Exception\PropelException
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function deleteFaq(FaqTransfer $faqTransfer): void
    {
        $this->createPyzFaqQuery()
            ->filterByIdQuestion($faqTransfer->getIdQuestion())
            ->delete();
    }

    /**
     * @return \Orm\Zed\Faq\Persistence\PyzFaqQuery
     */
    private function createPyzFaqQuery(): PyzFaqQuery
    {
        return PyzFaqQuery::create();
    }
}
