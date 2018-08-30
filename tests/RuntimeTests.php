<?php

use Swiftmade\Horsepower\Runtime;

class RuntimeTests extends TestCase
{
    private function getRuntime()
    {
        return new Runtime();
    }

    /**
     * @test
     */
    public function helloWorld()
    {
        $output = $this->getRuntime()->run('return "hello world"');
        $this->assertSame('hello world', $output->value);

        $output = $this->getRuntime()->run('return 5 * 7');
        $this->assertSame(35, $output->value);
    }

    /**
     * @test
     */
    public function variableDeclaration()
    {
        $output = $this->getRuntime()
            ->declare('apples', 5)
            ->declare('oranges', 7)
            ->run('return apples * oranges');

        $this->assertSame(35, $output->value);

        // Array declaration
        $output = $this->getRuntime()
            ->declare('fruits', [
                'apples',
                'banana',
                'pineapples',
            ])
            // remove items ending in "es"
            ->run('return fruits.filter(fruit => fruit.slice(-2) !== "es")');

        $this->assertSame(['banana'], $output->value);
    }
}
