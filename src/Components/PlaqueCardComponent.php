<?php
namespace AlexScherer\WpthemeValerieknill\Components;

use AlexScherer\WpthemeValerieknill\Data\BaseDataSource;

class PlaqueCardComponent extends BaseCardComponent {

    public function __construct(BaseDataSource $dataSource, $data = []) {
        parent::__construct('PlaqueCard', $dataSource, $data);
        $this->initialize();
    }

    
    protected function initialize() {
    }

    public function isValid() {
        if (!empty($this->data['displayConditions'])) {
            foreach ($this->data['displayConditions'] as $condition) {
                if (!$this->dataSource->$condition) {
                    return false;
                }
            }
        }
        return true;
    }

}
