<?php
namespace AlexScherer\WpthemeValerieknill\Templates;

class AboutTemplate extends BaseTemplate {

    public function __construct($parameters) {
        parent::__construct('About', $parameters);
    }

    protected function prepareComponents()
    {

        $this->addComponent('SlimHeaderComponent');
        $this->addComponent('NavigationComponent', [
            'menuLocation' => 'main-menu'
        ]);
        $this->addComponent('FooterComponent');
    }
}
