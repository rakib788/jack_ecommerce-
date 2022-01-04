<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function Showlogin(){
    	return view('admin.auth.login');
    }
    public function loginProcces(Request $request)
    {
    	$request->validate([
    		'email'=> 'required',
    		'password'=> 'required',
    	]);

    	$credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (auth()->attempt($credentials)) {
        	
        		return redirect()->route('admin.dashboard');
        	
        }else{
        	session()->flash('erorr','Invaild Credentials');
        	return redirect()->back();
        }

    }
     		public function logout(){
        	\auth()->logout();
        	return redirect()->route('Login');
        }
}
