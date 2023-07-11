<?php
// RETURN IF CALLED DIRECTLY BY PATH
if (!defined('WPINC')) {
    die;
}

function create_service_post_type()
{

    /**
     * Post Type: Services.
     */

    $labels = [
        "name" => esc_html__("Service", "divi"),
        "singular_name" => esc_html__("Service", "divi"),
        "menu_name" => esc_html__("Services", "divi"),
        "all_items" => esc_html__("All Service", "divi"),
        "add_new" => esc_html__("Add New Service", "divi"),
        "add_new_item" => esc_html__("Add New Service", "divi"),
        "edit_item" => esc_html__("Edit Service", "divi"),
        "new_item" => esc_html__("New Service", "divi"),
        "view_item" => esc_html__("View Service", "divi"),
        "view_items" => esc_html__("View Service", "divi"),
        "search_items" => esc_html__("Search Service", "divi"),
        "not_found" => esc_html__("Service not found", "divi"),
        "parent" => esc_html__("Parent Service", "divi"),
        "parent_item_colon" => esc_html__("Parent Service", "divi"),
    ];

    $args = [
        "label" => esc_html__("Service", "divi"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
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
        "rewrite" => array('slug' => 'services'),
        "query_var" => true,
        "supports" => ["title"],
        "show_in_graphql" => true,
        "menu_icon" => 'dashicons-clipboard'
    ];

    register_post_type("service", $args);
}

add_action('init', 'create_service_post_type');
