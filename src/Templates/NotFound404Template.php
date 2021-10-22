<?php
namespace AlexScherer\WpthemeValerieknill\Templates;

use AlexScherer\WpthemeValerieknill\Data\OptionsDataSource;

class NotFound404Template extends BaseTemplate {

    public function __construct($parameters) {
        parent::__construct('NotFound404', $parameters);
    }

    protected function prepareComponents()
    {
        $optionsDataSource = new OptionsDataSource();


        $this->addComponent('SlimHeaderComponent', [
            'datasource' => $optionsDataSource,
            'fields' => [
                'header_image' => 'header_image_404'
            ]
        ]);
        //$this->addComponent('NavigationComponent', [
            //'menuLocation' => 'main-menu'
        //]);

        $topComponents = [];

        $topComponents[] = [
            'name' => 'BreadcrumbComponent',
            'arguments' => [
                'current_title_override' => '404'
            ]
        ];

        $topComponents[] = [
            'name' => 'TitleComponent',
            'arguments' => [
                'title' => __('404: Page not found!')
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
        $siteUrl = home_url();
        if (function_exists('pll_home_url')) {
            $siteUrl = pll_home_url();
        }

        $mainComponents[] = [
            'name' => 'RedirectComponent',
            'arguments' => [
                'link' => $siteUrl,
                'time' => 10
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
