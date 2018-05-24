import '../scss/index.scss';
import Flickity from 'Flickity';
import loadGoogleMapsApi from 'load-google-maps-api-2';
import ModalProduct from './Modal'
import INS from 'instagram-api'

const instagramAPI = new INS('3646027596.c003d1f.a7cde2d348b5464db3bf27fecee21379');
const urlSite = document.querySelector('body').dataset.url;
const SocialData = [];

const FeedEl = document.getElementById('FeedId');

ModalProduct();

instagramAPI.userSelfMedia().then(function (response) {

  const post = response.data;
  for (let i in post) {
    //let thumbnail = post[i].images.thumbnail.url.replace('s150x150/', 's320x320/');
    let thumbnail = post[i].images.standard_resolution.url;

    //thumbnail = thumbnail.replace('vp', 'xp');
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
  for (let i in SocialData) {
    const articleFeed = document.createElement("article"),
      feedImage = document.createElement('div');
      feedImage.setAttribute('class', 'feedImage');
      feedImage.style.backgroundImage = `url(${SocialData[i].images})`;
      articleFeed.appendChild(feedImage);
      //img = document.createElement('img');
    //img.src = SocialData[i].images;
    //articleFeed.appendChild(img);

    FeedEl.prepend(articleFeed)

  }
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
    icon: urlSite + "/wp-content/themes/lilipink/public/images/pin_map.png"
  });

// Try HTML5 geolocation.
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

const
  NavAdmin = document.querySelector('.Nav-content'),
  FilterTitle = document.querySelectorAll('.filters-title'),
  menuToggle = document.getElementById('menu-toggle'),
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
FilterTitle.forEach(function (el) {
  el.addEventListener('click', function () {
    el.parentElement.querySelector('ul').classList.toggle('show');
  })
});





const SlideProducts = new Flickity('#SlideProductsContent', {
  imagesLoaded: false,
  setGallerySize: true,
  cellAlign: 'center',
  groupCells: true,
  lazyLoad: true,
  contain: true,
  wrapAround: true,
  autoPlay: 5000
});
setTimeout(function () {
  SlideProducts.resize();
},3000);




