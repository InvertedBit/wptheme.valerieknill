<?php
namespace AlexScherer\WpthemeValerieknill\Templates;

use AlexScherer\WpthemeValerieknill\Components\FooterComponent;
use AlexScherer\WpthemeValerieknill\Components\NavigationComponent;
use AlexScherer\WpthemeValerieknill\Components\SliderHeaderComponent;
use AlexScherer\WpthemeValerieknill\Components\VideoHeaderComponent;

class HomeTemplate extends BaseTemplate {

    public function __construct($parameters) {
        parent::__construct('Home', $parameters);
    }

    protected function prepareComponents()
    {

        if ($this->discipline === 'painting') {
            $this->addComponent(new SliderHeaderComponent());
        } else {
            $this->addComponent(new VideoHeaderComponent()); 
        }
        $this->addComponent(new NavigationComponent(['menuLocation' => 'main-menu-painting']));
        $this->addComponent(new FooterComponent());
    }
}
