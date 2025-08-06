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
            'role' => $this->getRoleNames()->first(),
            'gender' => $this->profile->gender ?? null,
            'identity_number' => $this->profile->identity_number ?? null,
            'academic_program' => $this->profile->academic_program ?? null,
            'phone' => $this->profile->phone ?? null,
            'semester' => $this->profile->semester ?? null,
        ];
    }
}
