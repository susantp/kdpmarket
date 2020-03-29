<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:members')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:membership')->except('logout');
        // $this->middleware('guest:companies')->except('logout');

    }

    public function showLoginForm()
    {
        // return "hello";
        return view('cauth.login');
    }


    // Admin Login Section 
    public function showAdminLoginForm()
    {
        return view('cauth.adminlogin',['url'=>'adminLogin']);
    }
    public function adminLogin(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if (Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->get('remember'))) {
            return redirect()->intended('/admin');
        }
        return back()->withInput($request->only('email','remember'));
    }


    // Membership Login Form

    public function showMembershipLoginForm()
    {
        return view('cauth.membershipLogin',['url'=>'membership']);

    }
    public function membershipLogin(Request $request)
    {
        $this->validate($request,[
            'userId'=> 'required',
            'fist_login_password'=>'required|min:6',
        ]);
        if(Auth::guard('membership')->attempt(['userID'=>$request->userID,'first_login_password'=>$request->first_login_password],$request->get('remember')))
        {
            return redirect()->intended('/membership');

        }
        return back()->withInput($request->only('userID','remember'));

    }

    // Companies Login

}
