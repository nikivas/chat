<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['user_id', 'chat_id', 'text'];
    
    public function chat(){
        return $this->hasOne('App\Models\Chat','id','chat_id');
    }

    public function author(){
        return $this->hasOne('App\Models\User','id','user_id');
    }
}
