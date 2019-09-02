<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddRequest;
use App\Models\Chat;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use App\Exceptions;

class UserController extends Controller
{
    public function add(Request $request){

        $json = json_decode($request->getContent());
        $rules = [ 'username' => 'required' ];

        $validator = Validator::make($request->all(), $rules);
        if(!$validator->passes()){
            return Response::json([
                'status' => 400
            ],400);
        }
        $user = User::create(['username' => $json->username]);
        return $user->id;
           
    }

    
    
}
