<?php
namespace AlexScherer\WpthemeValerieknill\Components;

class BreadcrumbComponent extends BaseViewComponent {

    public function __construct($data = []) {
        parent::__construct('Breadcrumb', $data);
        $this->initialize();
    }

    
    protected function initialize() {
        $this->data['breadcrumb'] = [
            'Home' => 'http://vk.dev.hl4b.cloud/homepage_malerei',
            'Ausstellungen' => false
        ];
    }

    public function isValid() {
        if (empty($this->data['breadcrumb'])) {
            return false;
        }
        return true;
    }

}
