<?php
namespace AlexScherer\WpthemeValerieknill\Components;

class LandingpageComponent extends HeaderComponent {

    public function __construct($parameters = []) {
        parent::__construct('Landingpage', $parameters);
        $this->initialize();
    }

    protected function initializeFields()
    {
        $this->fields = [
            'title',
            'links'
        ];
    }
    
    protected function initialize() {
        $links = $this->data['links'];

        $this->data['link_left'] = $links[0];
        $this->data['link_right'] = $links[1];
        //if (empty($this->data['link_left']['image_po
    }

    public function isValid() {
        if (empty($this->data['link_left']) ||
            empty($this->data['link_right']) ||
            empty($this->data['title'])) {
            return false;
        }
        return true;
    }
}

