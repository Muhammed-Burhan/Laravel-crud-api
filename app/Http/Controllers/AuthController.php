<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    public function register(Request $request){
        $field=$request->validate([
            'name'=>'required|string',
            'email'=>'required|string|unique:users,email',
            'password'=>'required|string|confirmed'
        ]);

        $user=User::create([
            'name'=>$field['name'],
            'email'=>$field['email'],
            'password'=>bcrypt($field['password']),
        ]);
        $token=$user->createToken('myapptoken')->plainTextToken;
        $response=['user'=>$user,'token'=>$token];
        return response($response,201);
    }

    public function login(Request $request){
        $field=$request->validate([
            'email'=>'required|string',
            'password'=>'required|string'
        ]);

        $user=User::where('email',$field['email'])->first();

        if(!$user || !Hash::check($field['password'],$user->password)){
            return response(["msg"=>"Incorrect email or password"]);
        }
        $token=$user->createToken('myapptoken')->plainTextToken;
        $response=['user'=>$user,'token'=>$token];
        return response($response,200);
    }


    public function logout(Request $request){
        $accessToken=$request->bearerToken();
        $token=PersonalAccessToken::findToken($accessToken);
        $token->delete();
        return ['msg'=>"Logged Out"];
    }
}
