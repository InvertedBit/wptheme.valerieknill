<?php
namespace AlexScherer\WpthemeValerieknill\Components;

use AlexScherer\WpthemeValerieknill\Rendering\IRenderable;

abstract class BaseComponent implements IRenderable {
    protected $name;
    protected $data;
    protected $type;

    public function __construct($name, $type, $data = [])
    {
        $this->name = $name;
        $this->type = $type;
        $this->data = $data;
    }

    protected function getViewPath() {
        return get_template_directory() . '/src/Views/' . $this->name . '.php';
    }

    abstract public function render();
}