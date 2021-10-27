<?php
namespace AlexScherer\WpthemeValerieknill\Components;

abstract class BasePost {
    protected $postID;

    public function __construct($postID) {
        $this->postID = $postID;
    }


    protected function getField(string $name, $source = false) {
        if (function_exists('get_field')) {
            if ($source === false) {
                return get_field($name, $this->postID);
            } else {
                return get_field($name, $source);
            }
        }
    }
}
