initMap();
function initMap() {
    var selector = document.getElementById('irtech-google-map');
    var latitute = selector.getAttribute('data-latitude');
    var longitude = selector.getAttribute('data-longitude');
    var markerSrc = selector.getAttribute('data-markersrc');
    var map = new google.maps.Map(document.getElementById('irtech-google-map'), {
        zoom: 10,
        center: new google.maps.LatLng(latitute, longitude),
        disableDefaultUI: true,
        styles: [
            {
                elementType: 'labels',
                stylers: [{
                    visibility: 'on'
                }]
            },
            {
                elementType: 'geometry',
                stylers: [{
                    color: '#ffffff'
                }]
            },
            {
                featureType: 'administrative.locality',
                elementType: 'labels.text.fill',
                stylers: [{
                    color: '#b1bdc1'
                }]
            },
            {
                featureType: 'poi.park',
                elementType: 'geometry',
                stylers: [{
                    color: '#ffffff'
                }]
            },
            {
                featureType: 'road',
                elementType: 'geometry',
                stylers: [{
                    color: '#b1bdc1'
                }]
            },
            {
                featureType: 'road',
                elementType: 'geometry.stroke',
                stylers: [{
                    color: '#ffffff'
                }]
            },
            {
                featureType: 'road.highway',
                elementType: 'geometry',
                stylers: [{
                    color: '#b1bdc1'
                }]
            },
            {
                featureType: 'road.highway',
                elementType: 'geometry.stroke',
                stylers: [{
                    color: '#ffffff'
                }]
            },
            {
                featureType: 'water',
                elementType: 'geometry',
                stylers: [{
                    color: '#b1bdc1'
                }]
            },
            {
                featureType: 'water',
                elementType: 'labels.text.fill',
                stylers: [{
                    color: '#b1bdc1'
                }]
            },
            {
                featureType: "road",
                elementType: "labels",
                stylers: [
                    {"visibility": "off"}
                ]
            }
        ]
    });
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(latitute, longitude),
        map: map,
        icon: markerSrc,
        animation: google.maps.Animation.BOUNCE,
    });
}