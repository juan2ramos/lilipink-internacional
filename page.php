<?php get_header(); ?>
    <main class="container">
	    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
		    the_content();
	    endwhile; else: ?>
          <p>Sorry, no posts matched your criteria.</p>
	    <?php endif; ?>
    </main>
<p style="color: white">qweqwe</p>
<?php get_footer();
