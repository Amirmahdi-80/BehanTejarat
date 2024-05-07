<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function view()
    {
        if(\auth()->check()){
            return redirect()->route('Admin.dashboard');
        }
        return view('Auth.login');
    }

    public function login(LoginRequest $request)
    {
        $user = $this->model->where('email', $request->email)->first();

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            Auth::login($user);
            $request->session()->regenerate();

            return redirect()->route('Admin.dashboard');
        }else{
            return back()->withErrors(['message' => 'رمز عبور اشتباه']);
        }
    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route("login");
    }
}
