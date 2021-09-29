<?php
namespace AlexScherer\WpthemeValerieknill\Templates;

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


