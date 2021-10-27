<?php
namespace AlexScherer\WpthemeValerieknill\Components;

class FooterComponent extends BaseViewComponent {

    public function __construct($data = []) {
        parent::__construct('Footer', $data);
        $this->initialize();
    }

    protected function initializeFields()
    {
        $this->fields = [];
    }

    protected function initialize() {
        $locations = get_nav_menu_locations();
        $actualLocation = 'footer-menu';
        $menuId = $locations[$actualLocation];

        $wpMenu = wp_get_nav_menu_items($menuId);


        if (empty($wpMenu)) {
            $this->debug('No menu at location "'.$actualLocation.'"');
            $this->data['items'] = [];
            return;
        }

        $navigationItems = [];
        foreach ($wpMenu as $menuPost) {
            $item = [
                'id' => $menuPost->ID,
                'title' => $menuPost->title,
                'url' => $menuPost->url,
                'discipline' => $this->data['discipline']
            ];
            $navigationItems[] = $item;
        }
        $this->data['items'] = $navigationItems;
    }

    public function isValid() {
        return true;
    }
}
