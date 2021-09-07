<?php
namespace AlexScherer\WpthemeValerieknill\Templates;

use AlexScherer\WpthemeValerieknill\Rendering\IRenderable;

abstract class BaseTemplate {

    private $components = [];

    protected $colourScheme = 'green';

    protected $discipline = false;

    protected $stylesheets = [];

    protected $scripts = [];

    protected $parameters;

    protected $name;

    public function __construct($name, $parameters) {
        $this->name = $name;
        $this->parameters = $parameters;
        $this->initialize();
    }

    protected function initialize() {
        add_action('wp_enqueue_scripts', [$this, 'enqueueStyles']);
        add_action('wp_enqueue_scripts', [$this, 'enqueueScripts']);
        $this->prepareComponents();


        //$this->addStylesheet('uikit-style', 'node_modules/uikit/dist/css/uikit.css');
        $this->addStylesheet('uikit-style', 'assets/dist/css/theme-'.$this->colourScheme.'.css');

        $this->addScript('uikit', 'node_modules/uikit/dist/js/uikit.js');
        $this->addScript('uikit-icons', 'node_modules/uikit/dist/js/uikit-icons.js');
        $this->addScript('jquery', 'node_modules/jquery/dist/jquery.js');
        $this->addScript('theme-pack', 'assets/dist/js/theme-pack.bundle.js', ['jquery']);

    }

    abstract protected function prepareComponents();

    protected function getPostDiscipline() {
        $currentPostId = get_the_ID();
        $postDiscipline = wp_get_post_terms($currentPostId, 'discipline');
        $postDisciplineId = $postDiscipline[0]->term_id;
        $disciplines = get_field('disciplines', 'option');
        foreach($disciplines as $discipline) {
            if (in_array($postDisciplineId, $discipline['term'])) {
                $this->colourScheme = $discipline['colorscheme'];
                $this->discipline = $discipline['discipline'];
                break;
            }
        }
    }

    protected function addComponent($component) {
        if ($component instanceof IRenderable) {
            $this->components[] = $component;
        }
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
            wp_enqueue_style($stylesheet['handle'], get_template_directory_uri() . '/' . $stylesheet['path'], array(), filemtime(get_template_directory() . '/' . $stylesheet['path']));
        }
    }

    public function enqueueScripts() {
        foreach ($this->scripts as $script) {
            wp_enqueue_script( $script['handle'], get_template_directory_uri() . '/' . $script['path'], $script['dependencies'], filemtime(get_template_directory() . '/' . $script['path']), false);
        }
    }
    

    public function render() {
        foreach ($this->components as $component) {
            $component->render();
        }

    }
}
