<?php
namespace AlexScherer\WpthemeValerieknill\Components;

abstract class HeaderComponent extends BaseViewComponent {

    public function __construct($name, $data = []) {
        parent::__construct($name, $data);
        $this->initializeHeader();
    }

    protected function initializeHeader() {
        $language = pll_current_language('slug');
        //$this->debug($language);
        $homepages = get_field('homepages', 'option');
        //$this->debug($homepages);
        $this->data['home_link'] = '#';
        foreach ($homepages as $homepage) {
            if ($homepage['name'] === $this->data['discipline'] . '-' . $language) {
                $this->data['home_link'] = $homepage['page_link'];
                break;
            }
        }
    }

    public function preRender() {
        parent::preRender();
        $this->includeView('Header');
    }
}
