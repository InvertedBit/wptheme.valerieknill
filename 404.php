<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 */
use AlexScherer\WpthemeValerieknill\Theme;


$theme = Theme::getInstance();

$theme->setTemplate('NotFound404');

$theme->render();
