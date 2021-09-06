<?php
namespace AlexScherer\WpthemeValerieknill;

use AlexScherer\WpthemeValerieknill\Templates;

class Theme {

    protected const TAXONOMY_NAMESPACE = "AlexScherer\\WpthemeValerieknill\\Taxonomies\\";
    protected const TAXONOMY_BASECLASS = "AlexScherer\\WpthemeValerieknill\\Taxonomies\\BaseTaxonomy";

    protected const TEMPLATE_NAMESPACE = "AlexScherer\\WpthemeValerieknill\\Templates\\";
    protected const TEMPLATE_BASECLASS = "AlexScherer\\WpthemeValerieknill\\Templates\\BaseTemplate";

    protected static $_instance = false;

    public static function getInstance() {
        if (Theme::$_instance === false) {
            Theme::$_instance = new Theme();
        }
        return Theme::$_instance;
    }

    protected function __construct() {
    }

    protected $taxonomies = [];

    protected $taxonomiesToLoad = [
        'Discipline'
    ];

    protected $taxonomiesLoaded = false;

    protected $template;

    protected $parameters;


    public function initialize() {
        add_theme_support('menus');
        add_action('init', [$this, 'runWordpressInit']);
        $this->loadTaxonomies();
    }

    public function runWordpressInit() {
        $this->registerMenuLocations();
        $this->registerTaxonomies();
    }

    public function registerTaxonomies() {
        if (!$this->taxonomiesLoaded) {
            $this->loadTaxonomies();
        }
        foreach ($this->taxonomies as $taxonomy) {
            $taxonomy->registerTaxonomy();
        }

    }

    public function loadTaxonomies() {
        if ($this->taxonomiesLoaded) {
            return;
        }
        $taxonomiesToLoad = $this->taxonomiesToLoad;
        $loadedTaxonomies = [];
        foreach($taxonomiesToLoad as $taxonomyName) {
            $fullTaxonomyName = Theme::TAXONOMY_NAMESPACE . $taxonomyName . "Taxonomy";

            if (class_exists($fullTaxonomyName) && is_a($fullTaxonomyName, Theme::TAXONOMY_BASECLASS, true)) {
                $taxonomyInstance = new $fullTaxonomyName();
                $loadedTaxonomies[strtolower($taxonomyName)] = $taxonomyInstance;
            }
        }
        $this->taxonomies = $loadedTaxonomies;
        $this->taxonomiesLoaded = true;
    }

    public function registerMenuLocations() {
        register_nav_menus([
            'main-menu-painting'    => __('Main Menu - Painting'),
            'main-menu-movies'      => __('Main Menu - Movies'),
            'footer-menu'           => __('Footer Menu')
        ]);
    }

    public function setTemplate($name, $parameters = []) {
        $this->parameters = $parameters;
        $fullClassName = "AlexScherer\\WpthemeValerieknill\\Templates\\" . $name . "Template";
        $fullBaseClassName = "AlexScherer\\WpthemeValerieknill\\Templates\\BaseTemplate";
        if (class_exists($fullClassName) && is_a($fullClassName, $fullBaseClassName, true)) {
            $this->template = new $fullClassName($parameters);
        }
    }

    public function render() {
        if ($this->template !== null) {
            $this->template->render();
        }
    }
}
