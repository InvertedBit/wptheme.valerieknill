<?php
namespace AlexScherer\WpthemeValerieknill\Templates;

use AlexScherer\WpthemeValerieknill\Data\GeneralPostDataSource;

class LandingpageTemplate extends BaseTemplate {

    public function __construct($parameters) {
        parent::__construct('Landingpage', $parameters);
    }

    protected function prepareComponents()
    {
        $this->addComponent('LandingpageComponent', [
            'datasource' => new GeneralPostDataSource([
                'id' => get_the_ID()
            ])
        ]);
    }
}

