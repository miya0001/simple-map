<?php
/*
Plugin Name: Simple Map
Author: Takayuki Miyauchi
Plugin URI: http://wpist.me/
Description: Insert google map convert from address.
Version: 0.3.0
Author URI: http://wpist.me/
Domain Path: /languages
Text Domain: simplemap
*/

new SimpleMap();

class SimpleMap{

private $class_name = 'simplemap';
private $width      = '100%';
private $height     = '200px';
private $zoom       = 16;
private $breakpoint = 480;
private $max_breakpoint = 640;

function __construct()
{
    add_action('wp_head', array(&$this, 'wp_head'));
    add_shortcode('map', array(&$this, 'shortcode'));
}

public function wp_head()
{
    echo "<style>.simplemap img{max-width:none;padding:0;margin:0;}.staticmap,.staticmap img{max-width:100%;height:auto;}</style>\n";
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
        'simplemap',
        apply_filters(
            "simplemap_script",
            plugins_url('js/simplemap.js' , __FILE__)
        ),
        array('gmaps.js'),
        filemtime(dirname(__FILE__).'/js/simplemap.js'),
        true
    );
    wp_enqueue_script('simplemap');
}

public function shortcode($p)
{
    add_action("wp_footer", array(&$this, "wp_enqueue_scripts"));

    if (isset($p['width']) && preg_match("/^[0-9]+(%|px)$/", $p['width'])) {
        $w = $p['width'];
    } else {
        $w = apply_filters("simplemap_default_width", $this->width);
    }
    if (isset($p['height']) && preg_match("/^[0-9]+(%|px)$/", $p['height'])) {
        $h = $p['height'];
    } else {
        $h = apply_filters("simplemap_default_height", $this->height);
    }
    if (isset($p['zoom']) && $p['zoom']) {
        $zoom = $p['zoom'];
    } else {
        $zoom = apply_filters('simplemap_default_zoom', $this->zoom);
    }
    if (isset($p['breakpoint']) && intval($p['breakpoint'])) {
        if (intval($p['breakpoint']) > $this->max_breakpoint) {
            $breakpoint = $this->max_breakpoint;
        } else {
            $breakpoint = intval($p['breakpoint']);
        }
    } else {
        $breakpoint = apply_filters(
            'simplemap_default_breakpoint',
            $this->breakpoint
        );
    }
    $addr = '';
    $lat = '';
    $lng = '';
    if (isset($p['addr']) && $p['addr']) {
        $addr = esc_html($p['addr']);
    } elseif (isset($p['lat']) && preg_match("/^\-?[0-9\.]+$/", $p['lat'])
                && isset($p['lng']) && preg_match("/^\-?[0-9\.]+$/", $p['lng'])){
        $lat = $p['lat'];
        $lng = $p['lng'];
    } else {
        return;
    }
    return sprintf(
        '<div class="%s"><div data-breakpoint="%s" data-lat="%s" data-lng="%s" data-zoom="%s" style="width:%s;height:%s;">%s</div></div>',
        apply_filters("simplemap_class_name", $this->class_name),
        $breakpoint,
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
