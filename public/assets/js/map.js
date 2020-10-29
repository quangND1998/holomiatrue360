// (function(exports) {
function initAutocomplete(ln, lg) {
    let service, infoWindow, markers = [];
    // let latLng = new google.maps.LatLng("10.824297", "106.954220");
    let latLng = new google.maps.LatLng(ln, lg);

    let map = new google.maps.Map(document.getElementById("map"), {
        center: latLng,
        zoom: 15,
        mapTypeId: "roadmap"
    });

    infoWindow = new google.maps.InfoWindow({
        content: `<div id="map_maker_content"><img class="map_img" src="assets/images/general-view/general-view.jpg"></div>`
    })

    // Create marker
    let marker = new google.maps.Marker({
        position: latLng,
        map: map
    });

    let input = document.getElementById("pac-input");
    let searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    map.addListener("bounds_changed", function() {
        searchBox.setBounds(map.getBounds());
    })

    infoWindow.open(map, marker);
    marker.addListener("click", function() {
        infoWindow.open(map, marker);
    });

    map.addListener('click', function(event) {
        console.log(map);
        deleteMarkers();
        placeMarker(event.latLng);

    });

    function setplaceMarker(location, time, total, from, to) {
        var marker = new google.maps.Marker({
            position: location,
            map: map,
            zoom: 12,
        });
        markers.push(marker);
        var infowindow_from = new google.maps.InfoWindow({
            content: `
                            <div>
                                <p style="margin: 10px 0"><b>Từ</b>: ${from} </p>
                                <p style="margin: 10px 0"><b>Đến</b>: ${to} </p>
                                <p style="margin: 10px 0"><b>Khoảng cách</b>: ${total} </p>
                                <p style="margin: 10px 0"><b>Thời gian</b>: ${time} </p>
                            </div>
                        `
        });
        infowindow_from.open(map, marker);
    }

    function placeMarker(location) {
        dogetRedirect_map(location, latLng);
    }
    var directionsService = new google.maps.DirectionsService(); // Khai báo biến<br />
    var directionsDisplay = new google.maps.DirectionsRenderer(); // Khai báo biến

    function dogetRedirect_map(position, roomLatlng) {


        var request = {
            origin: position,
            destination: roomLatlng,
            travelMode: google.maps.TravelMode.DRIVING,
            unitSystem: google.maps.UnitSystem.METRIC
        };
        directionsDisplay.setMap(map);
        directionsService.route(request, function(response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsDisplay.setOptions({
                    preserveViewport: true,
                    suppressMarkers: true
                });
                directionsDisplay.setDirections(response);
                var myroute = response.routes[0]; // Kết quả trả về
                var time = myroute.legs[0].duration.text; // Thời gian di chuyển
                var total = myroute.legs[0].distance.text; // Chiều dài đoạn đường
                var from = myroute.legs[0].start_address; // Điểm xuất phát
                var to = myroute.legs[0].end_address; // Điểm đến
                setplaceMarker(position, time, total, from, to);
                console.log(status);
            }
        });
    }

    // Sets the map on all markers in the array.
    function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
        }
    }

    // Removes the markers from the map, but keeps them in the array.
    function clearMarkers() {
        setMapOnAll(null);
    }

    // Shows any markers currently in the array.
    function showMarkers() {
        setMapOnAll(map);
    }

    // Deletes all markers in the array by removing references to them.
    function deleteMarkers() {
        clearMarkers();
        markers = [];
    }
    searchBox.addListener("places_changed", function() {
        var places = searchBox.getPlaces();
        console.log(places[0].geometry.location);
        deleteMarkers();
        placeMarker(places[0].geometry.location);
    });
}
// exports.initAutocomplete = initAutocomplete;
// })((this.window = this.window || {}));