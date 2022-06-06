<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

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
    
    public function forgotPassword(){
        return view('user.forgot');
    }
    
    public function resetPassword(Request $request){
        $validator = \Validator::make($request->all(),[
            'email' => 'required|email',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        
        $user = User::where('email',$request->get('email'))->first();
        if(null == $user){
            $array = array('Email does not exists');
            $error['email'] = $array;
            return redirect()->back()->withErrors($error)->withInput();
        }
        
        if($user->role != 'partner'){
            $array = array('Email does not exists');
            $error['email'] = $array;
            return redirect()->back()->withErrors($error)->withInput();
        }
        
        $params['role'] = 'users';
        $params['email'] = $request->get('email');
            
            // \Log::info($params);
        $client = new \GuzzleHttp\Client();
        $call = "https://clinic.medyseva.com/api/forgot_password";
        $response = $client->request('POST', $call,[
            'multipart' => [
                [
                    'name' => 'data',
                    'contents' => json_encode(
                        [
                            'email' => $request->get('email'),
                            'role' => 'users',
                        ]
                    ),
                ]
            ]
        ]);
        $response =  json_decode($response->getBody()->getContents(),true);
        if($response['st']){
            return redirect()->to('/signin')->withSuccess('We have sent an email');
        }
        return redirect()->back()->withError('Opps something went wrong.Please try again.');
    }
}
