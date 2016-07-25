<?php

class SimpleMapTest extends WP_UnitTestCase
{
	/*
	 * @since 1.6.0
	 */
	function test_address() {
		$this->assertEquals(
			'<div class="simplemap"><div class="simplemap-content" data-breakpoint="480" data-lat="" data-lng="" data-zoom="16" data-addr="" data-infowindow="close" data-map-type-control="false" data-map-type-id="ROADMAP" style="width:100%;height:200px;">Osaka Japan</div></div>',
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
			'<div class="simplemap"><div class="simplemap-content" data-breakpoint="480" data-lat="" data-lng="" data-zoom="16" data-addr="" data-infowindow="open" data-map-type-control="false" data-map-type-id="ROADMAP" style="width:88px;height:99px;">Osaka Japan</div></div>',
			do_shortcode('[map width="88px" height="99px" infowindow="open"]Osaka Japan[/map]')
		);

		// width & height by PX
		$this->assertEquals(
			'<div class="simplemap"><div class="simplemap-content" data-breakpoint="480" data-lat="" data-lng="" data-zoom="16" data-addr="" data-infowindow="close" data-map-type-control="false" data-map-type-id="ROADMAP" style="width:88px;height:99px;">Osaka Japan</div></div>',
			do_shortcode('[map width="88px" height="99px"]Osaka Japan[/map]')
		);

		// width & height by %
		$this->assertEquals(
			'<div class="simplemap"><div class="simplemap-content" data-breakpoint="480" data-lat="" data-lng="" data-zoom="16" data-addr="" data-infowindow="close" data-map-type-control="false" data-map-type-id="ROADMAP" style="width:88%;height:99%;">Osaka Japan</div></div>',
			do_shortcode('[map width="88%" height="99%"]Osaka Japan[/map]')
		);

		// zoom
		$this->assertEquals(
			'<div class="simplemap"><div class="simplemap-content" data-breakpoint="480" data-lat="" data-lng="" data-zoom="10" data-addr="" data-infowindow="close" data-map-type-control="false" data-map-type-id="ROADMAP" style="width:100%;height:200px;">Osaka Japan</div></div>',
			do_shortcode('[map zoom=10]Osaka Japan[/map]')
		);

		// breakpointo
		$this->assertEquals(
			'<div class="simplemap"><div class="simplemap-content" data-breakpoint="300" data-lat="" data-lng="" data-zoom="16" data-addr="" data-infowindow="close" data-map-type-control="false" data-map-type-id="ROADMAP" style="width:100%;height:200px;">Osaka Japan</div></div>',
			do_shortcode('[map breakpoint="300"]Osaka Japan[/map]')
		);

		// large breakpointo
		$this->assertEquals(
			'<div class="simplemap"><div class="simplemap-content" data-breakpoint="640" data-lat="" data-lng="" data-zoom="16" data-addr="" data-infowindow="close" data-map-type-control="false" data-map-type-id="ROADMAP" style="width:100%;height:200px;">Osaka Japan</div></div>',
			do_shortcode('[map breakpoint="3000"]Osaka Japan[/map]')
		);

		// lat and lng
		$this->assertEquals(
			'<div class="simplemap"><div class="simplemap-content" data-breakpoint="480" data-lat="38.8976763" data-lng="-77.03652979999998" data-zoom="16" data-addr="" data-infowindow="close" data-map-type-control="false" data-map-type-id="ROADMAP" style="width:100%;height:200px;">Osaka Japan</div></div>',
			do_shortcode('[map lat="38.8976763" lng="-77.03652979999998"]Osaka Japan[/map]')
		);

		// Address and lat and lng
		$this->assertEquals(
			'<div class="simplemap"><div class="simplemap-content" data-breakpoint="480" data-lat="38.8976763" data-lng="-77.03652979999998" data-zoom="16" data-addr="" data-infowindow="close" data-map-type-control="false" data-map-type-id="ROADMAP" style="width:100%;height:200px;">Osaka Japan</div></div>',
			do_shortcode('[map addr="Osaka Japan" lat="38.8976763" lng="-77.03652979999998"]Osaka Japan[/map]')
		);

		// Address and baloon text
		$this->assertEquals(
			'<div class="simplemap"><div class="simplemap-content" data-breakpoint="480" data-lat="" data-lng="" data-zoom="16" data-addr="Osaka Japan" data-infowindow="close" data-map-type-control="false" data-map-type-id="ROADMAP" style="width:100%;height:200px;">Hello!</div></div>',
			do_shortcode('[map addr="Osaka Japan"]Hello![/map]')
		);

		// Address and baloon text
		$this->assertEquals(
			'<div class="simplemap"><div class="simplemap-content" data-breakpoint="480" data-lat="" data-lng="" data-zoom="16" data-addr="" data-infowindow="close" data-map-type-control="true" data-map-type-id="SATELLITE" style="width:100%;height:200px;">Osaka, Japan</div></div>',
			do_shortcode('[map map_type_control="true" map_type_id="SATELLITE"]Osaka, Japan[/map]')
		);
	 }

	/**
	 * Generates html file for qunit
	 *
	 * @test
	 */
	public function generate_test_file_for_qunit()
	{
		$from_file = dirname( __FILE__ ) . '/../qunit/templates/simple-map-test.html';
		$to_file = dirname( __FILE__ ) . '/../qunit/simple-map-test.html';

		$template = file_get_contents( $from_file );

		$shortcodes = array(
			'[map]Tokyo, Japan[/map]',
			'[map lat="35.710063" lng="139.8107"]Skytree, Tokyo, Japan[/map]',
			'[map width="400px" height="300px"]Kyoto, Japan[/map]',
			'[map zoom="10"]Mount Fuji[/map]',
			'[map breakpoint="100px"]Kobe, Japan[/map]',
			'[map infowindow="open"]Kushimoto, Japan[/map]',
			'[map infowindow="open" addr="Kushimoto, Japan" height="500px"]<h3>Hello World!</h3><p>I\'m from <a href="http://www.japan-guide.com/e/e4957.html">Kushimoto Japan</a></p>[/map]',
			'[map map_type_control="true"]Tokyo, Japan[/map]',
			'[map map_type_id="SATELLITE"]Tokyo, Japan[/map]',
			'[map map_type_id="HYBRID"]Tokyo, Japan[/map]',
			'[map addr="Osaka, Japan"]', // it should be last because there is no-close-tag
		);

		$shortcode_content = '';
		foreach ( $shortcodes as $shortcode ) {
			$shortcode_content .= "\n\t".'<h2><code>['.$shortcode.']</code></h2>'."\n";
			$shortcode_content .= "\t".$shortcode."\n";
		}

		$template = str_replace( '__SHORTCODES__', $shortcode_content, $template );

		$test_content = do_shortcode( $template );

		file_put_contents( $to_file, $test_content );

		$this->assertTrue( is_file( $to_file ) );
	}



	public function test_google_maps_api() {

		$options = get_option( 'simple_map_settings' );
		$apikey  = ! empty( $options['api_key_field'] )
			? '?key=' . $options['api_key_field']
			: '';

		wp_register_script(
			'google-maps-api',
			esc_url_raw( '//maps.google.com/maps/api/js' . $apikey ),
			false,
			null,
			true
		);

		$this->assertTrue( wp_script_is( 'google-maps-api', 'registered' ) );

	}


} // end class


//EOF
