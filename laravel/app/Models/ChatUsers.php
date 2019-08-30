<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatUsers extends Model
{
    protected $fillable = ['chat_id','user_id'];
    protected $table = 'chats_users';
    public $timestamps = false;
}
