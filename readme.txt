=== Simple Map ===
Contributors: miyauchi
Donate link: http://wpist.me/
Tags: widget
Requires at least: 3.3
Tested up to: 3.9
Stable tag: 1.7.1

Easy way to embed google map(s).

== Description ==

Easy way to embed google map(s) using [gmaps.js](http://hpneo.github.com/gmaps/).

This plugin allows you to convert address into google maps like below:

[map]San Francisco, California[/map]

Another way, you can embed Google Map with url only like oEmbed.


You can also use coordinates, set width, height and zoom:

[map lat="37.77493" lng="-122.41942" width="100%" height="400px" zoom="15"]
Text you would
like to appear
as a tooltip
goes here
[/map]

In this case there will be a marker on the map with a tooltip appearing on click on said marker.
You can use simple html as the tooltip content.


[This plugin maintained on GitHub.](https://github.com/miya0001/simple-map)

= Some features: =

* Allow you to embed google map based on shortcode.
* Markers can be added using address or lat/long.
* Display static map for iPhone automatically.
* oEmbed Support.

= Translators =

* Japanese(ja) - [Takayuki Miyauchi](http://firegoby.jp/)

Please contact to me.

* https://github.com/miya0001/simple-map/issues

= Contributors =

* [Takayuki Miyauchi](http://firegoby.jp/)
* [Zoltán Balogh](http://birdcreation.com/)
* [Takanobu Watanabe](https://github.com/tknv)
* [Shinichi Nishikawa](http://th-daily.shinichi.me/)

== Installation ==

* Download the zip, extract it and upload the extracted folder to your-wp-directory/wp-content/plugins/
* Go to the plugins administration screen in your WordPress admin and activate the plugin.

OR

* Download the zip, go to the plugins administration screen in your WordPress admin, click on Add New then on upload, browse to the downloaded zip, upload the plugin and activate it.

OR

* Go to the plugins administration screen in your WordPress admin, click on Add New, search for Simple Map and click on Install Now.

*Usage*

This plugin allows you to convert address into google maps like below:

[map]San Francisco, California[/map]

Another way, you can embed Google Map with url only like oEmbed.

You can also use coordinates, set width, height and zoom:

[map lat="37.77493" lng="-122.41942" width="100%" height="400px" zoom="15"]
Text you would
like to appear
as a tooltip
goes here
[/map]

In this case there will be a marker on the map with a tooltip appearing on click on said marker.
You can use simple html as the tooltip content.

== Screenshots ==

1. Very easy.
2. Info Window.
3. Mobile Support. (Google static map)

== Changelog ==

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

This plug-in is not guaranteed though the user of WordPress can freely use this plug-in free of charge regardless of the purpose.
The author must acknowledge the thing that the operation guarantee and the support in this plug-in use are not done at all beforehand.

== Contact ==

twitter @miya0001
