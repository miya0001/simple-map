<?php

class SimpleMapTest extends WP_UnitTestCase
{
    /*
     * @since 1.6.0
     */
    function test_address() {
        $this->assertEquals(
            '<div class="simplemap"><div class="simplemap-content" data-breakpoint="480" data-lat="" data-lng="" data-zoom="16" data-addr="" data-infowindow="close" style="width:100%;height:200px;">Osaka Japan</div></div>',
            do_shortcode('[map]Osaka Japan[/map]')
        );
    }

    /*
     * @since 1.6.0
     */
    function test_url() {
        $this->assertRegExp('#^<iframe .+?>.*</iframe>#', do_shortcode('[map url="http://example.com/"]Test[/map]'));
    }

    /*
     * @since 1.6.1
     */
    function test_args() {
        // infowindow
        $this->assertEquals(
            '<div class="simplemap"><div class="simplemap-content" data-breakpoint="480" data-lat="" data-lng="" data-zoom="16" data-addr="" data-infowindow="open" style="width:88px;height:99px;">Osaka Japan</div></div>',
            do_shortcode('[map width="88px" height="99px" infowindow="open"]Osaka Japan[/map]')
        );

        // width & height by PX
        $this->assertEquals(
            '<div class="simplemap"><div class="simplemap-content" data-breakpoint="480" data-lat="" data-lng="" data-zoom="16" data-addr="" data-infowindow="close" style="width:88px;height:99px;">Osaka Japan</div></div>',
            do_shortcode('[map width="88px" height="99px"]Osaka Japan[/map]')
        );

        // width & height by %
        $this->assertEquals(
            '<div class="simplemap"><div class="simplemap-content" data-breakpoint="480" data-lat="" data-lng="" data-zoom="16" data-addr="" data-infowindow="close" style="width:88%;height:99%;">Osaka Japan</div></div>',
            do_shortcode('[map width="88%" height="99%"]Osaka Japan[/map]')
        );

        // zoom
        $this->assertEquals(
            '<div class="simplemap"><div class="simplemap-content" data-breakpoint="480" data-lat="" data-lng="" data-zoom="10" data-addr="" data-infowindow="close" style="width:100%;height:200px;">Osaka Japan</div></div>',
            do_shortcode('[map zoom=10]Osaka Japan[/map]')
        );

        // breakpointo
        $this->assertEquals(
            '<div class="simplemap"><div class="simplemap-content" data-breakpoint="300" data-lat="" data-lng="" data-zoom="16" data-addr="" data-infowindow="close" style="width:100%;height:200px;">Osaka Japan</div></div>',
            do_shortcode('[map breakpoint="300"]Osaka Japan[/map]')
        );

        // large breakpointo
        $this->assertEquals(
            '<div class="simplemap"><div class="simplemap-content" data-breakpoint="640" data-lat="" data-lng="" data-zoom="16" data-addr="" data-infowindow="close" style="width:100%;height:200px;">Osaka Japan</div></div>',
            do_shortcode('[map breakpoint="3000"]Osaka Japan[/map]')
        );

        // lat and lng
        $this->assertEquals(
            '<div class="simplemap"><div class="simplemap-content" data-breakpoint="480" data-lat="38.8976763" data-lng="-77.03652979999998" data-zoom="16" data-addr="" data-infowindow="close" style="width:100%;height:200px;">Osaka Japan</div></div>',
            do_shortcode('[map lat="38.8976763" lng="-77.03652979999998"]Osaka Japan[/map]')
        );

        // Address and lat and lng
        $this->assertEquals(
            '<div class="simplemap"><div class="simplemap-content" data-breakpoint="480" data-lat="38.8976763" data-lng="-77.03652979999998" data-zoom="16" data-addr="" data-infowindow="close" style="width:100%;height:200px;">Osaka Japan</div></div>',
            do_shortcode('[map addr="Osaka Japan" lat="38.8976763" lng="-77.03652979999998"]Osaka Japan[/map]')
        );

        // Address and baloon text
        $this->assertEquals(
            '<div class="simplemap"><div class="simplemap-content" data-breakpoint="480" data-lat="" data-lng="" data-zoom="16" data-addr="Osaka Japan" data-infowindow="close" style="width:100%;height:200px;">Hello!</div></div>',
            do_shortcode('[map addr="Osaka Japan"]Hello![/map]')
        );

     }
}

