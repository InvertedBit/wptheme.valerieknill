<?php
namespace AlexScherer\WpthemeValerieknill\Components;

use AlexScherer\WpthemeValerieknill\Data\BaseDataSource;

class CommentFormComponent extends BaseViewComponent {

    protected const COMPONENT_NAMESPACE = 'AlexScherer\\WpthemeValerieknill\\Components\\';
    protected const COMPONENT_BASECLASS = 'AlexScherer\\WpthemeValerieknill\\Components\\BaseComponent';

    public function __construct($data = []) {
        parent::__construct('CommentForm', $data);
        $this->initialize();
    }

    protected function initializeFields()
    {
        $this->fields = [];
    }
    
    protected function initialize() {
        $this->data['arguments']['fields'] = [
            'author' => '<div class="uk-width-1-3@s uk-width-1-1@xs uk-grid-margin uk-first-column"><input class="uk-input" type="text" name="author" placeholder="'. __('Name', 'wptheme-valerieknill').' *"></div>',
            'email' => '<div class="uk-width-1-3@s uk-width-1-1@xs uk-grid-margin"><input class="uk-input" type="text" name="email" placeholder="'. __('E-Mail', 'wptheme-valerieknill').' *"></div>',
            'url' => '<div class="uk-width-1-3@s uk-width-1-1@xs uk-grid-margin"><input class="uk-input" type="text" name="url" placeholder="'. __('Website', 'wptheme-valerieknill').'"></div>',
        ];
        $this->data['arguments']['comment_field'] = '<div data-uk-grid><div class="uk-width-1-1 uk-grid-margin uk-first-column"><textarea class="uk-textarea" name="comment" placeholder="'. __('Comment', 'wptheme-valerieknill').' *"></textarea></div>';

        $this->data['arguments']['submit_button'] = '<div class="uk-width-1-1 uk-grid-margin uk-first-column"><input type="submit" name="submit" id="submit" href="#" class="uk-button uk-button-secondary uk-width-1-1" value="'. __('Submit', 'wptheme-valerieknill').'" /></div></div>';
    }

    //public function 

    public function isValid() {
        if (empty($this->data['post'])) {
            return false;
        }
        return true;
    }

}
