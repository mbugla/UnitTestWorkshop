<?php

declare(strict_types=1);

namespace App\Tests;

use App\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testCanAdd()
    {
        $calculator = new Calculator();

        self::assertEquals(3, $calculator->calculate(1, 2, Calculator::ADD));
    }
}
