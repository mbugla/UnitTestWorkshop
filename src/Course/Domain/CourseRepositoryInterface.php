<?php

declare(strict_types=1);

namespace App\Course\Domain;

use Ramsey\Uuid\UuidInterface;

interface CourseRepositoryInterface
{
    public function find(UuidInterface $id): ?Course;
    
    public function store(Course $course): void;
}