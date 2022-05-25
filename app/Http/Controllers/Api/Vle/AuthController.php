<?php

namespace App\Http\Controllers\Api\Vle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\VleUser;
use JWTAuth;
use Config;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    //
    public function __construct()
    {
        Config::set('jwt.user', VleUser::class);
        Config::set('auth.providers', ['users' => [
            'driver' => 'eloquent',
            'model' => VleUser::class,
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
            //   return response()->json(['error'=>$validator->errors()], 401); 
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
        $user = VleUser::where('email', $request->email)->first();

        return response()->json([
            'status' => 1,
            'token' => $jwt_token,
            'user' => $user,
        ]);
    }
}
