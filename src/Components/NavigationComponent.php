<?php
namespace AlexScherer\WpthemeValerieknill\Components;

class NavigationComponent extends BaseViewComponent {

    public function __construct($params) {
        parent::__construct('Navigation', $params);
        $this->initialize();
    }

    protected function initialize() {
        $menuId = false;
        if (!empty($this->data['menuId'])) {
            $menuId = $this->data['menuId'];
        } elseif (!empty($this->data['menuLocation'])) {
            $locations = get_nav_menu_locations();
            //$this->debug($locations);
            //$menu = get_term( $locations[$theme_location], 'nav_menu' );
            $menuId = $locations[$this->data['menuLocation']];
        }
        $wpMenu = wp_get_nav_menu_items($menuId);
        //$this->debug($wpMenu);
        $currentPostId = get_the_ID();
        $navigationItems = [];
        foreach ($wpMenu as $menuPost) {
            $item = [
                'id' => $menuPost->ID,
                'title' => $menuPost->title,
                'url' => $menuPost->url,
                'active' => false
            ];
            if ($menuPost->ID === $currentPostId) {
                $item['active'] = true;
            }
            $navigationItems[] = $item;
        }
        $this->data['items'] = $navigationItems;
    }
    

}
