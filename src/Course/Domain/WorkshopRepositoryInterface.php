<?php

declare(strict_types=1);

namespace App\Course\Domain;

use Ramsey\Uuid\UuidInterface;

interface WorkshopRepositoryInterface
{
    public function find(UuidInterface $id): ?Workshop;
    
    public function store(Workshop $workshop): void;
}