<?php
namespace AlexScherer\WpthemeValerieknill\Components;

use AlexScherer\WpthemeValerieknill\Data\BaseDataSource;

class TextComponent extends BaseViewComponent {

    protected const DATASOURCE_BASECLASS = 'AlexScherer\\WpthemeValerieknill\\Data\\BaseDataSource';
    
    protected BaseDataSource $dataSource;

    public function __construct($data = []) {
        parent::__construct('Text', $data);
    }

    protected function initializeFields() {
        $this->fields = [
            'text'
        ];
    }
    
    public function isValid() {
        if (empty($this->data['text'])) {
            return false;
        }
        return true;
    }

}
