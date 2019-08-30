<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function add(Request $request){
        $user = \App\Models\User::create(['username' => $request->username]);
    }
    
}
