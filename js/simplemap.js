(function($){

var SimpleMap = function(element, pos, zoom) {
    this.base_url = 'https://maps.google.com/maps?';
    this.display(element, pos, zoom);
}

SimpleMap.prototype.display = function(element, pos, zoom) {
    var breakpoint = $(element).attr('data-breakpoint');
    if (breakpoint > 640) {
        breakpoint = 640;
    }
    if ($('html').width() > breakpoint) {
        var map = new GMaps({
            div: element,
            lat: pos.lat(),
            lng: pos.lng(),
            mapTypeControl: false,
            zoom: parseFloat(zoom),
            streetViewControl: false,
            scrollwheel: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        map.addMarker({
            lat: pos.lat(),
            lng: pos.lng()
        });
    } else {
        var url = GMaps.staticMapURL({
            center: pos.lat()+','+pos.lng(),
            zoom: zoom,
            size: breakpoint+'x'+$(element).height(),
            markers: [
                {lat: pos.lat(), lng: pos.lng()}
            ],
            sensor: 'false'
        });
        var img = $('<img />');
        $(img).attr('src', url);
        $(img).attr('alt', $(element).text());
        var a = $('<a />');
        $(a).attr(
            'href',
            this.base_url+'q='+pos.lat()+','+pos.lng()+'&z='+zoom+'&hl=ja'
        );
        $(a).html(img);
        $(element).html(a);
        $(element).addClass('staticmap');
    }
}

$('.simplemap').each(function(){
    var element = $('div', this).get(0);
    var zoom = 16;
    if (parseFloat($(element).attr('data-zoom'))) {
        zoom = $(element).attr('data-zoom');
    }
    if ($(element).attr('data-lat') && $(element).attr('data-lng')) {
        var lat = $(element).attr('data-lat');
        var lng = $(element).attr('data-lng');
        var pos = new google.maps.LatLng(
            lat,
            lng
        );
        new SimpleMap(element, pos, zoom);
    } else if ($(element).text().length) {
        GMaps.geocode({
            address: $(element).text(),
            callback: function(results, status) {
                if (status == 'OK') {
                    var pos = results[0].geometry.location;
                    new SimpleMap(element, pos, zoom);
                }
            }
        });
    }
});

})(jQuery);

