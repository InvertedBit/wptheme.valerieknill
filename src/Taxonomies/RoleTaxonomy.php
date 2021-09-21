<?php
namespace AlexScherer\WpthemeValerieknill\Taxonomies;

class RoleTaxonomy extends BaseTaxonomy {
    public function __construct() {
        parent::__construct('role');
    }

    protected function initialize() {
        $labels = array(
            'name'              => _x( 'Roles', 'taxonomy general name', 'wptheme.valerieknill' ),
            'singular_name'     => _x( 'Role', 'taxonomy singular name', 'wptheme.valerieknill' ),
            'search_items'      => __( 'Search Roles', 'wptheme.valerieknill' ),
            'all_items'         => __( 'All Roles', 'wptheme.valerieknill' ),
            'parent_item'       => __( 'Parent Role', 'wptheme.valerieknill' ),
            'parent_item_colon' => __( 'Parent Role:', 'wptheme.valerieknill' ),
            'edit_item'         => __( 'Edit Role', 'wptheme.valerieknill' ),
            'update_item'       => __( 'Update Role', 'wptheme.valerieknill' ),
            'add_new_item'      => __( 'Add New Role', 'wptheme.valerieknill' ),
            'new_item_name'     => __( 'New Role Name', 'wptheme.valerieknill' ),
            'menu_name'         => __( 'Role', 'wptheme.valerieknill' ),
        );
        $this->args   = array(
            'hierarchical'      => false, // make it hierarchical (like categories)
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => [ 'slug' => $this->name ],
        );
        $this->objectType = [
            'project'
        ];
    }
}
