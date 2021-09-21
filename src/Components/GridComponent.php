<?php
namespace AlexScherer\WpthemeValerieknill\Components;

use AlexScherer\WpthemeValerieknill\Data\BaseIterativeDataSource;

class GridComponent extends BaseViewComponent {

    protected const COMPONENT_NAMESPACE = 'AlexScherer\\WpthemeValerieknill\\Components\\';
    protected const COMPONENT_BASECLASS = 'AlexScherer\\WpthemeValerieknill\\Components\\BaseComponent';

    protected const ITERATIVEDATASOURCE_BASECLASS = 'AlexScherer\\WpthemeValerieknill\\Data\\BaseIterativeDataSource';


    protected $childDefinition;

    protected BaseIterativeDataSource $dataSource;

    public function __construct($data = []) {
        parent::__construct('Grid', $data);
        $this->initialize();
    }

    
    protected function initialize() {
        if (empty($this->data['childComponent']) ||
            empty($this->data['datasource']) ||
            !is_a(
                $this->data['datasource'],
                GridComponent::ITERATIVEDATASOURCE_BASECLASS)) {
                return;
        }
        $this->childDefinition = $this->data['childComponent'];
        $this->dataSource = $this->data['datasource'];
        
        do {
            $this->debug($this->dataSource->parameters);
        } while ($this->dataSource->nextItem());
    }

    protected function createChildComponent($data = []) : BaseComponent {
        if (empty($this->childDefinition) || empty($this->childDefinition['name'])) {
            return false;
        }
        $fullChildClassName = GridComponent::COMPONENT_NAMESPACE . $this->childDefinition['name'];
        if (!class_exists($fullChildClassName) || !is_a($fullChildClassName, GridComponent::COMPONENT_BASECLASS)) {
            return false;
        }

        return new $fullChildClassName();
    }

    public function isValid() {
        //if (empty($this->data['entries'])) {
            //return false;
        //}
        return true;
    }

}

