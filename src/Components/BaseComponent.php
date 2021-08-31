<?php
namespace AlexScherer\WpthemeValerieknill\Components;

use AlexScherer\WpthemeValerieknill\Rendering\IRenderable;

abstract class BaseComponent implements IRenderable {
    protected $name;
    protected $data;
    protected $type;

    protected $preRender = '';

    public function __construct($name, $type, $data = [])
    {
        $this->name = $name;
        $this->type = $type;
        $this->data = $data;
    }

    protected function getViewPath() {
        return get_template_directory() . '/src/Views/' . $this->name . '.php';
    }

    protected function debug($data) {
        $this->preRender .= '<div class="uk-section uk-section-secondary">';
        $this->preRender .= '<div class="uk-container">';

        $this->preRender .= '<pre>'. print_r($data, 1) .'</pre>';

        $this->preRender .= '</div>';
        $this->preRender .= '</div>';
    }

    public function render() {
        echo $this->preRender;
        $this->renderComponent();
    }

    abstract public function renderComponent();
}