<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index(){
        return view('user.login');
    }
    public function login(Request $request){
        $validator = \Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $credentials = $request->only('email', 'password');
        $credentials['role'] = 'partner';

        if (\Auth::attempt($credentials)) {
            // dd(auth()->user());
            \Session::put('Test','ys');
            return redirect()->to('dashboard')->with(['data' => auth()->user()]);
        }
        
        $array = array('Invalid email or password');
        $error['email'] = $array;
        return redirect()->back()->withErrors($error)->withInput();
        
    }
}
