<?php
namespace AlexScherer\WpthemeValerieknill\Data;

class PostTypeDataSource extends BaseIterativeDataSource {
    public function __construct($parameters = []) {
        parent::__construct('PostType', $parameters);
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
        if (empty($this->parameters['post_type'])) {
            return;
        }
        $args = [
            'post_type' => $this->parameters['post_type']
        ];
        $posts = get_posts($args);

        $this->items = [];

        foreach ($posts as $post) {
            $parameters = $this->parameters;
            $parameters['item'] = $post;
            $this->items[] = new GeneralPostDataSource($parameters);
        }
    }
}
