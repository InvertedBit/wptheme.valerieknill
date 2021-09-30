<?php
namespace AlexScherer\WpthemeValerieknill\FieldGroups;

class AboutPageFieldGroup extends BaseFieldGroup {
    public function __construct() {
        parent::__construct('AboutPage');
    }

    protected function getFieldGroupDefinition()
    {
        return array(
            'key' => 'group_61556f29bdc34',
            'title' => __('About Page', 'wptheme.valerieknill'),
            'fields' => array(
                array(
                    'key' => 'field_61556f3a9fd55',
                    'label' => __('About text', 'wptheme.valerieknill'),
                    'name' => 'text_about',
                    'type' => 'wysiwyg',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                    'delay' => 0,
                    'translations' => 'translate',
                ),
                array(
                    'key' => 'field_61556f5e9fd56',
                    'label' => __('Image', 'wptheme.valerieknill'),
                    'name' => 'image',
                    'type' => 'image',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'library' => 'all',
                    'min_width' => '',
                    'min_height' => '',
                    'min_size' => '',
                    'max_width' => '',
                    'max_height' => '',
                    'max_size' => '',
                    'mime_types' => '',
                    'translations' => 'copy_once',
                ),
                array(
                    'key' => 'field_61556fb99fd58',
                    'label' => __('Quote', 'wptheme.valerieknill'),
                    'name' => 'quote',
                    'type' => 'group',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'layout' => 'block',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_61556fc89fd59',
                            'label' => __('Name', 'wptheme.valerieknill'),
                            'name' => 'name',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                            'translations' => 'translate',
                        ),
                        array(
                            'key' => 'field_61556fd09fd5a',
                            'label' => __('Text', 'wptheme.valerieknill'),
                            'name' => 'text',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                            'translations' => 'translate',
                        ),
                    ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'page_about.php',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => array(
                0 => 'the_content',
                1 => 'excerpt',
                2 => 'discussion',
                3 => 'comments',
            ),
            'active' => true,
            'description' => '',
        );
    }
}
