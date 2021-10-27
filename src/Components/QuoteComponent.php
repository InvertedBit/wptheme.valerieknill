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
        $this->fields = [
            'quote',
            'quotee',
            'sourceType',
            'sourceWeb',
            'sourcePrint'
        ];
    }
    
    protected function initialize() {
    }

    public function isValid() {
        if (empty($this->data['quote']) ||
            empty($this->data['quotee'])) {
            return false;
        }
        return true;
    }

}
