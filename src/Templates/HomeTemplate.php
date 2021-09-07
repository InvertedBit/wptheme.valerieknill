<?php
namespace AlexScherer\WpthemeValerieknill\Templates;

use AlexScherer\WpthemeValerieknill\Components\FooterComponent;
use AlexScherer\WpthemeValerieknill\Components\NavigationComponent;
use AlexScherer\WpthemeValerieknill\Components\SliderHeaderComponent;

class HomeTemplate extends BaseTemplate {

    public function __construct($parameters) {
        parent::__construct('Home', 'green', $parameters);
    }

    protected function prepareComponents()
    {
        $this->addComponent(new SliderHeaderComponent());
        $this->addComponent(new NavigationComponent(['menuLocation' => 'main-menu-painting']));
        $this->addComponent(new FooterComponent());
    }
}
