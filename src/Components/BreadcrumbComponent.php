<?php
namespace AlexScherer\WpthemeValerieknill\Components;

class BreadcrumbComponent extends BaseViewComponent {

    public function __construct($data = []) {
        parent::__construct('Breadcrumb', $data);
        $this->initialize();
    }

    protected function initializeFields()
    {
        $this->fields = [];
    }
    
    protected function initialize() {
        $language = 'de';
        if (function_exists('pll_current_language')) {
            $language = pll_current_language('slug');
        }
        $homepages = $this->getField('homepages', 'option');
        $homeLink = '#';
        foreach ($homepages as $homepage) {
            if ($homepage['name'] === $this->data['discipline'] . '-' . $language) {
                $homeLink = $homepage['page_link'];
                break;
            }
        }
        $currentPostTitle = $this->getField('title');

        $ancestors = get_post_ancestors(get_the_ID());

        $this->data['breadcrumb'] = [
            'Home' => $homeLink
        ];

        if (!empty($ancestors)) {
            foreach ($ancestors as $ancestor) {
                $title = $this->getField('title', $ancestor);
                $link = get_post_permalink($ancestor);
                $this->data['breadcrumb'][$title] = $link;
            }
        }


        $this->data['breadcrumb'][$currentPostTitle] = false;

    }

    public function isValid() {
        if (empty($this->data['breadcrumb'])) {
            return false;
        }
        return true;
    }

}
