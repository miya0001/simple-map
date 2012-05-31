function display(element, pos, zoom) {
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

(function($){
$('.simple-map').each(function(){
    var element = this;
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
                display(element, pos, zoom);
            }
        });
    } else if ($(element).attr('data-lat') && $(element).attr('data-lng')) {
        var pos = new google.maps.LatLng(
            $(element).attr('data-lat'),
            $(element).attr('data-lng')
        );
        display(element, pos, zoom);
    }
});
})(jQuery);

