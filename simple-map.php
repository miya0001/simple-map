<?php
/*
Plugin Name: Simple Map
Author: Takayuki Miyauchi
Plugin URI: http://wpist.me/
Description: Insert google map convert from address.
Version: 0.1.0
Author URI: http://wpist.me/
Domain Path: /languages
Text Domain: simple-map
*/

new SimpleMap();

class SimpleMap{

private $class_name = 'simple-map';
private $width      = '100%';
private $height     = '200px';
private $zoom       = 16;

function __construct()
{
    add_shortcode('simple-map', array(&$this, 'shortcode'));
}

public function wp_enqueue_scripts()
{
    wp_register_script(
        'google-maps-api',
        'http://maps.google.com/maps/api/js?sensor=false',
        false,
        null,
        true
    );

    wp_register_script(
        'gmaps.js',
        plugins_url('js/gmaps.js' , __FILE__),
        array('jquery', 'google-maps-api'),
        '0.1.12.1',
        true
    );

    wp_register_script(
        'simple-map',
        apply_filters(
            "simple-map-script",
            plugins_url('js/simple-map.js' , __FILE__)
        ),
        array('gmaps.js'),
        filemtime(dirname(__FILE__).'/js/simple-map.js'),
        true
    );
    wp_enqueue_script('simple-map');
}

public function shortcode($p)
{
    add_action("wp_footer", array(&$this, "wp_enqueue_scripts"));

    if (isset($p['width']) && preg_match("/^[0-9]+(%|px)$/", $p['width'])) {
        $w = $p['width'];
    } else {
        $w = $this->width;
    }
    if (isset($p['height']) && preg_match("/^[0-9]+(%|px)$/", $p['height'])) {
        $h = $p['height'];
    } else {
        $h = $this->height;
    }
    if (isset($p['zoom']) && $p['zoom']) {
        $zoom = $p['zoom'];
    } else {
        $zoom = $this->zoom;
    }
    $addr = '';
    $lat = '';
    $lng = '';
    if (isset($p['addr']) && $p['addr']) {
        $addr = esc_html($p['addr']);
    } elseif (isset($p['lat']) && preg_replace("/^[0-9\.]+$/", $p['lat'])
                && isset($p['lng']) && preg_replace("/^[0-9\.]+$/", $p['lng'])){
        $lat = $p['lat'];
        $lng = $p['lng'];
    } else {
        return;
    }
    return sprintf(
        '<div class="%s"><div data-lat="%s" data-lng="%s" data-zoom="%s" style="width:%s;height:%s;">%s</div></div>',
        $this->class_name,
        $lat,
        $lng,
        $zoom,
        $w,
        $h,
        $addr
    );
}

}


// EOF
