<?php
namespace AlexScherer\WpthemeValerieknill\Data;

class TestDataSource extends BaseDataSource {
    public function __construct($parameters = []) {
        parent::__construct('Test', $parameters);
    }

    protected function loadData()
    {
        $this->item = [
            'name' => 'TestData',
            'list' => [
                'a',
                'b',
                'c'
            ],
            'parameters' => $this->parameters
        ];
    }

    protected function getFromItem(string $name)
    {
        echo "getFromItem called";
        if (!empty($this->item[$name])) {
            return $this->item[$name];
        }
        return null;
    }
}
