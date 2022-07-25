<?php

namespace App\Api\Training;


use App\Api\Controller;
use App\Domain\Training\Services\TrainingService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class TrainingController extends Controller
{
    private TrainingService $trainingService;

    public function __construct(TrainingService $trainingService)
    {
        $this->trainingService = $trainingService;
    }

    public function showSuccessRate(): JsonResponse
    {
        $successRate = $this->trainingService->calculateSuccessRate();

        return response()->json(TrainingResource::make([
            "success_rate" => $successRate
        ]), Response::HTTP_OK);
    }
}