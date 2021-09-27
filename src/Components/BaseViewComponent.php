<?php
namespace AlexScherer\WpthemeValerieknill\Components;

abstract class BaseViewComponent extends BaseComponent {

    public function __construct($name, $data = [])
    {
        parent::__construct($name, 'view', $data);
        $this->compileClasses();
    }

    protected $classPrefixes = [
        'flex' => 'uk-flex-',
        'margin' => 'uk-margin-',
        'section' => 'uk-section-'
    ];

    protected function compileClasses() {
        //$this->debug($this->data);
        if (empty($this->data['styleClasses'])) {
            $this->data['styleClasses'] = '';
        }
        if (!empty($this->data['customClasses'])) {
            $this->data['styleClasses'] .= $this->compileCustomClasses($this->data['customClasses']);
        }
        if (!empty($this->data['style'])) {
            $this->data['styleClasses'] .= $this->generateClassString($this->data['style']);
        }
    }

    protected function compileCustomClasses($customClasses) {
        $classString = '';
        foreach ($customClasses as $customClass) {
            $classString .= $customClass . ' ';
        }
        return $classString;
    }

    protected function generateClassString($options) {
        $classString = '';

        foreach ($options as $type => $suffixes) {
            if (isset($this->classPrefixes[$type]) &&
                is_string($this->classPrefixes[$type])) {
                $prefix = $this->classPrefixes[$type];
            } else {
                $prefix = $type . '-';
            }
            foreach ($suffixes as $suffix) {
                $classString .= $prefix . $suffix . ' ';
            }
        }

        return $classString;
    }

    public function renderComponent() {
        $this->includeView();
    }
}
