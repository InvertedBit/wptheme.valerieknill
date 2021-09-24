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


        $topSectionComponents = [];


        $this->addComponent('SectionComponent', [
            'style' => 'secondary',
            'components' => $topSectionComponents
        ]);


        $mainSectionComponents = [];


        $awardsGridComponents = [];

        $awardsGridComponents[] = [
            'name' => 'GridComponent',
            'arguments' => [
                'title' => __('Awards', 'wptheme.valerieknill'),
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

        $awardsGridComponents[] = [
            'name' => 'TableComponent',
            'arguments' => [
                'title' => __('Specifications', 'wptheme.valerieknill'),
                'datasource' => new RepeaterDataSource([
                    'field' => 'specifications',
                    'source' => get_the_ID()
                ]),
                'fields' => [
                    'role',
                    'name'
                ],
                'heading-col' => 'role',
                'style' => [
                    'divider',
                    'heading-vertical'
                ]
            ]
        ];


        $mainSectionComponents[] = [
            'name' => 'GridComponent',
            'arguments' => [
                'components' => $awardsGridComponents,
                'cols' => [
                    's' => 1,
                    'm' => 2
                ],
                'container' => true,
                'div-options' => [
                    'Table' => [
                        'flex' => [
                            'first@s',
                            'last@m'
                        ]
                    ]
                ]
            ]
        ];






        $this->addComponent('SectionComponent', [
            'style' => 'primary',
            'components' => $mainSectionComponents
        ]);

        $reviewSectionComponents = [];



        $this->addComponent('SectionComponent', [
            'style' => 'secondary',
            'components' => $reviewSectionComponents
        ]);


        $festivalSectionComponents = [];


        $festivalSectionComponents[] = [
            'name' => 'GridComponent',
            'arguments' => [
                'title' => __('Festivals', 'wptheme.valerieknill'),
                'datasource' => new RepeaterDataSource([
                    'field' => 'festivals',
                    'source' => get_the_ID()
                ]),
                'childComponent' => [
                    'name' => 'PlaqueCardComponent',
                    'arguments' => []
                ],
                'container' => true,
                'cols' => [
                    'xs' => 1,
                    's' => 2,
                    'm' => 3
                ]
            ]
        ];


        $this->addComponent('SectionComponent', [
            'style' => 'primary',
            'components' => $festivalSectionComponents
        ]);



        $this->addComponent('FooterComponent');
    }
}
