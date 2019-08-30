<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function add(Request $request){
        $json = json_decode($request->getContent());
        $user = \App\Models\User::create(['username' => $json->username]);
        return $user->id;
    }

    public function getChats(Request $request){
        $json = json_decode($request->getContent());

        $messages = DB::table('messages')
            ->select('chat_id', DB::raw('MAX(created_at) as last_post_time') )
            ->groupBy('chat_id');

        $chats = DB::table('chats_users')
            ->join('chats','chats_users.chat_id', '=', 'chats.id')
            ->joinSub($messages,'last_messages',function($join){
                $join->on('chats.id','=','last_messages.chat_id');
            })->orderByDesc('last_messages.last_post_time')->select('chats.id', 'chats.name', 'chats.created_at', 'last_messages.last_post_time')->distinct()->get();

        return json_encode($chats);
    }
    
}
