<?php
namespace AlexScherer\WpthemeValerieknill\PostTypes;

/**
 * Baseclass for all custom postTypes
 *
 * Encapsulates all arguments needed to register a new custom posttype
 * and provides a method to register it with WordPress
 *
 * @author Alex Scherer <alex.scherer@outlook.com>
 *
 */
abstract class BasePostType {
    protected $name;
    protected $args;

    public function __construct($name) {
        $this->name = $name;
        $this->initialize();
    }

    protected abstract function initialize();

    public function registerPostType() {
        register_post_type($this->name, $this->args);
    }

}
