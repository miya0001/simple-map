=== Simple Map ===
Contributors: miyauchi
Tags: google maps, map, shortcode, address
Requires at least: 3.9
Tested up to: 4.6
Stable tag: 2.14.1

Easy way to embed google map(s).

== Description ==

Easy way to embed google map(s) using [gmaps.js](http://hpneo.github.com/gmaps/).

This plugin allows you to convert address into google maps like below:

`[map]San Francisco, California[/map]`

Another way, you can embed Google Map with url only like oEmbed.


You can also use coordinates, set width, height and zoom:

`[map lat="37.77493" lng="-122.41942"]
Text you would
like to appear
as a tooltip
goes here
[/map]`

In this case there will be a marker on the map with a tooltip appearing on click on the said marker.
You can use simple html as the tooltip content.


[This plugin is maintained on GitHub.](https://github.com/miya0001/simple-map)

= Some features: =

* Allows you to embed google map based on shortcode.
* Markers can be added using address or lat/long.
* Displays static map for iPhone automatically.
* oEmbed Support.

= Arguments =

* width: Width of the map. Default value is "100%".
* height: Height of the map. Default value is "200px".
* zoom: Zoom of the map. Default value is "16".
* breakpoint: If display is narrower than this value, this plugin will display static map. Default value is "480".
* addr: Address of the map you want to place.
* lat: Lat of the map you want to place.
* lng: Lng of the map you want to place.
* infowindow: If you want to open infoWindow by Default, please set "open".
* map_type_control: True or Flase.
* map_type_id: 'ROADMAP' or 'SATELLITE' or 'HYBRID' or 'TERRAIN'.

If you will set lat/lng and address, this plugin gives priority to lat/lng.

= Filter Hooks =

This plugin has some filter hooks for customize default.

* simplemap_default_width
* simplemap_default_height
* simplemap_default_zoom
* simplemap_default_breakpoint
* simplemap_default_infowindow

`add_filter( 'simplemap_default_zoom', function(){
    return 10; // Default zoom is 10
} );`

= Translators =

* Japanese(ja) - [Takayuki Miyauchi](http://firegoby.jp/)

Please contact me.

* https://github.com/miya0001/simple-map/issues

= Contributors =

* [Takayuki Miyauchi](http://firegoby.jp/)
* [Zoltán Balogh](http://birdcreation.com/)
* [Takanobu Watanabe](https://github.com/tknv)
* [Shinichi Nishikawa](http://th-daily.shinichi.me/)
* [nissuk](http://www.nissuk.info/)

== Installation ==

* Download the zip, extract it and upload the extracted folder to your-wp-directory/wp-content/plugins/
* Go to the plugins administration screen in your WordPress admin and activate the plugin.

OR

* Download the zip, go to the plugins administration screen in your WordPress admin, click on Add New then on upload, browse to the downloaded zip, upload the plugin and activate it.

OR

* Go to the plugins administration screen in your WordPress admin, click on Add New, search for Simple Map and click on Install Now.

*Usage*

This plugin allows you to convert address into google maps like below:

`[map]San Francisco, California[/map]`

Another way, you can embed Google Map with url only like oEmbed.

You can also use coordinates, set width, height and zoom:

`[map lat="37.77493" lng="-122.41942" width="100%" height="400px" zoom="15"]
Text you would
like to appear
as a tooltip
goes here
[/map]`

In this case there will be a marker on the map with a tooltip appearing on click on the said marker.
You can use simple html as the tooltip content.

== Screenshots ==

1. Very easy.
2. Info Window.
3. Mobile Support. (Google static map)

== Changelog ==

= 2.13.0 =

* Tested up to WordPress 4.5

= 2.12.0 =

* Add args `map_type_control` and `map_type_id`.

= 2.10.1 =

* Requires WordPress 3.9 or later.
* Tested on PHP7

https://github.com/miya0001/simple-map/compare/2.10.0...2.11.0

= 2.10.0 =

* Fix warning for Google Map api

https://github.com/miya0001/simple-map/compare/2.9.0...2.10.0

= 2.8.5 =

* Auto deploy

= 2.8.1 =

* Update SimpleMap class.

https://github.com/miya0001/simple-map/compare/2.8.0...2.8.1

= 2.8.0 =

* Display map in modal window.

https://github.com/miya0001/simple-map/compare/2.7.0...2.8.0

= 2.7.0 =

* UPdate gmaps.js to 0.4.21
* Add tests on travis

https://github.com/miya0001/simple-map/compare/2.6.0...2.7.0

= 2.6.0 =

* Update gmaps.js from 0.4.18 to 0.4.19
* Add front end test

https://github.com/miya0001/simple-map/compare/2.5.0...2.6.0

= 2.5.0 =
* Update gmaps.js 0.4.17 to 0.4.18
* Tested on WordPress 4.3

= 2.4.0 =
* Update gmaps.js 0.4.16 to 0.4.17

= 2.3.0 =
* Tested on the WordPress 4.1.
* Up to minimum required to WordPress 3.6.

= 2.2.0 =
* update gmaps.js 0.4.15 to 0.4.16

= 2.1.0 =
* update gmaps.js 0.4.14 to 0.4.15

= 2.0.0 =
* Add argument infowindow
* little fix

= 1.9.0 =
* update gmaps.js 0.4.13 to 0.4.14

= 1.8.0 =
* update gmaps.js 0.4.12 to 0.4.13

= 1.7.0 =
* update gmaps.js 0.4.11 to 0.4.12

= 1.6.0 =
* update gmaps.js 0.4.9 to 0.4.11

= 1.5.0 =
* enable ssl source of google map api js

= 1.4.0 =
* change URL match pattern.

= 1.3.0 =
* Update gmaps.js to 0.4.9.

= 1.2.0 =
* Tested on the WordPress 3.8.
* Add Grunt.

= 1.1.0 =
* Added support for gmaps.js tooltip on markers

= 1.0.0 =
* Delete hl=ja param from static map link uri.

= 0.9.0 =
* hook changed to the init.

= 0.8.0 =
* shortcode atts and address priority changed.

= 0.7.0 =
* gmaps.js updated 0.4.4 to 0.4.5

= 0.6.0 =
* oEmbed Support

= 0.1.0 =
* The first release.

== Credits ==

This plugin is not guaranteed though the user of WordPress can freely use this plugin free of charge regardless of the purpose.
The author must acknowledge the thing that the operation guarantee and the support in this plugin use are not done at all beforehand.

== Contact ==

twitter @miya0001
