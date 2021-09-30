<?php
namespace AlexScherer\WpthemeValerieknill\Templates;

use AlexScherer\WpthemeValerieknill\Data\GeneralPostDataSource;

class HomeTemplate extends BaseTemplate {

    public function __construct($parameters) {
        parent::__construct('Home', $parameters);
    }

    protected function prepareComponents()
    {

        $dataSource = new GeneralPostDataSource([
            'id' => get_the_ID()
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
        $this->addComponent('SectionComponent', [
            'style' => [
                'section' => [
                    'secondary'
                ]
            ],
            'components' => [
                [
                    'name' => 'TitleComponent',
                    'arguments' => [
                        'datasource' => $dataSource
                    ]
                ]
            ]
        ]);
        $this->addComponent('FooterComponent');
    }
}
