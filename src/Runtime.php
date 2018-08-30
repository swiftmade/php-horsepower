<?php
namespace Swiftmade\Horsepower;

use V8Js;
use Swiftmade\Horsepower\Config\RuntimeConfig;

class Runtime
{
    private $v8;
    private $config;
    private $declarations = [];

    public function __construct(RuntimeConfig $config = null)
    {
        $this->v8 = new V8Js;

        if (is_null($config)) {
            $config = new RuntimeConfig;
        }

        $this->config = $config;
    }

    public function require($module, $as)
    {
        // TODO: Implement
        return $this;
    }

    public function declare(string $variable, $value)
    {
        $this->v8->$variable = $value;
        $this->declarations[$variable] = $value;
        return $this;
    }

    public function run($code)
    {
        $result = $this->v8->executeString(
            $this->prepareCode($code)
        );

        return Output::from($result);
    }

    private function prepareCode($code)
    {
        $variables = '';

        foreach (array_keys($this->declarations) as $variable) {
            $variables .= 'var ' . $variable . '=PHP.' . $variable . ';';
        }

        return '(function() { ' . $variables . $code . ' })()';
    }
}
