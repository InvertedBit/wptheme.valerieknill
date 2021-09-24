<?php
namespace AlexScherer\WpthemeValerieknill\Components;

use AlexScherer\WpthemeValerieknill\Rendering\IRenderable;

abstract class BaseComponent extends BasePost implements IRenderable {
    protected $name;
    protected $data;
    protected $type;

    protected $preRender = '';

    public function __construct($name, $type, $data = [], $postId = -1)
    {
        $this->name = $name;
        $this->type = $type;
        $this->data = $data;
        if ($postId == -1) {
            $postId = get_the_ID();
        }
        parent::__construct($postId);
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

    protected function getField(string $name, $source = false)
    {
        if (!empty($this->data['field_overrides']) && !empty($this->data['field_overrides'][$name])) {
            if (is_array($this->data['field_overrides'][$name])) {
                return parent::getField($this->data['field_overrides'][$name]['field'], $this->data['field_overrides'][$name]['id']);
            } else {
                return parent::getField($this->data['field_overrides'][$name]['field']);
            }
        }

        return parent::getField($name, $source);
    }

    protected function debug($data) {
        $this->preRender .= '<div class="uk-section uk-section-secondary">';
        $this->preRender .= '<div class="uk-container">';
        $this->preRender .= '<h4 class="uk-heading-small">Component "' . $this->name . '" debug output</h4>';

        $this->preRender .= '<pre>'. print_r($data, 1) .'</pre>';

        $this->preRender .= '</div>';
        $this->preRender .= '</div>';
    }

    public function render() {
        $this->preRender();
        if ($this->isValid()) {
            $this->renderComponent();
        } elseif (defined('WP_DEBUG') && WP_DEBUG) {
            echo '<p class="uk-text-danger">Component "' . $this->name . '" failed the validation!</p>';
        }
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
