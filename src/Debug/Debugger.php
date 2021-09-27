<?php
namespace AlexScherer\WpthemeValerieknill\Debug;

use AlexScherer\WpthemeValerieknill\Rendering\IRenderable;

class Debugger implements IRenderable {

    public const LEVEL_NONE = 0;

    public const LEVEL_INFO = 1;

    public const LEVEL_DEBUG = 2;

    public const LEVEL_WARNING = 3;

    public const LEVEL_ERROR = 4;

    protected $logList = [];

    protected $minimalLogLevel;

    public function __construct($minimalLogLevel = Debugger::LEVEL_NONE)
    {
        $this->minimalLogLevel = $minimalLogLevel;
    }

    public function log($output, $parent, $level = Debugger::LEVEL_DEBUG) {
        $this->logList[] = [
            'level' => $level,
            'parent' => $parent,
            'output' => $output
        ];
    }

    public function info($output, $parent) {
        $this->log($output, $parent, Debugger::LEVEL_INFO);
    }

    public function debug($output, $parent) {
        $this->log($output, $parent, Debugger::LEVEL_DEBUG);
    }

    public function warning($output, $parent) {
        $this->log($output, $parent, Debugger::LEVEL_WARNING);
    }

    public function error($output, $parent) {
        $this->log($output, $parent, Debugger::LEVEL_ERROR);
    }

    public function isDebugOutputEnabled() {
        return defined('WP_DEBUG') && WP_DEBUG;
    }

    public function render() {
        // Render start of the logging area
        foreach ($this->logList as $logEntry) {
            // Figure out what the output data is

            // Check if there is a specific View for the data type

            // Include either the specific view or a general print_r() type view
        }
        // Render end of the logging area
    }

    protected function getViewPath($name = false) {
        return get_template_directory() . '/src/Debug/Views/' . ($name ? $name : $this->name) . '.php';
    }
}
