<?php
namespace AlexScherer\WpthemeValerieknill\Components;

class SlimHeaderComponent extends HeaderComponent {

    public function __construct($data = []) {
        parent::__construct('SlimHeader', $data);
        $this->initialize();
    }

    
    protected function initialize() {
        $this->data['header_image'] = $this->getField('header_image');
    }

    public function isValid() {
        if (empty($this->data['header_image'])) {
            return false;
        }
        return true;
    }
}


