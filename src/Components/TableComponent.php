<?php
namespace AlexScherer\WpthemeValerieknill\Components;


class TableComponent extends BaseIterativeViewComponent {

    protected const ITERATIVEDATASOURCE_BASECLASS = 'AlexScherer\\WpthemeValerieknill\\Data\\BaseIterativeDataSource';


    public function __construct($data = []) {
        parent::__construct('Table', $data);
        $this->initialize();
    }

    protected function initializeFields()
    {
        $this->fields = [];
    }
    
    protected function initialize() {
        if (empty($this->data['datasource']) ||
            !is_a(
                $this->data['datasource'],
                TableComponent::ITERATIVEDATASOURCE_BASECLASS)) {
                return;
        }
        //$this->setWidthClasses();
        $this->dataSource = $this->data['datasource'];
        
        if ($this->dataSource->isEmpty()) {
            return;
        }


        $this->data['rows'] = [];

        $this->populateRows();
    }

    protected function populateRows() {
        if (!isset($this->data['rows'])) {
            $this->data['rows'] = [];
        } elseif (!empty($this->data['rows'])) {
            return;
        }

        do {
            $newRow = [];
            foreach ($this->data['fields'] as $field) {
                $cell = [
                    'value' => $this->dataSource->$field,
                    'type' => 'cell',
                    'tag' => 'td'
                ];
                if (in_array('heading-vertical', $this->data['options']) && $this->data['heading-col'] === $field) {
                    $cell['type'] = 'heading';
                    $cell['tag'] = 'th';
                }
                $newRow[] = $cell;
            }
            $this->data['rows'][] = $newRow;
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

    public function isValid() {
        if (empty($this->data['rows'])) {
            return false;
        }
        return true;
    }

}


