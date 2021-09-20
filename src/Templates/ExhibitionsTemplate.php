<?php
namespace AlexScherer\WpthemeValerieknill\Templates;

use AlexScherer\WpthemeValerieknill\Components\BreadcrumbComponent;
use AlexScherer\WpthemeValerieknill\Components\ExhibitionSliderComponent;
use AlexScherer\WpthemeValerieknill\Components\FooterComponent;
use AlexScherer\WpthemeValerieknill\Components\NavigationComponent;
use AlexScherer\WpthemeValerieknill\Components\SectionComponent;
use AlexScherer\WpthemeValerieknill\Components\SlimHeaderComponent;
use AlexScherer\WpthemeValerieknill\Components\TitleComponent;

class ExhibitionsTemplate extends BaseTemplate {

    public function __construct($parameters) {
        parent::__construct('Exhibitions', $parameters);
    }

    protected function prepareComponents()
    {

        $this->addComponent('SlimHeaderComponent');
        $this->addComponent('NavigationComponent', [
            'menuLocation' => 'main-menu'
        ]);

        $this->addComponent('SectionComponent', [
            'style' => 'secondary',
            'components' => [
                [
                    'name' => 'BreadcrumbComponent'
                ],
                [
                    'name' => 'TitleComponent'
                ],
                [
                    'name' => 'ExhibitionSliderComponent'
                ]
            ]
        ]);

        $this->addComponent('FooterComponent');
    }
}


