<?php
namespace AlexScherer\WpthemeValerieknill\Templates;

use AlexScherer\WpthemeValerieknill\Data\GeneralPostDataSource;
use AlexScherer\WpthemeValerieknill\Data\TaxonomyDataSource;
use AlexScherer\WpthemeValerieknill\Data\TermDataSource;
use WP_Query;

class GalleryTemplate extends BaseTemplate {

    public function __construct($parameters) {
        parent::__construct('Gallery', $parameters);
    }

    protected function prepareComponents()
    {
        $headerArguments = [];
        $parent = false;
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


            $currentGalleryPageQuery = new WP_Query([
                'post_type' => 'page',
                'meta_key' => '_wp_page_template',
                'meta_value' => 'page_gallery.php',
                'tax_query' => [
                    [
                        'taxonomy' => 'discipline',
                        'field' => 'slug',
                        'terms' => $this->discipline
                    ]
                ]
            ]);


            if (!empty($currentGalleryPageQuery->posts)) {
                $parent = $currentGalleryPageQuery->posts[0];
            }



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

        $breadcrumbArguments = [];
        if ($parent) {
            $breadcrumbArguments['parent'] = $parent;
        }


        $mainSectionComponents = [];

        $mainSectionComponents[] = [
            'name' => 'BreadcrumbComponent',
            'arguments' => $breadcrumbArguments
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
                            ],
                            'cols' => [
                                's' => 1,
                                'm' => 2
                            ],
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

