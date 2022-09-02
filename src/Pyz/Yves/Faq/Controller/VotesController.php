<?php

namespace Pyz\Yves\Faq\Controller;

use Spryker\Yves\Kernel\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Generated\Shared\Transfer\FaqVoteTransfer;

/**
 * @method \Pyz\Client\Faq\FaqClientInterface getClient()
 * @method \Pyz\Yves\Faq\FaqFactory getFactory()
 */
class VotesController extends AbstractController
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @throws \Spryker\Yves\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    public function indexAction(Request $request): RedirectResponse
    {
//        $customerValidation = $this->getFactory()->createCustomerValidation();
//
//        if ($customerValidation->isCustomerLogged() == "false") {
//            $this->addErrorMessage('You must be logged in to vote');
//            return $this->redirectResponseInternal('faq');
//        } else {
            $faqId = $request->request->get('id_faq');

            $voteUp = $request->request->get('vote_up');
            $voteDown = $request->request->get('vote_down');

            if ($faqId === null) {
                $this->addErrorMessage('The question id is missing!');
                return $this->redirectResponseInternal('faq-index');
            }

            $faqId = intval($faqId);

            if ($voteUp) {
                $data = (new FaqVoteTransfer())
                    ->setIdVote(1)
                    ->setIdCustomer(1)
                    ->setIdFaq($faqId)
                    ->setVoteDown(1)
                    ->setVoteUp($voteUp);
            } else {
                $data = (new FaqVoteTransfer())
                    ->setIdCustomer(1)
                    ->setIdFaq($faqId)
                    ->setVoteDown($voteDown);
            }

//            echo '<pre>';
//            var_dump($data);
//            echo '</pre>';
//            die;
            $this->getClient()->addVote($data);

            $this->addSuccessMessage('Your vote has been added');
            return $this->redirectResponseInternal('faq-index');
        }
//    }
}
