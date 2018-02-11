<?php
/**
 */

get_header(); ?>

    <div class="inner-heading">
        <div class="container">
            <h3><?php the_title() ?></h3>
        </div>
    </div>

    <div class="inner-content">
        <div class="container">
            <?php while (have_posts()) : the_post();?>
            <!-- Blog List start -->
            <div class="blogWraper blogdetail">
                <ul class="blogList">
                    <li>
                        <div class="postimg"><img src="<?php the_post_thumbnail_url(); ?>" alt="Blog Title">
                            <div class="date"><?php echo the_date('d M'); ?></div>
                        </div>
                        <div class="post-header margin-top30">
                            <h4><?php the_title() ?></h4>
                            <div class="postmeta">Por : <span><?php the_author() ?> </span> </div>
                        </div>
                        <?php the_content() ?>
                    </li>
                </ul>
            </div>
    <?php endwhile; ?>
        </div>
    </div>


<?php
//get_sidebar();
get_footer();
