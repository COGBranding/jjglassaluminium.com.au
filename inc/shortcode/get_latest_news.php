<?php
if (!defined('WPINC')) {
    die;
}

function get_latest_news($atts)
{
    global $post;

    $current_post_id = $post->ID;

    // Parse the shortcode attributes
    $atts = shortcode_atts(array(
        'title' => 'Latest news',
        'category_slug' => '',
        'archive' => '',
    ), $atts);

    $title = $atts['title'];
    $category_slug = $atts['category_slug'];
    $cat_name = implode(' ', explode('-', $category_slug));
    $title = ($category_slug != '') ? 'Latest ' . $cat_name . ' posts' : $title;

    $archive = $atts['archive'];
    $output = '';
    $display_limit = ($archive) ? 12 : 3;
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // Get the current page number

    $is_tag = is_tag();
    $is_category = is_category();

    $tags = '';

    if ($is_tag) {
        $tag = get_queried_object();
        $tags =  $tag->slug;
        $current_post_id = '';
    }
    if ($is_category) {
        $page_object = get_queried_object();
        $category_slug = $page_object->cat_name;
        $current_post_id = '';
    }


    // Get the news post type
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => $display_limit,
        'post__not_in' => array(
            $current_post_id
        ),
        'category_name' => $category_slug,
        'paged' => $paged,
        'tag' => $tags
    );

    $query = new WP_Query($args);

    $displayed_posts = 0;
    // Check if there are any posts
    if ($query->have_posts()) {
        // Loop over the posts
        while ($query->have_posts() && $displayed_posts < ($display_limit + 1)) {
            $query->the_post();

            // Append the card HTML to the output
            $output .= get_card_html();

            $displayed_posts++;
        }

        wp_reset_postdata();

        // Return the final HTML output
        $more_news = (!$archive) ? 'latest-news' : '';
        $return_text = '<div class="section ' . $more_news . ' ">
            <div class="row latest-news__row">
                <h2 class="latest-news__heading">' . esc_html($title) . '</h2>
                <div class="card__items">' . $output . '</div>
            </div>
        </div>';

        if ($archive) {
            $paginations = get_pagination($query, $paged);
            $return_text .= $paginations;
        }

        return $return_text;
    }
}

function get_card_html()
{
    ob_start();
?>

    <article class="card" data-id="<?php echo get_the_ID(); ?>">
        <a href="<?php the_permalink(); ?>">
            <div class="card__image" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"></div>
            <div class="card__content-wrapper">
                <div class="card__content">
                    <p class="callout-text"><?php echo get_the_date('j M Y'); ?></p>
                    <h4 class="card__title"><?php the_title(); ?></h4>
                    <div class="card__excerpt"><?php the_excerpt(); ?></div>
                </div>
                <a href="<?php the_permalink(); ?>">
                    <button type="button" class="btn btn--aqua">Read article</button>
                </a>
            </div>
        </a>
    </article>
<?php
    return ob_get_clean();
}

function get_pagination($query, $paged)
{
    $pagination = paginate_links(array(
        'base' => get_pagenum_link(1) . '%_%',
        'format' => '?paged=%#%',
        'current' => $paged,
        'total' => $query->max_num_pages,
        'prev_text' => __('Previous'),
        'next_text' => __('Next'),
    ));

    if ($pagination) {
        return '<div class="dp-dfg-pagination pagination">' . $pagination . '</div>';
    }
}

// Register the shortcode with the function
add_shortcode('get_latest_news', 'get_latest_news');
?>