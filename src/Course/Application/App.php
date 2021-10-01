<?php

declare(strict_types=1);

namespace App\Course\Application;

use App\Course\Application\Service\WebService;
use App\Course\Domain\Course;
use App\Course\Domain\CourseRepositoryInterface;
use App\Course\Domain\WorkshopRepositoryInterface;
use Ramsey\Uuid\Rfc4122\UuidV4;
use Ramsey\Uuid\UuidInterface;

class App
{
    private CourseRepositoryInterface $courseRepository;
    private WorkshopRepositoryInterface $workshopRepository;
    private WebService $webService;

    public function __construct(
        CourseRepositoryInterface $courseRepository,
        WorkshopRepositoryInterface $workshopRepository,
        WebService $webService
    ) {
        $this->courseRepository = $courseRepository;
        $this->workshopRepository = $workshopRepository;
        $this->webService = $webService;
    }

    public function createCourse(string $name): Course
    {
        $course = new Course(UuidV4::uuid4(), $name);

        $this->courseRepository->store($course);

        return $course;
    }

    public function createWorkshop()
    {
    }


}