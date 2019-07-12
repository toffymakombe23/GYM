<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
	
	
	
	
	/*
	|--------------------------------------------------------------------------
				    | Login Controller
				    |--------------------------------------------------------------------------
				    |
				    | This controller handles authenticating users for the application and
				    | redirecting them to your home screen. The controller uses a trait
				    | to conveniently provide its functionality to your applications.
				    |
				    */
	
	use AuthenticatesUsers;
	
	
	
	
	
	/**
	* Where to redirect users after login.
				     *
				     * @var string
				     */
				    protected $redirectTo = '/home';
	
	
	
	
	
	/**
	* Create a new controller instance.
				     *
				     * @return void
				     */
				    public function __construct()
				    {
		$this->middleware('guest')->except('logout');
		// 		$this->middleware('guest:admin',['except' => ['logout']]);
	}
	
	// 	check if authenticated, then redirect to members
		        protected function authenticated(){
		if(Auth::check()){
			return redirect()->route('admin.members.index');
		}
	}
	
	public function logout(){
		Auth::logout();
		return redirect('/login');
	}
}
