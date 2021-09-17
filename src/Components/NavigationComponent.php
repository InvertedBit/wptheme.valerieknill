<?php
namespace AlexScherer\WpthemeValerieknill\Components;

class NavigationComponent extends BaseViewComponent {

    public function __construct($params) {
        parent::__construct('Navigation', $params);
        $this->initialize();
    }

    protected function initialize() {
        $disciplines = $this->getField('disciplines', 'option');
        foreach ($disciplines as $discipline) {
            if ($discipline['discipline'] !== $this->data['discipline']) {
                $this->data['otherDiscipline'] = $discipline['discipline'];
                break;
            }
        }
        $menuId = false;
        if (!empty($this->data['menuId'])) {
            $menuId = $this->data['menuId'];
        } elseif (!empty($this->data['menuLocation'])) {
            $locations = get_nav_menu_locations();
            $menuId = $locations[$this->data['menuLocation']];
        }
        $wpMenu = wp_get_nav_menu_items($menuId);
        if (empty($wpMenu)) {
            $this->debug('No menu at location "'.$this->data['menuLocation'].'"');
            $this->data['items'] = [];
            return;
        }

        $currentPostId = get_the_ID();
        $navigationItems = [];
        foreach ($wpMenu as $menuPost) {
            $item = [
                'id' => $menuPost->ID,
                'title' => $menuPost->title,
                'url' => $menuPost->url,
                'active' => false,
                'isCrosslink' => $this->getField('is_crosslink', $menuPost->ID)
            ];
            if ($menuPost->ID === $currentPostId) {
                $item['active'] = true;
            }
            $navigationItems[] = $item;
        }
        $this->data['items'] = $navigationItems;
    }
    
    public function isValid() {
        if (empty($this->data['items'])) {
            return false;
        }
        return true;
    }

}
