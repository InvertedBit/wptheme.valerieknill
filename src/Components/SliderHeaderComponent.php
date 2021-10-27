<?php
namespace AlexScherer\WpthemeValerieknill\Components;

class SliderHeaderComponent extends HeaderComponent {

    public function __construct($data = []) {
        parent::__construct('SliderHeader', $data);
        $this->initialize();
    }

    protected function initializeFields()
    {
        $this->fields = [
            'header_images'
        ];
    }
    
    protected function initialize() {
        if (!empty($this->data['header_images'])) {
            $imageArray = [];
            foreach($this->data['header_images'] as $image) {
                if (empty($image['image'])) {
                    continue;
                }
                $newImg = $image['image'];
                $imageArray[] = $newImg;
            }
            $this->data['images'] = $imageArray;
        }
    }

    public function isValid() {
        if (empty($this->data['images'])) {
            return false;
        }
        return true;
    }

}
