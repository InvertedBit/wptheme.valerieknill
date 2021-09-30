<?php
namespace AlexScherer\WpthemeValerieknill\Data;

class OptionsDataSource extends BaseDataSource {
    public function __construct($parameters = []) {
        parent::__construct('Options', $parameters);
    }

    protected function loadData()
    {
    }

    protected function getFromItem(string $name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        } else {
            return $this->getField($name, 'option');
        }

        return null;
    }
}
