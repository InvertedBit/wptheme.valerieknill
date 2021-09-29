<?php
namespace AlexScherer\WpthemeValerieknill\Components;

use AlexScherer\WpthemeValerieknill\Data\BaseDataSource;

class ProjectCardComponent extends BaseCardComponent {

    public function __construct(BaseDataSource $dataSource, $data = []) {
        parent::__construct('ProjectCard', $dataSource, $data);
        $this->initialize();
    }

    protected function initializeFields()
    {
        $this->fields = [];
    }

    
    protected function initialize() {
        //$this->debug($this->dataSource->terms);
    }

    public function isValid() {
        //if (empty($this->data['entries'])) {
            //return false;
        //}
        return true;
    }

}
