<?php

get_header();
// Render the hero section
get_template_part(
    'template-parts/section',
    'services-hero',
);

//Render the other services section
get_template_part(
    'template-parts/section',
    'other-services'
);

//Render the boilerplate section
echo do_shortcode('[get_boilerplate]');

get_footer();
