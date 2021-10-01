<?php

declare(strict_types=1);

namespace App\Course\Domain;

use Ramsey\Uuid\UuidInterface;

class Course
{
    private string $name;
    private array $workshops;
    private UuidInterface $id;

    public function __construct(UuidInterface $id, string $name)
    {
        $this->name = $name;
        $this->id = $id;
    }

    public function addWorkshop(Workshop $workshop): void
    {
        $this->workshops[(string)$workshop->getId()] = $workshop;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getWorkshops(): array
    {
        return $this->workshops;
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }
}