<?php
namespace AlexScherer\WpthemeValerieknill\Components;

class VideoHeaderComponent extends HeaderComponent {

    public function __construct($data = []) {
        parent::__construct('VideoHeader', $data);
        $this->initialize();
    }

    
    protected function initialize() {
        $headerVideo = $this->getField('header_video');
        $this->data['header_video'] = $headerVideo;
    }

    public function isValid() {
        if (empty($this->data['header_video'])) {
            return false;
        }
        return true;
    }
}

