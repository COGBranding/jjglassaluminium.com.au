<?php
get_header();

// Render the hero section
get_template_part('/template-parts/single-service', 'hero');
?>

<div class="section tabs">
    <div class="row tabs__row">
        <div class="btn--wrapper">
            <button class="btn btn--tab tabSelected" id="tabAbout">
                About the service
            </button>

            <button class="btn btn--tab" id="tabTypes">
                Types of glass
            </button>
            <?php
            $services = get_field('single_service_about');
            // Get the subfields from the group
            $service_faqs = $services['single_service_faqs'];
            if (!empty($service_faqs)) {
            ?>
                <button class="btn btn--tab" id="tabFaq">
                    FAQs
                </button>
            <?php } ?>
        </div>

        <?php
        // Render tab sections
        get_template_part(
            '/template-parts/single-service',
            'about'
        );

        get_template_part(
            '/template-parts/single-service',
            'glass-types'
        );

        get_template_part(
            '/template-parts/single-service',
            'faqs'
        );
        ?>

    </div>
</div>

<?php
// Render more services section
get_template_part(
    'template-parts/section',
    'services-more',
);


$current_url = get_permalink();
$current_slug = basename($current_url);
// Render latest news section
echo do_shortcode('[get_latest_news category_slug=' . $current_slug . ']');

// Render the boilerplate section
echo do_shortcode('[get_boilerplate]');

get_footer();
