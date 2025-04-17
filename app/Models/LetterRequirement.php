<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class LetterRequirement extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'letter_type_id',
        'name',
        'description',
    ];

    public function letterType(): BelongsTo {
        return $this->belongsTo(LetterType::class);
    }
}
