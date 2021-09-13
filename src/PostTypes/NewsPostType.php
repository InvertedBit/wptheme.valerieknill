<?php
namespace AlexScherer\WpthemeValerieknill\PostTypes;

/**
 * News posttype class
 *
 * Handles all data needed for registering the News posttype
 *
 */
class NewsPostType extends BasePostType {
    public function __construct() {
        parent::__construct('News');
    }

    protected function initialize() {
        $labels = array(
            'name'                  => _x( 'News', 'Post type general name', 'news' ),
            'singular_name'         => _x( 'News entry', 'Post type singular name', 'news' ),
            'menu_name'             => _x( 'News', 'Admin Menu text', 'news' ),
            'name_admin_bar'        => _x( 'News', 'Add New on Toolbar', 'news' ),
            'add_new'               => __( 'Add New', 'news' ),
            'add_new_item'          => __( 'Add New entry', 'news' ),
            'new_item'              => __( 'New entry', 'news' ),
            'edit_item'             => __( 'Edit entry', 'news' ),
            'view_item'             => __( 'View entry', 'news' ),
            'all_items'             => __( 'All news', 'news' ),
            'search_items'          => __( 'Search news', 'news' ),
            'parent_item_colon'     => __( 'Parent news:', 'news' ),
            'not_found'             => __( 'No news found.', 'news' ),
            'not_found_in_trash'    => __( 'No news found in Trash.', 'news' ),
            'featured_image'        => _x( 'Recipe Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'news' ),
            'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'news' ),
            'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'news' ),
            'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'news' ),
            'archives'              => _x( 'Recipe archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'news' ),
            'insert_into_item'      => _x( 'Insert into entry', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'news' ),
            'uploaded_to_this_item' => _x( 'Uploaded to this entry', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'news' ),
            'filter_items_list'     => _x( 'Filter news list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'news' ),
            'items_list_navigation' => _x( 'Recipes list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'news' ),
            'items_list'            => _x( 'Recipes list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'news' ),
        );     
        $this->args = array(
            'labels'             => $labels,
            'description'        => 'Recipe custom post type.',
            'menu_icon'          => 'dashicons-megaphone',
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'news' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 4,
            'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
            'taxonomies'         => array( 'category', 'post_tag' ),
            'show_in_rest'       => true
        );
    }
}
