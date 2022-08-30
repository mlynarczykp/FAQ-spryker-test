<?php

namespace Pyz\Yves\Faq\Controller;

use Spryker\Yves\Kernel\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Generated\Shared\Transfer\FaqCollectionTransfer;
use Spryker\Yves\Kernel\View\View;

/**
 * @method \Pyz\Client\Faq\FaqClientInterface getClient()
 */
class IndexController extends AbstractController
{
    /**
     * @param Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Spryker\Yves\Kernel\View\View
     */
    public function indexAction(Request $request): View
    {
        $data = $this->getClient()->getFaqCollection(new FaqCollectionTransfer());

        foreach ($data->getFaq() as $getAllFaq) {
            $questions [] = $getAllFaq->toArray();
        }

        return $this->view(
            ['questions' => $questions],
            [],
            '@Faq/views/index/index.twig'
        );
    }
}
