<?php
namespace AlexScherer\WpthemeValerieknill\Components;

class LandingpageComponent extends HeaderComponent {

    public function __construct() {
        parent::__construct('Landingpage', []);
        $this->initialize();
    }

    
    protected function initialize() {
        $currentPostId = get_the_ID();
        $this->data['title'] = get_field('title', $currentPostId);
        $links = get_field('links', $currentPostId);

        $this->data['link_left'] = $links[0];
        $this->data['link_right'] = $links[1];


        $siteHost = str_replace(['http://', 'https://'], '', get_site_url());

        $this->data['paintingUrl'] = "http://painting." . $siteHost;
        $this->data['moviesUrl'] = "http://movies." . $siteHost;
        
    }

}

