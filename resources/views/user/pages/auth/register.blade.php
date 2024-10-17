@extends('user.layouts.master')
@section('title', 'Sản phẩm')



@section('content')
    <div class="container wrapper-container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 col-md-11 col-lg-10 col-xl-9">
                <form class="auth-form" action="{{ route('user.handleRegister') }}" method="POST">
                    @csrf
                    <div class="form-header">
                        <span class="form-header-avatar"></span>
                        <p class="form-header-title">Đăng ký</p>
                    </div>
                    <div class="form-wrapper">

                        <div class="form-group mb-3">
                            <label for="formiput1" class="f-title">Họ và tên</label>
                            <input id="formiput1" type="text" class="form-control" autocomplete="off" name="name"
                                value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="formiput2" class="f-title">Email</label>
                            <input id="formiput2" type="text" class="form-control" autocomplete="off" name="email"
                                value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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

                        <div class="form-group d-flex mb-3">
                            <div class="col-sm-6">
                                <div class="form-check d-flex align-items-center justify-content-start gap-2">
                                    <input type="checkbox" name="terms" class="form-check-input" id="checkbox-signin"
                                        checked="">
                                    <label class="form-check-label" for="checkbox-signin">
                                        Tôi đồng ý với
                                        <a href="#" class="pb-0 text-primary">điều khoản</a>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6 text-end">
                                <a class="text-muted fs-14" href="{{ route('user.forgot-password') }}">Quên mật khẩu
                                    ?</a>
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary w-100" type="submit">
                                <i class="fas fa-user-plus me-1"></i>
                                Đăng ký
                            </button>

                            <div class="form-group">
                                <div class="d-flex justify-content-center mt-3">
                                    <span class="text-muted fs-14">Bạn đã có tài khoản ?</span>
                                    <a class="text-primary fs-14 ms-2" href="{{ route('user.login') }}">Đăng nhập</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                @include('user.pages.auth.social-login')
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
