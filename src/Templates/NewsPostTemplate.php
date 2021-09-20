<?php
namespace AlexScherer\WpthemeValerieknill\Templates;

class NewsPostTemplate extends BaseTemplate {

    public function __construct($parameters) {
        parent::__construct('NewsPost', $parameters);
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
