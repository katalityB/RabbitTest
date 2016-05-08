/**
 * Created by katality on 5/8/2016.
 */

function initialize(locations) {
    var myLatlng = new google.maps.LatLng(-34.397, 150.644);
    var myOptions = {
        zoom: 2,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map(document.getElementById("map"), myOptions);
    if (locations) setMarkers(map, locations);
}

function setMarkers(map, locations) {
    var bounds = new google.maps.LatLngBounds();
    for (var i = 0; i < locations.length; i++)
    {
        var tweet = locations[i];
        var coords = new google.maps.LatLng(tweet['lat'], tweet['lng']);
        var contentString = '<div id="content">'+
            tweet['text'] +
            '</div>';
        var infowindow = new google.maps.InfoWindow({content: contentString});
        var markerImage = new google.maps.MarkerImage
        (
            tweet['img'],
            new google.maps.Size(88, 88, "px", "px"),
            new google.maps.Point(0, 0),
            new google.maps.Point(0, 0),
            new google.maps.Size(40, 40, "px", "px")
        );
        var marker = new google.maps.Marker({
            position: coords,
            map: map,
            icon: markerImage,
            title: tweet['name'],
            zIndex: i
        });
        google.maps.event.addListener(marker, 'click',
            function (infowindow, marker) {
                return function () {
                    infowindow.open(map, marker);
                };
            }(infowindow, marker)
        );
        bounds.extend(coords);
        map.fitBounds(bounds);
    }
}

function search(city){
    $.ajax({
        url: '/get-tweets',
        type: 'GET',
        data: {city: city},
        success: function(g) {
            initialize(g);
        },
    });
}
