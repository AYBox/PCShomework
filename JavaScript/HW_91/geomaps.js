/*global $, google*/
(function () {
    "use strict";
    var input = $('#input'),
        button = $('#button'),
        map = null,
        location;
    button.click(function () {
        $.getJSON('http://api.geonames.org/wikipediaSearch?maxRows=10&username=avrahamybock&type=json&callback=?', { q: input.val() }, function (info) {
            console.log(info);
            location = { lat: info.geonames[0].lat, lng: info.geonames[0].lng };
            if (map === null) {
                map = new google.maps.Map(
                    document.getElementById('map'),
                    {
                        center: location,
                        zoom: 8
                    }
                );
            } else {
                map.setCenter(location);
            }
            new google.maps.Marker({
                position: location,
                map: map
            });
        }).fail(function () {
            console.log('failed');
        });
    });
}());