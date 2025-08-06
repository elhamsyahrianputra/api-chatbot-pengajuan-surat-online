<?php

namespace App\Http\Resources\Letter;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LetterTypeResource extends JsonResource
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
            'slug' => $this->slug,
            'format_url' => $this->format_url,
            'created_at' => $this->created_at,
            'updated_at' => $this->whenNotNull($this->updated_at),
            'requirements' => LetterRequirementResource::collection($this->whenLoaded('requirements')),
        ];
    }
}
