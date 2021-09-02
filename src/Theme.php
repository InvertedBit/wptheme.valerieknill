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
    }

    public function setTemplate($name, $parameters = []) {
        $this->parameters = $parameters;
        if (class_exists("AlexScherer\\WpthemeValerieknill\\Templates\\" . $name . "Template")) {
            $fullClassName = "AlexScherer\\WpthemeValerieknill\\Templates\\" . $name . "Template";
            $this->template = new $fullClassName($parameters);
        }
    }

    public function render() {
        if ($this->template !== null) {
            $this->template->render();
        }
    }
}
