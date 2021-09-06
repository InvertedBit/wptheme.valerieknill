<?php
namespace AlexScherer\WpthemeValerieknill\Taxonomies;

class DisciplineTaxonomy extends BaseTaxonomy {
    public function __construct() {
        parent::__construct('discipline');
    }

    protected function initialize() {
        $labels = array(
            'name'              => _x( 'Disciplines', 'taxonomy general name' ),
            'singular_name'     => _x( 'Discipline', 'taxonomy singular name' ),
            'search_items'      => __( 'Search Disciplines' ),
            'all_items'         => __( 'All Disciplines' ),
            'parent_item'       => __( 'Parent Discipline' ),
            'parent_item_colon' => __( 'Parent Discipline:' ),
            'edit_item'         => __( 'Edit Discipline' ),
            'update_item'       => __( 'Update Discipline' ),
            'add_new_item'      => __( 'Add New Discipline' ),
            'new_item_name'     => __( 'New Discipline Name' ),
            'menu_name'         => __( 'Discipline' ),
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
