<?php
namespace AlexScherer\WpthemeValerieknill\Components;

abstract class BaseViewComponent extends BaseComponent {

    public function __construct($name, $data = [])
    {
        parent::__construct($name, 'view', $data);
    }

    public function renderComponent() {
        $this->includeView();
    }
}
