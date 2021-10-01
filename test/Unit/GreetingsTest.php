<?php

declare(strict_types=1);

namespace App\Tests\Unit;

use App\Greetings;
use PHPUnit\Framework\TestCase;

class GreetingsTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_return_greetings_text()
    {
        $greetings = new Greetings();

        self::assertSame("Hello Marek", $greetings->hello("Marek"));
    }
}
