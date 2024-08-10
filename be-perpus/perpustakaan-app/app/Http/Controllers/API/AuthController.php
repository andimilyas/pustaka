<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Users;
use App\Models\Roles;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $roleUser = Roles::where('name', 'user')->first();

        $user = Users::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $roleUser->id,
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'message' => 'Register Success',
            'user' => $user,
            'token' => $token,
        ], 201);
    }

    public function login(Request $request)
    {
        $credentials = request(
            [
                'email',
                'password',
            ]
        ); // dd($credentials);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(
                [
                    'error' => 'Unauthorized'
                ],
                401
            );
        } // dd($token);

        $userData = Users::with('role')->where('email', $request['email'])->first();

        $token = JWTAuth::fromUser($userData);

        return response()->json([
            'message' => 'Login Success',
            'user' => $userData,
            'token' => $token, 
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function getUser()
    {
        $user = auth()->user();

        $currentUser = Users::with('profile', 'listBorrow', 'role', 'books')->find($user->id);
        return response()->json(
            [
                'message' => 'Get User Success',
                'user' => $currentUser
            ]
        );
    }
}
