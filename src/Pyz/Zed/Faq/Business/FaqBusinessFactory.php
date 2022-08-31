<?php

namespace Pyz\Zed\Faq\Business;

use Pyz\Zed\Faq\Business\Faq\FaqDeleter;
use Pyz\Zed\Faq\Business\Faq\FaqSaver;
use Pyz\Zed\Faq\Business\Faq\FaqSaverInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use Pyz\Zed\Faq\Business\Faq\FaqReaderInterface;
use Pyz\Zed\Faq\Business\Faq\FaqReader;
use Pyz\Zed\Faq\Business\Faq\FaqDeleterInterface;
use Pyz\Zed\Faq\Business\Faq\VoteSaverInterface;
use Pyz\Zed\Faq\Business\Faq\VoteSaver;

/**
 * @method \Pyz\Zed\Faq\Persistence\FaqEntityManagerInterface getEntityManager()
 * @method \Pyz\Zed\Faq\Persistence\FaqRepositoryInterface getRepository()
 */
class FaqBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \Pyz\Zed\Faq\Business\Faq\FaqSaverInterface
     */
    public function createFaqSaver(): FaqSaverInterface
    {
        return new FaqSaver(
            $this->getEntityManager()
        );
    }

    /**
     * @return \Pyz\Zed\Faq\Business\Faq\FaqReaderInterface
     */
    public function createFaqReader(): FaqReaderInterface
    {
        return new FaqReader(
            $this->getRepository()
        );
    }

    /**
     * @return \Pyz\Zed\Faq\Business\Faq\FaqDeleterInterface
     */
    public function createFaqDeleter(): FaqDeleterInterface
    {
        return new FaqDeleter(
            $this->getEntityManager()
        );
    }

    /**
     * @return \Pyz\Zed\Faq\Business\Faq\VoteSaverInterface
     */
    public function createVoteSaver(): VoteSaverInterface
    {
        return new VoteSaver(
            $this->getEntityManager()
        );
    }
}
