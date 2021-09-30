<?php
namespace AlexScherer\WpthemeValerieknill\FieldGroups;

abstract class BaseFieldGroup {

    protected string $name;
    protected array $fieldGroup;

    public function __construct(string $name) {
        $this->name = $name;
        $this->fieldGroup = $this->getFieldGroupDefinition();
    }

    abstract protected function getFieldGroupDefinition();

    public function registerFieldGroup() {
        if (function_exists('acf_add_local_field_group') && !empty($this->fieldGroup)) {
            acf_add_local_field_group($this->fieldGroup);
        }

    }
}
