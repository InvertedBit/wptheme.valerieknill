<?php
namespace AlexScherer\WpthemeValerieknill\Components;

class HeaderComponent extends BaseViewComponent {

    public function __construct($name, $data = []) {
        parent::__construct($name, $data);
    }

    public function preRender() {
        parent::preRender();
        $this->includeView('Header');
    }
}
