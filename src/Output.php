<?php
namespace Swiftmade\Horsepower;

class Output
{
    public $value;

    public static function from($value)
    {
        $instance = new self;
        return $instance->setValue($value);
    }

    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }
}
