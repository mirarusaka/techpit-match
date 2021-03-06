<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'self_introduction',
        'sex',
        'img_name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function toUserId()
    {
        return $this->hasMany('app\Models\Reaction', 'to_user_id', 'id');
    }

    public function fromUserId()
    {
        return $this->hasMany('app\Models\Reaction', 'from_user_id', 'id');
    }

    public function chatMessages()
    {
        return $this->hasMany('App\Models\ChatMessage');
    }

    public function chatRoomUsers()
    {
        return $this->hasMany('App\Models\ChatRoomUsers');
    }
}
