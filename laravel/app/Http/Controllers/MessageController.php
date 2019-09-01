<?php

namespace App\Http\Controllers;
use \App\Models\Chat;
use Illuminate\Http\Request;
use \App\Models\Message;

class MessageController extends Controller
{
    public function add(Request $request){
        $json = json_decode($request->getContent());
        $message = Message::create([
            'user_id' => $json->author, 
            'chat_id' => $json->chat, 
            'text' => $json->text
        ]);
        return $message->id;
    }

    public function get(Request $request){
        $chat_id = json_decode($request->getContent())->chat;
        $messages = Message::where('chat_id','=',$chat_id)->orderBy('created_at')->get();
        return $messages;
    }
}
