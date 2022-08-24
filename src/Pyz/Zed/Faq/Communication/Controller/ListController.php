<?php

namespace Pyz\Zed\Faq\Communication\Controller;

use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListController extends AbstractController
{
    /**
     * @return array
     * @throws
     * \Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundExceptio
     * n
     */
    public function indexAction(): array
    {
        $faqTable = $this->getFactory()->createFaqTable();
        return $this->viewResponse([
            'faqTable' => $faqTable->render()
        ]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     * @throws
     * \Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundExceptio
     * n
     */
    public function tableAction(): JsonResponse
    {
        $faqTable = $this->getFactory()->createFaqTable();

        return $this->jsonResponse($faqTable->fetchData());
    }
}
