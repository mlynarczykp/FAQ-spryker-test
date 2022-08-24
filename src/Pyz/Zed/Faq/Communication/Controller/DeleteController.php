<?php

namespace Pyz\Zed\Faq\Communication\Controller;

use Pyz\Zed\Faq\Business\FaqFacadeInterface;
use Symfony\Component\HttpFoundation\Request;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;

/**
 * @method \Pyz\Zed\Faq\Communication\FaqCommunicationFactory getFactory()
 * @method FaqFacadeInterface getFacade()
 */
class DeleteController extends AbstractController
{
    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $idFaq = $this->castId($request->query->get('id-question'));

        if (empty($idFaq)) {
            $this->addErrorMessage('missing question id!');

            return $this->redirectResponse('/faq/list');
        }

        if ($idFaq) {
            $faq = $this->getFacade()->findFaqById($idFaq);
            $this->getFacade()->deleteFaq($faq);
            $this->addSuccessMessage("Faq deleted successfully");
        } else {
            $this->addErrorMessage("Couldn't delete faq");
        }
        return $this->redirectResponse('/faq/list');
    }
}
