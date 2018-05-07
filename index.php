<?php get_header(); ?>
  <div class="main-carousel" data-flickity='{ "autoPlay": 5000 }'>
    <img src="<?php bloginfo( 'template_url' ) ?>/public/images/1.jpg" alt="">
    <img src="<?php bloginfo( 'template_url' ) ?>/public/images/2.jpg" alt="">
    <img src="<?php bloginfo( 'template_url' ) ?>/public/images/3.jpg" alt="">
    <img src="<?php bloginfo( 'template_url' ) ?>/public/images/4.jpg" alt="">
  </div>
  <section class="container banner-2 row  margin-top-32 margin-bottom-32">
    <article class="col-16 col-m-8 padding-4">
      <figure>
        <a href=""><img src="<?php bloginfo( 'template_url' ) ?>/public/images/izq.jpg" alt=""></a>
      </figure>
    </article>

    <article class="col-16 col-m-8 padding-4">
      <figure>
        <a href=""><img src="<?php bloginfo( 'template_url' ) ?>/public/images/der.jpg" alt=""></a>
      </figure>
    </article>
  </section>
  <section class="Map row container  margin-bottom-20 align-item-center" id="Map">
    <h3 class="col-16"> ENCUENTRA NUESTRAS TIENDAS</h3>
    <article class="col-16 col-m-4 row Map-formContainer">
      <h4>Ubica tu Tienda</h4>


      <p>Selecciona tu ciudad</p>
      <select id="filter-country">
        <option>Ciudad</option>
        <option value="0">Bogotá</option>
      </select>
      <p>Selecciona tienda</p>
      <select id="filter-country">
        <option>Selecciona tienda</option>
        <option value="0">tienda</option>
      </select>
      <p>
        <span>Dirección de la tienda</span> <br>
        <span>Ciudad </span>
      </p>

    </article>
    <article class="col-16 col-m-12 Map-articleContainer">
      <div class="Map-google"></div>
    </article>
  </section>

  <section class="container Slide-products">
    <h3>Enamórate de estos productos</h3>
    <div class="Slide-productsContent" data-flickity='{ "groupCells": true, "autoPlay": 5000  }'>
		<?php for ( $i = 0; $i < 12; $i ++ ): ?>
          <article>
            <figure class="Slide-productsImage">
              <img src="https://lilipink.vteximg.com.br/arquivos/ids/167243-500-745/915-M-2-1.jpg?v=636493791635530000"
                   alt="915-M-2-1">
              <a class="show-modal icon " href="">
                VISTA RÁPIDA
                <i aria-hidden="true" class="fa fa-search-plus"></i>
              </a>
            </figure>
            <div class="row justify-between">
              <h2><a href="">Camiseta Manga sisa</a></h2>

            </div>
            <span>Ref. LE01-012</span>
          </article>
		<?php endfor; ?>
    </div>

  </section>

  <section class="Social-feeds container">
    <h2>BÚSCANOS EN NUESTRAS REDES #DECORAZON</h2>
    <div class="row Social-feedsTitle ">
      <h3 class="FeedId-h3">
        <span></span>
        <span>Inspirate <i class="fab fa-instagram"></i>  #decorazón</span>
      </h3>
      <h3 class="fb-page-h3">
        <span>FACEBOOK <i class="fab fa-facebook"></i> @lilipink</span>
      </h3>
    </div>
    <div class="row Social-feedsContent">
      <div id="FeedId" class="FeedId row"></div>

      <div class="fb-page" data-height="760" data-href="https://www.facebook.com/LiliPinkColombia/" data-tabs="timeline"
           data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
           data-show-facepile="true">
        <blockquote cite="https://www.facebook.com/LiliPinkColombia/" class="fb-xfbml-parse-ignore"><a
            href="https://www.facebook.com/LiliPinkColombia/">Lili Pink</a></blockquote>
      </div>
    </div>

  </section>
  <div class="modal justify-center align-item-center">
    <div class="modal-main">
      <span class="modal-close"></span>
      <section class="modal-content row ">
        <article class="modal-slide row">
          <div class="modal-images">
            <ul class="is-list-less ">
              <li>
                <img
                  src="https://lilipink.vteximg.com.br/arquivos/ids/164876-1000-1500/LD03-002_negrorayasrojas-1.jpg?v=636464347894330000"
                  alt="">
              </li>
              <li>
                <img
                  src="https://lilipink.vteximg.com.br/arquivos/ids/164880-300-450/LD03-002_negrorayasrojas-2.jpg?v=636464347944830000"
                  alt="">
              </li>
            </ul>
          </div>
          <ul class="is-list-less modal-image">
            <li>
              <img width="380"
                   src="https://lilipink.vteximg.com.br/arquivos/ids/164876-1000-1500/LD03-002_negrorayasrojas-1.jpg?v=636464347894330000"
                   alt="">
            </li>
            <li>
              <img class="imageZoom" width="380"
                   src="https://lilipink.vteximg.com.br/arquivos/ids/164880-300-450/LD03-002_negrorayasrojas-2.jpg?v=636464347944830000"
                   alt="">
            </li>
          </ul>
        </article>
        <article class="modal-info">
          <h2>CHAQUETA DEPORTIVA</h2>
          <p class="ref">REF. LD03-002</p>
          <h3>ESPECIFICACIONES</h3>
          <p>
            Chaqueta deportiva con capota, escogela con lineas blancas o rojas
          </p>
          <button class="modal-infoWishlist  ">
            <div class="">
              <img src="<?php bloginfo( 'template_url' ) ?>/public/images/wishLilipink.png">
            </div>
            <span class="wlBtnText">Enviar a la lista de deseos</span>
          </button>
        </article>
      </section>
    </div>
  </div>
  <div id="fb-root"></div>
  <script>(function (d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s);
      js.id = id;
      js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.12&appId=1489685601143763&autoLogAppEvents=1';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<?php get_footer();

