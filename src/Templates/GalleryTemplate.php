<?php
namespace AlexScherer\WpthemeValerieknill\Templates;

class GalleryTemplate extends BaseTemplate {

    public function __construct($parameters) {
        parent::__construct('Gallery', $parameters);
    }

    protected function prepareComponents()
    {

        $this->addComponent('SlimHeaderComponent');
        $this->addComponent('NavigationComponent', [
            'menuLocation' => 'main-menu'
        ]);
        $this->addComponent('SectionComponent', [
            'style' => 'secondary',
            'components' => [
                [
                    'name' => 'TaxonomyGridComponent',
                    'arguments' => [
                        'taxonomy' => 'series',
                        'filter' => false
                    ]
                ]
            ]
        ]);
        $this->addComponent('FooterComponent');
    }
}

