<?php
namespace AlexScherer\WpthemeValerieknill\Templates;

use AlexScherer\WpthemeValerieknill\Data\GeneralPostDataSource;
use AlexScherer\WpthemeValerieknill\Data\TaxonomyDataSource;
use AlexScherer\WpthemeValerieknill\Data\TermDataSource;

class GalleryTemplate extends BaseTemplate {

    public function __construct($parameters) {
        parent::__construct('Gallery', $parameters);
    }

    protected function prepareComponents()
    {
        $headerArguments = [];
        if (!empty($this->parameters['type']) && $this->parameters['type'] === 'taxonomy') {
            //$headerArguments = [
            //'field_overrides' => [
                //'header_image' => [
                    //'field' => 'title_image',
                    //'id' => get_queried_object()
                //]
            //]
        //];
            $headerArguments = [
                'datasource' => new TermDataSource([
                    'item' => get_queried_object()
                ]),
                'fields' => [
                    'header_image' => 'title_image'
                ]
            ];

        } else {
            $headerArguments = [
                'datasource' => new GeneralPostDataSource([
                    'id' => get_the_ID()
                ])
            ];
        }

        $this->addComponent('SlimHeaderComponent', $headerArguments);
        $this->addComponent('NavigationComponent', [
            'menuLocation' => 'main-menu'
        ]);


        $mainSectionComponents = [];

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
                    //$mainSectionComponents[] = [
                        //'name' => 'TaxonomyGridComponent',
                        //'arguments' => [
                            //'taxonomy' => 'series',
                            //'filter' => false
                        //]
                    //];
                    $mainSectionComponents[] = [
                        'name' => 'GridComponent',
                        'arguments' => [
                            'datasource' => new TaxonomyDataSource([
                                'taxonomy' => 'series'
                            ]),
                            'childComponent' => [
                                'name' => 'ImageCardComponent',
                                'arguments' => [
                                    'fields' => [
                                        'title' => 'name',
                                        'image' => 'title_image',
                                        'url' => ['get_term_link' => 'item']
                                    ]
                                ]
                            ]
                        ]
                    ];
                }
            }

        }

        $this->addComponent('SectionComponent', [
            'style' => [
                'section' => [
                    'secondary'
                ]
            ],
            'components' => [
                [
                    'name' => 'ContainerComponent',
                    'arguments' => [
                        'components' => $mainSectionComponents
                    ]
                ]
            ]
        ]);
        $this->addComponent('FooterComponent');
    }
}

