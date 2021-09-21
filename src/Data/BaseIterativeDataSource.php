<?php
namespace AlexScherer\WpthemeValerieknill\Data;

abstract class BaseIterativeDataSource extends BaseDataSource {

    protected const ITERATIVEDATASOURCE_BASECLASS = 'AlexScherer\\WpthemeValerieknill\\Data\\BaseIterativeDataSource';

    protected array $items;

    protected int $iterator;

    public function __construct(string $name, array $parameters = []) {
        parent::__construct($name, $parameters);
        if (!empty($this->items) && is_array($this->items)) {
            $this->iterator = 0;
        }
    }

    public function getFromItem(string $name) {
        if (!empty($this->items[$this->iterator])) {
            //if (is_a($this->items[$this->iterator], BaseIterativeDataSource::ITERATIVEDATASOURCE_BASECLASS)) {
                return $this->items[$this->iterator]->$name;
            //}
        } else {
            return null;
        }
    }

    public function nextItem() : bool {
        if ($this->iterator < count($this->items)) {
            $this->iterator++;
            return true;
        } else {
            $this->iterator = 0;
            return false;
        }
    }
}
