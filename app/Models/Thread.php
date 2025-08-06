<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thread extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'user_id',
        'role',
        'message'
    ];
}
