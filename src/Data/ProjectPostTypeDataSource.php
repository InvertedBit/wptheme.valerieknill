<?php
namespace AlexScherer\WpthemeValerieknill\Data;

class ProjectPostTypeDataSource extends BaseIterativeDataSource {
    public function __construct($parameters = []) {
        parent::__construct('ProjectPostType', $parameters);
        $this->initialize();
    }

    protected array $terms = [];

    protected function initialize() {
        if (!empty($this->parameters['loadTerms'])) {
            $args = [];
            if (!empty($this->parameters['hideEmptyTerms'])) {
                $args['hide_empty'] = $this->parameters['hideEmptyTerms'];
            }
            foreach ($this->parameters['loadTerms'] as $taxonomy) {
                $actualArgs = $args;
                $actualArgs['taxonomy'] = $taxonomy;
                $terms = get_terms($actualArgs);
                $this->terms[$taxonomy] = $terms;
            }
        }
    }


    protected function loadData()
    {
        $args = [
            'post_type' => 'project'
        ];
        $posts = get_posts($args);

        $this->items = [];

        foreach ($posts as $post) {
            $parameters = $this->parameters;
            $parameters['item'] = $post;
            $this->items[] = new ProjectPostDataSource($parameters);
        }
    }
}
