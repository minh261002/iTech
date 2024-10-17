@extends('user.layouts.master')
@section('title', 'Sản phẩm')



@section('content')
    <div class="container wrapper-container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 col-md-11 col-lg-10 col-xl-9">
                <form class="auth-form" action="{{ route('user.sendResetLinkEmail') }}" method="POST">
                    @csrf
                    <div class="form-header">
                        <span class="form-header-avatar"></span>
                        <p class="form-header-title">Quên mật khẩu</p>
                    </div>
                    <input type="hidden" name="time" id="time">
                    <input type="hidden" name="device" id="device">
                    <div class="form-wrapper">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="formiput1" class="f-title">Email của bạn</label>
                                <input id="formiput1" type="text" class="form-control" autocomplete="off" name="email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100" type="submit">
                                <i class="fa fa-paper-plane me-2"></i>
                                Gửi yêu cầu
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
        document.getElementById('time').value = new Date().toLocaleString('en-US', {
            timeZone: 'Asia/Ho_Chi_Minh'
        });
        document.getElementById('device').value = navigator.userAgent;

        document.querySelector('form').addEventListener('submit', function() {
            document.querySelector('button').innerHTML =
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Đang xử lý...';
            document.querySelector('button').setAttribute('disabled', 'disabled');
        });
    </script>
@endpush
