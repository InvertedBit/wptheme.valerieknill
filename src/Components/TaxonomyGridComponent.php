<?php
namespace AlexScherer\WpthemeValerieknill\Components;

class TaxonomyGridComponent extends BaseViewComponent {

    public function __construct($data = []) {
        parent::__construct('TaxonomyGrid', $data);
        $this->initialize();
    }

    
    protected function initialize() {
    }

    public function isValid() {
        if (empty($this->data['title'])) {
            return false;
        }
        return true;
    }

}
