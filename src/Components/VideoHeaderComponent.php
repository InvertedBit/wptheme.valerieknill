<?php
namespace AlexScherer\WpthemeValerieknill\Components;

class VideoHeaderComponent extends HeaderComponent {

    public function __construct() {
        parent::__construct('SliderHeader', []);
        $this->initialize();
    }

    
    protected function initialize() {
        $currentPostId = get_the_ID();
        $headerVideo = get_field('header_video', $currentPostId);
        $this->data['header_video'] = $headerVideo;
    }

}

