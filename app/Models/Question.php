<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    use HasFactory;

    protected $casts = [
        'options' => 'array',
    ];

    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class, 'parent_id');
    }
}
