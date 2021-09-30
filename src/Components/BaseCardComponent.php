<?php
namespace AlexScherer\WpthemeValerieknill\Components;

use AlexScherer\WpthemeValerieknill\Data\BaseDataSource;

abstract class BaseCardComponent extends BaseViewComponent {

    public function __construct($name, BaseDataSource $dataSource, $data = []) {
        $data['datasource'] = $dataSource;
        parent::__construct($name, $data);
    }
    
    public function isValid() {
        //if (empty($this->data['entries'])) {
            //return false;
        //}
        return true;
    }

}
