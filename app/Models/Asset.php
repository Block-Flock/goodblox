<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Asset extends Model
{
    protected $table = 'catalog';

    protected $fillable = [
        'assetid', 'type', 'name', 'description', 'thumbnail', 'creatorid',
        'filename', 'price', 'sales', 'is_limited', 'hatmesh', 'hattexture',
    ];

    protected function casts(): array
    {
        return [
            'is_limited' => 'boolean',
        ];
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creatorid');
    }
}
