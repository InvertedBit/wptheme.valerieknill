<?php
namespace AlexScherer\WpthemeValerieknill\Components;

class SliderHeaderComponent extends HeaderComponent {

    public function __construct($data = []) {
        parent::__construct('SliderHeader', $data);
        $this->initialize();
    }

    
    protected function initialize() {
        $headerImages = $this->getField('header_images');
        //$this->debug($headerImages);
        $imageArray = [];
        foreach($headerImages as $image) {
            $newImg = $image['image']['url'];
            $imageArray[] = $newImg;
        }
        $this->data['images'] = $imageArray;
    }

    public function isValid() {
        if (empty($this->data['images'])) {
            return false;
        }
        return true;
    }

}
