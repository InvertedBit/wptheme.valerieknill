<?php
namespace AlexScherer\WpthemeValerieknill\Components;

use AlexScherer\WpthemeValerieknill\Data\BaseDataSource;

class TextComponent extends BaseViewComponent {

    protected const DATASOURCE_BASECLASS = 'AlexScherer\\WpthemeValerieknill\\Data\\BaseDataSource';
    
    protected BaseDataSource $dataSource;

    public function __construct($data = []) {
        parent::__construct('Text', $data);
        $this->initialize();
    }

    
    protected function initialize() {
        if (!empty($this->data['datasource']) &&
            is_a($this->data['datasource'], TextComponent::DATASOURCE_BASECLASS)) {
            $this->dataSource = $this->data['datasource'];
            if (!isset($this->data['text']) ||
                empty($this->data['text'])) {
                $this->data['text'] = $this->dataSource->{$this->data['field']};
            }
        }
    }

    public function isValid() {
        if (empty($this->data['text'])) {
            return false;
        }
        return true;
    }

}
