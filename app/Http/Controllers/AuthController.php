<?php

namespace App\Http\Controllers;



use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(AuthRequest $request) {
        $user = User::create([
            'name'      => $request['name'],
            'email'     => $request['email'],
            'password'  => bcrypt($request['password']),
        ]);

        $token = $user->createToken($request['email'])->plainTextToken;

        $response = [
            'user'      => $user,
            'token'     => $token,
        ];
        return response($response , 201);
    }

    public function login(Request $request) {
        // Check email
        $user = User::where('email', $request['email'])->first();
        // Check password
        if(!$user || !Hash::check($request['password'], $user->password)) {
            return response([
                'message'   => 'Bad creds'
            ], 401);
        }


        $token = $user->createToken($request['email'])->plainTextToken;

        $response = [
            'user'      => $user,
            'token'     => $token,
        ];
        return response($response , 201);
    }

    public function logout() {
        auth()->user()->tokens()->delete();

        return [
            'message'   => 'Logged out',
        ];
    }
}
