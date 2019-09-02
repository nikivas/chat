<?php

namespace App\Http\Controllers;
use \App\Models\Chat;
use App\Models\ChatUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use \App\Models\Message;

class MessageController extends Controller
{
    public function add(Request $request){
        $json = json_decode($request->getContent());
        $rules = [ 
            'chat' => 'required|regex:/^\d+$/i',
            'author' => 'required|regex:/^\d+$/i',
            'text' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if(!$validator->passes()){
            return Response::json([
                'status' => 400
            ],400);
        }

        $userInChat = ChatUsers::where('user_id','=',$json->author)
            ->where('chat_id','=',$json->chat)
            ->exists();
        
        if($userInChat){
            $message = Message::create([
                'user_id' => $json->author, 
                'chat_id' => $json->chat, 
                'text' => $json->text
            ]);
            return $message->id;
        }

        return Response::json([
            'status' => 403
        ],403);
    }

    public function get(Request $request){
        $json = json_decode($request->getContent());
        $rules = ['chat' => 'required|regex:/^\d+$/i'];
        
        $validator = Validator::make($request->all(), $rules);
        if(!$validator->passes()){
            return Response::json([
                'status' => 400
            ],400);
        }

        $chat_id = json_decode($request->getContent())->chat;
        $messages = Message::where('chat_id','=',$json->chat)->orderBy('created_at')->get();
        return $messages;
    }
}
