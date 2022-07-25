<?php

namespace App\Domain\Training\Services;

use App\Domain\AbstractService;
use App\Domain\Training\TrainingRepository;
use JetBrains\PhpStorm\Pure;

class TrainingService extends AbstractService
{
    private TrainingRepository $trainingRepository;

    #[Pure]
    public function __construct(TrainingRepository $repository)
    {
        parent::__construct($repository);

        $this->trainingRepository = $repository;
    }

    public function calculateSuccessRate(): int
    {
        $trainings = $this->trainingRepository->whereUser(3);

        $successfullTrainings = collect($trainings)->filter(function ($training) {
            return $training->success === true;
        });

        return $successfullTrainings->count() / $trainings->count();
    }
}