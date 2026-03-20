<?php

declare(strict_types=1);

namespace Coleo\Router;

use Psr\Http\Message\RequestInterface;

/**
 * Router interface
 *
 * Contain a list of all possible routes and try to define route for some  HTTP request
 */
interface RouterInterface
{
    /**
     * Constructor
     *
     * @param PathMatcherInterface $pathMatcher
     * @param RouteInterface $route404 Default router that returns if route not found for request
     */
    public function __construct(PathMatcherInterface $pathMatcher, RouteInterface $route404);

    /**
     * Add route to list of possible routes
     *
     * @param RouteInterface $route
     * @return self
     */
    public function addRoute(RouteInterface $route): self;

    /**
     * Define route for passed request.
     *
     * If route is not found, returns $route404 (@see __construct)
     *
     * @param RequestInterface $request
     * @return RouteInterface
     */
    public function resolve(RequestInterface $request): RouteInterface;
}
