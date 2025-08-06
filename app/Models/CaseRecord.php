<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaseRecord extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'problem',
        'solution',
        'keywords',
        'frequency',
        'confidence_score',
        'status',
    ];

    public function feedback(): HasMany
    {
        return $this->hasMany(CaseFeedback::class);
    }
}
