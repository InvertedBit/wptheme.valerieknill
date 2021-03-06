<?php
namespace AlexScherer\WpthemeValerieknill\Components;

use AlexScherer\WpthemeValerieknill\Data\BaseDataSource;

class CommentListComponent extends BaseViewComponent {

    protected const COMPONENT_NAMESPACE = 'AlexScherer\\WpthemeValerieknill\\Components\\';
    protected const COMPONENT_BASECLASS = 'AlexScherer\\WpthemeValerieknill\\Components\\BaseComponent';

    public function __construct($data = []) {
        parent::__construct('CommentList', $data);
        $this->initialize();
    }

    protected function initializeFields()
    {
        $this->fields = [];
    }
    
    protected function initialize() {
        $this->data['comments'] = $this->dataSource->getComments();
        //$this->debug($this->getComments());

        //if (!empty($this->data['components'])) {
            ////$this->debug($this->data['components']);
            //$this->data['children'] = $this->data['components'];
        //} else {
            //if (empty($this->data['childComponent']) ||
                //empty($this->data['datasource']) ||
                //!is_a(
                    //$this->data['datasource'],
                    //GridComponent::ITERATIVEDATASOURCE_BASECLASS)) {
                    //return;
            //}
            //$this->childDefinition = $this->data['childComponent'];
            //$this->dataSource = $this->data['datasource'];
            
            //if ($this->dataSource->isEmpty()) {
                //return;
            //}

            //$this->data['children'] = [];
            //$childData = [];
            //if (!empty($this->data['childComponent']['arguments'])) {
                //$childData = $this->data['childComponent']['arguments'];
            //}
            //if (!empty($this->data['discipline'])) {
                //$childData['discipline'] = $this->data['discipline'];
            //}
            //do {
                //$newChild = $this->createChildComponent($this->dataSource->getItem(), $childData);
                //if ($newChild) {
                    //$this->data['children'][] = $newChild;
                //} else {
                    //$this->debug('child not created');
                //}
            //} while ($this->dataSource->nextItem());
        //}

        //$this->debug($this->data['children']);
    }

    //protected function createChildComponent(BaseDataSource $dataSource, $data = []) {
        //if (empty($this->childDefinition) || empty($this->childDefinition['name'])) {
            //return false;
        //}
        //$fullChildClassName = PostListComponent::COMPONENT_NAMESPACE . $this->childDefinition['name'];
        //if (!class_exists($fullChildClassName) || !is_a($fullChildClassName, PostListComponent::COMPONENT_BASECLASS, true)) {
            //return false;
        //}

        //$data['datasource'] = $dataSource;
        //return new $fullChildClassName($data);
    //}

    public function getComments($parent = 0) {
        $comments = [];
        foreach ($this->data['comments'] as $comment) {
            if ($comment->comment_parent == $parent) {
                $comments[] = $comment;
            }
        }
        return $comments;
    }

    public function isValid() {
        //if (is_array($this->data['comments'])) {
            //return false;
        //}
        return true;
    }

}
