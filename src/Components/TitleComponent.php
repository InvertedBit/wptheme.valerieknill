<?php
namespace AlexScherer\WpthemeValerieknill\Components;

class TitleComponent extends BaseViewComponent {

    public function __construct() {
        parent::__construct('Title', []);
        $this->initialize();
    }

    
    protected function initialize() {
        $currentPostId = get_the_ID();
        $this->data['title'] = get_field('title', $currentPostId);

        $this->data['layout'] = get_field('layout', $currentPostId);
        $this->data['subtitle'] = get_field('subtitle', $currentPostId);
        $this->data['introduction'] = get_field('introduction', $currentPostId);
        
    }

    public function isValid() {
        if (empty($this->data['title'])) {
            return false;
        }
        return true;
    }

}
