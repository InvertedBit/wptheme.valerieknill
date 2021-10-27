<?php
namespace AlexScherer\WpthemeValerieknill\Components;

class ContainerComponent extends BaseViewComponent {

    protected const COMPONENT_NAMESPACE = 'AlexScherer\\WpthemeValerieknill\\Components\\';
    protected const COMPONENT_BASECLASS = 'AlexScherer\\WpthemeValerieknill\\Components\\BaseComponent';

    public function __construct($data = []) {
        parent::__construct('Container', $data);
        $this->initialize();
    }

    protected function initializeFields()
    {
        $this->fields = [];
    }
    
    protected function initialize() {
        //$this->debug($this->data['cols']);
        if (!empty($this->data['components'])) {
            //$this->debug($this->data['components']);
            $this->data['children'] = $this->data['components'];
        }
        //$this->debug($this->data['div-classes']);

    }

    public function isValid() {
        if (empty($this->data['children'])) {
            return false;
        }
        return true;
    }

}
