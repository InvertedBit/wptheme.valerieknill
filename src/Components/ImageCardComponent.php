<?php
namespace AlexScherer\WpthemeValerieknill\Components;

use AlexScherer\WpthemeValerieknill\Data\BaseDataSource;

class ImageCardComponent extends BaseViewComponent {

    protected BaseDataSource $dataSource;

    public function __construct(BaseDataSource $dataSource, $data = []) {
        parent::__construct('ImageCard', $data);
        $this->dataSource = $dataSource;
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
