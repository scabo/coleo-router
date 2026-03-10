<?php

namespace Coleo\Router;

use Psr\Http\Message\RequestInterface;

/**
 * Router class
 */
class Router implements RouterInterface
{
    /**
     * @var RouteInterface[]
     */
    private $routes = [];

    /**
     * @inheritDoc
     *
     * @param PathMatcherInterface $pathMatcher
     * @param RouteInterface $route404
     */
    public function __construct(private PathMatcherInterface $pathMatcher, private RouteInterface $route404)
    {
    }

    /**
     * @inheritDoc
     *
     * @param RouteInterface $route
     * @return self
     */
    public function addRoute(RouteInterface $route): self
    {
        $this->routes[$route->getPattern()] = $route;
        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param RequestInterface $request
     * @return RouteInterface
     */
    public function resolve(RequestInterface $request): RouteInterface
    {
        foreach ($this->routes as $pattern => $route) {
            if (
                in_array('*', $route->getAllowedMethods())
                || in_array($request->getMethod(), $route->getAllowedMethods())
            ) {
                $result = $this->pathMatcher->match($request->getUri()->getPath(), $pattern);
                if (false !== $result && is_array($result)) {
                    $route->withParams($result);
                    return $route;
                }
            }
        }

        return $this->route404;
    }
}
