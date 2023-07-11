<?php

/**
 * Template Name: Archive Page
 *
 * This template is used to display the about page layout and contents.
 */
get_header(); ?>

<div class="section single-post__wrapper">
    <?php
    echo do_shortcode('[get_latest_news archive=true]');
    ?>
</div>

<?php

//Render the boilerplate section
echo do_shortcode('[get_boilerplate]');

get_footer();
