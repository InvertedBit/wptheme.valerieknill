<?php
namespace AlexScherer\WpthemeValerieknill;

use AlexScherer\WpthemeValerieknill\PostTypes\BasePostType;
use AlexScherer\WpthemeValerieknill\Taxonomies\BaseTaxonomy;

class Theme {

    protected const TAXONOMY_NAMESPACE = "AlexScherer\\WpthemeValerieknill\\Taxonomies\\";
    protected const TAXONOMY_BASECLASS = "AlexScherer\\WpthemeValerieknill\\Taxonomies\\BaseTaxonomy";

    protected const POSTTYPE_NAMESPACE = "AlexScherer\\WpthemeValerieknill\\PostTypes\\";
    protected const POSTTYPE_BASECLASS = "AlexScherer\\WpthemeValerieknill\\PostTypes\\BasePostType";

    protected const TEMPLATE_NAMESPACE = "AlexScherer\\WpthemeValerieknill\\Templates\\";
    protected const TEMPLATE_BASECLASS = "AlexScherer\\WpthemeValerieknill\\Templates\\BaseTemplate";

    protected const FIELDGROUP_NAMESPACE = "AlexScherer\\WpthemeValerieknill\\FieldGroups\\";
    protected const FIELDGROUP_BASECLASS = "AlexScherer\\WpthemeValerieknill\\FieldGroups\\BaseFieldGroup";

    protected static $_instance = false;

    public static function getInstance() {
        if (Theme::$_instance === false) {
            Theme::$_instance = new Theme();
        }
        return Theme::$_instance;
    }

    protected function __construct() {
    }

    /**
     * @var BaseTaxonomy[]
     */
    protected $taxonomies = [];

    protected $taxonomiesToLoad = [
        'Discipline',
        'Series',
        'Role'
    ];

    protected $taxonomiesLoaded = false;

    /**
     * @var BasePostType[]
     */
    protected $postTypes = [];

    protected $postTypesToLoad = [
        'News',
        'Exhibition',
        'Image',
        'Project'
    ];

    protected $postTypesLoaded = false;

    protected $fieldGroups = [];

    protected $fieldGroupsToLoad = [
        'AboutPage'
    ];

    protected $template;

    protected $parameters;

    protected $subdomain;

    protected $baseDomain;


    
    public function initialize() {
        add_theme_support('menus');
        //add_action('after_setup_theme', [$this, 'afterSetupTheme']);

        $this->loadTextdomain();
        add_action('init', [$this, 'runWordpressInit']);
        add_action('admin_init', [$this, 'runWordpressAdminInit']);
        $this->registerThemeSettings();
        $this->loadTaxonomies();
        $this->loadPostTypes();
        $this->loadFieldGroups();
    }

    public function afterSetupTheme() {
        $this->loadTextdomain();
    }

    protected function loadTextdomain() {
        $path = get_template_directory() . '/languages';
        $success = load_theme_textdomain('wptheme-valerieknill', $path);
        if ($success) {
            return;
        }
        $locale = apply_filters( 'theme_locale', get_locale(), 'my_theme' );
        die( "Could not find $path/$locale.mo." );
    }

    public function getSubdomain() {
        return $this->subdomain;
    }

    public function runWordpressInit() {
        $this->registerMenuLocations();
        $this->registerTaxonomies();
        $this->registerPostTypes();
    }

    public function runWordpressAdminInit() {
    }

    protected function registerThemeSettings() {
        if (function_exists('acf_add_options_page')) {
            acf_add_options_page(array(
                'page_title' 	=> 'Theme Settings',
                'menu_title'	=> 'Theme Settings',
                'menu_slug' 	=> 'theme-settings',
                'capability'	=> 'edit_posts',
                'redirect'		=> false
            ));
        }
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

    public function registerPostTypes() {
        if (!$this->postTypesLoaded) {
            $this->loadPostTypes();
        }
        foreach ($this->postTypes as $postType) {
            $postType->registerPostType();
        }
    }

    protected function loadPostTypes() {
        if ($this->postTypesLoaded) {
            return;
        }
        $postTypesToLoad = $this->postTypesToLoad;
        $loadedPostTypes = [];
        foreach ($postTypesToLoad as $postTypeName) {
            $fullPostTypeName = Theme::POSTTYPE_NAMESPACE . $postTypeName . "PostType";

            if (class_exists($fullPostTypeName) && is_a($fullPostTypeName, Theme::POSTTYPE_BASECLASS, true)) {
                $postTypeInstance = new $fullPostTypeName();
                $loadedPostTypes[strtolower($postTypeName)] = $postTypeInstance;
            }
        }
        $this->postTypes = $loadedPostTypes;
        $this->postTypesLoaded = true;
    }

    protected function loadFieldGroups() {
        $fieldGroupsToLoad = $this->fieldGroupsToLoad;
        $loadedFieldGroups = [];
        foreach ($fieldGroupsToLoad as $fieldGroupName) {
            $fullFieldGroupName = Theme::FIELDGROUP_NAMESPACE . $fieldGroupName . "FieldGroup";

            if (class_exists($fullFieldGroupName) && is_a($fullFieldGroupName, Theme::FIELDGROUP_BASECLASS, true)) {
                $fieldGroupInstance = new $fullFieldGroupName();
                $fieldGroupInstance->registerFieldGroup();
                $loadedFieldGroups[strtolower($fieldGroupName)] = $fieldGroupInstance;
            }
        }
        $this->fieldGroups = $loadedFieldGroups;
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
        $fullClassName = Theme::TEMPLATE_NAMESPACE . $name . "Template";
        if (class_exists($fullClassName) && is_a($fullClassName, Theme::TEMPLATE_BASECLASS, true)) {
            $this->template = new $fullClassName($parameters);
        }
    }

    public function render() {
        if ($this->template !== null) {
            $this->template->render();
        }
    }
}
