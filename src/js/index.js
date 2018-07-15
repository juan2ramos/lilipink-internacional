import '../scss/index.scss';
import Flickity from 'Flickity';
import ModalProduct from './Modal'
import City from './City'
import INS from 'instagram-api'
import animateScrollTo from 'animated-scroll-to';

if (document.querySelector('#filter-country'))
  City();


const instagramAPI = new INS('3646027596.c003d1f.a7cde2d348b5464db3bf27fecee21379');
const SocialData = [];
const url = document.getElementById('body').dataset.url;
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
  shop = document.querySelector('.shop'),
  Body = document.querySelector('body');

if(shop){
  shop.addEventListener('click',function () {
    const MapId = document.querySelector('#Map');
    if (MapId){
        animateScrollTo(MapId);
    } else{
        window.location.href = url + "/#Map";
    }

  })
}
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




