<?php

declare(strict_types=1);

namespace App\Tests;

use App\Workshop;
use PHPUnit\Framework\TestCase;

class WorkshopTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_return_attendees_list()
    {
        $workshop = new Workshop();

        self::assertNotEmpty($workshop->getAttendees());
    }
}
