<?php
namespace AlexScherer\WpthemeValerieknill\Data;

use WP_Query;

class PostTypeDataSource extends BaseIterativeDataSource {
    public function __construct($parameters = []) {
        parent::__construct('PostType', $parameters);
        $this->initialize();
    }

    protected array $terms = [];

    protected $totalPages = 1;

    protected $currentPage = 1;

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


        if (!empty($this->parameters['pagination']) &&
            $this->parameters['pagination']['enabled']) {
            $args['posts_per_page'] = $this->parameters['pagination']['postsPerPage'];
            $args['paged'] = $this->parameters['pagination']['currentPage'];
            $this->currentPage = $this->parameters['pagination']['currentPage'];
        } else {
            $args['nopaging'] = true;
        }


        if (!empty($this->parameters['count'])) {
            $args['posts_per_page'] = $this->parameters['count'];
            $args['nopaging'] = false;
        }

        $query = new WP_Query($args);

        $this->totalPages = $query->max_num_pages;
        //die(print_r($this->totalPages, 1));

        $posts = $query->posts;

        $this->items = [];

        foreach ($posts as $post) {
            $parameters = $this->parameters;
            $parameters['item'] = $post;
            $this->items[] = new GeneralPostDataSource($parameters);
        }
    }

    public function getTotalPages() {
        return $this->totalPages;
    }

    public function getCurrentPage() {
        return $this->currentPage;
    }
}
