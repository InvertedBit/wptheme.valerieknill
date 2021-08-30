<?php
namespace AlexScherer\WpthemeValerieknill;

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
        $this->template = $name;
    }

    public function render() {
        echo "Hello World!";
    }
}
