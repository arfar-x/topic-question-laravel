<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Topic extends Model
{
    use HasFactory;

    public function withSubTopics(string $id): Builder
    {
        return $this->query()->where('id', $id)
            ->orWhere('parent_id', $id);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(static::class, 'parent_id');
    }

    public function subTopics(): HasMany
    {
        return $this->hasMany(static::class, 'parent_id');
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class, 'topic_id');
    }
}
