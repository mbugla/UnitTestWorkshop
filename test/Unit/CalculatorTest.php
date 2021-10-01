<?php

declare(strict_types=1);

namespace App\Tests\Unit;

use App\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    /**
     * @dataProvider getAddNumbers
     */
    public function testCanAdd($a, $b, $expectedResult)
    {
        $calculator = new Calculator();

        self::assertEquals($expectedResult, $calculator->calculate($a, $b, Calculator::ADD));
    }

    public function getAddNumbers()
    {
        return [
            [1, 2, 3],
            [0, 1, 1],
            [0, 3, 3],
            [0, 0, 0],
        ];
    }

    /**
     * @test
     */
    public function it_should_throw_an_exception()
    {
        $calculator = new Calculator();
        
        try {
            $calculator->calculate(1,2, 'Multiply');

        } catch (\InvalidArgumentException $e) {
            self::assertTrue(true);
            return;
        }
        
        self::assertTrue(false);
    }
}
