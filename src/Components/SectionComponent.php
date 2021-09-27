<?php
namespace AlexScherer\WpthemeValerieknill\Components;

class SectionComponent extends BaseViewComponent {

    public function __construct($data = []) {
        parent::__construct('Section', $data);
        $this->initialize();
    }

    
    protected function initialize() {
        if (empty($this->data['components'])) {
            return;
        }
        foreach ($this->data['components'] as $key => $component) {
            if (!is_a($component, "AlexScherer\\WpthemeValerieknill\\Components\\BaseComponent")) {
                unset($this->data['components'][$key]);
            }
        }
        //$this->data['styleClasses'] = 'uk-section ';
        //if (empty($this->data['style']) || $this->data['style'] === 'primary') {
            //$this->data['classes'] .= 'uk-section-primary ';
        //} elseif ($this->data['style'] === 'secondary') {
            //$this->data['classes'] .= 'uk-section-secondary ';
        //} elseif ($this->data['style'] === 'muted') {
            //$this->data['classes'][] = 'uk-section-muted';
        //}
        //$this->data['classes'][] = 'uk-light';
    }

    public function isValid() {
        if (empty($this->data['components'])) {
            return false;
        }
        return true;
    }

}

