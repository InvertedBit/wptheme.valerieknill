<?php
namespace AlexScherer\WpthemeValerieknill\Data;

class TestIterativeDataSource extends BaseIterativeDataSource {
    public function __construct($parameters = []) {
        parent::__construct('TestIterative', $parameters);
    }

    protected function loadData()
    {
        $this->items = [
            new TestDataSource(['id' => 0]),
            new TestDataSource(['id' => 1]),
            new TestDataSource(['id' => 2]),
            new TestDataSource(['id' => 3]),
            new TestDataSource(['id' => 4]),
            new TestDataSource(['id' => 5])
        ];
    }
}

