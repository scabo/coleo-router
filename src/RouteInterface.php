<?php

namespace Coleo\Router;

use Psr\Http\Server\RequestHandlerInterface;

/**
 * Route interface
 */
interface RouteInterface
{
    /**
     * Associate this route with template
     *
     * @param string $pattern
     * @return self
     */
    public function withPattern(string $pattern): self;

    /**
     * Get template that associated with this route
     *
     * @return string
     */
    public function getPattern(): string;

    /**
     * Link request handler (controller) to this route
     *
     * @param RequestHandlerInterface $handler
     * @return self
     */
    public function withHandler(RequestHandlerInterface $handler): self;

    /**
     * Get request handler (controller) that linked to this route
     *
     * @return RequestHandlerInterface
     */
    public function getHandler(): RequestHandlerInterface;

    /**
     * Define HTTP methods that this route allows.
     *
     * If need to set only 1 method pass it just as string,
     * or pass as array of string if route should support few methods
     *
     * @param array|string $methods
     * @return self
     */
    public function withAllowedMethods(array|string $methods): self;

    /**
     * Return a list of allowed HTTP methods for this route
     *
     * @return array
     */
    public function getAllowedMethods(): array;

    /**
     * Set parameters to this route
     *
     * @param array $params
     * @return self
     */
    public function withParams(array $params): self;

    /**
     * Get parameters that has this route
     *
     * @return array
     */
    public function getParams(): array;
}
