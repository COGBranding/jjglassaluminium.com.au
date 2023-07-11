<?php
function load_post_content()
{
    $post_id = $_POST['post_id'];
    $post = get_post($post_id);

    ob_start();

    if ($post) {
        $content = $post->post_content;
        $content = apply_filters('the_content', $content);
?>
        <div class="section single-post__wrapper">
            <?php // Hero section
            $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');

            // Get the post categories
            $categories = get_the_category($post->ID);
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

                        <div class="single-post__meta__reading-time">5 min read</div>
                    </div>

                    <h1 class="single-post__title">
                        <?php echo $post->post_title; ?>
                    </h1>

                    <div class="single-post__excerpt">
                        <p>
                            <?php echo $post->post_excerpt; ?>
                        </p>
                    </div>

                    <div class="single-post__author">
                        <p>
                            J & J Glass and Aluminium
                        </p>

                        <div class="callout-text">
                            <?php echo get_the_date('j M Y', $post->post_date); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php // End hero section


            // Post content 
            ?>
            <div class="row single-post__content">
                <?php echo $content; ?>
            </div>
            <?php // End post content 
            ?>
        </div>
        <p class="newsUrl" style="display:none"><?php echo $post->guid; ?></p>
<?php
    }
    echo do_shortcode('[get_latest_news title="More posts"]');



    wp_send_json(ob_get_clean());
}
add_action('wp_ajax_load_post_content', 'load_post_content');
add_action('wp_ajax_nopriv_load_post_content', 'load_post_content');
