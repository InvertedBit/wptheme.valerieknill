<?php
namespace AlexScherer\WpthemeValerieknill\Components;

class GalleryComponent extends BaseViewComponent {

    public function __construct($data = []) {
        parent::__construct('Title', $data);
        $this->initialize();
    }

    
    protected function initialize() {
        $this->data['title'] = $this->getField('title');

        $this->data['layout'] = $this->getField('layout');
        $this->data['subtitle'] = $this->getField('subtitle');
        $this->data['introduction'] = $this->getField('introduction');
        
    }

    public function isValid() {
        if (empty($this->data['title'])) {
            return false;
        }
        return true;
    }

}

