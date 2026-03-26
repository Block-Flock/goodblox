<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wearing extends Model
{
    protected $table = 'wearing';

    protected $fillable = ['userid', 'itemid', 'type'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function catalogItem(): BelongsTo
    {
        return $this->belongsTo(Asset::class, 'itemid');
    }
}
