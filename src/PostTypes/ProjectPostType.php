<?php
namespace AlexScherer\WpthemeValerieknill\PostTypes;

/**
 * Project posttype class
 *
 * Handles all data needed for registering the Project posttype
 *
 */
class ProjectPostType extends BasePostType {
    public function __construct() {
        parent::__construct('Project');
    }

    protected function initialize() {
        $labels = array(
            'name'                  => _x( 'Projects', 'Post type general name', 'wptheme-valerieknill' ),
            'singular_name'         => _x( 'Project', 'Post type singular name', 'wptheme-valerieknill' ),
            'menu_name'             => _x( 'Projects', 'Admin Menu text', 'wptheme-valerieknill' ),
            'name_admin_bar'        => _x( 'Projects', 'Add New on Toolbar', 'wptheme-valerieknill' ),
            'add_new'               => __( 'Add New', 'wptheme-valerieknill' ),
            'add_new_item'          => __( 'Add New project', 'wptheme-valerieknill' ),
            'new_item'              => __( 'New project', 'wptheme-valerieknill' ),
            'edit_item'             => __( 'Edit project', 'wptheme-valerieknill' ),
            'view_item'             => __( 'View project', 'wptheme-valerieknill' ),
            'all_items'             => __( 'All projects', 'wptheme-valerieknill' ),
            'search_items'          => __( 'Search projects', 'wptheme-valerieknill' ),
            'parent_item_colon'     => __( 'Parent project:', 'wptheme-valerieknill' ),
            'not_found'             => __( 'No projects found.', 'wptheme-valerieknill' ),
            'not_found_in_trash'    => __( 'No projects found in Trash.', 'wptheme-valerieknill' ),
            'featured_project'        => _x( 'Project Cover Project', 'Overrides the “Featured Project” phrase for this post type. Added in 4.3', 'wptheme-valerieknill' ),
            'set_featured_project'    => _x( 'Set cover project', 'Overrides the “Set featured project” phrase for this post type. Added in 4.3', 'wptheme-valerieknill' ),
            'remove_featured_project' => _x( 'Remove cover project', 'Overrides the “Remove featured project” phrase for this post type. Added in 4.3', 'wptheme-valerieknill' ),
            'use_featured_project'    => _x( 'Use as cover project', 'Overrides the “Use as featured project” phrase for this post type. Added in 4.3', 'wptheme-valerieknill' ),
            'archives'              => _x( 'Project archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'wptheme-valerieknill' ),
            'insert_into_item'      => _x( 'Insert into project', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'wptheme-valerieknill' ),
            'uploaded_to_this_item' => _x( 'Uploaded to this project', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'wptheme-valerieknill' ),
            'filter_items_list'     => _x( 'Filter projects list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'wptheme-valerieknill' ),
            'items_list_navigation' => _x( 'Projects list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'wptheme-valerieknill' ),
            'items_list'            => _x( 'Projects list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'wptheme-valerieknill' ),
        );     
        $this->args = array(
            'labels'             => $labels,
            'description'        => 'Project custom post type.',
            'menu_icon'          => 'dashicons-format-gallery',
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'projects' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 19,
            'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
            'taxonomies'         => ['roles'],
            'show_in_rest'       => true
        );

        $this->acfPages = [
            [
                'page_title'     => 'Project Archive Settings',
                'parent_slug'    => 'edit.php?post_type=project',
                'capability'     => 'manage_options'
            ]
        ];
    }
}

