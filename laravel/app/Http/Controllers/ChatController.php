<?php

namespace App\Http\Controllers;

use \App\Models\Chat;
use App\Models\ChatUsers;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function add(Request $request){
        $json = json_decode($request->getContent());
        $chat = Chat::create(['name'=> $json->name]);
        foreach ($json->users as $value) {
            ChatUsers::create(['user_id'=>$value, 'chat_id' => $chat->id]);
        }
        return $chat->id;
    }
}
