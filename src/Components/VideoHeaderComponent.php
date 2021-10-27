<?php
namespace AlexScherer\WpthemeValerieknill\Components;

class VideoHeaderComponent extends HeaderComponent {

    public function __construct($data = []) {
        parent::__construct('VideoHeader', $data);
    }

    protected function initializeFields()
    {
        $this->fields = [
            'header_video'
        ];
    }
    
    public function isValid() {
        if (empty($this->data['header_video'])) {
            return false;
        }
        return true;
    }
}

