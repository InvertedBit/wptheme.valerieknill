<?php
namespace AlexScherer\WpthemeValerieknill\Templates;

use AlexScherer\WpthemeValerieknill\Data\GeneralPostDataSource;

class SimplePageTemplate extends BaseTemplate {

    public function __construct($parameters) {
        parent::__construct('SimplePage', $parameters);
    }

    protected function prepareComponents()
    {
        $postDataSource = new GeneralPostDataSource([
            'id' => get_the_ID()
        ]);

        $this->addComponent('SlimHeaderComponent', [
            'datasource' => $postDataSource
        ]);
        $this->addComponent('NavigationComponent', [
            'menuLocation' => 'main-menu'
        ]);

        $mainSectionComponents = [];

        $mainSectionComponents[] = [
            'name' => 'BreadcrumbComponent',
            'arguments' => [
            ]
        ];

        $mainSectionComponents[] = [
            'name' => 'TitleComponent',
            'arguments' => [
                'datasource' => $postDataSource
            ]
        ];


        $mainSectionComponents[] = [
            'name' => 'TextComponent',
            'arguments' => [
                'datasource' => $postDataSource,
                'fields' => [
                    'text' => 'post_content'
                ]
            ]
        ];


        $mainSectionContainer = [
            [
                'name' => 'ContainerComponent',
                'arguments' => [
                    'components' => $mainSectionComponents
                ]
            ]
        ];

        $this->addComponent('SectionComponent', [
            'style' => [
                'section' => [
                    'secondary'
                ]
            ],
            'components' => $mainSectionContainer
        ]);


        $this->addComponent('FooterComponent');
    }
}
