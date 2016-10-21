var mq = window.matchMedia("(max-width: 245px)");

$(document).ready(function () {
    labelFancyUpDown();
    mediaQueryExecute();
    phoneAppears();
    getLocation();
    cleanInputs();
})

$(window).resize(function () {
    mediaQueryExecute();
})

function cleanInputs() {
    $(".lastItems").click(function () {
        $(".inputContact").prop('value', "");
    });
}

function phoneAppears() {
    $('#phoneIcon').click(function () {
        $("#phoneIcon").remove();
        //$("#phoneIconLink").append("<p>876-789-7845</p>");
        $("#telNumber").slideToggle();
        $("#phoneIconLink").css('top', '0px');
        $("#phoneIconLink").css('width', 'auto');
    });
}

function labelFancyUpDown() {
    $(".inputContact").focusout(function () {
        if ($(this).val().trim() === "") {
            $(this).removeClass('upPosition');
        } else {
            $(this).addClass('upPosition');
        }
    });
}


//Media query

function mediaQueryExecute() {
    if (mq.matches) {
        $("#name").text("name");
        $("#email").text("email");
        $("#textArea").text("Comment");
    } else {
        $("#name").text("your name");
        $("#email").text("your email");
        $("#textArea").text("tell me about it");
    }
}

///Map

var map;
var service;

function getLocation() {
    if (supportsGeolovation) {
        var options = { enableHighAccuracy: true };
        witchId = navigator.geolocation.getCurrentPosition(showPosition, showError, options);        
    } else {
        showMessage("GeoLocation is not supported by this Browser");
    }
}

function supportsGeolovation() {
    // in operator is used to Know is the Object has the property defined
    return 'geolocation' in navigator;
}

var markerKolfi
function showPosition(position) {
    var mapCanvas = document.getElementById('map');
    var coords = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
    var Kolficoords = { lat: 25.732351, lng: -80.3375501 };
    var options = { zoom: 13, center: Kolficoords, mapTypeControl: true, navigationControlOption: { style: google.maps.NavigationControlStyle.SMALL }, mapTypeId: google.maps.MapTypeId.ROADMAP };

    map = new google.maps.Map(mapCanvas, options);

    //This is Kolfi location
    markerKolfi = new google.maps.Marker({
        map: map,
        title: "Kolfi is here!",
        icon: 'icons/DiamondMap.png',
        animation: google.maps.Animation.DROP,
        position: Kolficoords
    });

    markerKolfi.addListener('click', toggleBounce);
    map.addListener('mouseover', toggleBounce);


    //This is your current position
    var markerMe = new google.maps.Marker({
        position: coords,
        map: map,
        label: "*",
        title: "You are here!"
    });
    service = new google.maps.places.PlacesService(map);
}

function toggleBounce() {
    if (markerKolfi.getAnimation() !== null) {
        markerKolfi.setAnimation(null);
    } else {
        markerKolfi.setAnimation(google.maps.Animation.BOUNCE);
    }
}

function showMessage(message) {
    $('#message').html(message);
}

function showError(error) {

    switch (error.code) {
        case error.PERMISSION_DENIED:
            showMessage("User dinied Geolocation access request.");
            break;
        case error.POSITION_UNAVAILABLE:
            showMessage("Location information unavailable.");
            break;
        case error.TIME_OUT:
            showMessage("Get user location request time out.");
            break;
        case error.UNKNOWN_ERROR:
            showMessage("An unknown error ocurred. ");
            break;
    }
}