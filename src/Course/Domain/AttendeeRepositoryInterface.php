<?php

declare(strict_types=1);

namespace App\Course\Domain;

use Ramsey\Uuid\UuidInterface;

interface AttendeeRepositoryInterface
{
    public function find(UuidInterface $id): ?Attendee;

    public function store(Attendee $attendee): void;
}