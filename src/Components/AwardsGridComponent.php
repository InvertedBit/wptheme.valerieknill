<?php
namespace AlexScherer\WpthemeValerieknill\Components;

class AwardsGridComponent extends BaseViewComponent {

    protected const COMPONENT_NAMESPACE = 'AlexScherer\\WpthemeValerieknill\\Components\\';
    protected const COMPONENT_BASECLASS = 'AlexScherer\\WpthemeValerieknill\\Components\\BaseComponent';

    public function __construct($data = []) {
        parent::__construct('AwardsGrid', $data);
        $this->initialize();
    }

    protected function initializeFields()
    {
        $this->fields = [];
    }
    
    protected function initialize() {
        $this->data['projects'] = $this->getAllProjects();
    }

    protected function getAllProjects() {
        $projects = [];
        do {
            $newProject = [
                'name' => $this->data['datasource']->post_title,
                'url' => get_post_permalink($this->data['datasource']->ID),
                'awards' => $this->data['datasource']->awards
            ];
            $projects[] = $newProject;
        } while ($this->data['datasource']->nextItem());
        return $projects;
    }

    public function isValid() {
        if (empty($this->data['projects'])) {
            return false;
        }
        return true;
    }

}
