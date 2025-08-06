<?php

namespace App\Http\Resources\Case;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CaseRecordResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'problem' => $this->problem,
            'solution' => $this->solution,
            'keywords' => $this->keywords,
            'frequency' => $this->frequency,
            'confidence_score' => $this->confidence_score,
            'status' => $this->status,
            'feedback' => CaseFeedbackResource::collection($this->whenLoaded('feedback')),
            'feddback_count' => $this->whenLoaded('feedbackCount')
        ];
    }
}
