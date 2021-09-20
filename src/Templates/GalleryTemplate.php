<?php
namespace AlexScherer\WpthemeValerieknill\Templates;

class GalleryTemplate extends BaseTemplate {

    public function __construct($parameters) {
        parent::__construct('Gallery', $parameters);
    }

    protected function prepareComponents()
    {
        $headerArguments = [];
        if (!empty($this->parameters['type']) && $this->parameters['type'] === 'taxonomy') {
            $headerArguments = [
            'field_overrides' => [
                'header_image' => [
                    'field' => 'title_image',
                    'id' => get_queried_object()
                ]
            ]
        ];

        }

        $this->addComponent('SlimHeaderComponent', $headerArguments);
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

