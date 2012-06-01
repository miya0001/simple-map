(function($){

function display(element, pos, zoom) {
    if ($('html').width() > 480) {
        var myOptions = {
            mapTypeControl: false,
            zoom: parseFloat(zoom),
            center: pos,
            streetViewControl: false,
            scrollwheel: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(
            element,
            myOptions
        );
        var marker = new google.maps.Marker({
            position: pos,
            map: map
        });
    } else {
        var map = 'http://maps.google.com/maps/api/staticmap?';
        var args = {
            center: pos.lat()+','+pos.lng(),
            zoom: zoom,
            size: 480+'x'+$(element).height(),
            markers: 'color:red|label:A|'+pos.lat()+','+pos.lng(),
            sensor: 'false'
        };
        var query = [];
        for (var i in args) {
            query[query.length] = i+'='+encodeURI(args[i]);
        }
        map = map + query.join('&');
        var img = $('<img />');
        $(img).attr('src', map);
        $(img).attr('alt', $(element).text());
        var a = $('<a />');
        var url = $($('a', $(element).parent()).get(0)).attr('href');
        $(a).attr('href', url);
        $(a).html(img);
        $(element).html(a);
        $(element).css('width', '100%');
        $(element).css('max-width', '100%');
        $(element).css('height', 'auto');
    }
}

$('.simple-map').each(function(){
    var element = $('div', this).get(0);
    var link = $('a', this).get(0);
    var href = 'https://maps.google.com/maps?';
    var zoom = 16;
    if (parseFloat($(element).attr('data-zoom'))) {
        zoom = $(element).attr('data-zoom');
    }
    if ($(element).text().length) {
        var geo = new google.maps.Geocoder();
        geo.geocode({'address': $(element).text()}, function(res, stat){
            if (stat != google.maps.GeocoderStatus.OK) {
                return;
            }
            var pos = res[0].geometry.location;
            if (pos.lat()) {
                $(link).attr(
                    'href',
                    href+'q='+pos.lat()+','+pos.lng()+'&z='+zoom+'&hl=ja'
                );
                display(element, pos, zoom);
            }
        });
    } else if ($(element).attr('data-lat') && $(element).attr('data-lng')) {
        var lat = $(element).attr('data-lat');
        var lng = $(element).attr('data-lng');
        var pos = new google.maps.LatLng(
            lat,
            lng
        );
        $(link).attr(
            'href',
            href+'q='+lat+','+lng+'&z='+zoom+'&hl=ja'
        );
        display(element, pos, zoom);
    }
});

})(jQuery);

