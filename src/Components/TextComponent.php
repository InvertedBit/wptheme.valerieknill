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

    protected function initializeFields() {
        $this->fields = [
            'text'
        ];
    }

    protected function initialize() {
        if (!empty($this->data['text'])) {
            $this->data['text'] = do_shortcode($this->data['text']);
        }
    }
    
    public function isValid() {
        if (empty($this->data['text'])) {
            return false;
        }
        return true;
    }

}
