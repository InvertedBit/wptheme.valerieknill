<?php
namespace AlexScherer\WpthemeValerieknill\Templates;

use AlexScherer\WpthemeValerieknill\Data\GeneralPostDataSource;
use AlexScherer\WpthemeValerieknill\Data\OptionsDataSource;

class ContactTemplate extends BaseTemplate {

    public function __construct($parameters) {
        parent::__construct('Contact', $parameters);
    }

    protected function prepareComponents()
    {
        $postDataSource = new GeneralPostDataSource([
            'id' => get_the_ID()
        ]);

        $optionsDataSource = new OptionsDataSource();
        

        $this->addComponent('SlimHeaderComponent', [
            'datasource' => $postDataSource
        ]);
        $this->addComponent('NavigationComponent', [
            'menuLocation' => 'main-menu'
        ]);

        $mainSectionComponents = [];

        $mainSectionComponents[] = [
            'name' => 'BreadcrumbComponent',
            'arguments' => [
            ]
        ];

        $mainSectionComponents[] = [
            'name' => 'TitleComponent',
            'arguments' => [
                'datasource' => $postDataSource
            ]
        ];


        $mainSectionComponents[] = [
            'name' => 'ContactFormComponent',
            'arguments' => [
                'recipient' => $optionsDataSource->contact_form_recipient_email,
                'action' => get_permalink(get_queried_object_id())
            ]
        ];


        $mainSectionContainer = [
            [
                'name' => 'ContainerComponent',
                'arguments' => [
                    'components' => $mainSectionComponents
                ]
            ]
        ];

        $this->addComponent('SectionComponent', [
            'style' => [
                'section' => [
                    'secondary'
                ]
            ],
            'components' => $mainSectionContainer
        ]);


        $this->addComponent('FooterComponent');
    }
}
