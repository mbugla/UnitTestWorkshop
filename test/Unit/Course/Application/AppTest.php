<?php

declare(strict_types=1);

namespace App\Tests\Unit\Course\Application;

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
    private App $app;
    /**
     * @var CourseRepositoryInterface|mixed|\PHPUnit\Framework\MockObject\MockObject
     */
    private mixed $courseRepo;
    /**
     * @var WorkshopRepositoryInterface|mixed|\PHPUnit\Framework\MockObject\Stub
     */
    private mixed $workshopRepo;
    /**
     * @var WebService|mixed|\PHPUnit\Framework\MockObject\MockObject
     */
    private mixed $webService;


    public function setUp(): void
    {
        parent::setUpBeforeClass();
        //Mock
        $this->courseRepo = $this->createMock(CourseRepositoryInterface::class);

        //Dummies
        $this->workshopRepo = $this->createStub(WorkshopRepositoryInterface::class);

        $this->webService = $this->createMock(WebService::class);


        $this->app = new App($this->courseRepo, $this->workshopRepo, $this->webService);
    }

    /**
     * @test
     * @group Course
     */
    public function it_should_create_and_store_course()
    {
        $this->courseRepo->expects($this->once())->method('store')->with($this->isInstanceOf(Course::class));

        $c = $this->app->createCourse('Test Automation');


        self::assertInstanceOf(Course::class, $c);
    }

    /**
     * @test
     */
    public function it_should_change_name_when_it_is_to_short()
    {
        $c = $this->app->createCourse('Tes');
        
        self::assertSame('*Tes*', $c->getName());
    }
}
