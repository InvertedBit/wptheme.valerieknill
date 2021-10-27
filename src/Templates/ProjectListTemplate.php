<?php
namespace AlexScherer\WpthemeValerieknill\Templates;

use AlexScherer\WpthemeValerieknill\Data\OptionsDataSource;
use AlexScherer\WpthemeValerieknill\Data\PostTypeDataSource;
use AlexScherer\WpthemeValerieknill\Data\ProjectPostTypeDataSource;

class ProjectListTemplate extends BaseTemplate {

    public function __construct($parameters) {
        parent::__construct('Projects', $parameters);
    }

    protected function prepareComponents()
    {
        $this->addComponent('SlimHeaderComponent', [
            'datasource' => new OptionsDataSource(),
            'fields' => [
                'header_image' => 'archive_project_header_image'
            ]
        ]);
        $this->addComponent('NavigationComponent', [
            'menuLocation' => 'main-menu'
        ]);


        $mainSectionComponents = [];

        $mainSectionComponents[] = [
            'name' => 'GridComponent',
            'arguments' => [
                'datasource' => new PostTypeDataSource([
                    'post_type' => 'project',
                    'loadTerms' => [
                        'role'
                    ],
                    'hideEmptyTerms' => true
                ]),
                'childComponent' => [
                    'name' => 'ProjectCardComponent',
                    'arguments' => [
                        
                    ]
                ],
                'cols' => [
                    'xs' => 1,
                    's' => 2,
                    'm' => 3
                ],
                'filter' => [
                    'mode' => 'terms',
                    'taxonomy' => 'role',
                    'hide_empty' => true
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
