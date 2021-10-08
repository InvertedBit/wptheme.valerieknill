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
            'name'                  => _x( 'News', 'Post type general name', 'wptheme.valerieknill' ),
            'singular_name'         => _x( 'News entry', 'Post type singular name', 'wptheme.valerieknill' ),
            'menu_name'             => _x( 'News', 'Admin Menu text', 'wptheme.valerieknill' ),
            'name_admin_bar'        => _x( 'News', 'Add New on Toolbar', 'wptheme.valerieknill' ),
            'add_new'               => __( 'Add New', 'wptheme.valerieknill' ),
            'add_new_item'          => __( 'Add New entry', 'wptheme.valerieknill' ),
            'new_item'              => __( 'New entry', 'wptheme.valerieknill' ),
            'edit_item'             => __( 'Edit entry', 'wptheme.valerieknill' ),
            'view_item'             => __( 'View entry', 'wptheme.valerieknill' ),
            'all_items'             => __( 'All news', 'wptheme.valerieknill' ),
            'search_items'          => __( 'Search news', 'wptheme.valerieknill' ),
            'parent_item_colon'     => __( 'Parent news:', 'wptheme.valerieknill' ),
            'not_found'             => __( 'No news found.', 'wptheme.valerieknill' ),
            'not_found_in_trash'    => __( 'No news found in Trash.', 'wptheme.valerieknill' ),
            'featured_image'        => _x( 'Article Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'wptheme.valerieknill' ),
            'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'wptheme.valerieknill' ),
            'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'wptheme.valerieknill' ),
            'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'wptheme.valerieknill' ),
            'archives'              => _x( 'Article archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'wptheme.valerieknill' ),
            'insert_into_item'      => _x( 'Insert into entry', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'wptheme.valerieknill' ),
            'uploaded_to_this_item' => _x( 'Uploaded to this entry', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'wptheme.valerieknill' ),
            'filter_items_list'     => _x( 'Filter news list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'wptheme.valerieknill' ),
            'items_list_navigation' => _x( 'Articles list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'wptheme.valerieknill' ),
            'items_list'            => _x( 'Articles list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'wptheme.valerieknill' ),
        );     
        $this->args = array(
            'labels'             => $labels,
            'description'        => 'News custom post type.',
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
            'supports'           => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail' ),
            'taxonomies'         => array( 'discipline', 'category', 'post_tag' ),
            'show_in_rest'       => true
        );
    }
}
