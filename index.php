<?php get_header(); ?>
    <div class="main-carousel" data-flickity='{ "autoPlay": 5000 }'>
        <img src="<?php bloginfo( 'template_url' ) ?>/public/images/banners-belleza.jpg" alt="">
        <img src="<?php bloginfo( 'template_url' ) ?>/public/images/BANNERS-ACCESORIOS.jpg" alt="">
        <img src="<?php bloginfo( 'template_url' ) ?>/public/images/BANNERS-SPORT.jpg" alt="">
    </div>

    <section class="Map row  margin-bottom-20 align-item-center">
        <article class="col-16 col-m-4 row ">
            <div class="is-full-width">
                <h1>NUESTRAS TIENDAS</h1>
                <p>Seleccione la ubicación y la <br>tienda para ver la información</p>
                <button id="Map-location" type="button">Ubicar Tienda más cercana</button>
                <div class="contentFiltrosMapa">
                    <div class="filtro-pais"><select id="filter-country">
                            <option>Selecciona Pais</option>
                            <option value="0">colombia</option>
                        </select></div>
                    <div class="filtro-ciudad"><select id="filter-city">
                            <option>Selecciona ciudad</option>
                            <option>acacias</option>
                            <option>Aguachica</option>
                        </select></div>
                    <div class="listado-tiendas">
                        <ul></ul>
                    </div>
                </div>
            </div>
        </article>
        <article class="col-16 col-m-12">
            <div class="Map-google"></div>
        </article>
    </section>

    <section class="container Slide-products">
        <h3>Enamórate de estos productos</h3>
        <div class="Slide-productsContent" data-flickity='{ "groupCells": true, "autoPlay": 5000  }'>
					<?php for ( $i = 0; $i < 12; $i ++ ): ?>
              <article>
                  <figure>
                      <img src="https://lilipink.vteximg.com.br/arquivos/ids/167243-500-745/915-M-2-1.jpg?v=636493791635530000"
                           alt="915-M-2-1" id="">
                  </figure>
                  <div class="row justify-between">
                      <h2><a href="">Camiseta Manga sisa</a></h2>
                      <a class="icon" href=""><i aria-hidden="true" class="fa fa-search-plus"></i></a>
                  </div>
                  <span>Ref. LE01-012</span>
              </article>
					<?php endfor; ?>
        </div>
        <div class="Slide-productsContent" data-flickity='{ "groupCells": true, "autoPlay": 5000  }'>
					<?php for ( $i = 0; $i < 12; $i ++ ): ?>
              <article>
                  <figure>
                      <img src="https://lilipink.vteximg.com.br/arquivos/ids/163024-500-745/vb2-080_tribal-1.jpg?v=636453355865470000"
                           alt="915-M-2-1" id="">
                  </figure>
                  <div class="row justify-between">
                      <h2><a href="">Camiseta Manga sisa</a></h2>
                      <a class="icon" href=""><i aria-hidden="true" class="fa fa-search-plus"></i></a>
                  </div>
                  <span>Ref. LE01-012</span>
              </article>
					<?php endfor; ?>
        </div>
    </section>

    <section class="Social-feeds container">
        <h3 >
            <span><i class="fab fa-instagram"></i></span>
            <span>Inspirate #decorazón</span>
        </h3>
        <div data-flickity='{ "groupCells": true, "autoPlay": 5000  }'>
			<?php for ( $i = 0; $i < 12; $i ++ ): ?>
                <article> <img src="<?php bloginfo( 'template_url' ) ?>/public/images/1.png" alt=""></article>
			<?php endfor; ?>
        </div>
    </section>

<?php get_footer();

