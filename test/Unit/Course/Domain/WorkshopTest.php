<?php

declare(strict_types=1);

namespace App\Tests\Unit\Course\Domain;

use App\Course\Domain\Attendee;
use App\Course\Domain\LimitReached;
use App\Course\Domain\NoAttendees;
use App\Course\Domain\Workshop;
use App\Course\Domain\WorkshopAlreadyEnded;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Rfc4122\UuidV4;

class WorkshopTest extends TestCase
{
    /**
     * @test
     */
    public function workshop_should_not_allow_to_have_more_than_10_attendees()
    {
        $workshop = new Workshop(UuidV4::uuid4(), 'Workshop', 90);

        $this->expectException(LimitReached::class);

        for ($i = 0; $i < 11; $i++) {
            $attendee = new Attendee(UuidV4::uuid4(), (string)microtime(true));
            $workshop->addAttendee($attendee);
        }
    }

    /**
     * @test
     */
    public function workshop_can_have_10_attendees()
    {
        $workshop = new Workshop(UuidV4::uuid4(), 'Workshop', 90);

        for ($i = 0; $i < 10; $i++) {
            $attendee = new Attendee(UuidV4::uuid4(), (string)microtime(true));
            $workshop->addAttendee($attendee);
        }

        self::assertCount(10, $workshop->getAttendees());
    }

    /**
     * @test
     */
    public function attendees_are_unique()
    {
        $workshop = new Workshop(UuidV4::uuid4(), 'Workshop', 90);
        $id = UuidV4::uuid4();
        $name = (string)microtime(true);

        for ($i = 0; $i < 10; $i++) {
            $attendee = new Attendee($id, $name);
            $workshop->addAttendee($attendee);
        }

        self::assertCount(1, $workshop->getAttendees());
    }

    /**
     * @test
     */
    public function workshop_can_be_started()
    {
        $workshop = new Workshop(UuidV4::uuid4(), 'Workshop', 90);

        $attendee = new Attendee(UuidV4::uuid4(), 'John');
        $workshop->addAttendee($attendee);

        $workshop->start();

        self::assertTrue($workshop->isStarted());
    }

    /**
     * @test
     */
    public function workshop_cannot_be_started_when_there_are_no_attendees()
    {
        $workshop = new Workshop(UuidV4::uuid4(), 'Workshop', 90);

        $this->expectException(NoAttendees::class);
        $workshop->start();
    }

    /**
     * @test
     */
    public function workshop_cannot_be_started_when_it_is_ended()
    {
        $workshop = new Workshop(UuidV4::uuid4(), 'Workshop', 90);

        $workshop->end();

        $this->expectException(WorkshopAlreadyEnded::class);
        $workshop->start();
    }

    /**
     * @test
     */
    public function workshop_can_be_ended()
    {
        $workshop = new Workshop(UuidV4::uuid4(), 'Workshop', 90);

        $workshop->end();

        self::assertTrue($workshop->isEnded());
    }
}
