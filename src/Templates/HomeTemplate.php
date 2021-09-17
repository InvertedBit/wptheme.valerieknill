<?php
namespace AlexScherer\WpthemeValerieknill\Templates;

use AlexScherer\WpthemeValerieknill\Components\FooterComponent;
use AlexScherer\WpthemeValerieknill\Components\NavigationComponent;
use AlexScherer\WpthemeValerieknill\Components\SectionComponent;
use AlexScherer\WpthemeValerieknill\Components\SliderHeaderComponent;
use AlexScherer\WpthemeValerieknill\Components\TitleComponent;
use AlexScherer\WpthemeValerieknill\Components\VideoHeaderComponent;

class HomeTemplate extends BaseTemplate {

    public function __construct($parameters) {
        parent::__construct('Home', $parameters);
    }

    protected function prepareComponents()
    {

        if ($this->discipline === 'painting') {
            $this->addComponent(new SliderHeaderComponent([
                'discipline' => $this->discipline
            ]));
        } else {
            $this->addComponent(new VideoHeaderComponent([
                'discipline' => $this->discipline
            ])); 
        }
        $this->addComponent(new NavigationComponent(['menuLocation' => 'main-menu-' . $this->discipline]));
        $this->addComponent(new SectionComponent([
            'components' => [
                new TitleComponent()
            ],
            'style' => 'secondary'
        ]));
        $this->addComponent(new FooterComponent());
    }
}
