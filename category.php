<?php get_header(); ?>

<?php
$category = get_queried_object();
$category_name = $category->name;?>
  <main class="container row">
    <div class="filters  ">
      <ul class="is-list-less">
        <li>
          <h3 class="filters-title">Tipo de producto</h3>
          <ul class="is-list-less category-product">
            <li>
              <input type="checkbox" id="check1"> <label for="check1">checkbox 1</label>
            </li>
            <li>
              <input type="checkbox" id="check12"> <label for="check12">checkbox 1</label>
            </li>
            <li>
              <input type="checkbox" id="check13"> <label for="check13">checkbox 1</label>
            </li>
          </ul>
        </li>
      </ul>
    </div>
    <section class="products container Slide-products row justify-center">
	    <?php $query = new WP_Query(['category_name' => $category_name, 'post_type' => 'producto',]);
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
              <i>REF: <?php the_field('referencia') ?></i>
            <span><?php the_field( 'valor' ) ?></span>
          </article>
	    <?php endwhile; ?>

    </section>

  </main>

<?php get_footer();
