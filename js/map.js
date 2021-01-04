    
    var mapObject, last_infowindow, interval_id;
    var image = 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png';
    
    function createMarker(location, text, title){
    var marker = new google.maps.Marker({
    position: location,
    map: mapObject,
    title: title,
    icon: image
    });
    
    var infowindow = new google.maps.InfoWindow({
    content: text
    });
    
    marker.addListener('click', function() {
    if(last_infowindow != null){
    last_infowindow.close();
    }
    infowindow.open(mapObject, marker);
    last_infowindow = infowindow;
    });
    
    return marker;
    }
    
    function writeAddressName(latLng) {
    var geocoder = new google.maps.Geocoder();
    var data = {
    "location": latLng
    };
    
    geocoder.geocode(data, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
    document.getElementById("address").innerHTML = results[0].formatted_address;
    } else {
    document.getElementById("error").innerHTML += "Не можем да намерим адреса." + "<br />";
    }
    });
    }
    
    function geolocationSuccess(position) {
    var userLatLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
    
    writeAddressName(userLatLng);
    
    var myOptions = {
    zoom : 16,
    center : userLatLng,
    mapTypeId : google.maps.MapTypeId.ROADMAP
    };
    
    
    mapObject = new google.maps.Map(document.getElementById("map"), myOptions);
    
    
    createMarker(userLatLng, "Вие сте тук");
    
    
    var circle = new google.maps.Circle({
    center: userLatLng,
    radius: 5000,
    map: mapObject,
    fillColor: 'blue',
    fillOpacity: 0.4,
    strokeColor: 'blue',
    strokeOpacity: 5.0
    });
    
    mapObject.fitBounds(circle.getBounds());
    
    
    
    }
    
    function geolocationError(positionError) {
    document.getElementById("error").innerHTML += "Error: " + positionError.message + "<br />";
    }
    
    function geolocateUser() {
    if(navigator.geolocation){
    var positionOptions = {
    enableHighAccuracy: true,
    timeout: 10 * 1000
    };
    
    navigator.geolocation.getCurrentPosition(geolocationSuccess, geolocationError, positionOptions);
    }else{
    document.getElementById("error").innerHTML += "Твоят браузър не поддържа услугата за местоположение.";
    }
    }
    
    window.onload = geolocateUser;