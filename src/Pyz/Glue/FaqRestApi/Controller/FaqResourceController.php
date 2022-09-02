<?php

namespace Pyz\Glue\FaqRestApi\Controller;

use Generated\Shared\Transfer\FaqTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;
use Spryker\Glue\Kernel\Controller\AbstractController;

/**
 * @method \Pyz\Glue\FaqRestApi\FaqRestApiFactory getFactory()
 */
class FaqResourceController extends AbstractController
{
    /**
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function getAction(RestRequestInterface $restRequest): RestResponseInterface
    {
        $id = $restRequest->getResource()->getId();

        if (!$id) {
            return $this->getFactory()->createFaqReader()->getFaq($restRequest);
        } else {
            return $this->getFactory()->createFaqReader()->getOneFaq($restRequest, $id);
        }

    }

    /**
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function postAction(RestRequestInterface $restRequest): RestResponseInterface
    {
        $data = (new FaqTransfer())
            ->fromArray(
                $restRequest->getResource()->getAttributes()->toArray()
            );

        return $this->getFactory()->createFaqSaver()->saveFaq($restRequest, $data);
    }

    /**
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function patchAction(RestRequestInterface $restRequest): RestResponseInterface
    {
        $data = (new FaqTransfer())
            ->fromArray(
                $restRequest->getResource()->getAttributes()->toArray()
            )->setIdQuestion($restRequest->getResource()->getId());

        return $this->getFactory()->createFaqUpdater()->updateFaq($restRequest, $data);
    }

    /**
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function deleteAction(RestRequestInterface $restRequest): RestResponseInterface
    {
        $data = (new FaqTransfer())->setIdQuestion($restRequest->getResource()->getId());

        return $this->getFactory()->createFaqDeleter()->deleteFaq($restRequest, $data);
    }
}
