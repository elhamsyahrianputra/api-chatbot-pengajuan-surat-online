<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class LetterSubmission extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'user_id',
        'letter_type_id',
        'code',
        'file_path',
        'status'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->code)) {
                $model->code = self::generateUniqueCode();
            }
        });
    }

    /**
     * Generate unique 4-letter code (AAAA - ZZZZ)
     */
    public static function generateUniqueCode()
    {
        do {
            $code = '';
            for ($i = 0; $i < 4; $i++) {
                $code .= chr(rand(65, 90)); // ASCII A=65, Z=90
            }
        } while (self::where('code', $code)->exists());

        return $code;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function letterType(): BelongsTo
    {
        return $this->belongsTo(LetterType::class, 'letter_type_id', 'id');
    }
}
