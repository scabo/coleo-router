<?php

namespace Coleo\Router;

use Psr\Http\Server\RequestHandlerInterface;

/**
 * Route class
 */
class Route implements RouteInterface
{
    private string $pattern;
    private RequestHandlerInterface $handler;
    private array $methods = [];
    private array $params = [];

    /**
     * Create empty route that should be filled with RouteIterface methods
     *
     * @return self
     */
    public static function create(): self
    {
        return new self();
    }

    /**
     * @inheritDoc
     *
     * @param string $pattern
     * @return self
     */
    public function withPattern(string $pattern): self
    {
        $this->pattern = $pattern;
        return $this;
    }

    /**
     * @inheritDoc
     *
     * @return string
     */
    public function getPattern(): string
    {
        return $this->pattern;
    }

    /**
     * @inheritDoc
     *
     * @param RequestHandlerInterface $handler
     * @return self
     */
    public function withHandler(RequestHandlerInterface $handler): self
    {
        $this->handler = $handler;
        return $this;
    }

    /**
     * @inheritDoc
     *
     * @return RequestHandlerInterface
     */
    public function getHandler(): RequestHandlerInterface
    {
        return $this->handler;
    }

    /**
     * @inheritDoc
     *
     * @param array|string $methods
     * @return self
     */
    public function withAllowedMethods(array|string $methods): self
    {
        if (is_string($methods)) {
            $methods = [$methods];
        }
        $this->methods = $methods;

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @return array
     */
    public function getAllowedMethods(): array
    {
        return empty($this->methods) ? ['*'] : $this->methods;
    }

    /**
     * @inheritDoc
     *
     * @param array $params
     * @return self
     */
    public function withParams(array $params): self
    {
        return $this;
    }

    /**
     * @inheritDoc
     *
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }
}
