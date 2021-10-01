<?php

declare(strict_types=1);

namespace App\Course\Infrastructure\InMemory;

use App\Course\Domain\Course;
use App\Course\Domain\CourseRepositoryInterface;
use Ramsey\Uuid\UuidInterface;

class InMemoryCourseRepository implements CourseRepositoryInterface
{
    private array $courses = [];

    public function find(UuidInterface $id): ?Course
    {
        return $this->courses[(string)$id] ?? null;
    }

    public function store(Course $course): void
    {
        $this->courses[(string)$course->getId()] = $course; 
    }
}