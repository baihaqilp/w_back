<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function username(){
        return "username";
    }
    
    public function showLoginForm()
    {
      return view('login');
    }
    
    public function login(Request $request)
    {
      // Validate the form data
      $cred = $this->validate($request, [
        'username'   => 'required',
        'password' => 'required|min:6'
      ]);

      
      $attempt=Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember);
      // Attempt to log the user in
      if ($attempt) {
        // if successful, then redirect to their intended location
            return redirect()->intended(route('admin.super_dashboard'));
        
      } 
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->intended(route('admin.login'));
    }
    
    public function logout()
    {
        Auth::guard('admin')->logout();
        session()->flush();
        return redirect('/admin/login');
    }
}
