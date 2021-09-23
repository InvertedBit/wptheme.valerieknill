<?php
namespace AlexScherer\WpthemeValerieknill\Data;

class RepeaterDataSource extends BaseIterativeDataSource {
    public function __construct($parameters = []) {
        parent::__construct('Repeater', $parameters);
    }

    protected function getField($name, $source) {
        if (function_exists('get_field')) {
            return get_field($name, $source);
        }
    }

    protected function loadData()
    {
        $this->items = [];
        if (empty($this->parameters['source']) ||
            empty($this->parameters['field'])) {
            return;
        }
        $repeaterItems = $this->getField($this->parameters['field'], $this->parameters['source']);
        if (!is_array($repeaterItems)) {
            return;
        }


        foreach ($repeaterItems as $item) {
            $parameters['item'] = $item;
            $this->items[] = new SimpleDataSource($parameters);
        }
    }
}
