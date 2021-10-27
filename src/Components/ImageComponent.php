<?php
namespace AlexScherer\WpthemeValerieknill\Components;

use AlexScherer\WpthemeValerieknill\Data\BaseDataSource;

class ImageComponent extends BaseViewComponent {

    protected const DATASOURCE_BASECLASS = 'AlexScherer\\WpthemeValerieknill\\Data\\BaseDataSource';
    
    protected BaseDataSource $dataSource;

    public function __construct($data = []) {
        parent::__construct('Image', $data);
    }

    protected function initializeFields() {
        $this->fields = [
            'image'
        ];
    }
    
    public function isValid() {
        if (empty($this->data['image'])) {
            return false;
        }
        return true;
    }

}
