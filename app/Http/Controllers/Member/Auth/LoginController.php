<?php

namespace App\Http\Controllers\Member\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    public function __construct()
    {
        // return "memeber";
        // $this->middleware('auth:web')->except('logout');
        // $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
        // dd(Auth::guard('web')->check());
        return view('cauth.login', [
            'title' => 'Member Login',
            'loginRoute' => 'member.login'
        ]);
    }

    public function login(Request $request)
    {
        $this->validator($request);

        if (Auth::guard('members')->attempt($request->only('email', 'password'))) {
            return redirect()
                ->route('member.dashboard')
                ->with('status', 'You are logged in as Member');
        }

        return $this->loginFailed();
    }

    public function logout()
    {
        Auth::guard('members')->logout();
        return redirect()
            ->route('member.login')
            ->with('status', 'Member has been logged out!');
    }

    private function validator(Request $request)
    {
        //validation rules.
        $rules = [
            'email'    => 'required|exists:members|min:5|max:191',
            'password' => 'required|string|min:4|max:255',
        ];

        //custom validation error messages.
        $messages = [
            'email.exists' => 'These credentials do not match our records.',
        ];

        //validate the request.
        $request->validate($rules, $messages);
    }

    private function loginFailed()
    {
        // return "failed";
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Login failed, please try again!');
    }
}
