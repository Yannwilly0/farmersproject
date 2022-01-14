<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;

class apiAuthController extends Controller
{
    //
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out',
        ];
    }

    
    public function login(Request $request)
    {
         $this->validate($request, [
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $user = User::where('email',$request->input('email'))->first();

        if(!$user || !Hash::check($request->input('password'), $user->password))
        {
            return response([
                'message'=>'Error with the credentials',
            ],401);
        }


        $token = $user->createToken('farmersHub')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 200);

    
    }

    public function refreshToken(Request $request)
    {
         $this->validate($request, [
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $user = User::where('email',$request->input('email'))->first();

        if(!$user || !Hash::check($request->input('password'), $user->password))
        {
            return response([
                'message'=>'Error with the credentials',
            ],401);
        }

        $user->tokens()->delete();
        $token = $user->createToken('farmersHub')->plainTextToken;

        $response = [
            'token' => $token
        ];

        return response($response, 200);

    
    }
}
