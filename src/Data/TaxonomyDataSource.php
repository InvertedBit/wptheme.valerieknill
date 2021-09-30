<?php
namespace AlexScherer\WpthemeValerieknill\Data;

class TaxonomyDataSource extends BaseIterativeDataSource {
    public function __construct($parameters = []) {
        parent::__construct('Taxonomy', $parameters);
        $this->initialize();
    }

    protected function initialize() {
    }


    protected function loadData()
    {
        if (empty($this->parameters['taxonomy'])) {
            return;
        }
        $args = [
            'taxonomy' => $this->parameters['taxonomy']
        ];
        $taxonomyTerms = get_terms($args);

        $this->items = [];

        foreach ($taxonomyTerms as $term) {
            $parameters = $this->parameters;
            $parameters['item'] = $term;
            $this->items[] = new TermDataSource($parameters);
        }
    }
}
