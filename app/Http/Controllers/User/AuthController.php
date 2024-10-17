<?php

namespace App\Http\Controllers\User;

use App\Events\UserLoginEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\ForgotPasswordRequest;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Http\Requests\User\ResetPasswordRequest;
use App\Mail\UserSendResetLinkMail;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function register()
    {
        return view('user.pages.auth.register');
    }

    public function handleRegister(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        unset($data['password_confirmation']);
        $data['username'] = explode('@', $data['email'])[0];
        $user = User::create($data);

        auth()->guard('web')->login($user);

        $admin = Admin::all();
        $data = [
            'name' => $user->name,
            'image' => $user->image,
        ];

        foreach ($admin as $item) {
            $event = new UserLoginEvent($data, $item->id);
            Event::dispatch($event);
        }

        notyf()->success('Đăng ký thành công!');
        return redirect()->route('user.home');
    }

    public function login()
    {
        return view('user.pages.auth.login');
    }

    public function handleLogin(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        $remember = $request->remember;

        if (auth()->guard('web')->attempt($credentials, $remember ?? false)) {
            $user = auth()->guard('web')->user();
            $admin = Admin::all();
            $data = [
                'name' => $user->name,
                'image' => $user->image,
            ];

            foreach ($admin as $item) {
                $event = new UserLoginEvent($data, $item->id);
                Event::dispatch($event);
            }

            notyf()->success('Xin chào ' . auth()->guard('web')->user()->name . '!');
            return redirect()->route('user.home');
        }

        notyf()->error('Thông tin đăng nhập không chính xác!');
        return back();
    }

    public function logout()
    {
        auth()->guard('web')->logout();

        notyf()->success('Đã đăng xuất!');
        return redirect()->route('user.login');
    }

    public function forgot_password()
    {
        return view('user.pages.auth.forgot-password');
    }

    public function sendResetLinkEmail(ForgotPasswordRequest $request)
    {

        $data = $request->validated();

        $email = $data['email'];
        $device = $data['device'];
        $time = $data['time'];

        $user = User::where('email', $email)->first();

        if (!$user) {
            notyf()->error('Email không tồn tại!');
            return redirect()->back();
        }

        $token = Str::random(60);
        //kiểm tra created_at trong bảng password_reset_tokens
        $check = DB::table('password_reset_tokens')->where('email', $email)->first();

        //chỉ được gửi mail mỗi 3 phút
        if ($check) {
            //xoá token cũ
            DB::table('password_reset_tokens')->where('email', $email)->delete();

            //thêm token mới
            DB::table('password_reset_tokens')->insert([
                'email' => $email,
                'token' => $token,
                'created_at' => now(),
            ]);
        }

        Mail::to($email)->send(new UserSendResetLinkMail($token, $email, $user->name, $device, $time));

        notyf()->success('Vui lòng kiểm tra email để lấy lại mật khẩu!');
        return redirect()->back();
    }

    public function reset_password()
    {
        return view('user.pages.auth.reset-password');
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $data = $request->validated();
        $email = $data['email'];
        $password = $data['password'];
        $token = $data['token'];

        $user = User::where('email', $email)->first();

        if (!$user) {
            notyf()->error('Email không tồn tại!');
            return redirect()->back();
        }

        $check = DB::table('password_reset_tokens')->where('email', $email)->first();

        if (!$check) {
            notyf()->error('Token không hợp lệ!');
            return redirect()->back();
        }

        if ($check->token != $token) {
            notyf()->error('Token không hợp lệ!');
            return redirect()->back();
        }

        $user->password = bcrypt($password);
        $user->save();

        DB::table('password_reset_tokens')->where('email', $email)->delete();

        notyf()->success('Đổi mật khẩu thành công!');
        return redirect()->route('user.login');
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $check = User::where('email', $user->email)->first();

        if ($check->is_facebook == 0) {
            notyf()->error('Bạn đã đăng ký tài khoản này bằng email!');
            return redirect()->route('user.login');
        }

        $data = [
            'name' => $user->name,
            'username' => explode('@', $user->email)[0],
            'email' => $user->email,
            'image' => $user->avatar,
            'is_facebook' => 1,
        ];

        $user = User::updateOrCreate(['email' => $user->email], $data);

        auth()->guard('web')->login($user);

        $admin = Admin::all();
        $data = [
            'name' => $user->name,
            'image' => $user->image,
        ];

        foreach ($admin as $item) {
            $event = new UserLoginEvent($data, $item->id);
            Event::dispatch($event);
        }

        notyf()->success('Đăng nhập thành công!');
        return redirect()->route('user.home');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $check = User::where('email', $user->email)->first();

        if ($check) {
            if ($check->is_google == 0 && $check->is_facebook == 0) {
                notyf()->error('Bạn đã đăng ký tài khoản này bằng email!');
                return redirect()->route('user.login');
            }

            if ($check->is_facebook == 1) {
                notyf()->error('Email này đã được đăng ký bằng facebook!');
                return redirect()->route('user.login');
            }
        }

        $data = [
            'name' => $user->name,
            'username' => explode('@', $user->email)[0],
            'email' => $user->email,
            'image' => $user->avatar,
            'is_google' => 1,
        ];

        $user = User::updateOrCreate(['email' => $user->email], $data);

        auth()->guard('web')->login($user);

        $admin = Admin::all();
        $data = [
            'name' => $user->name,
            'image' => $user->image,
        ];

        foreach ($admin as $item) {
            $event = new UserLoginEvent($data, $item->id);
            Event::dispatch($event);
        }

        notyf()->success('Đăng nhập thành công!');
        return redirect()->route('user.home');
    }
}