<?php
namespace AlexScherer\WpthemeValerieknill\Components;

class SlimHeaderComponent extends HeaderComponent {

    public function __construct($data = []) {
        parent::__construct('SlimHeader', $data);
        $this->initialize();
    }

    
    protected function initialize() {
        $currentPostId = get_the_ID();
        $headerImage = get_field('header_image', $currentPostId);
        $this->data['header_image'] = $headerImage;
    }

}


