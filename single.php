<?php
get_header(); ?>

<div class="section single-post__wrapper">
    <?php // Hero section
    $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');

    // Get the post categories
    $categories = get_the_category();
    ?>

    <div class="row single-post__hero">
        <div class="single-post__hero__col single-post__hero__col--image" style="background-image: url('<?php echo $image[0]; ?>')">

        </div>

        <div class="single-post__hero__col single-post__hero__col--content">
            <div class="single-post__meta">
                <div class="single-post__meta__category">
                    <?php
                    // Return the first category
                    if (!empty($categories)) :
                        echo esc_html($categories[0]->name);

                    endif;
                    ?>
                </div>

                <div class="single-post__meta__reading-time"></div>
            </div>

            <h2 class="single-post__title">
                <?php the_title(); ?>
            </h2>

            <div class="single-post__excerpt">
                <?php the_excerpt(); ?>
            </div>

            <div class="single-post__author">
                <p>
                    J & J Glass and Aluminium
                </p>

                <p class="callout-text">
                    <?php the_date('j M Y'); ?>
                </p>
            </div>
        </div>
    </div>
    <?php // End hero section


    // Post content 
    ?>
    <div class="row single-post__content">
        <?php the_content(); ?>
    </div>
    <?php // End post content 
    ?>
</div>

<?php
// Render more posts section
echo do_shortcode('[get_latest_news title="More posts"]');

get_footer();
