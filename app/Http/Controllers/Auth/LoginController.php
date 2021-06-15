<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Session;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function home()
    {
        if (!Session::get('userId')) {
            return redirect('login-form');
        }
        $user = User::find(Session::get('userId'));
        return view('user_auth.dashboard', compact('user'));
    }

    public function show_login_form()
    {
        if (Session::get('userId')) {
            return redirect('home');
        }
        return view('user_auth.login');
    }
    public function process_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        $user = User::where('email', $request->email)->first();
        if ($user && \Hash::check($request->password, $user->password)) {
            Session::put('userId', $user->id);
            return redirect()->route('home');
        } else {
            return redirect()->back()->withInput()->withErrors(['errors' => 'Invalid credentials!']);
        }
    }
    public function show_signup_form()
    {
        if (Session::get('userId')) {
            return redirect('home');
        }
        return view('user_auth.register');
    }
    public function process_signup(Request $request)
    {
        $request->validate([
            'first_name' => 'required|unique:users,first_name',
            'email' => 'required|unique:users,email',
            'password' => 'required'
        ]);

        $user = User::create([
            'first_name' => trim($request->input('first_name')),
            'email' => strtolower($request->input('email')),
            'password' => bcrypt($request->input('password')),
        ]);
        return redirect()->route('login-form')->with('success', 'Registered successfully. Try Logging In');
    }
    public function logout()
    {
        Session::flush();
        return redirect()->route('login-form');
    }
}
