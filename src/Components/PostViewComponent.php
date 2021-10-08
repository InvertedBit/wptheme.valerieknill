<?php
namespace AlexScherer\WpthemeValerieknill\Components;

use AlexScherer\WpthemeValerieknill\Data\BaseDataSource;

class PostViewComponent extends BaseViewComponent {

    protected const DATASOURCE_BASECLASS = 'AlexScherer\\WpthemeValerieknill\\Data\\BaseDataSource';
    
    protected BaseDataSource $dataSource;

    public function __construct($data = []) {
        parent::__construct('PostView', $data);
        $this->initialize();
    }

    protected function initializeFields() {
        $this->fields = [
            'post_title',
            'post_excerpt',
            'post_content',
            'post_author',
            'post_date'
        ];
    }

    protected function initialize() {
        if (empty($this->data['post_permalink'])) {
            $this->data['post_permalink'] = get_the_permalink($this->dataSource->ID);
        }

        if (is_numeric($this->data['post_author'])) {
            $postAuthor = get_user_by('id', $this->data['post_author']);
            $this->data['post_author'] = $postAuthor;
        }

        if (empty($this->data['author_page_link'])) {
            $this->data['author_page_link'] = get_author_posts_url($this->data['post_author']->ID);
        }

        $commentArgs = [
            'post_id' => $this->dataSource->ID,
            'count' => true
        ];

        $this->data['comment_count'] = get_comments($commentArgs);

        //$this->debug($this->data);
    }
    
    public function isValid() {
        if (empty($this->data['post_title']) ||
            empty($this->data['post_content'])) {
            return false;
        }
        return true;
    }

}
