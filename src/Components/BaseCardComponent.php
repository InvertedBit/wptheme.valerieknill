<?php
namespace AlexScherer\WpthemeValerieknill\Components;

use AlexScherer\WpthemeValerieknill\Data\BaseDataSource;

abstract class BaseCardComponent extends BaseViewComponent {

    protected BaseDataSource $dataSource;

    public function __construct($name, BaseDataSource $dataSource, $data = []) {
        parent::__construct($name, $data);
        $this->dataSource = $dataSource;
    }
    
    public function isValid() {
        //if (empty($this->data['entries'])) {
            //return false;
        //}
        return true;
    }

}
