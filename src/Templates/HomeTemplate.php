<?php
namespace AlexScherer\WpthemeValerieknill\Templates;


class HomeTemplate extends BaseTemplate {

    public function __construct($parameters) {
        parent::__construct('Home', $parameters);
    }

    protected function prepareComponents()
    {

        if ($this->discipline === 'painting') {
            $this->addComponent('SliderHeaderComponent');
        } else {
            $this->addComponent('VideoHeaderComponent');
        }
        $this->addComponent('NavigationComponent', [
            'menuLocation' => 'main-menu'
        ]);
        $this->addComponent('SectionComponent', [
            'style' => 'secondary',
            'components' => [
                [
                    'name' => 'TitleComponent'
                ]
            ]
        ]);
        $this->addComponent('FooterComponent');
    }
}
