<?php
namespace AlexScherer\WpthemeValerieknill\Taxonomies;

class DisciplineTaxonomy extends BaseTaxonomy {
    public function __construct() {
        parent::__construct('discipline');
    }

    protected function initialize() {
        $labels = array(
            'name'              => _x( 'Disciplines', 'taxonomy general name', 'wptheme.valerieknill' ),
            'singular_name'     => _x( 'Discipline', 'taxonomy singular name', 'wptheme.valerieknill' ),
            'search_items'      => __( 'Search Disciplines', 'wptheme.valerieknill' ),
            'all_items'         => __( 'All Disciplines', 'wptheme.valerieknill' ),
            'parent_item'       => __( 'Parent Discipline', 'wptheme.valerieknill' ),
            'parent_item_colon' => __( 'Parent Discipline:', 'wptheme.valerieknill' ),
            'edit_item'         => __( 'Edit Discipline', 'wptheme.valerieknill' ),
            'update_item'       => __( 'Update Discipline', 'wptheme.valerieknill' ),
            'add_new_item'      => __( 'Add New Discipline', 'wptheme.valerieknill' ),
            'new_item_name'     => __( 'New Discipline Name', 'wptheme.valerieknill' ),
            'menu_name'         => __( 'Discipline', 'wptheme.valerieknill' ),
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
            'page',
            'post'
        ];
    }
}
