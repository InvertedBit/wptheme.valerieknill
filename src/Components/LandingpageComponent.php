<?php
namespace AlexScherer\WpthemeValerieknill\Components;

class LandingpageComponent extends HeaderComponent {

    public function __construct() {
        parent::__construct('Landingpage', []);
        $this->initialize();
    }

    
    protected function initialize() {
        $this->data['title'] = $this->getField('title');
        $links = $this->getField('links');

        $this->data['link_left'] = $links[0];
        $this->data['link_right'] = $links[1];


        $siteHost = str_replace(['http://', 'https://'], '', get_site_url());

        $this->data['paintingUrl'] = "http://painting." . $siteHost;
        $this->data['moviesUrl'] = "http://movies." . $siteHost;
        
    }

    public function isValid() {
        return true;
    }
}

