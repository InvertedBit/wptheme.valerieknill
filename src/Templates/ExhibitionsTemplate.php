<?php
namespace AlexScherer\WpthemeValerieknill\Templates;

use AlexScherer\WpthemeValerieknill\Components\FooterComponent;
use AlexScherer\WpthemeValerieknill\Components\NavigationComponent;
use AlexScherer\WpthemeValerieknill\Components\SlimHeaderComponent;

class ExhibitionsTemplate extends BaseTemplate {

    public function __construct($parameters) {
        parent::__construct('Exhibitions', $parameters);
    }

    protected function prepareComponents()
    {

        $this->addComponent(new SlimHeaderComponent());
        $this->addComponent(new NavigationComponent(['menuLocation' => 'main-menu-painting']));
        $this->addComponent(new FooterComponent());
    }
}


