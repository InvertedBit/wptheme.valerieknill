<?php
namespace AlexScherer\WpthemeValerieknill\Components;

use DateTime;

class ExhibitionSliderComponent extends BaseIterativeViewComponent {

    public function __construct($data = []) {
        parent::__construct('ExhibitionSlider', $data);
        $this->initialize();
    }

    protected function initializeFields()
    {
        $this->fields = [];
    }
    
    protected function initialize() {
        $this->data['exhibitions'] = [];
        $this->data['exhibitions_closed'] = [];
        $nowTime = time();
        do {
            $exhibitionEndDate = $this->dataSource->to;
            $exhibitionEndDatetime = DateTime::createFromFormat("d/m/Y", $exhibitionEndDate);
            $exhibitionEndTime = $exhibitionEndDatetime->getTimestamp();
            $exhibition = [
                'name' => $this->dataSource->name,
                'description' => $this->dataSource->description,
                'address' => $this->dataSource->address,
                'from' => $this->dataSource->from,
                'to' => $this->dataSource->to,
            ];
            if ($exhibitionEndTime >= $nowTime) {
                $this->data['exhibitions'][] = $exhibition;
            } else {
                $this->data['exhibitions_closed'][] = $exhibition;
            }
            
            
        } while($this->dataSource->nextItem());
    }

    public function isValid() {
        if (empty($this->data['exhibitions'])) {
            return false;
        }
        return true;
    }

}
