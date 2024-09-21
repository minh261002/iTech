<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ForgotPasswordRequest;
use App\Http\Requests\Admin\LoginRequest;
use App\Http\Requests\Admin\UpdatePasswordRequest;
use App\Mail\AdminSendResetLinkMail;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('admin.auth.login');
    }

    public function authenticate(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if (auth()->guard('admin')->attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            notyf()->success('Xin chào ' . auth()->guard('admin')->user()->name . '!');
            return redirect()->route('admin.dashboard');
        }

        notyf()->error('Thông tin đăng nhập không chính xác.');
        return back();
    }

    public function logout(Request $request): RedirectResponse
    {
        auth()->guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        notyf()->success('Đăng xuất thành công.');
        return redirect()->route('admin.login');
    }

    public function forgotPassword(): View
    {
        return view('admin.auth.forgot-password');
    }

    public function sendResetLinkEmail(ForgotPasswordRequest $request)
    {
        $token = Str::random(64);
        $admin = Admin::where('email', $request->email)->first();

        $admin->remember_token = $token;
        $admin->save();

        Mail::to($request->email)->send(new AdminSendResetLinkMail($token, $request->email, $admin->name, $request->device, $request->time));
        notyf()->success('Email đã được gửi, vui lòng kiểm tra hộp thư đến của bạn.');
        return back();
    }

    public function resetPassword(): View
    {
        return view('admin.auth.reset-password');
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $admin = Admin::where(['email' => $request->email, 'remember_token' => $request->token])->first();

        if (!$admin) {
            notyf()->error('Thông tin không chính xác.');
            return back();
        }

        $admin->password = bcrypt($request->password);
        $admin->remember_token = null;
        $admin->save();

        notyf()->success('Đổi mật khẩu thành công.');
        return redirect()->route('admin.login');
    }
}