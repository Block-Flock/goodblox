<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Game extends Model
{
    protected $fillable = [
        'name', 'description', 'thumbnail', 'creator_id', 'players',
        'ip', 'port', 'defaultmapfilename', 'datecreated',
    ];

    protected function casts(): array
    {
        return [
            'datecreated' => 'datetime',
        ];
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}
