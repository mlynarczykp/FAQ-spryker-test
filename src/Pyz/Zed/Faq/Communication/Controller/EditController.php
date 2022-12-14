<?php

namespace Pyz\Zed\Faq\Communication\Controller;

use Generated\Shared\Transfer\FaqTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Zed\Faq\Communication\FaqCommunicationFactory getFactory()
 * @method \Pyz\Zed\Faq\Business\FaqFacadeInterface getFacade()
 */
class EditController extends AbstractController
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $idFaq = $this->castId($request->query->get('id-question'));

        if (empty($idFaq)) {
            $this->addErrorMessage('missing question id!');

            return $this->redirectResponse('/faq/list');
        }

        $faq = $this->getFacade()->findFaqById($idFaq);
        $faqTransfer = (new FaqTransfer())
            ->setIdQuestion($idFaq)
            ->setQuestion($faq->getQuestion())
            ->setAnswer($faq->getAnswer())
            ->setIsActive($faq->getIsActive());

        $faqForm = $this->getFactory()
            ->createFaqForm($faqTransfer)
            ->handleRequest($request);

        if ($faqForm->isSubmitted() && $faqForm->isValid()) {
            $this->getFacade()
                ->saveFaq($faqForm->getData());
            $this->addSuccessMessage('Question and its answer has been updated.');
            return $this->redirectResponse('/faq/list');
        }

        return $this->viewResponse([
            'faqForm' => $faqForm->createView()
        ]);
    }
}
