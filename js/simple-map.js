(function($){
var SimpleMap = function( element ) {
    this.base_url = 'https://maps.google.com/maps?';
    var self = this;
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
        this.display(element, pos, zoom, infoCont);
    } else if ($(element).data('addr').length || $(element).text().length) {
        var address = $(element).data('addr').length ? $(element).data('addr') : $(element).text();
        GMaps.geocode({
            address: address,
            callback: function(results, status) {
                if (status == 'OK') {
                    var pos = results[0].geometry.location;
                    self.display(element, pos, zoom, $(element).html());
                }
            }
        });
    }
}

SimpleMap.prototype.display = function(element, pos, zoom, infoCont) {
    $(element).show();
    var breakpoint = $(element).data('breakpoint');
    if ($('html').width() > breakpoint) {
        var map = new GMaps({
            div: element,
            lat: pos.lat(),
            lng: pos.lng(),
            mapTypeControl: false,
            zoom: parseFloat(zoom),
            streetViewControl: false,
            scrollwheel: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            width: element.style.width,
            height: element.style.height
        });

        var visible = $(element).is(':visible');
        if (!visible) {
            var intervalId = setInterval(function(){
                if ($(element).is(':visible')) {
                    clearInterval(intervalId);
                    map.refresh();
                    map.setCenter(pos.lat(), pos.lng());
                }
            }, 1000);
        }

        if (infoCont.length) {
            var marker = map.addMarker({
                lat: pos.lat(),
                lng: pos.lng(),
                infoWindow: {
                    content: infoCont
                }
            });
            if ($(element).data('infowindow') == 'open') {
                marker.infoWindow.open(marker.map, marker);
            }
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
    new SimpleMap( $('div', this).get(0) );
});

})(jQuery);
