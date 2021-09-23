<?php
namespace AlexScherer\WpthemeValerieknill\Components;

use AlexScherer\WpthemeValerieknill\Data\BaseDataSource;
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
        $this->setWidthClasses();
        $this->childDefinition = $this->data['childComponent'];
        $this->dataSource = $this->data['datasource'];
        
        if ($this->dataSource->isEmpty()) {
            return;
        }


        $this->data['children'] = [];
        $childData = [];
        if (!empty($this->data['childComponent']['arguments'])) {
            $childData = $this->data['childComponent']['arguments'];
        }
        if (!empty($this->data['discipline'])) {
            $childData['discipline'] = $this->data['discipline'];
        }
        do {
            $newChild = $this->createChildComponent($this->dataSource->getItem(), $childData);
            if ($newChild) {
                $this->data['children'][] = $newChild;
            } else {
                $this->debug('child not created');
            }
        } while ($this->dataSource->nextItem());
    }

    protected function setWidthClasses() {
        $widthClass = '';
        if (!empty($this->data['cols'])) {
            $last = end($this->data['cols']);
            foreach ($this->data['cols'] as $size => $cols) {
                $widthClass .= 'uk-child-width-1-'.$cols.'@'.$size;
                if ($cols !== $last) {
                    $widthClass .= ' ';
                }
            }
        }
        $this->data['uk-child-width'] = $widthClass;
    }

    protected function createChildComponent(BaseDataSource $dataSource, $data = []) {
        if (empty($this->childDefinition) || empty($this->childDefinition['name'])) {
            return false;
        }
        $fullChildClassName = GridComponent::COMPONENT_NAMESPACE . $this->childDefinition['name'];
        if (!class_exists($fullChildClassName) || !is_a($fullChildClassName, GridComponent::COMPONENT_BASECLASS, true)) {
            return false;
        }

        return new $fullChildClassName($dataSource, $data);
    }

    public function isValid() {
        if (empty($this->data['children'])) {
            return false;
        }
        return true;
    }

}

