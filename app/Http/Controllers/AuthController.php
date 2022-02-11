<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;


class AuthController extends Controller
{
    //
    public function register(Request $request){
        $fields=$request->validate([
            'name'=>'required|string',
            'email'=>'required|string|unique:users,email',
            'password'=>'required|string|confirmed'


        ]);

        $user=User::create([
            'name'=>$fields['name'],
            'email'=>$fields['email'],
             'password'=>bcrypt($fields['password'])

        ]);

        $token=$user->createToken('myapptoken')->plainTextToken;

        $response=[
            'user'=>$user,
            'token'=>$token

        ];

        return response($response, 201);
    }

    public function store(Request $request)
   {
      $request->validate([
         'email' => 'required|email',
         'password' => 'required',
         
      ]);

      $user = User::where('email', $request->email)->first();

      if (!$user || !Hash::check($request->password, $user->password)) {
         return response('Login invalid', 503);
      }

      return $user->createToken('myapptoken')->plainTextToken;
   }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();

        return [
            'message'=>'Logged out'
        ];
    }
}
