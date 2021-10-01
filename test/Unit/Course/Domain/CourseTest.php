<?php

declare(strict_types=1);

namespace App\Tests\Unit\Course\Domain;

use App\Course\Domain\Course;
use App\Course\Domain\Workshop;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Rfc4122\UuidV4;

class CourseTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_store_workshops()
    {
        $course = new Course(UuidV4::uuid4(), "Test Automation");

        $workshop = new Workshop(UuidV4::uuid4(), "Unit Tests", 90);

        $course->addWorkshop($workshop);

        self::assertContainsOnlyInstancesOf(Workshop::class, $course->getWorkshops());
    }
}