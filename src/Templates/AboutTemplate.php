<?php
namespace AlexScherer\WpthemeValerieknill\Templates;

use AlexScherer\WpthemeValerieknill\Components\FooterComponent;
use AlexScherer\WpthemeValerieknill\Components\NavigationComponent;
use AlexScherer\WpthemeValerieknill\Components\SlimHeaderComponent;

class AboutTemplate extends BaseTemplate {

    public function __construct($parameters) {
        parent::__construct('About', $parameters);
    }

    protected function prepareComponents()
    {

        $this->addComponent(new SlimHeaderComponent());
        $this->addComponent(new NavigationComponent(['menuLocation' => 'main-menu-' . $this->discipline]));
        $this->addComponent(new FooterComponent());
    }
}
