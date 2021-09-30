<?php
namespace AlexScherer\WpthemeValerieknill\Templates;

use AlexScherer\WpthemeValerieknill\Data\GeneralPostDataSource;

class AboutTemplate extends BaseTemplate {

    public function __construct($parameters) {
        parent::__construct('About', $parameters);
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

        $mainSectionGridComponents = [];

        $mainSectionGridComponents[] = [
            'name' => 'TextComponent',
            'arguments' => [
                'datasource' => $postDataSource,
                'fields' => [
                    'text' => 'text_about'
                ]
            ]
        ];

        $mainSectionGridComponents[] = [
            'name' => 'ImageComponent',
            'arguments' => [
                'datasource' => $postDataSource
            ]
        ];

        $mainSectionComponents[] = [
            'name' => 'GridComponent',
            'arguments' => [
                'components' => $mainSectionGridComponents,
                'cols' => [
                    'xs' => 1,
                    's' => 2
                ]
            ]
        ];

        $mainSectionComponents[] = [
            'name' => 'QuoteComponent',
            'arguments' => [
                'datasource' => $postDataSource,
                'fields' => [
                    'quote' => 'quote_text',
                    'quotee' => 'quote_name'
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
