<?php

class SimpleMapTest extends WP_UnitTestCase
{
    /*
     * @since 1.6.0
     */
    function test_address() {
        $this->assertRegExp('#^<div .+?>.*</div>#', do_shortcode('[map]Osaka Japan[/map]'));
    }

    /*
     * @since 1.6.0
     */
    function test_url() {
        $this->assertRegExp('#^<iframe .+?>.*</iframe>#', do_shortcode('[map url="http://example.com/"]Test[/map]'));
    }
}

