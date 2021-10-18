<?php
namespace AlexScherer\WpthemeValerieknill\Components;

use AlexScherer\WpthemeValerieknill\Data\BaseDataSource;

class MediaComponent extends BaseViewComponent {

    protected const DATASOURCE_BASECLASS = 'AlexScherer\\WpthemeValerieknill\\Data\\BaseDataSource';

    protected BaseDataSource $dataSource;

    public function __construct($data = []) {
        parent::__construct('Media', $data);
        $this->initialize();
    }

    protected function initializeFields()
    {
        $this->fields = [];
    }

    
    protected function initialize() {
        if (!empty($this->data['datasource']) &&
            is_a($this->data['datasource'], MediaComponent::DATASOURCE_BASECLASS)) {
            $this->dataSource = $this->data['datasource'];
            $this->populateData();
            if ($this->data['sourceType'] === 'link') {
                $this->fetchEmbedInfos();
            }
        }
    }

    protected function fetchEmbedInfos() {
        $this->data['embed'] = [];
        $matches = [];
        preg_match('/^(?:http|https):\/\/(?:www.)?(?P<platform>youtube|vimeo).com\/(?:watch\?v=)?(?P<code>[^\/]+)(?:\/)?$/', $this->data['source'], $matches);
        $this->data['embed']['platform'] = $matches['platform'];
        $this->data['embed']['code'] = $matches['code'];
    }

    protected function populateData() {
        $sourceInfo = $this->dataSource->{$this->data['field']};
        $sourceArray = explode('_', $sourceInfo['type']);
        $this->data['mediaType'] = $sourceArray[0];
        $this->data['sourceType'] = $sourceArray[1];
        if ($sourceArray[1] === 'wp') {
            $this->data['source'] = $sourceInfo['file'];
        } elseif ($sourceArray[1] === 'link') {
            $this->data['source'] = $sourceInfo['link'];
        }
        //$this->debug($this->data);

    }

    public function isValid() {
        if (empty($this->data['sourceType']) ||
            empty($this->data['mediaType']) ||
            empty($this->data['source'])) {
            return false;
        }
        return true;
    }

}
