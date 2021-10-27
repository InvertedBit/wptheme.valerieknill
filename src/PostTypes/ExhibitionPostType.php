<?php
namespace AlexScherer\WpthemeValerieknill\PostTypes;

/**
 * Exhibition posttype class
 *
 * Handles all data needed for registering the Exhibition posttype
 *
 */
class ExhibitionPostType extends BasePostType {
    public function __construct() {
        parent::__construct('Exhibition');
    }

    protected function initialize() {
        $labels = array(
            'name'                  => _x( 'Exhibitions', 'Post type general name', 'wptheme-valerieknill' ),
            'singular_name'         => _x( 'Exhibition', 'Post type singular name', 'wptheme-valerieknill' ),
            'menu_name'             => _x( 'Exhibitions', 'Admin Menu text', 'wptheme-valerieknill' ),
            'name_admin_bar'        => _x( 'Exhibitions', 'Add New on Toolbar', 'wptheme-valerieknill' ),
            'add_new'               => __( 'Add New', 'wptheme-valerieknill' ),
            'add_new_item'          => __( 'Add New exhibition', 'wptheme-valerieknill' ),
            'new_item'              => __( 'New exhibition', 'wptheme-valerieknill' ),
            'edit_item'             => __( 'Edit exhibition', 'wptheme-valerieknill' ),
            'view_item'             => __( 'View exhibition', 'wptheme-valerieknill' ),
            'all_items'             => __( 'All exhibitions', 'wptheme-valerieknill' ),
            'search_items'          => __( 'Search exhibitions', 'wptheme-valerieknill' ),
            'parent_item_colon'     => __( 'Parent exhibitions:', 'wptheme-valerieknill' ),
            'not_found'             => __( 'No exhibitions found.', 'wptheme-valerieknill' ),
            'not_found_in_trash'    => __( 'No exhibitions found in Trash.', 'wptheme-valerieknill' ),
            'featured_image'        => _x( 'Exhibition Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'wptheme-valerieknill' ),
            'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'wptheme-valerieknill' ),
            'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'wptheme-valerieknill' ),
            'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'wptheme-valerieknill' ),
            'archives'              => _x( 'Exhibition archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'wptheme-valerieknill' ),
            'insert_into_item'      => _x( 'Insert into exhibition', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'wptheme-valerieknill' ),
            'uploaded_to_this_item' => _x( 'Uploaded to this exhibition', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'wptheme-valerieknill' ),
            'filter_items_list'     => _x( 'Filter exhibitions list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'wptheme-valerieknill' ),
            'items_list_navigation' => _x( 'Exhibitions list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'wptheme-valerieknill' ),
            'items_list'            => _x( 'Exhibitions list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'wptheme-valerieknill' ),
        );     
        $this->args = array(
            'labels'             => $labels,
            'description'        => 'Exhibition custom post type.',
            'menu_icon'          => 'dashicons-store',
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'exhibition' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 20,
            'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
            'taxonomies'         => [],
            'show_in_rest'       => true
        );
    }
}
