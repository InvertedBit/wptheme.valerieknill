<?php
namespace AlexScherer\WpthemeValerieknill\Components;

use DateTime;

class ExhibitionSliderComponent extends BaseViewComponent {

    public function __construct($data = []) {
        parent::__construct('ExhibitionSlider', $data);
        $this->initialize();
    }
    
    protected function initialize() {
        $args = [
            'post_type' => 'exhibition',
            'nopaging' => true

        ];

        $exhibitionPosts = get_posts($args);
        $this->data['exhibitions'] = [];
        $this->data['exhibitions_closed'] = [];
        $nowTime = time();
        foreach($exhibitionPosts as $exhibitionPost) {
            $exhibitionEndDate = $this->getField('to', $exhibitionPost->ID);
            $exhibitionEndDatetime = DateTime::createFromFormat("d/m/Y", $exhibitionEndDate);
            $exhibitionEndTime = $exhibitionEndDatetime->getTimestamp();
            $exhibition = [
                    'name' => $this->getField('name', $exhibitionPost->ID),
                    'description' => $this->getField('description', $exhibitionPost->ID),
                    'address' => $this->getField('address', $exhibitionPost->ID),
                    'from' => $this->getField('from', $exhibitionPost->ID),
                    'to' => $this->getField('to', $exhibitionPost->ID)
                ];
            if ($exhibitionEndTime >= $nowTime) {
                $this->data['exhibitions'][] = $exhibition;
            } else {
                $this->data['exhibitions_closed'][] = $exhibition;
            }
        }
    }

    public function isValid() {
        if (empty($this->data['exhibitions'])) {
            return false;
        }
        return true;
    }

}
