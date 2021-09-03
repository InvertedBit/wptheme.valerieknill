<?php
namespace AlexScherer\WpthemeValerieknill;

use AlexScherer\WpthemeValerieknill\Templates;

class Theme {

    protected static $_instance = false;

    public static function getInstance() {
        if (Theme::$_instance === false) {
            Theme::$_instance = new Theme();
        }
        return Theme::$_instance;
    }

    protected function __construct() {
    }


    protected $template;

    protected $parameters;


    public function initialize() {
        add_theme_support('menus');
        add_action('init', [$this, 'registerMenuLocations']);
    }

    public function registerMenuLocations() {
        register_nav_menus([
            'main-menu-painting'    => __('Main Menu - Painting'),
            'main-menu-movies'      => __('Main Menu - Movies'),
            'footer-menu'           => __('Footer Menu')
        ]);
    }

    public function setTemplate($name, $parameters = []) {
        $this->parameters = $parameters;
        $fullClassName = "AlexScherer\\WpthemeValerieknill\\Templates\\" . $name . "Template";
        $fullBaseClassName = "AlexScherer\\WpthemeValerieknill\\Templates\\BaseTemplate";
        if (class_exists($fullClassName) && is_a($fullClassName, $fullBaseClassName, true)) {
            $this->template = new $fullClassName($parameters);
        }
    }

    public function render() {
        if ($this->template !== null) {
            $this->template->render();
        }
    }
}
