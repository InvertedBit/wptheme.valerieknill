<?php
namespace AlexScherer\WpthemeValerieknill\Components;

abstract class HeaderComponent extends BaseViewComponent {

    public function __construct($name, $data = []) {
        parent::__construct($name, $data);
        $this->initializeHeader();
    }

    protected function initializeHeader() {
        $language = 'de';
        if (function_exists('pll_current_language')) {
            $language = pll_current_language('slug');
        }
        //$this->debug($this->data['discipline']);
        $homepages = $this->getField('homepages', 'option');
        //$this->debug($homepages);
        $this->data['home_link'] = '#';
        $this->data['blog_title'] = get_bloginfo('name');
        $this->data['blog_subtitle'] = '';
        if (!empty($this->data['discipline'])) {
            foreach ($homepages as $homepage) {
                if ($homepage['name'] === $this->data['discipline'] . '-' . $language) {
                    $this->data['home_link'] = $homepage['page_link'];
                    break;
                }
            }

            if ($this->data['discipline'] === 'painting') {
                $this->data['blog_subtitle'] = _x('Painting', 'Header Subtitle Painting');
            } elseif ($this->data['discipline'] === 'film') {
                $this->data['blog_subtitle'] = _x('Film', 'Header Subtitle Movies');
            }
        }
    }

    public function preRender() {
        parent::preRender();
        $this->includeView('Header');
    }
}
