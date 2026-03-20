<?php

declare(strict_types=1);

namespace Coleo\Router;

/**
 * Path Matcher class that based on preg_match function
 */
class RegexPathMatcher implements PathMatcherInterface
{
    /**
     * @inheritDoc
     *
     * @param string $path
     * @param string $pattern
     * @return array|boolean
     */
    public function match(string $path, string $pattern): array|bool
    {
        $pattern = preg_replace('/\{([a-zA-Z]+)\}/', '(?P<$1>[^/]+)', $pattern);
        $pattern = "#^$pattern$#";

        $result = preg_match($pattern, $path, $matches) ? $matches : false;
        if ($result) {
            $result = array_filter($result, 'is_string', ARRAY_FILTER_USE_KEY);
            return empty($result) ? true : $result;
        }

        return false;
    }
}
