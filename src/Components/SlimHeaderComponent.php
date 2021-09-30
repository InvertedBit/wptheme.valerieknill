<?php
namespace AlexScherer\WpthemeValerieknill\Components;

class SlimHeaderComponent extends HeaderComponent {

    public function __construct($data = []) {
        parent::__construct('SlimHeader', $data);
    }

    protected function initializeFields()
    {
        $this->fields = [
            'header_image'
        ];
    }
    
    public function isValid() {
        if (empty($this->data['header_image'])) {
            return false;
        }
        return true;
    }
}


