<?php

namespace App\\Models;

use Illuminate\\Database\\Eloquent\\Model;
use Illuminate\\Database\\Eloquent\\Relations;\n

class User extends Model
{
    // Table associated with the model
    protected $table = 'users';

    // Define relationships
    public function games() : Relations\\HasMany
    {
        return $this->hasMany(Game::class);
    }

    public function assets() : Relations\\HasMany
    {
        return $this->hasMany(Asset::class);
    }

    public function messages() : Relations\\HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function friends() : Relations\\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id');
    }

    public function items() : Relations\\HasMany
    {
        return $this->hasMany(Item::class);
    }
}