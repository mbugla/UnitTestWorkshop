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
    private bool $isStarted = false;
    private bool $isEnded = false;

    public function __construct(UuidInterface $uuid, string $name, int $duration)
    {
        $this->name = $name;
        $this->duration = $duration;
        $this->id = $uuid;
    }

    public function addAttendee(Attendee $attendee)
    {
        if (count($this->attendees) === 10) {
            throw new LimitReached();
        }

        $this->attendees[(string)$attendee->getId()] = $attendee;
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

    public function start()
    {
        if ($this->isEnded) {
            throw new WorkshopAlreadyEnded();
        }
        
        if(count($this->attendees) === 0) {
            throw new NoAttendees();
        }
        $this->isStarted = true;
    }

    public function isStarted(): bool
    {
        return $this->isStarted;
    }

    public function end()
    {
        $this->isStarted = false;
        $this->isEnded = true;
    }

    /**
     * @return bool
     */
    public function isEnded(): bool
    {
        return $this->isEnded;
    }
}