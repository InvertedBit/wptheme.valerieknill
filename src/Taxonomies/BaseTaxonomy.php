<?php
namespace AlexScherer\WpthemeValerieknill\Taxonomies;

abstract class BaseTaxonomy {
    protected $name;
    protected $objectType;
    protected $args;

    public function __construct($name) {
        $this->name = $name;
        $this->initialize();
    }

    protected abstract function initialize();

    public function registerTaxonomy() {
        register_taxonomy($this->name, $this->objectType, $this->args);
    }

    public function getName() {
        return $this->name;
    }

    public function getTerm() {

    }

    public function addTerm() {

    }
}
