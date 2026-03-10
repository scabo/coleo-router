<?php

namespace ColeoTest\Router;

use Coleo\Router\RegexPathMatcher;
use PHPUnit\Framework\TestCase;

/**
 * RegexPathMatcherTest
 * @group group
 */
class RegexPathMatcherTest extends TestCase
{
    /** @test */
    public function testPaths()
    {
        $matcher = new RegexPathMatcher;
        $this->assertTrue($matcher->match('/', '/'));
        $this->assertTrue($matcher->match('/about', "/about"));
        $this->assertEquals(
            ['id' => 123, 'orderby' => 'desc'], 
            $matcher->match('/users/123/desc', "/users/?{id}/?{orderby}")
        );
    }
}
