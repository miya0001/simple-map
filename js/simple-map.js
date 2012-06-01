(function($){

function display(element, pos, zoom) {
    if ($('html').width() >= 480) {
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

