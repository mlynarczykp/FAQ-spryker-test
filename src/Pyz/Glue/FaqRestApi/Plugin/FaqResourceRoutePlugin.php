<?php

namespace Pyz\Glue\FaqRestApi\Plugin;

use Generated\Shared\Transfer\RestFaqResponseAttributesTransfer;
use Pyz\Glue\FaqRestApi\FaqRestApiConfig;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRouteCollectionInterface;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRoutePluginInterface;
use Spryker\Glue\Kernel\AbstractPlugin;

/**
 * @method \Pyz\Glue\FaqRestApi\FaqRestApiFactory getFactory()
 */
class FaqResourceRoutePlugin extends AbstractPlugin implements ResourceRoutePluginInterface
{
    public function configure(ResourceRouteCollectionInterface $resourceRouteCollection
    ): ResourceRouteCollectionInterface {
        $resourceRouteCollection
            ->addGet('get', false);
        $resourceRouteCollection
            ->addPost('post', true);
        $resourceRouteCollection
            ->addPatch('patch', true);
        $resourceRouteCollection
            ->addDelete('delete', true);

        return $resourceRouteCollection;
    }

    public function getResourceType(): string
    {
        return FaqRestApiConfig::RESOURCE_FAQ;
    }

    public function getController(): string
    {
        return 'faq-resource';
    }

    public function getResourceAttributesClassName(): string
    {
        return RestFaqResponseAttributesTransfer::class;
    }
}
