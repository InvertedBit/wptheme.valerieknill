<?php
namespace AlexScherer\WpthemeValerieknill\Templates;

use AlexScherer\WpthemeValerieknill\Data\GeneralPostDataSource;
use WP_Query;

class SingleNewsTemplate extends BaseTemplate {

    public function __construct($parameters) {
        parent::__construct('NewsPost', $parameters);
    }

    protected function prepareComponents()
    {
        $dataSource = new GeneralPostDataSource([
            'id' => get_the_ID()
        ]);

        $currentNewsPageQuery = new WP_Query([
            'post_type' => 'page',
            'meta_key' => '_wp_page_template',
            'meta_value' => 'page_news.php',
            'tax_query' => [
                [
                    'taxonomy' => 'discipline',
                    'field' => 'slug',
                    'terms' => $this->discipline
                ]
            ]
        ]);

        $newsPageDataSource = false;
        $parent = false;

        if (!empty($currentNewsPageQuery->posts)) {
            $parent = $currentNewsPageQuery->posts[0];
            $newsPageDataSource = new GeneralPostDataSource([
                'item' => $currentNewsPageQuery->posts[0]
            ]);
        }


        $currentPage = get_query_var('n', 1);
        $enablePagination = $newsPageDataSource->enable_pagination;
        $postsPerPage = $newsPageDataSource->posts_per_page;

        $paginationOptions = [
            'enabled' => $enablePagination,
            'postsPerPage' => $postsPerPage,
            'currentPage' => $currentPage
        ];



        //$debug = '<pre>';

        //$debug .= print_r($newsPageDataSource->, 1);

        //$debug .= '</pre>';

        //die($debug);


        $this->addComponent('SlimHeaderComponent', [
            'datasource' => $newsPageDataSource
        ]);
        $this->addComponent('NavigationComponent', [
            'menuLocation' => 'main-menu'
        ]);

        $topComponents = [];

        $topComponents[] = [
            'name' => 'BreadcrumbComponent',
            'arguments' => [
                'parent' => $parent
            ]
        ];

        $topComponents[] = [
            'name' => 'TitleComponent',
            'arguments' => [
                'datasource' => $dataSource,
                'fields' => [
                    'title' => 'post_title'
                ]
            ]
        ];

        $postViewComponentArguments = [
            'datasource' => $dataSource,
            'format' => 'full',
            'links' => false,
            'omitFields' => [
                'post_title'
            ]
        ];
        if ($newsPageDataSource->override_about_page) {
            $postViewComponentArguments['author_page_link'] = $newsPageDataSource->about_page_link;
        }

        $topComponents[] = [
            'name' => 'PostViewComponent',
            'arguments' => $postViewComponentArguments
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


        //$mainComponents[] = [
            //'name' => 'PostListComponent',
            //'arguments' => [
                //'datasource' => $newsPostTypeDataSource,
                //'childComponent' => [
                    //'name' => 'PostViewComponent',
                    //'arguments' => $postViewComponentArguments
                //],
                //'pagination' => $paginationOptions
            //]
        //];

        $mainComponents[] = [
            'name' => 'CommentListComponent',
            'arguments' => [
                'datasource' => $dataSource,
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
