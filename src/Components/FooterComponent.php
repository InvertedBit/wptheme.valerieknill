<?php
namespace AlexScherer\WpthemeValerieknill\Components;

class FooterComponent extends BaseViewComponent {

    public function __construct() {
        parent::__construct('Footer', []);
    }

    public function isValid() {
        return true;
    }
}
