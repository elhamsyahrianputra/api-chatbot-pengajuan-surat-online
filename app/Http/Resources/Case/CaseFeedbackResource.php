<?php

namespace App\Http\Resources\Case;

use App\Http\Resources\User\UserResource;
use App\Models\CaseRecord;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CaseFeedbackResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'case_record_id' => $this->case_record_id,
            'case_record' => new CaseRecordResource($this->whenLoaded('caseRecord')),
            'user_id' => $this->user_id,
            'user' => new UserResource($this->whenLoaded('user')),
            'type' => $this->type
            
            
        ];
    }
}
