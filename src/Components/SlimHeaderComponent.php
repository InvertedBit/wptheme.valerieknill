<?php
namespace AlexScherer\WpthemeValerieknill\Components;

class SlimHeaderComponent extends HeaderComponent {

    public function __construct($data = []) {
        parent::__construct('SlimHeader', $data);
        $this->initialize();
    }

    
    protected function initialize() {
        $imageField = 'header_image';
        $headerImage = false;
        if (!empty($this->data['field_overrides']) && !empty($this->data['field_overrides']['image'])) {
            if (is_array($this->data['field_overrides']['image'])) {
                $headerImage = $this->getField($this->data['field_overrides']['image']['field'], $this->data['field_overrides']['image']['id']);
            } else {
                $headerImage = $this->getField($this->data['field_overrides']['image']);
            }
        } else {
            $headerImage = $this->getField($imageField);
        }
        $this->data['header_image'] = $headerImage;
        //$this->debug($this->data);
    }

    public function isValid() {
        if (empty($this->data['header_image'])) {
            return false;
        }
        return true;
    }
}


