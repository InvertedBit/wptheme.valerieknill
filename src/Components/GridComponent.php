<?php
namespace AlexScherer\WpthemeValerieknill\Components;

use AlexScherer\WpthemeValerieknill\Data\BaseDataSource;
use AlexScherer\WpthemeValerieknill\Data\BaseIterativeDataSource;

class GridComponent extends BaseViewComponent {

    protected const COMPONENT_NAMESPACE = 'AlexScherer\\WpthemeValerieknill\\Components\\';
    protected const COMPONENT_BASECLASS = 'AlexScherer\\WpthemeValerieknill\\Components\\BaseComponent';

    protected const CARDCOMPONENT_BASECLASS = 'AlexScherer\\WpthemeValerieknill\\Components\\BaseCardComponent';

    protected const ITERATIVEDATASOURCE_BASECLASS = 'AlexScherer\\WpthemeValerieknill\\Data\\BaseIterativeDataSource';


    protected $childDefinition;

    protected BaseIterativeDataSource $dataSource;

    public function __construct($data = []) {
        parent::__construct('Grid', $data);
        $this->initialize();
    }

    
    protected function initialize() {
        //$this->debug($this->data['cols']);
        if (!empty($this->data['components'])) {
            //$this->debug($this->data['components']);
            $this->data['children'] = $this->data['components'];
        } else {
            if (empty($this->data['childComponent']) ||
                empty($this->data['datasource']) ||
                !is_a(
                    $this->data['datasource'],
                    GridComponent::ITERATIVEDATASOURCE_BASECLASS)) {
                    return;
            }
            $this->childDefinition = $this->data['childComponent'];
            $this->dataSource = $this->data['datasource'];
            
            if ($this->dataSource->isEmpty()) {
                return;
            }

            if (!isset($this->data['container'])) {
                $this->data['container'] = false;
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

        $this->setWidthClasses();
        $this->compileDivClasses();
        //$this->debug($this->data['div-classes']);

    }

    protected function compileDivClasses() {
        if (!empty($this->data['children']) && !empty($this->data['div-options'])) {
            $this->data['div-classes'] = [];
            foreach ($this->data['div-options'] as $name => $options) {
                foreach ($this->data['children'] as $key => $child) {
                    if ($child->getName() === $name) {
                        $this->data['div-classes'][$key] = $this->generateClassString($options);
                    }
                }
            }
        }
    }

    protected function generateClassString($options) {
        $classString = '';

        foreach ($options as $type => $suffixes) {
            $prefix = '';
            switch($type) {
                case 'flex':
                    $prefix = 'uk-flex-';
                    break;
                default:
                    $prefix = $type . '-';
            }
            foreach ($suffixes as $suffix) {
                $classString .= $prefix . $suffix . ' ';
            }
        }

        return $classString;
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

        if (is_a($fullChildClassName, GridComponent::CARDCOMPONENT_BASECLASS, true)) {
            return new $fullChildClassName($dataSource, $data);
        } else {
            $data['datasource'] = $dataSource;
            return new $fullChildClassName($data);
        }
    }

    public function isValid() {
        if (empty($this->data['children'])) {
            return false;
        }
        return true;
    }

}

