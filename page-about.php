<?php

/**
 * Template Name: About Page
 *
 * This template is used to display the about page layout and contents.
 */
get_header();

// Hero section
// Get the ACF field group
$hero = get_field('hero_section');

// Get the subfields from the group
$hero_heading_text = $hero['hero_heading_text'];
$hero_body_text = $hero['hero_body_text'];

// Render the hero section template part
get_template_part(
    'template-parts/section',
    'hero',
    [
        'heading_text' => $hero_heading_text,
        'body_text' => $hero_body_text,
    ]
);

// Media with text sections
// Get the ACF repeater field
$media_with_text = get_field('media_with_text_sections');

// Check if rows exist
if (have_rows('media_with_text_sections')) :

    // Loop through rows
    while (have_rows('media_with_text_sections')) :
        the_row();

        // Load subfields
        $image_position = get_sub_field('media_with_text_image_position');
        $image_position_mobile = get_sub_field('media_with_text_mobile_image_position');
        $image = get_sub_field('media_with_text_image');
        $callout_text = get_sub_field('media_with_text_callout_text');
        $heading_text = get_sub_field('media_with_text_heading_text');
        $body_text = get_sub_field('media_with_text_body_text');
        $show_button = get_sub_field('media_with_text_show_button');
        $button_url = get_sub_field('media_with_text_button_url');
        $button_text = get_sub_field('media_with_text_button_text');

        // Loop output
        get_template_part(
            'template-parts/section',
            'media-with-text',
            [
                'image_position' => $image_position,
                'mobile_image_position' => $image_position_mobile,
                'image_url' => $image,
                'callout_text' => $callout_text,
                'heading_text' => $heading_text,
                'body_text' => $body_text,
                'show_button' => $show_button,
                'button_url' => $button_url,
                'button_text' => $button_text
            ]
        );

    endwhile;
endif;

// Render the values section
get_template_part(
    'template-parts/section',
    'values',
);

// Render the testimonials section
echo do_shortcode('[get_testimonial_slider]');

// Render the boilerplate section
echo do_shortcode('[get_boilerplate]');

get_footer();
