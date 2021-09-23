<?php
namespace AlexScherer\WpthemeValerieknill\Data;

class SimpleDataSource extends BaseDataSource {
    public function __construct($parameters = []) {
        parent::__construct('Simple', $parameters);
    }

    protected function loadData()
    {
        $this->item = $this->parameters['item'];
    }

    protected function getField($name) {
        if (function_exists('get_field')) {
            return get_field($name, $this->item->ID);
        }
    }

    protected function getFromItem(string $name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        } else {
            if (is_array($this->item) && !empty($this->item[$name])) {
                return $this->item[$name];
            } elseif (is_object($this->item) && property_exists($this->item, $name)) {
                return $this->item->$name;
            } else {
                return null;
            }
        }

        return null;
    }
}
