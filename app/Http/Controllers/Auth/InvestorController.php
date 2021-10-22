<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth;

class InvestorController extends Controller
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
        $this->middleware('guest:investor', ['except' => ['logout']]);
    }

    public function username(){
        return "username";
    }
    
    public function showLoginForm()
    {
      return view('investorlogin');
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

      $attempt=Auth::guard('investor')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember);
      // Attempt to log the user in
      // dd($attempt);
      if ($attempt) {
        // if successful, then redirect to their intended location
            return redirect()->intended(route('investor.super_dashboard'));  
      } 
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->intended(route('investor.login'));
    }
    
    public function logout()
    {
        Auth::guard('investor')->logout();
        session()->flush();
        return redirect('/investor/login');
    }
}
