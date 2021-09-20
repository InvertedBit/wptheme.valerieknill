<?php
namespace AlexScherer\WpthemeValerieknill\Components;

class TaxonomyGridComponent extends BaseViewComponent {

    public function __construct($data = []) {
        parent::__construct('TaxonomyGrid', $data);
        $this->initialize();
    }

    
    protected function initialize() {
        $taxonomyTerms = get_terms([
            'taxonomy' => $this->data['taxonomy']
        ]);
        $this->data['entries'] = [];
        foreach($taxonomyTerms as $term) {
            if ($term->count === 0) {
                continue;
            }
            $termEntry = [
                'slug' => $term->slug,
                'title' => $term->name,
                'description' => $term->description,
                'titleImage' => $this->getField('title_image', $term),
                'url' => get_term_link($term)
            ];
            $this->data['entries'][] = $termEntry;
        }
    }

    public function isValid() {
        if (empty($this->data['entries'])) {
            return false;
        }
        return true;
    }

}
