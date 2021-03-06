<div class="container mb-2">
    <div class="row">
        <?php
            $original_query = $wp_query;

            $args=array('posts_per_page'=>2, 'tag' => 'web');
            $wp_query = new WP_Query( $args );

            if ( have_posts() ) :
                while (have_posts()) : the_post();
        ?>

        <div class="col-md-6">
            <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <span class="d-inline-block mb-2"><?php the_category(' '); ?></span>
                    <h3 class="mb-0">
                        <a class="text-dark" href="<?php echo get_permalink(); ?>"><?php the_title();?></a>
                    </h3>
                    <div class="mb-1 text-muted"><?php the_date(); ?></div>
                    <p class="card-text mb-auto">
                        <?php echo strlen(get_the_excerpt()) > 65 ? substr(get_the_excerpt(), 0, 65) . '...' : get_the_excerpt(); ?>
                    </p>
                    <a href="<?php echo get_permalink(); ?>">Lire plus</a>
                </div>

                <div class="col-auto d-none d-lg-block">
                    <img src="<?php the_post_thumbnail_url() ?>" alt="" class="bd-placeholder-img" width="200" height="230">
                </div>
            </div>
        </div>
        <?php  endwhile; endif;

            $wp_query = $original_query;
            wp_reset_postdata();
        ?>

    </div> <!-- /div.row -->
</div> <!-- /div.container mb-2 -->