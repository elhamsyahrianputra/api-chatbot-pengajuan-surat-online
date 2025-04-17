<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class LetterType extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function requirements(): HasMany {
        return $this->hasMany(LetterRequirement::class);
    }
}
