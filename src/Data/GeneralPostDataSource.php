<?php
namespace AlexScherer\WpthemeValerieknill\Data;

class GeneralPostDataSource extends PostDataSource {
    public function __construct($parameters = []) {
        parent::__construct('GeneralPost', $parameters);
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

