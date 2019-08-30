<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = ['name'];
    public function users(){
        return $this->belongsToMany('App\Models\User','chats_users', 'chat_id', 'user_id');
    }
    public function userInfo(){
        return $this->hasMany('\App\Models\ChatUsers','chat_id','id');
    }
}
