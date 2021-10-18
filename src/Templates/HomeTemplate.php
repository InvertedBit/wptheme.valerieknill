<?php
namespace AlexScherer\WpthemeValerieknill\Templates;

use AlexScherer\WpthemeValerieknill\Data\GeneralPostDataSource;
use AlexScherer\WpthemeValerieknill\Data\PostTypeDataSource;

class HomeTemplate extends BaseTemplate {

    public function __construct($parameters) {
        parent::__construct('Home', $parameters);
    }

    protected function prepareComponents()
    {

        $dataSource = new GeneralPostDataSource([
            'id' => get_the_ID()
        ]);

        //echo '<pre>';
        //print_r($this->disciplineTerm);
        //echo '</pre>';

        $newsPostTypeDataSource = new PostTypeDataSource([
            'post_type' => 'news',
            'taxonomies' => [
                'discipline' => $this->disciplineTerm->slug
            ],
            'count' => 1
        ]);

        if ($this->discipline === 'painting') {
            $this->addComponent('SliderHeaderComponent', [
                'datasource' => $dataSource
            ]);
        } else {
            $this->addComponent('VideoHeaderComponent', [
                'datasource' => $dataSource
            ]);
        }
        $this->addComponent('NavigationComponent', [
            'menuLocation' => 'main-menu'
        ]);
        $mainContainerComponents = [];
        $mainContainerComponents[] = [
            'name' => 'TitleComponent',
            'arguments' => [
                'datasource' => $dataSource
            ]
        ];
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
                        'components' => $mainContainerComponents
                    ]
                ]
            ]
        ]);

        $newsContainerComponents = [];

        $postViewComponentArguments = [
            'format' => 'excerpt',
            'links' => true
        ];



        //$postViewComponentArguments['author_page_link'] = $authorPageOverride;

        $newsContainerComponents[] = [
            'name' => 'PostListComponent',
            'arguments' => [
                'datasource' => $newsPostTypeDataSource,
                'childComponent' => [
                    'name' => 'PostViewComponent',
                    'arguments' => $postViewComponentArguments
                ],
                'pagination' => [
                    'enabled' => false
                ]
            ]
        ];


        $this->addComponent('SectionComponent', [
            'style' => [
                'section' => [
                    'primary'
                ]
            ],
            'components' => [
                [
                    'name' => 'ContainerComponent',
                    'arguments' => [
                        'components' => $newsContainerComponents
                    ]
                ]
            ]
        ]);

        $this->addComponent('FooterComponent');
    }
}
