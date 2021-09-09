<?php
namespace AlexScherer\WpthemeValerieknill\Components;

class NewsListComponent extends BaseViewComponent {

    public function __construct($data = []) {
        parent::__construct('NewsList', $data);
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
