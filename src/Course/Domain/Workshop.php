<?php

declare(strict_types=1);

namespace App\Course\Domain;

use Ramsey\Uuid\UuidInterface;

class Workshop
{
    private string $name;
    private int $duration;
    private array $attendees = [];
    private UuidInterface $id;

    public function __construct(UuidInterface $uuid, string $name, int $duration)
    {
        $this->name = $name;
        $this->duration = $duration;
        $this->id = $uuid;
    }

    public function addAttendee(Attendee $attendee)
    {
        $this->attendees[] = $attendee;
    }

    /**
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Attendee[]|array
     */
    public function getAttendees(): array
    {
        return $this->attendees;
    }

    /**
     * @return UuidInterface
     */
    public function getId(): UuidInterface
    {
        return $this->id;
    }
}