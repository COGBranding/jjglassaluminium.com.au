<?php
// Get the ACF field group
$archive_hero = get_field('archive_hero_section', 'option');

// Get the sub fields from the group
$archive_hero_callout_text = $archive_hero['archive_hero_callout_text'];
$archive_hero_heading_text = $archive_hero['archive_hero_heading_text'];
$archive_hero_body_text = $archive_hero['archive_hero_body_text'];


// Output 
?>
<div class="section more-service services services--archive">
    <div class="row services__row">
        <div class="services__wrapper">
            <h2 class="services__heading">
                More services
            </h2>
        </div>

        <div class="services__items">
            <?php
            // Get the services post type
            global $post;

            $current_post_id = $post->ID;
            $args = array(
                'post_type' => 'service',
                'post_status' => 'publish',
                'orderby' => 'title',
                'order' => 'DESC',
                'post__not_in' => array(
                    $current_post_id
                ),
            );

            $query = new WP_Query($args);

            // Check if we have service posts
            if ($query->have_posts()) :

                // Loop over the service posts
                while ($query->have_posts()) :
                    $query->the_post();

                    // Get ACF fields
                    $single_service = get_field('home_page_content');
                    $service_show_on_home = $single_service['show_on_home_page'];
                    $service_image = $single_service['home_page_image'];
                    $service_heading = $single_service['home_page_heading_text'];
                    $service_body_text = $single_service['home_page_body_text'];
                    $render_heading_text = !empty($service_heading) ? $service_heading : get_the_title();

                    if ($service_show_on_home === true) :
                        // Loop output, only showing services that are set to show on home 
            ?>
                        <div class="services__item">
                            <a href="<?php echo get_the_permalink(); ?>">
                                <div class="services__item__image" style="background-image: url('<?php echo $service_image['url']; ?>')"></div>

                                <div class="services__item__content-wrapper">
                                    <h3 class="services__item__title">
                                        <?php echo $render_heading_text; ?>
                                    </h3>

                                    <p class="services__item__content">
                                        <?php echo $service_body_text; ?>
                                    </p>
                                </div>
                            </a>
                        </div>

            <?php endif;
                endwhile;
            endif;

            wp_reset_postdata();
            ?>
        </div>
        <div class="btn--wrapper">
            <a href="https://tradehq.com.au/jjglassandaluminium/enquire">
                <button type="button" class="btn btn--aqua">Contact us</button>
            </a>

            <a href="/services/">
                <button type="button" class="btn btn--white">Browse our services</button>
            </a>
        </div>
    </div>
</div>