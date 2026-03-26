<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ForumPost extends Model
{
    protected $table = 'forum';

    public $timestamps = true;

    protected $fillable = [
        'author', 'reply_to', 'title', 'content', 'time_posted', 'category', 'is_pinned',
    ];

    protected function casts(): array
    {
        return [
            'is_pinned' => 'boolean',
        ];
    }

    public function authorUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author');
    }

    public function topic(): BelongsTo
    {
        return $this->belongsTo(ForumTopic::class, 'category');
    }

    public function replies(): HasMany
    {
        return $this->hasMany(ForumPost::class, 'reply_to', 'id')->orderBy('time_posted');
    }
}
