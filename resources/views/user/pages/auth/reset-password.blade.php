@extends('user.layouts.master')
@section('title', 'Sản phẩm')


@php
    $token = request()->has('token') ? request()->get('token') : '';
    $email = request()->has('email') ? request()->get('email') : '';
@endphp

@section('content')
    <div class="container wrapper-container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 col-md-11 col-lg-10 col-xl-9">
                <form class="auth-form" action="{{ route('user.resetPassword') }}" method="POST">
                    @csrf

                    <div class="form-header">
                        <span class="form-header-avatar"></span>
                        <p class="form-header-title">Lấy lại mật khẩu</p>
                    </div>
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-wrapper">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="formiput1" class="f-title">Email</label>
                                <input id="formiput1" type="text" name="email" class="form-control" autocomplete="off"
                                    value="{{ $email }}" readonly>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="formiput2" class="f-title">Mật khẩu</label>
                            <div class="position-relative">
                                <input id="formiput2" type="password" class="form-control" autocomplete="off"
                                    name="password">
                                <span class="show-password position-absolute top-50 end-0 translate-middle-y me-2">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>

                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="formiput2" class="f-title">Nhập lại mật khẩu</label>

                            <div class="position-relative">
                                <input id="formiput2" type="password" class="form-control" autocomplete="off"
                                    name="password_confirmation">
                                <span class="show-password-confirm position-absolute top-50 end-0 translate-middle-y me-2">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>

                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100" type="submit">
                                Đổi mật khẩu
                            </button>

                            <div class="d-flex align-items-center justify-content-between">
                                <a href="{{ route('user.login') }}" class="f-link mt-3">Quay lại đăng nhập</a>

                                <a href="{{ route('user.register') }}" class="f-link mt-3">Đăng ký tài khoản</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.show-password').click(function() {
                let input = $(this).prev();
                if (input.attr('type') == 'password') {
                    input.attr('type', 'text');
                    $(this).html('<i class="fas fa-eye-slash"></i>');
                } else {
                    input.attr('type', 'password');
                    $(this).html('<i class="fas fa-eye"></i>');
                }
            })

            $('.show-password-confirm').click(function() {
                let input = $(this).prev();
                if (input.attr('type') == 'password') {
                    input.attr('type', 'text');
                    $(this).html('<i class="fas fa-eye-slash"></i>');
                } else {
                    input.attr('type', 'password');
                    $(this).html('<i class="fas fa-eye"></i>');
                }
            })
        })
    </script>
@endpush
