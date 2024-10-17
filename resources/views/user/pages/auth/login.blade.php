@extends('user.layouts.master')
@section('title', 'Sản phẩm')



@section('content')
    <div class="container wrapper-container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 col-md-11 col-lg-10 col-xl-9">
                <form class="auth-form" action="{{ route('user.handleLogin') }}" method="POST">
                    @csrf
                    <div class="form-header">
                        <span class="form-header-avatar"></span>
                        <p class="form-header-title">Đăng nhập</p>
                    </div>
                    <div class="form-wrapper">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="formiput1" class="f-title">Email của bạn</label>
                                <input id="formiput1" type="text" class="form-control" name="email" autocomplete="off">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="formiput2" class="f-title">Mật khẩu</label>
                                <div class="position-relative">
                                    <input id="formiput2" type="password" class="form-control" name="password"
                                        autocomplete="off">
                                    <span class="show-password position-absolute top-50 end-0 translate-middle-y me-2">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group d-flex mb-3">
                            <div class="col-sm-6">
                                <div class="form-check d-flex align-items-center justify-content-start gap-2">
                                    <input type="checkbox" name="remember" class="form-check-input" id="checkbox-signin"
                                        checked="">
                                    <label class="form-check-label" for="checkbox-signin">Lưu thông tin</label>
                                </div>
                            </div>
                            <div class="col-sm-6 text-end">
                                <a class="text-muted fs-14" href="{{ route('user.forgot-password') }}">Quên mật khẩu
                                    ?</a>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 cursor-pointer" type="submit">
                                <i class="fas fa-user-plus me-1"></i>
                                Đăng nhập
                            </button>

                            <div class="form-group">
                                <div class="d-flex justify-content-center mt-3">
                                    <span class="text-muted
                                    fs-14">Bạn chưa có tài khoản
                                        ?</span>
                                    <a class="text-primary fs-14 ms-2" href="{{ route('user.register') }}">Đăng ký</a>
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
        })
    </script>
@endpush
