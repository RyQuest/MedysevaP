<?php

namespace App\Http\Controllers\Api\Staff;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;
use JWTAuth;
use Config;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    //
    public function __construct()
    {
        Config::set('jwt.user', Staff::class);
        Config::set('auth.providers', ['users' => [
            'driver' => 'eloquent',
            'model' => Staff::class,
        ]]);
    }
    public function login(Request $request)
    {
        $validator = \Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required',
            ]
        );

        if ($validator->fails()) {
            return response(['status' => 0, 'msg' => $validator->errors()->first()]);
        }
        $input = $request->only('email', 'password');
        $jwt_token = null;

        if (!$jwt_token = JWTAuth::attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], Response::HTTP_UNAUTHORIZED);
        }
        $user = Staff::where('email', $request->email)->first();

        return response()->json([
            'status' => 1,
            'token' => $jwt_token,
            'user' => $user,
        ]);
    }
}
