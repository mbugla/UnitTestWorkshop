<?php

declare(strict_types=1);

namespace App\Tests\Course\Application;

use App\Course\Application\App;
use App\Course\Application\Service\WebService;
use App\Course\Domain\Course;
use App\Course\Domain\CourseRepositoryInterface;
use App\Course\Domain\Workshop;
use App\Course\Domain\WorkshopRepositoryInterface;
use App\Course\Infrastructure\InMemory\InMemoryCourseRepository;
use PHPUnit\Framework\TestCase;

class AppTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_create_and_store_course()
    {
        //Mock
//        $courseRepo = $this->createMock(CourseRepositoryInterface::class);
//        $courseRepo->expects($this->once())->method('store')->with($this->isInstanceOf(Course::class));

        $courseRepo = new InMemoryCourseRepository();

        //Dummies
        $workshopRepo = $this->createStub(WorkshopRepositoryInterface::class);
        $webService = $this->createMock(WebService::class);


        $app = new App($courseRepo, $workshopRepo, $webService);

        $course = $app->createCourse('Test Automation');

        self::assertInstanceOf(Course::class, $course);
        self::assertSame("Test Automation", $courseRepo->find($course->getId())->getName());
    }
}
