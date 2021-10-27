<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
use AlexScherer\WpthemeValerieknill\Theme;

$theme = Theme::getInstance();

$queriedObject = get_queried_object();

//echo '<pre>';
//print_r($queriedObject);
//echo '</pre>';

if (is_a($queriedObject, 'WP_TERM')) {
    $taxonomy = $queriedObject->taxonomy;
    if ($taxonomy === 'series') {
        $theme->setTemplate('Gallery', [
            'discipline' => 'painting',
            'type' => 'taxonomy',
            'taxonomy' => $taxonomy,
            'term' => $queriedObject
        ]);
    }
} elseif (is_a($queriedObject, 'WP_Post_Type')) {
    $name = $queriedObject->name;
    $parameters = [];
    if ($name === 'project') {
        $parameters['discipline'] = 'movies';
        $theme->setTemplate('ProjectList', $parameters);
    }
}


$theme->render();
