<?php
if (!defined('WPINC')) {
    die;
}

function get_testimonials($atts)
{
    // Define the shortcode atts, allowing us to render the shortcode with post id
    $atts = shortcode_atts(
        array(
            'id' => null,
        ),
        $atts
    );

    // Get the testimonial post type
    $args = array(
        'post_type' => 'testimonial',
        'post_status' => 'publish',
    );


    $query = new WP_Query($args);
?>

    <div class="section testimonials">
        <div class="row testimonials__row">
            <div class="testimonials__content-wrapper">
                <div class="testimonials__content">
                    <p class="callout-text">
                        Testimonials
                    </p>

                    <h2>What our customers say</h2>
                </div>

                <div class="testimonials__navigation show-for-desktop">
                    <button type="button" class="btn btn--slick btn--slick-prev" id="slickPrev">Previous</button>
                    <button type="button" class="btn btn--slick btn--slick-next" id="slickNext">Next</button>
                </div>
            </div>

            <div class="testimonials__slider">
                <?php
                // Check if we have testimonial posts
                if ($query->have_posts()) :
                    // Loop over the testimonial posts
                    while ($query->have_posts()) :
                        $query->the_post();

                        // Get ACF repeater field
                        $testimonial_slider = 'testimonial_slider';

                        // Check if rows exist
                        if (have_rows($testimonial_slider)) :
                            // Loop through rows
                            while (have_rows($testimonial_slider)) :
                                the_row();

                                // Get ACF subfields
                                $testimonial_background_image = get_sub_field('testimonial_background_image');
                                $testimonial_headshot_image = get_sub_field('testimonial_headshot_image');
                                $testimonial_heading_text = get_sub_field('testimonial_heading_text');
                                $testimonial_body_text = get_sub_field('testimonial_body_text');
                                $testimonial_author = get_sub_field('testimonial_author');
                ?>
                                <div class="testimonials__item" style="background-image: url('<?php echo $testimonial_background_image['url']; ?>')">
                                    <div class="testimonials__item__card">
                                        <img src="<?php echo $testimonial_background_image['url'] ?>" alt="<?php echo $testimonial_author ?>" class="show-for-mobile testimonials__bg__image">
                                        <?php if (!empty($testimonial_headshot_image)) : ?>
                                            <img src="<?php echo $testimonial_headshot_image['url']; ?>" class="testimonials__item__image" />
                                        <?php endif; ?>

                                        <div class="testimonials__item__content-wrapper">
                                            <?php if (!empty($testimonial_heading_text)) : ?>
                                                <h3 class="testimonials__item__heading">
                                                    <?php echo $testimonial_heading_text; ?>
                                                </h3>
                                            <?php endif; ?>

                                            <?php if (!empty($testimonial_body_text)) : ?>
                                                <div class="testimonials__item__content">
                                                    <?php echo $testimonial_body_text; ?>
                                                </div>
                                            <?php endif; ?>

                                            <?php if (!empty($testimonial_author)) : ?>
                                                <p class="callout-text">
                                                    <?php echo $testimonial_author; ?>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                <?php
                            // End repeater loop
                            endwhile;
                        // End repeater if
                        endif;
                    // End testimonial loop
                    endwhile;
                endif;
                ?>
            </div>
            <div class="testimonials__navigation show-for-mobile">
                <button type="button" class="btn btn--slick btn--slick-prev" id="slickPrev1">Previous</button>
                <button type="button" class="btn btn--slick btn--slick-next" id="slickNext1">Next</button>
            </div>
        </div>
    </div>
<?php
    wp_reset_postdata();
}

add_shortcode('get_testimonial_slider', 'get_testimonials');
