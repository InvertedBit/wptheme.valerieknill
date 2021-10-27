<?php
/**
* Template Name: Gallery
*
*/
use AlexScherer\WpthemeValerieknill\Theme;


$theme = Theme::getInstance();

$theme->setTemplate('Gallery', [
    'type' => 'page'
]);

$theme->render();
