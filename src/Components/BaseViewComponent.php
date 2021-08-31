<?php
namespace AlexScherer\WpthemeValerieknill\Components;

abstract class BaseViewComponent extends BaseComponent {

    public function __construct($name, $data = [])
    {
        parent::__construct($name, 'view', $data);
    }

    public function render() {
        if (!file_exists($this->getViewPath())) {
            echo '<span class="uk-text-danger">Failed to load view for '.$this->name.'Component: no such view file!</span>';
            return;
        }
        include $this->getViewPath();
    }
}
