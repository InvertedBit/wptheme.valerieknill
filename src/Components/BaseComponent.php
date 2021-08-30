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

    public function render() {
        include get_template_directory() . '/src/Views/' . $this->name . '.php';
    }
}