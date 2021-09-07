<?php
namespace AlexScherer\WpthemeValerieknill\Templates;

use AlexScherer\WpthemeValerieknill\Components\LandingpageComponent;

class LandingpageTemplate extends BaseTemplate {

    public function __construct($parameters) {
        parent::__construct('Landingpage', 'green', $parameters);
    }

    protected function prepareComponents()
    {
        $this->addComponent(new LandingpageComponent());
    }
}

