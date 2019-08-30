<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function add(Request $request){
        $json = json_decode($request->getContent());
        $message = \App\Models\Message::create([
            'user_id' => $json->author, 
            'chat_id' => $json->chat, 
            'text' => $json->text
        ]);

        return $message->id;
    }
}
