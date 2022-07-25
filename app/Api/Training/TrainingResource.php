<?php

namespace App\Api\Training;

use Illuminate\Http\Resources\Json\JsonResource;

class TrainingResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "data" => [
                "success_rate" => $request->success_rate
            ]
        ];
    }
}