<?php
namespace AlexScherer\WpthemeValerieknill\Taxonomies;

class SeriesTaxonomy extends BaseTaxonomy {
    public function __construct() {
        parent::__construct('series');
    }

    protected function initialize() {
        $labels = array(
            'name'              => _x( 'Series', 'taxonomy general name', 'wptheme.valerieknill' ),
            'singular_name'     => _x( 'Series', 'taxonomy singular name', 'wptheme.valerieknill' ),
            'search_items'      => __( 'Search Series', 'wptheme.valerieknill' ),
            'all_items'         => __( 'All Series', 'wptheme.valerieknill' ),
            'parent_item'       => __( 'Parent Series', 'wptheme.valerieknill' ),
            'parent_item_colon' => __( 'Parent Series:', 'wptheme.valerieknill' ),
            'edit_item'         => __( 'Edit Series', 'wptheme.valerieknill' ),
            'update_item'       => __( 'Update Series', 'wptheme.valerieknill' ),
            'add_new_item'      => __( 'Add New Series', 'wptheme.valerieknill' ),
            'new_item_name'     => __( 'New Series Name', 'wptheme.valerieknill' ),
            'menu_name'         => __( 'Series', 'wptheme.valerieknill' ),
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
            'image'
        ];
    }
}
