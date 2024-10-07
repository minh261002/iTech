<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register()
    {
        return view('user.pages.auth.register');
    }
    public function login()
    {
        return view('user.pages.auth.login');
    }

    public function forgot_password()
    {
        return view('user.pages.auth.forgot-password');
    }
    public function reset_password()
    {
        return view('user.pages.auth.reset-password');
    }
}
