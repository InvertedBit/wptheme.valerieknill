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


    public function initialize() {
    }

    public function setTemplate($name) {
        if (class_exists("AlexScherer\\WpthemeValerieknill\\Templates\\" . $name . "Template")) {
            $fullClassName = "AlexScherer\\WpthemeValerieknill\\Templates\\" . $name . "Template";
            $this->template = new $fullClassName();
        }
    }

    public function render() {
        echo "Hello World!";
    }
}
