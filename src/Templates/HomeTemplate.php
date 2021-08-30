<?php
namespace AlexScherer\WpthemeValerieknill\Templates;

use AlexScherer\WpthemeValerieknill\Components\HeaderComponent;

class HomeTemplate extends BaseTemplate {

    public function __construct() {
        parent::__construct('Home', 'green');
    }

    protected function prepareComponents()
    {
        $this->addComponent(new HeaderComponent());
    }
}