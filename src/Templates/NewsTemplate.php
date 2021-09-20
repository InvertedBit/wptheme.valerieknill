<?php
namespace AlexScherer\WpthemeValerieknill\Templates;

class NewsTemplate extends BaseTemplate {

    public function __construct($parameters) {
        parent::__construct('News', $parameters);
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
