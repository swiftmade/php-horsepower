<?php
namespace Swiftmade\Horsepower\Config;

use Swiftmade\Horsepower\ModuleLoaders\CommonJsLoader;

class RuntimeConfig
{
    public function getModuleLoader()
    {
        return new CommonJsLoader();
    }

    public function throwExceptionOnError()
    {
        // If there is a runtime error in the JS code, and this method
        // returns true, your PHP code will be stopped by an exception.
        return false;
    }
}
