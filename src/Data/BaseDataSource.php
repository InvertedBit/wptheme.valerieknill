<?php
namespace AlexScherer\WpthemeValerieknill\Data;

abstract class BaseDataSource {
    private string $name;
    protected array $parameters;

    protected $item;
    public function __construct(string $name, array $parameters = []) {
        $this->name = $name;
        $this->parameters = $parameters;
        $this->loadData();
    }

    protected function getName() {
        return $this->name;
    }

    public function getItem() {
        return $this->item;
    }

    protected function getField($name, $source = false) {
        if (function_exists('get_field')) {
            if ($source) {
                return get_field($name, $source);
            } else {
                return get_field($name, $this->item->ID);
            }
        }
    }

    protected abstract function loadData();

    protected abstract function getFromItem(string $name);

    public function __get(string $name) {
        return $this->getFromItem($name);
    }
}
