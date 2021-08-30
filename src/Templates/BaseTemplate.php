<?php
namespace AlexScherer\WpthemeValerieknill\Templates;

abstract class BaseTemplate {

    protected $components = [];

    protected $stylesheets = [];

    protected $scripts = [];

    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    

    public function render() {

    }
}