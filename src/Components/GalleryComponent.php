<?php
namespace AlexScherer\WpthemeValerieknill\Components;

class GalleryComponent extends BaseViewComponent {

    public function __construct($data = []) {
        parent::__construct('Gallery', $data);
        $this->initialize();
    }

    
    protected function initialize() {
        $this->data['entries'] = [];
        if (!empty($this->data['term'])) {
            if (empty($this->data['post_type'])) {
                $this->data['post_type'] = 'post';
            }
            $galleryPosts = get_posts([
                'post_type' => $this->data['post_type'],
                'tax_query' => [
                    [
                        'taxonomy' => 'series',
                        'field' => 'term_id',
                        'terms' => $this->data['term']->term_id
                    ]
                ]
            ]);
            foreach ($galleryPosts as $post) {
                $galleryEntry = [
                    'title' => $post->post_title,
                    'image' => $this->getField('image', $post->ID),
                    'dimensions' => $this->getField('dimensions', $post->ID),
                    'sold' => $this->getField('sold', $post->ID)
                ];
                $this->data['entries'][] = $galleryEntry;
            }
        }
    }

    public function isValid() {
        if (empty($this->data['entries'])) {
            return false;
        }
        return true;
    }

}

