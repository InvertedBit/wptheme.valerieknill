<?php
namespace AlexScherer\WpthemeValerieknill\Components;

class NavigationComponent extends BaseViewComponent {

    public function __construct($menuId) {
        parent::__construct('Navigation', [
            'menuId' => $menuId
        ]);
        $this->initialize();
    }

    protected function initialize() {
        $wpMenu = wp_get_nav_menu_items($this->data['menuId']);
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
