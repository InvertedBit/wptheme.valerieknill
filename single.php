<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

use AlexScherer\WpthemeValerieknill\Theme;

$theme = Theme::getInstance();

$post = get_post();

//echo '<pre>';
//print_r($queriedObject);
//echo '</pre>';

$args = [];

if ($post->post_type === 'project') {
    $args['discipline'] = 'film';
}

$theme->setTemplate('Single' . ucfirst($post->post_type), $args);

$theme->render();
