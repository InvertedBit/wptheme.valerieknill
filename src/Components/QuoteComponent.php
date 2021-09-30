<?php
namespace AlexScherer\WpthemeValerieknill\Components;

use AlexScherer\WpthemeValerieknill\Data\BaseDataSource;

class QuoteComponent extends BaseViewComponent {

    protected const DATASOURCE_BASECLASS = 'AlexScherer\\WpthemeValerieknill\\Data\\BaseDataSource';
    
    protected BaseDataSource $dataSource;

    public function __construct($data = []) {
        parent::__construct('Quote', $data);
        $this->initialize();
    }

    protected function initializeFields()
    {
        $this->fields = [];
    }
    
    protected function initialize() {
        if (!empty($this->data['datasource']) &&
            is_a($this->data['datasource'], QuoteComponent::DATASOURCE_BASECLASS)) {
            $this->dataSource = $this->data['datasource'];
            foreach ($this->data['fields'] as $name => $field) {
                if (empty($this->data[$name])) {
                    $this->data[$name] = $this->dataSource->{$field};
                }
            }
        }
    }

    public function isValid() {
        if (empty($this->data['quote']) ||
            empty($this->data['quotee'])) {
            return false;
        }
        return true;
    }

}
