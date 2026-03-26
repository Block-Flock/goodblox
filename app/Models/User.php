<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable([
    'username', 'email', 'password', 'thumbnail', 'blurb', 'lastseen',
    'bantype', 'banreason', 'bandate', 'unbantime', 'USER_PERMISSIONS',
    'BC', 'BCExpire', 'robux', 'tix', 'next_tix_reward', 'membership_type',
    'next_bricks_award', 'accountcode', 'ip', 'defaultmaplocationfolder',
    'headcolor', 'torsocolor', 'leftarmcolor', 'rightarmcolor', 'leftlegcolor', 'rightlegcolor',
    'avatar_hash', 'join_date', 'time_joined', 'is_banned',
])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    public function getAuthIdentifierName(): string
    {
        return 'username';
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'join_date' => 'datetime',
            'is_banned' => 'boolean',
            'time_joined' => 'integer',
        ];
    }
}
