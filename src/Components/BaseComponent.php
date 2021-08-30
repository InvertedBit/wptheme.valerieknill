<?php
namespace AlexScherer\WpthemeValerieknill\Components;

use AlexScherer\WpthemeValerieknill\Rendering\IRenderable;

abstract class BaseComponent implements IRenderable {
    protected $name;
    protected $data;

    public function __construct($name, $data = [])
    {
        $this->name = $name;
        $this->data = $data;
    }

    protected function getViewPath() {
        return get_template_directory() . '/src/Views/' . $this->name . '.php';
    }

    public function render() {
        if (!file_exists($this->getViewPath())) {
            echo '<span class="uk-text-danger">Failed to load view for '.$this->name.'Component: no such view file!</span>';
            return;
        }
        include $this->getViewPath();
    }
}