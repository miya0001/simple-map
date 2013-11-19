(function($){

var SimpleMap = function(element, pos, zoom, infoCont) {
    this.base_url = 'https://maps.google.com/maps?';
    this.display(element, pos, zoom, infoCont);
}

SimpleMap.prototype.display = function(element, pos, zoom, infoCont) {
    var breakpoint = $(element).data('breakpoint');
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
        if (infoCont.length) {
            map.addMarker({
                lat: pos.lat(),
                lng: pos.lng(),
                infoWindow: {
                    content: infoCont
                }
            });
        } else {
            map.addMarker({
                lat: pos.lat(),
                lng: pos.lng()
            });
        }
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
            this.base_url+'q='+pos.lat()+','+pos.lng()+'&z='+zoom
        );
        $(a).html(img);
        $(element).html(a);
        $(element).addClass('staticmap');
    }
}

$('.simplemap').each(function(){
    var element = $('div', this).get(0);
    var zoom = 16;
    if (parseFloat($(element).data('zoom'))) {
        zoom = $(element).data('zoom');
    }
    if ($(element).data('lat') && $(element).data('lng')) {
        var lat = $(element).data('lat');
        var lng = $(element).data('lng');
        var infoCont = $(element).html();
        var pos = new google.maps.LatLng(
            lat,
            lng
        );
        new SimpleMap(element, pos, zoom, infoCont);
    } else if ($(element).data('addr')) {
        GMaps.geocode({
            address: $(element).data('addr'),
            callback: function(results, status) {
                if (status == 'OK') {
                    var pos = results[0].geometry.location;
                    new SimpleMap(element, pos, zoom, $(element).html());
                }
            }
        });
    } else if ($(element).text().length) {
        GMaps.geocode({
            address: $(element).text(),
            callback: function(results, status) {
                if (status == 'OK') {
                    var pos = results[0].geometry.location;
                    new SimpleMap(element, pos, zoom, $(element).text());
                }
            }
        });
    }
});

})(jQuery);
