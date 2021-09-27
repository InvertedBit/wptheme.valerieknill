<?php
namespace AlexScherer\WpthemeValerieknill\Templates;

use AlexScherer\WpthemeValerieknill\Data\ProjectPostDataSource;
use AlexScherer\WpthemeValerieknill\Data\RepeaterDataSource;

class SingleProjectTemplate extends BaseTemplate {

    public function __construct($parameters) {
        parent::__construct('Projects', $parameters);
    }

    protected function prepareComponents()
    {
        $headerArguments = [
            'field_fallback' => [
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

        $topSectionComponents[] = [
            'name' => 'BreadcrumbComponent',
            'arguments' => []
        ];

        $topSectionComponents[] = [
            'name' => 'MediaComponent',
            'arguments' => [
                'datasource' => new ProjectPostDataSource([
                    'id' => get_the_ID()
                ]),
                'field' => 'eyecatcher'
            ]
        ];



        $topSectionContainer = [
            [
                'name' => 'ContainerComponent',
                'arguments' => [
                    'components' => $topSectionComponents,
                    'customClasses' => [
                        'main-section'
                    ]
                ]
            ]
        ];

        $this->addComponent('SectionComponent', [
            'components' => $topSectionContainer,
            'style' => [
                'section' => [
                    'secondary'
                ]
            ],
            'customClasses' => [
                'trailer-section'
            ]
        ]);


        $loglineComponents = [];

        $loglineComponents[] = [
            'name' => 'TextComponent',
            'arguments' => [
                'datasource' => new ProjectPostDataSource([
                    'id' => get_the_ID()
                ]),
                'field' => 'logline',
                'customClasses' => [
                    'uk-dropcap'
                ]
            ]
        ];

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
                'options' => [
                    'divider',
                    'heading-vertical'
                ]
            ]
        ];

        $mainSectionComponents[] = [
            'name' => 'ContainerComponent',
            'arguments' => [
                'components' => $loglineComponents,
                'customClasses' => [
                    'project-logline'
                ]
            ]
        ];

        $awardsGrid[] = [
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


        $mainSectionComponents[] = [
            'name' => 'ContainerComponent',
            'arguments' => [
                'components' => $awardsGrid,
                'customClasses' => [
                    'project-details'
                ]
            ]
        ];



        $this->addComponent('SectionComponent', [
            'style' => [
                'section' => [
                    'primary'
                ]
            ],
            'components' => $mainSectionComponents
        ]);

        $reviewSectionComponents = [];



        $this->addComponent('SectionComponent', [
            'style' => [
                'section' => [
                    'secondary'
                ]
            ],
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
            'style' => [
                'section' => [
                    'primary'
                ]
            ],
            'components' => $festivalSectionComponents
        ]);



        $this->addComponent('FooterComponent');
    }
}
