<?php /* Template Name: BFO Page Template */

get_header();
// Render home hero section
get_template_part('template-parts/home', 'hero');
// Post content 
?>
<div class="row single-post__content">
    <?php the_content(); ?>
</div>

<?php
//Render the other services section
get_template_part(
    'template-parts/section',
    'other-services'
);

get_footer();
