<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ForumGroup extends Model
{
    protected $table = 'forumgroups';

    protected $fillable = ['name', 'sort_order'];

    public function topics(): HasMany
    {
        return $this->hasMany(ForumTopic::class, 'category')->orderBy('id');
    }
}
