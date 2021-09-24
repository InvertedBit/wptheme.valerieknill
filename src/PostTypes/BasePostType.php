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
    protected $acfPages = false;

    public function __construct($name) {
        $this->name = $name;
        $this->initialize();
    }

    protected abstract function initialize();

    public function registerPostType() {
        register_post_type($this->name, $this->args);
        $this->registerAcfPages();
    }

    public function registerAcfPages() {
        if ($this->acfPages === false) {
            return;
        }

        foreach ($this->acfPages as $acfPage) {
            if(function_exists('acf_add_options_page')) {
                acf_add_options_sub_page([
                    'page_title'      => $acfPage['page_title'],

                    'parent_slug'     => $acfPage['parent_slug'],
                    'capability'      => $acfPage['capability']
                ]);
            }
        }
    }

}
