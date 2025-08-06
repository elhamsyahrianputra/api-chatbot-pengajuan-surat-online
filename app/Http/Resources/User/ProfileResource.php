<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user_id' => $this->user_id,
            'identity_number' => $this->identity_number,
            'academic_program' => $this->academic_program,
            'phone' => $this->phone,
            'semester' => $this->semester,
        ];
    }
}
