<?php
namespace AlexScherer\WpthemeValerieknill\Data;

abstract class PostDataSource extends BaseDataSource {
    public function __construct($name, $parameters = []) {
        parent::__construct($name, $parameters);
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
                $terms = wp_get_post_terms($this->item->ID, $taxonomy, $args);
                $this->terms[$taxonomy] = $terms;
            }
        }
    }

    protected function getField($name) {
        if (function_exists('get_field')) {
            return get_field($name, $this->item->ID);
        }
    }

    protected function getFromItem(string $name)
    {
        //echo '<pre>';
        //print_r($this);
        //print_r($name);
        //echo '</pre>';
        if (property_exists($this, $name)) {
            return $this->$name;
        } elseif (property_exists($this->item, $name)) {
            return $this->item->$name;
        } else {
            return $this->getField($name);
        }
        return null;
    }
}
