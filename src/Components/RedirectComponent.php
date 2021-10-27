<?php
namespace AlexScherer\WpthemeValerieknill\Components;


class RedirectComponent extends BaseViewComponent {

    public function __construct($data = []) {
        parent::__construct('Redirect', $data);
        $this->initialize();
    }

    protected function initializeFields()
    {
        $this->fields = [
            'link',
            'time'
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
        if (empty($this->data['link'])) {
            return false;
        }
        return true;
    }

}
