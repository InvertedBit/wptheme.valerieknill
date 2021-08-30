<?php
namespace AlexScherer\WpthemeValerieknill\Templates;

abstract class BaseTemplate {

    protected $components = [];

    protected $colourScheme = 'green';

    protected $stylesheets = [];

    protected $scripts = [];

    protected $name;

    public function __construct($name, $colourScheme) {
        $this->name = $name;
        $this->colourScheme = $colourScheme;
        $this->initialize();
    }

    protected function initialize() {
        add_action('wp_enqueue_styles', [$this, 'enqueueStyles']);
        add_action('wp_enqueue_scripts', [$this, 'enqueueScripts']);
    }

    protected function addStylesheet($handle, $path, $dependencies = []) {
        $this->stylesheets[] = [
            'handle' => $handle,
            'path' => $path,
            'dependencies' => $dependencies
        ];
    }

    protected function addScript($handle, $path, $dependencies = []) {
        $this->scripts[] = [
            'handle' => $handle,
            'path' => $path,
            'dependencies' => $dependencies
        ];
    }

    public function enqueueStyles() {
        foreach ($this->stylesheets as $stylesheet) {
            wp_enqueue_style($stylesheet['handle'], get_template_directory_uri() . $stylesheet['path'], array(), filemtime(get_template_directory() . $stylesheet['path']), false);
        }
    }

    public function enqueueScripts() {
        foreach ($this->scripts as $script) {
            wp_enqueue_script( $script['handle'], get_template_directory_uri() . $script['path'], $script['dependencies'], filemtime(get_template_directory() . $script['path']), false);
        }
    }
    

    public function render() {

    }
}