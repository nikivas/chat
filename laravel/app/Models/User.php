<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Model
{
    protected $fillable = ['username'];

    public function chats(){
        return $this->belongsToMany('App\Models\Chat','chats_users', 'user_id', 'chat_id');
    }
}
