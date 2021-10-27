<?php
namespace AlexScherer\WpthemeValerieknill\Components;


class TitleComponent extends BaseViewComponent {

    public function __construct($data = []) {
        parent::__construct('Title', $data);
        $this->initialize();
    }

    protected function initializeFields()
    {
        $this->fields = [
            'title',
            'layout',
            'subtitle',
            'introduction'
        ];
    }
    
    protected function initialize() {
        if ($this->hasDataSource()) {
            foreach ($this->fields as $field) {
                $this->data[$field] = $this->dataSource->{$this->getFieldName($field)};
            }
        }
    }

    public function isValid() {
        if (empty($this->data['title'])) {
            return false;
        }
        return true;
    }

}
