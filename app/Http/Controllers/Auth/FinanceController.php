<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Auth;

class FinanceController extends Controller
{
     //
     use AuthenticatesUsers;

     /**
      * Where to redirect users after login.
      *
      * @var string
      */
     protected $redirectTo = RouteServiceProvider::HOME;
 
     public function __construct()
     {
         $this->middleware('guest:finance', ['except' => ['logout']]);
     }
 
     public function username(){
         return "username";
     }
     
     public function showLoginForm()
     {
       return view('financeLogin');
     }
     
     public function login(Request $request)
     {
       // Validate the form data
       $check =$this->validate($request, [
         'username'   => 'required',
         'password' => 'required|min:6'
       ]);
       // dd($request->username);
       // // dd($request->password);
       // dd(Hash::make($request->password));
 
       $attempt=Auth::guard('finance')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember);
       // Attempt to log the user in
       // dd($attempt);
       if ($attempt) {
         // if successful, then redirect to their intended location
             return redirect()->intended(route('finance.dashboard'));  
       } 
       // if unsuccessful, then redirect back to the login with the form data
       return redirect()->intended(route('finance.login'));
     }
     
     public function logout()
     {
         Auth::guard('finance')->logout();
         session()->flush();
         return redirect('/finance/login');
     }
}
