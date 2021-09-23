<?php
namespace AlexScherer\WpthemeValerieknill\Data;

class ProjectPostDataSource extends PostDataSource {
    public function __construct($parameters = []) {
        parent::__construct('ProjectPost', $parameters);
    }

    protected function loadData()
    {
        if (!empty($this->parameters['item'])) {
            $this->item = $this->parameters['item'];
            return;
        }
        if (!empty($this->parameters['id'])) {
            $post = get_post($this->parameters['id']);
            if ($post) {
                $this->item = $post;
            }
        }
    }
}
