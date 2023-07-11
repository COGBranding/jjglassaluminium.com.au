<?php

/**
 * Template Name: Home Page
 *
 * This template is used to display the home page layout and contents.
 */
get_header();

// Render home hero section
get_template_part('template-parts/home', 'hero');

// Render about us section
// Get the field group
$about_us = get_field('about_us_section');

// Get subfields from group
$about_us_image = $about_us['about_us_image']['url'];
$about_us_callout_text = $about_us['about_us_section_callout_text'];
$about_us_heading_text = $about_us['about_us_section_heading_text'];
$about_us_body_text = $about_us['about_us_section_body_text'];
$about_us_button_text = $about_us['about_us_section_button_text'];
$about_us_button_url = $about_us['about_us_section_button_url'];

get_template_part(
    'template-parts/section',
    'media-with-text',
    [
        'image_position' => 'left',
        'mobile_image_position' => 'bottom',
        'image_url' => $about_us_image,
        'callout_text' => $about_us_callout_text,
        'heading_text' => $about_us_heading_text,
        'body_text' => $about_us_body_text,
        'show_button' => true,
        'button_url' => $about_us_button_url,
        'button_text' => $about_us_button_text,
    ]
);

// Render services section
get_template_part('template-parts/home', 'services');

// Render testimonial slider section
echo do_shortcode('[get_testimonial_slider id="113"]');

// Render media with text sections
// Get the ACF repeater field
$media_with_text = get_field('media_with_text_sections');

// Check if rows exist
if (have_rows('media_with_text_sections')) :

    // Loop over the rows
    while (have_rows('media_with_text_sections')) :
        the_row();

        // Loop output
        $image_position = get_sub_field('media_with_text_image_position');
        $image = get_sub_field('media_with_text_image')['url'];
        $heading_text = get_sub_field('media_with_text_heading');
        $body_text = get_sub_field('media_with_text_body_text');
        $button_text = get_sub_field('media_with_text_button_text');
        $button_url = get_sub_field('media_with_text_button_url');

        get_template_part(
            'template-parts/section',
            'media-with-text',
            [
                'image_position' => $image_position,
                'mobile_image_position' => 'top',
                'image_url' => $image,
                'callout_text' => '',
                'heading_text' => $heading_text,
                'body_text' => $body_text,
                'show_button' => true,
                'button_url' => $button_url,
                'button_text' => $button_text,
            ]
        );

    endwhile;
endif;

// Render latest news section
echo do_shortcode('[get_latest_news]');

// Render the boilerplate above the footer
echo do_shortcode('[get_boilerplate]');

get_footer();
