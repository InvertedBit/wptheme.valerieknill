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

    protected function getViewPath($name = false) {
        return get_template_directory() . '/src/Views/' . ($name ? $name : $this->name) . '.php';
    }

    protected function includeView($name = false) {
        if (!file_exists($this->getViewPath($name))) {
            echo '<span class="uk-text-danger">Failed to load view for '. ($name ? $name : $this->name) .'Component: no such view file!</span>';
            return;
        }
        include $this->getViewPath($name);
    }

    protected function debug($data) {
        $this->preRender .= '<div class="uk-section uk-section-secondary">';
        $this->preRender .= '<div class="uk-container">';

        $this->preRender .= '<pre>'. print_r($data, 1) .'</pre>';

        $this->preRender .= '</div>';
        $this->preRender .= '</div>';
    }

    public function render() {
        $this->preRender();
        $this->renderComponent();
        $this->postRender();
    }

    public function preRender() {
        echo $this->preRender;
    }

    public function postRender() {

    }

    abstract public function renderComponent();

    abstract public function isValid();
}
