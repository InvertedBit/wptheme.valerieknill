<?php
namespace AlexScherer\WpthemeValerieknill\Templates;

use AlexScherer\WpthemeValerieknill\Data\GeneralPostDataSource;
use AlexScherer\WpthemeValerieknill\Data\PostTypeDataSource;

class ExhibitionsTemplate extends BaseTemplate {

    public function __construct($parameters) {
        parent::__construct('Exhibitions', $parameters);
    }

    protected function prepareComponents()
    {
        $currentPostDataSource = new GeneralPostDataSource([
            'id' => get_the_ID()
        ]);

        $this->addComponent('SlimHeaderComponent', [
            'datasource' => $currentPostDataSource
        ]);
        $this->addComponent('NavigationComponent', [
            'menuLocation' => 'main-menu'
        ]);

        $mainContainerComponents = [
            [
                'name' => 'BreadcrumbComponent'
            ],
            [
                'name' => 'TitleComponent',
                'arguments' => [
                    'datasource' => $currentPostDataSource
                ]
            ],
            [
                'name' => 'ExhibitionSliderComponent',
                'arguments' => [
                    'datasource' => new PostTypeDataSource([
                        'post_type' => 'exhibition'
                    ])
                    
                ]
            ]
        ];

        $mainContainer = [
            [
                'name' => 'ContainerComponent',
                'arguments' => [
                    'components' => $mainContainerComponents
                ]
            ]
        ];

        $this->addComponent('SectionComponent', [
            'style' => [
                'section' => [
                    'secondary'
                ]
            ],
            'components' => $mainContainer
        ]);

        $this->addComponent('FooterComponent');
    }
}


