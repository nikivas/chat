<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function add(Request $request){
        $json = json_decode($request->getContent());
        $user = \App\Models\User::create(['username' => $json->username]);
        return $user->id;
    }

    public function getChats(Request $request){
        $json = json_decode($request->getContent());
        $chats = \App\Models\Chat::with(['userInfo'=> function($q) use($json){
            $q->where('user_id','=',$json->user);
        }])->get();
        return json_encode($chats);

    }
    
}
