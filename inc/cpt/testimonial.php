<?php
// RETURN IF CALLED DIRECTLY BY PATH
if (!defined('WPINC')) {
    die;
}

function create_testimonial_post_type()
{

    /**
     * Post Type: Services.
     */

    $labels = [
        "name" => esc_html__("Testimonial", "custom-post-type-ui"),
        "singular_name" => esc_html__("Testimonial", "custom-post-type-ui"),
        "menu_name" => esc_html__("Testimonials", "custom-post-type-ui"),
        "all_items" => esc_html__("All Testimonial", "custom-post-type-ui"),
        "add_new" => esc_html__("Add New Testimonial", "custom-post-type-ui"),
        "add_new_item" => esc_html__("Add New Testimonial", "custom-post-type-ui"),
        "edit_item" => esc_html__("Edit Testimonial", "custom-post-type-ui"),
        "new_item" => esc_html__("New Testimonial", "custom-post-type-ui"),
        "view_item" => esc_html__("View Testimonial", "custom-post-type-ui"),
        "view_items" => esc_html__("View Testimonial", "custom-post-type-ui"),
        "search_items" => esc_html__("Search Testimonial", "custom-post-type-ui"),
        "not_found" => esc_html__("Testimonial not found", "custom-post-type-ui"),
        "parent" => esc_html__("Parent Testimonial", "custom-post-type-ui"),
        "parent_item_colon" => esc_html__("Parent Testimonial", "custom-post-type-ui"),
    ];

    $args = [
        "label" => esc_html__("Testimonial", "custom-post-type-ui"),
        "labels" => $labels,
        "description" => "",
        "public" => false,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "rest_namespace" => "wp/v2",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "can_export" => false,
        "rewrite" => array('slug' => 'testimonials'),
        "query_var" => true,
        "supports" => ["title"],
        "show_in_graphql" => true,
        "menu_icon" => 'dashicons-thumbs-up',
        'capabilities' => array(
            'create_posts' => false, // Removes support for the "Add New" function ( use 'do_not_allow' instead of false for multisite set ups )
        ),
    ];

    register_post_type("testimonial", $args);
}

add_action('init', 'create_testimonial_post_type');

// Add Shortcode Column to Admin Screen
function add_testimonials_shortcode_column($columns)
{
    $columns['shortcode'] = 'Shortcode';
    return $columns;
}
add_filter('manage_testimonial_posts_columns', 'add_testimonials_shortcode_column');

// Display Shortcode in Custom Column
function display_testimonials_shortcode_column($column, $post_id)
{
    if ($column === 'shortcode') {
        echo '<code>';
        echo '[get_testimonial_slider id="' . $post_id . '"]';
        echo '</code>';
    }
}
add_action('manage_testimonial_posts_custom_column', 'display_testimonials_shortcode_column', 10, 2);
