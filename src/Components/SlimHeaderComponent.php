<?php
namespace AlexScherer\WpthemeValerieknill\Components;

class SlimHeaderComponent extends HeaderComponent {

    public function __construct() {
        parent::__construct('SlimHeader', []);
        $this->initialize();
    }

    
    protected function initialize() {
        $currentPostId = get_the_ID();
        $headerImage = get_field('header_image', $currentPostId);
        $this->data['header_image'] = $headerImage;
    }

}


