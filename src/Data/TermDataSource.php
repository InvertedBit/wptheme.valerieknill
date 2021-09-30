<?php
namespace AlexScherer\WpthemeValerieknill\Data;

class TermDataSource extends BaseDataSource {
    public function __construct($parameters = []) {
        parent::__construct('Term', $parameters);
    }

    protected function loadData()
    {
        //print_r($this->parameters);
        if (!empty($this->parameters['item'])) {
            $this->item = $this->parameters['item'];
            return;
        }
        if (!empty($this->parameters['id'])) {
            $term = get_term($this->parameters['id']);
            if ($term) {
                $this->item = $term;
            }
        }
    }

    protected function getFromItem(string $name)
    {
        //echo '<pre>';
        //print_r($this);
        //print_r($name);
        //echo '</pre>';
        if (property_exists($this, $name)) {
            return $this->$name;
        } elseif (property_exists($this->item, $name)) {
            return $this->item->$name;
        } else {
            return $this->getField($name, $this->item);
        }
        return null;
    }
}
