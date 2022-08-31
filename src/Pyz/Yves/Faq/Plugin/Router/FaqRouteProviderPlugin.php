<?php

namespace Pyz\Yves\Faq\Plugin\Router;

use Spryker\Yves\Router\Plugin\RouteProvider\AbstractRouteProviderPlugin;
use Spryker\Yves\Router\Route\RouteCollection;


class FaqRouteProviderPlugin extends AbstractRouteProviderPlugin
{
    protected const ROUTE_FAQ_INDEX = '/faq-index';
    protected const ROUTE_FAQ_VOTES = '/faq-votes';

    /**
     * Specification:
     * - Adds Routes to the RouteCollection.
     *
     * @param \Spryker\Yves\Router\Route\RouteCollection $routeCollection
     *
     * @return \Spryker\Yves\Router\Route\RouteCollection
     * @api
     *
     */
    public function addRoutes(RouteCollection $routeCollection): RouteCollection
    {
        $routeCollection = $this->addFaqIndexRoute($routeCollection);

        return $routeCollection;
    }

    /**
     * @param \Spryker\Yves\Router\Route\RouteCollection $routeCollection
     *
     * @return \Spryker\Yves\Router\Route\RouteCollection
     */
    protected function addFaqIndexRoute(RouteCollection $routeCollection): RouteCollection
    {
        $route = $this->buildRoute('/faq', 'Faq', 'Index', 'indexAction');
        $routeCollection->add(static::ROUTE_FAQ_INDEX, $route);

        $route = $this->buildRoute('/faq/vote', 'Faq', 'Votes', 'indexAction');
        $routeCollection->add(static::ROUTE_FAQ_VOTES, $route);

        return $routeCollection;
    }

}
