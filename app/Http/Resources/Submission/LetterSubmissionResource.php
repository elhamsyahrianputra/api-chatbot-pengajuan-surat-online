<?php

namespace App\Http\Resources\Submission;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LetterSubmissionResource extends JsonResource
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
            'user_id' => $this->user_id,
            'user' => new UserResource($this->whenLoaded('user')),
            'letter_type_id' => $this->letter_type_id,
            'letter_type' => $this->whenLoaded('letterType'),
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->whenNotNull($this->updated_at)
        ];
    }
}
