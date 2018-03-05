import '../scss/index.scss';
import Flickity from 'Flickity';
import loadGoogleMapsApi from 'load-google-maps-api-2';

loadGoogleMapsApi.key = 'AIzaSyDZdUWy3NxDz_nB8cs3GjpGaWqKYdWlny4';
loadGoogleMapsApi.language = 'es';

loadGoogleMapsApi().then(function (googleMaps) {
    new googleMaps.Map(document.querySelector('.Map-google'), {
        center: {
            lat: 40.7484405,
            lng: -73.9944191
        },
        zoom: 12
    })
}).catch(function (err) {
    console.error(err);
});

const header  = document.querySelector('header'),
    menu = document.querySelector('.Nav-content'),
    headerCountry = document.querySelector('.Header-country'),
    countries = document.querySelector('.countries');

headerCountry.addEventListener('click', function () {
    countries.classList.toggle('open')
});

const observer = new IntersectionObserver((entries, observer) => {
    if (entries[0].isIntersecting) {
        menu.classList.remove('sticky');
    } else {
        menu.classList.add('sticky');
    }
});

observer.observe(header);

const menuToggle = document.getElementById('menu-toggle'),
    NavAdmin = document.querySelector('.Nav-content'),
    Body = document.querySelector('body');

menuToggle.addEventListener('click', () => {
    menuToggle.classList.toggle('open');
    NavAdmin.classList.toggle('open');
    Body.classList.toggle('open-nav');
    window.scrollTo({
        'behavior': 'smooth',
        'top': 0
    });
});

