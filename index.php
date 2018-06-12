<?php get_header(); ?>
    <div class="main-carousel" data-flickity='{ "autoPlay": 5000 }'>

        <?php $query = new WP_Query(['post_type' => 'banners']);
        while ($query->have_posts()) : $query->the_post(); ?>
            <img src="<?php the_post_thumbnail_url(); ?>" alt="">
        <?php endwhile; ?>

    </div>
    <section class="container banner-2 row  margin-top-32 margin-bottom-32">
        <?php $query = new WP_Query(['post_type' => 'minibanner']);
        while ($query->have_posts()) : $query->the_post(); ?>

            <article class="col-16 col-m-8 padding-4">
                <figure>
                    <a href=""><img src="<?php the_post_thumbnail_url(); ?>" alt=""></a>
                </figure>
            </article>

        <?php endwhile; ?>

    </section>
    <section class="Map row container  margin-bottom-20 align-item-center" id="Map">
        <h3 class="col-16"> ENCUENTRA NUESTRAS TIENDAS</h3>
        <article class="col-16 col-m-4 row Map-formContainer">
            <h4>Ubica tu Tienda</h4>


            <p>Selecciona tu ciudad</p>
            <select id="filter-country">
                <option value="0">Ciudad</option>
                <?php
                $terms = get_terms('ciudad');
                if ($terms && !is_wp_error($terms)) :
                    foreach ($terms as $term) : ?>
                        <option
                                    data-lng="<?php echo get_field("longitud", $term->taxonomy . '_' . $term->term_id); ?>"
                                data-lat="<?php echo get_field("latitud", $term->taxonomy . '_' . $term->term_id); ?>"
                                value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
                    <?php endforeach;
                endif; ?>

            </select>
            <p>Selecciona tienda</p>
            <select id="filter-points" disabled>
                <option value="0">Selecciona tienda</option>
                <?php
                $points = get_posts(['post_type' => 'puntos']);
                foreach ($points as $point) :?>
                    <option class="for-hidden"
                            data-city="<?php echo get_the_terms($point->ID, 'ciudad')[0]->slug ?>"
                            data-lng="<?php echo get_field("Longitud", $point->ID); ?>"
                            data-info="<?php echo esc_html($point->post_content) ?>"
                            data-lat="<?php echo get_field("Latitud", $point->ID); ?>"
                    > <?php echo $point->post_title ?>
                    </option>
                <?php endforeach; ?>
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
        <div class="Slide-productsContent" id="SlideProductsContent">
            <?php $query = new WP_Query(['post_type' => 'producto']);
            while ($query->have_posts()) : $query->the_post(); ?>

                <article>
                    <figure class="Slide-productsImage">
                        <img src="<?php the_post_thumbnail_url(); ?>"
                             alt="">
                        <a data-id="<?php the_ID() ?>" class="show-modal icon " href="">
                            VISTA RÁPIDA
                            <i aria-hidden="true" class="fa fa-search-plus"></i>
                        </a>
                    </figure>
                    <div class="row justify-between">
                        <h2><a href=""><?php the_title() ?></a></h2>

                    </div>
                    <span><?php the_field('valor') ?></span>
                </article>
            <?php endwhile; ?>
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

            <div class="fb-page" data-height="760" data-href="https://www.facebook.com/LiliPinkColombia/"
                 data-tabs="timeline"
                 data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
                 data-show-facepile="true">
                <blockquote cite="https://www.facebook.com/LiliPinkColombia/" class="fb-xfbml-parse-ignore"><a
                            href="https://www.facebook.com/LiliPinkColombia/">Lili Pink</a></blockquote>
            </div>
        </div>

    </section>

    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.12&appId=1489685601143763&autoLogAppEvents=1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
<?php foreach ($terms as $term) : ?>
    <?php print_r($term->term_id) ; ?>
<?php endforeach; ?>
<?php get_footer();

