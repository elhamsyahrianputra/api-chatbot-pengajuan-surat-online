<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'gender' => $this->profile->gender ?? null,
            'academic_program' => $this->profile->academic_program ?? null,
            'phone' => $this->profile->phone ?? null,
            'semester' => $this->profile->semester ?? null,
        ];
    }
}
