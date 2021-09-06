<?php
namespace AlexScherer\WpthemeValerieknill\Components;

class HeaderComponent extends BaseViewComponent {

    public function __construct() {
        parent::__construct('Header', []);
        $this->initialize();
    }

    
    protected function initialize() {
        $currentPostId = get_the_ID();
        $headerImages = get_field('header_images', $currentPostId);
        //$this->debug($headerImages);
        $imageArray = [];
        foreach($headerImages as $image) {
            $newImg = $image['image']['url'];
            $imageArray[] = $newImg;
        }
        $this->data['images'] = $imageArray;
    }

}
