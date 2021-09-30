<?php
namespace AlexScherer\WpthemeValerieknill\Components;

use AlexScherer\WpthemeValerieknill\Data\BaseDataSource;

class ImageCardComponent extends BaseCardComponent {

    //protected BaseDataSource $dataSource;

    public function __construct(BaseDataSource $dataSource, $data = []) {
        parent::__construct('ImageCard', $dataSource, $data);
        //$this->dataSource = $dataSource;
        //$
        //$this->debug($this->data);
        //$this->debug($this->dataSource);
    }

    protected function initializeFields()
    {
        $this->fields = [
            'title',
            'image',
            'description',
            'url'
        ];
    }

    
    public function isValid() {
        //if (empty($this->data['entries'])) {
            //return false;
        //}
        return true;
    }

}
