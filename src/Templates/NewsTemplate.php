<?php
namespace AlexScherer\WpthemeValerieknill\Templates;

use AlexScherer\WpthemeValerieknill\Data\GeneralPostDataSource;
use AlexScherer\WpthemeValerieknill\Data\PostTypeDataSource;

class NewsTemplate extends BaseTemplate {

    public function __construct($parameters) {
        parent::__construct('News', $parameters);
    }

    protected function prepareComponents()
    {
        $dataSource = new GeneralPostDataSource([
            'id' => get_the_ID()
        ]);

        $currentPage = get_query_var('n', 1);

        //$enablePagination = true;
        //$postsPerPage = 10;
        //$authorPageOverride = false;

        //if (!empty($dataSource->enable_pagination)) {
            $enablePagination = $dataSource->enable_pagination;
        //}

        //if (!empty($dataSource->posts_per_page)) {
            $postsPerPage = $dataSource->posts_per_page;
        //}

        //if ($dataSource->override_about_page) {
            $authorPageOverride = $dataSource->about_page_link;
        //}

        $paginationOptions = [
            'enabled' => $enablePagination,
            'postsPerPage' => $postsPerPage,
            'currentPage' => $currentPage
        ];

        $newsPostTypeDataSource = new PostTypeDataSource([
            'post_type' => 'news',
            'pagination' => $paginationOptions
        ]);

        $this->addComponent('SlimHeaderComponent', [
            'datasource' => $dataSource
        ]);
        $this->addComponent('NavigationComponent', [
            'menuLocation' => 'main-menu'
        ]);

        $topComponents = [];

        $topComponents[] = [
            'name' => 'BreadcrumbComponent',
            'arguments' => []
        ];

        $topComponents[] = [
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
                        'components' => $topComponents
                    ]
                ]
            ]
        ]);

        $mainComponents = [];

        $postViewComponentArguments = [
            'format' => 'excerpt'
        ];
        if ($authorPageOverride) {
            $postViewComponentArguments['author_page_link'] = $authorPageOverride;
        }

        $mainComponents[] = [
            'name' => 'PostListComponent',
            'arguments' => [
                'datasource' => $newsPostTypeDataSource,
                'childComponent' => [
                    'name' => 'PostViewComponent',
                    'arguments' => $postViewComponentArguments
                ],
                'pagination' => $paginationOptions
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
                        'components' => $mainComponents
                    ]
                ]
            ]
        ]);


        $this->addComponent('FooterComponent');
    }
}
