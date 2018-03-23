import '../scss/index.scss';
import Flickity from 'Flickity';
import loadGoogleMapsApi from 'load-google-maps-api-2';
import Magnify from './Zoom'
import FB from 'facebook-sdk'
import INS from 'instagram-api'

const instagramAPI = new INS('632928845.259bed1.b3f03cd8d429437f8e540443d6dd5828');
const urlSite = document.querySelector('body').dataset.url;
const feedId = document.querySelector('#FeedId');
const SocialData = [];

const facebook = new FB.Facebook({
    appId: '1489685601143763',
    secret: '6d2901c3c2487a8b9a829134798f87b0'
});
const Feed = new Flickity('#FeedId', {
    imagesLoaded: true,
    cellAlign: 'center',
    lazyLoad: true,
    contain: true,
    wrapAround: true,
    autoPlay: 5000
});

instagramAPI.userSelfMedia().then(function (response) {

    const post = response.data;
    for (let i in post) {
        let thumbnail = post[i].images.thumbnail.url.replace('s150x150/', 's320x320/');
        thumbnail = thumbnail.replace('vp', 'xp');
        SocialData.push({
            "id": post[i].id,
            "likes": post[i].likes.count,
            "comments": post[i].comments.count,
            "caption": (post[i].caption) ? post[i].caption.text : "",
            "type": post[i].type,
            "link": post[i].link,
            "images": thumbnail,
            "from": "instagram",
        });
    }
    facebook.api(
        '/135253469831282/',
        'GET',
        {"fields": "feed{attachments{url,type,media},comments.limit(0).summary(true),type,likes.limit(0).summary(true)}"},
        function (response) {
            const post = response.feed.data;
            for (let i in post) {
                if (post[i].attachments == null) {
                    continue;
                    console.log(post[i].attachments)
                }


                const attachments = (Array.isArray(post[i].attachments.data)) ?
                    post[i].attachments.data[0] :
                    post[i].attachments.data;
                SocialData.push({
                    "id": post[i].id,
                    "likes": post[i].likes.summary.total_count,
                    "comments": post[i].comments.summary.total_count,
                    "caption": "asd",
                    "type": post[i].type,
                    "link": attachments.url,
                    "images": (attachments.media) ? attachments.media.image.src : "",
                    "from": "facebook",
                });
            }
            for (let i in SocialData) {
                const articleFeed = document.createElement("article"),
                    img = document.createElement('img');
                img.src = SocialData[i].images;
                articleFeed.appendChild(img);
                Feed.prepend(articleFeed)
            }


            //console.log(SocialData);
        }
    );
    Feed.resize();
}, function (err) {
    console.log(err); // error info
});


// new Magnifier('.imageZoom');
loadGoogleMapsApi.key = 'AIzaSyDZdUWy3NxDz_nB8cs3GjpGaWqKYdWlny4';
loadGoogleMapsApi.language = 'es';

loadGoogleMapsApi().then(function (googleMaps) {
    let infoWindow = new google.maps.InfoWindow({map: map});
    const myLatLng = {lat: 9.928069, lng: -84.090725};

    const map = new googleMaps.Map(document.querySelector('.Map-google'), {
        center: myLatLng,
        zoom: 12
    });
    const marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: '',
        icon: urlSite+"/wp-content/themes/lilipink/public/images/pin_map.png"
    });

// Try HTML5 geolocation.
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            let pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
           new google.maps.Marker({
                position: pos,
                map: map,
                title: '',
                icon: urlSite+"/wp-content/themes/lilipink/public/images/pin_map.png"
            });
            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            map.setCenter(pos);
        }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
        });
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
    }


}).catch(function (err) {
    console.error(err);
});
function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
        'Error: The Geolocation service failed.' :
        'Error: Your browser doesn\'t support geolocation.');
}

const header = document.querySelector('header'),
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
    FilterTitle = document.querySelectorAll('.filters-title'),
    ModalDot = document.querySelectorAll('.modal-images li'),
    Body = document.querySelector('body'),
    Modal = document.querySelector('.modal'),
    ModalSlide = new Flickity('.modal-image', {
        imagesLoaded: true,
        cellAlign: 'center',
        lazyLoad: true,
        contain: true,
        wrapAround: true,
    });

menuToggle.addEventListener('click', () => {
    menuToggle.classList.toggle('open');
    NavAdmin.classList.toggle('open');
    Body.classList.toggle('open-nav');
    window.scrollTo({
        'behavior': 'smooth',
        'top': 0
    });
});
FilterTitle.forEach(function (el) {
    el.addEventListener('click', function () {
        el.parentElement.querySelector('ul').classList.toggle('show');
    })
});

ModalDot.forEach(function (el, index) {
    el.addEventListener('click', function () {
        ModalSlide.select(index)
    });
});

document.querySelectorAll('.show-modal').forEach(function (el) {
    el.addEventListener('click', function (e) {
        e.preventDefault();
        Modal.classList.add('show');
        ModalSlide.resize();
        document.querySelectorAll('.modal-image img').forEach(function (el) {
            Magnify(el, 3);
        });
    });
});

document.querySelector('.modal-close').addEventListener('click', function () {
    Modal.classList.remove('show');
});






