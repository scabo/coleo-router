<?php

namespace Coleo\Router;

/**
 * Path matcher interface
 *
 * Matches requrest path with pattern.
 */
interface PathMatcherInterface
{
    /**
     * Match path with pattern.
     *
     * If the path does match the given pattern,
     * it returns TRUE, else FALSE.
     * 
     * Also if there are params in the path and this path has been matched successfully, 
     * an associative array with them will be returned
     *
     * @param string $path
     * @param string $pattern
     * @return array|boolean
     */
    public function match(string $path, string $pattern): array|bool;
}
