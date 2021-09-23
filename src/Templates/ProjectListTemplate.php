<?php
namespace AlexScherer\WpthemeValerieknill\Templates;

use AlexScherer\WpthemeValerieknill\Data\TestIterativeDataSource;

class ProjectListTemplate extends BaseTemplate {

    public function __construct($parameters) {
        parent::__construct('Projects', $parameters);
    }

    protected function prepareComponents()
    {
        $headerArguments = [
            'field_overrides' => [
                'header_image' => [
                    'field' => 'archive_project_header_image',
                    'id' => 'option'
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
                'datasource' => new TestIterativeDataSource(),
                'childComponent' => [
                    'name' => 'ProjectCardComponent',
                    'arguments' => []
                ],
                'cols' => [
                    'xs' => 1,
                    's' => 2,
                    'm' => 3,
                    'l' => 4
                ]
            ]
        ];

        if (!empty($this->parameters['type'])) {
            if ($this->parameters['type'] === 'taxonomy') {
                $mainSectionComponents[] = [
                    'name' => 'GalleryComponent',
                    'arguments' => [
                        'term' => $this->parameters['term'],
                        'post_type' => 'image'
                    ]
                ];
                
            } elseif ($this->parameters['type'] === 'page') {
                if ($this->discipline === 'painting') {
                    $mainSectionComponents[] = [
                        'name' => 'TaxonomyGridComponent',
                        'arguments' => [
                            'taxonomy' => 'series',
                            'filter' => false
                        ]
                    ];
                }
            }

        }

        $this->addComponent('SectionComponent', [
            'style' => 'secondary',
            'components' => $mainSectionComponents
        ]);
        $this->addComponent('FooterComponent');
    }
}
