<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ForumTopic extends Model
{
    protected $table = 'topics';

    protected $fillable = ['category', 'name', 'description'];

    public function group(): BelongsTo
    {
        return $this->belongsTo(ForumGroup::class, 'category');
    }

    public function threads(): HasMany
    {
        return $this->hasMany(ForumPost::class, 'category')->where('reply_to', 0)->orderByDesc('is_pinned')->orderByDesc('time_posted');
    }

    public function posts(): HasMany
    {
        return $this->hasMany(ForumPost::class, 'category');
    }
}
