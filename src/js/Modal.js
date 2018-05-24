import Magnify from './Zoom'
import Flickity from 'Flickity';
import axios from 'axios';

const Modal = document.querySelector('.modal'),
  titleProduct = document.getElementById('titleProduct'),
  priceProduct = document.getElementById('priceProduct'),
  contentProduct = document.getElementById('contentProduct'),
  wishProduct = document.getElementById('wishProduct'),
  modalThumb = document.getElementById('modalThumb'),
  modalImage = document.getElementById('modalImage'),
  url = document.getElementsByName('body').dataset.url;

export default function () {

  document.querySelectorAll('.show-modal').forEach(function (el) {
    el.addEventListener('click', function (e) {
      e.preventDefault();
      getProduct(el.dataset.id);
      document.querySelectorAll('.modal-image img').forEach(function (el) {
        Magnify(el, 3);
      });
    });
  });
}
function getProduct(id) {
  axios.get(`${url}/wp-json/wp/v2/producto/${id}`)
    .then(function (response) {
      let product = response.data;
      axios.get(`${url}/wp-json/wp/v2/media?parent=${product.id}`).then(function (images) {
        setInfoProduct(product, images.data)
      })
    })
    .catch(function (error) {
      console.log(error);
    });
}

function setInfoProduct(product, images) {
  titleProduct.innerText = product.title.rendered;
  priceProduct.innerText = product.id;
  contentProduct.innerText = product.content.rendered;
  wishProduct.value = product.id;
  images.forEach(function (image) {
    createImage(image.guid.rendered)
  });
  const ModalSlide = new Flickity('.modal-image', {
    imagesLoaded: true,
    cellAlign: 'center',
    lazyLoad: true,
    contain: true,
    wrapAround: true,
  });
  Modal.classList.add('show');
  ModalSlide.resize();
  document.querySelector('.modal-close').addEventListener('click', function () {
    ModalSlide.destroy();
    Modal.classList.remove('show');
    modalThumb.textContent = "";
    modalImage.textContent = "";
  });
  const ModalDot = document.querySelectorAll('.modal-images li')
  ModalDot.forEach(function (el, index) {
    el.addEventListener('click', function () {
      ModalSlide.select(index)
    });
  });
  console.log(titleProduct);
  console.log(images)
}

function createImage(src) {
  const li = document.createElement('li');
  const li2 = document.createElement('li');
  const image = document.createElement('img');
  const image2 = document.createElement('img');

  image.setAttribute('src', src);
  image2.setAttribute('src', src);
  li.appendChild(image);
  modalImage.appendChild(li);

  image.setAttribute('width', '380');
  li2.appendChild(image2);
  modalThumb.appendChild(li2);

}