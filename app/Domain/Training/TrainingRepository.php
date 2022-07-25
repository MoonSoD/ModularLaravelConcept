<?php

namespace App\Domain\Training;

use App\Domain\AbstractRepository;

class TrainingRepository extends AbstractRepository
{
    public function __construct()
    {
        parent::__construct(Training::class);
    }

    public function whereUser(int $id) {
        return $this->query
            ->where(["user-id" => $id])
            ->get();
    }
}