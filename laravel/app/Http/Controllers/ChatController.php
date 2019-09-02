<?php

namespace App\Http\Controllers;

use \App\Models\Chat;
use App\Models\ChatUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

class ChatController extends Controller
{
    public function add(Request $request){
        $json = json_decode($request->getContent());
        $rules = [ 
            'name' => 'required',
            'users.*' => 'required|regex:/^(\d+[,]{1})*(\d+){1}$/i'
        ];

        $validator = Validator::make($request->all(), $rules);
        if(!$validator->passes()){
            return Response::json([
                'status' => 400
            ],400);
        }
        
        $chat = Chat::create(['name'=> $json->name]);
        foreach ($json->users as $value) {
            ChatUsers::create(['user_id'=>$value, 'chat_id' => $chat->id]);
        }
        return $chat->id;
    }

    // get chat by user_id
    public function get(Request $request){
        $json = json_decode($request->getContent());
        $rules = [ 'user' => 'required' ];

        $validator = Validator::make($request->all(), $rules);
        if(!$validator->passes()){
            return Response::json([
                'status' => 400
            ],400);
        }

        $messages = DB::table('messages')
            ->select('chat_id', DB::raw('MAX(created_at) as last_post_time') )
            ->groupBy('chat_id');

        $chats = DB::table('chats_users')
            ->join('chats','chats_users.chat_id', '=', 'chats.id')
            ->joinSub($messages,'last_messages',function($join){
                $join->on('chats.id','=','last_messages.chat_id');
            })->where('chats_users.user_id','=',$json->user)
            ->orderByDesc('last_messages.last_post_time')
            ->select('chats.id', 'chats.name', 'chats.created_at', 'last_messages.last_post_time')
            ->distinct()
            ->get();

        return json_encode($chats);
    }

}
