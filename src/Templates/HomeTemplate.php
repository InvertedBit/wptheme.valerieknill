<?php
namespace AlexScherer\WpthemeValerieknill\Templates;

use AlexScherer\WpthemeValerieknill\Components\FooterComponent;
use AlexScherer\WpthemeValerieknill\Components\HeaderComponent;
use AlexScherer\WpthemeValerieknill\Components\NavigationComponent;

class HomeTemplate extends BaseTemplate {

    public function __construct($parameters) {
        parent::__construct('Home', 'green', $parameters);
    }

    protected function prepareComponents()
    {
        $this->addComponent(new HeaderComponent());
        $this->addComponent(new NavigationComponent(2));
        $this->addComponent(new FooterComponent());
    }
}