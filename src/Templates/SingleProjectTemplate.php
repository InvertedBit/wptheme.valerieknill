<?php
namespace AlexScherer\WpthemeValerieknill\Templates;

use AlexScherer\WpthemeValerieknill\Data\RepeaterDataSource;

class SingleProjectTemplate extends BaseTemplate {

    public function __construct($parameters) {
        parent::__construct('Projects', $parameters);
    }

    protected function prepareComponents()
    {
        $headerArguments = [
            'field_overrides' => [
                'header_image' => [
                    'field' => 'archive_project_header_image',
                    'id' => 'option',
                    'fallback' => true
                ]
            ]
        ];


        $this->addComponent('SlimHeaderComponent', $headerArguments);
        $this->addComponent('NavigationComponent', [
            'menuLocation' => 'main-menu'
        ]);


        $mainSectionComponents = [];

        $mainSectionComponents[] = [
            'name' => 'GridComponent',
            'arguments' => [
                'datasource' => new RepeaterDataSource([
                    'field' => 'awards',
                    'source' => get_the_ID(),
                    'displayConditions' => [
                        'show_in_project'
                    ]
                ]),
                'childComponent' => [
                    'name' => 'PlaqueCardComponent',
                    'arguments' => [
                        'displayConditions' => [
                            'show_in_project'
                        ]
                    ]
                ],
                'cols' => [
                    'xs' => 1,
                    's' => 2,
                    'm' => 3
                ]
            ]
        ];


        $this->addComponent('SectionComponent', [
            'style' => 'secondary',
            'components' => $mainSectionComponents
        ]);
        $this->addComponent('FooterComponent');
    }
}
