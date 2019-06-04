import loadGoogleMapsApi from "load-google-maps-api-2";

loadGoogleMapsApi.key = 'AIzaSyDZdUWy3NxDz_nB8cs3GjpGaWqKYdWlny4';
loadGoogleMapsApi.language = 'es';

const urlSite = document.querySelector('body').dataset.url,
    cities = document.querySelector('#filter-country'),
    points = document.querySelector('#filter-points');

const lng = cities.options[1].dataset.lng;
const lat = cities.options[1].dataset.lat;

const lngInit = (lng) ? parseFloat(lng) : 0,
    latInit = (lat) ? parseFloat(lat) : 0,
    myLatLng = {lat: latInit, lng: lngInit};

let map;

export default function () {

    loadGoogleMapsApi().then(googleMaps).catch(function (err) {
        console.error(err);
    });
    cities.addEventListener('change', cityChange);
    points.addEventListener('change', pointChange);
}

function cityChange() {

    if (this.value === "0") {
        points.setAttribute('disabled', 'disabled');
    } else {
        points.removeAttribute('disabled');
        points.value = 0;
    }

    let lng = this.options[this.selectedIndex].dataset.lng;
    let lat = this.options[this.selectedIndex].dataset.lat;
    let cord = {lat: parseFloat(lat), lng: parseFloat(lng)};
    map.setCenter(cord);
    map.setZoom(12);

    let options = document.querySelectorAll('option.for-hidden');
    [].forEach.call(options, function (el) {
        el.setAttribute('hidden', 'hidden')
    });

    let pointsCity = document.querySelectorAll(`option[data-city=${this.value}]`);
    [].forEach.call(pointsCity, function (el) {
        el.removeAttribute('hidden')
    });

}

function pointChange() {
    let lng = this.options[this.selectedIndex].dataset.lng;
    let lat = this.options[this.selectedIndex].dataset.lat;
    let cord = {lat: parseFloat(lat), lng: parseFloat(lng)};
    map.setCenter(cord);
    map.setZoom(16);
}

function generateMaker() {

    [].forEach.call(points.options, function (el) {
        if (el.dataset.lat === undefined || el.dataset.lng === undefined)
            return;
        let contentString = el.dataset.info;
        let marker = new google.maps.Marker({
            position: {lat: parseFloat(el.dataset.lat), lng: parseFloat(el.dataset.lng)},
            map: map,
            title: 'asdasd',
            icon: urlSite + "/wp-content/themes/lilipink/public/images/pin_map.png"
        });
        let info = new google.maps.InfoWindow({
            content: contentString
        });

        marker.addListener('click', function () {
            info.open(map, marker);
        });

    });

}

function googleMaps(googleMaps) {

    map = new googleMaps.Map(document.querySelector('.Map-google'), {
        center: myLatLng,
        zoom: 12
    });
    generateMaker();
    /*
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                let pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                new google.maps.Marker({
                    position: pos,
                    map: map,
                    title: '',
                    icon: urlSite + "/wp-content/themes/lilipink/public/images/pin_map.png"
                });
                infoWindow.setPosition(pos);
                infoWindow.setContent('Location found.');
                map.setCenter(pos);
            }, function () {
                handleLocationError(true, '', map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, '', map.getCenter());
        }
    */

}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
        'Error: The Geolocation service failed.' :
        'Error: Your browser doesn\'t support geolocation.');
}
