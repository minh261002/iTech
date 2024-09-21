<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{ env('APP_URL') }}">
    <meta charset="utf-8" />
    <title>Quên mật khẩu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ asset('admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<body class="bg-color">

    <!-- Begin page -->
    <div class="container-fluid">
        <div class="row vh-100">
            <div class="col-12">
                <div class="p-0">
                    <div class="row d-flex align-items-center">
                        <div class="col-md-6 col-xl-6 col-lg-6">
                            <div class="row">
                                <div class="col-md-6 mx-auto">
                                    <div class="mb-0 border-0">
                                        <div class="p-0">
                                            <div class="text-center">
                                                <div class="mb-4">
                                                    <a href="#" class="auth-logo">
                                                        <img src="{{ asset('admin/assets/images/logo-dark.png') }}"
                                                            alt="logo-dark" class="mx-auto" height="28" />
                                                    </a>
                                                </div>

                                                <div class="auth-title-section mb-3">
                                                    <h3 class="text-dark fs-20 fw-medium mb-2">
                                                        Xin Chào
                                                    </h3>
                                                    <p class="text-dark text-capitalize fs-14 mb-0">
                                                        Vui lòng xác minh email của bạn
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="pt-0">
                                            <form action="{{ route('admin.password.email') }}" class="my-4"
                                                method="POST">
                                                @csrf

                                                <input type="hidden" name="time" id="time">
                                                <input type="hidden" name="device" id="device">

                                                <div class="form-group mb-3">
                                                    <label for="emailaddress" class="form-label">Email</label>
                                                    <input class="form-control" type="email" id="emailaddress"
                                                        value="{{ old('email') }}" name="email">
                                                    @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-0 row">
                                                    <div class="col-12">
                                                        <div class="d-grid">
                                                            <button class="btn btn-primary" type="submit">
                                                                Xác nhận email
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <a href="{{ route('admin.login') }}"
                                                        class="text-muted fs-14 mt-3 d-block">
                                                        Quay lại đăng nhập
                                                    </a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="col-md-6 col-xl-6 col-lg-6 p-0 vh-100 d-flex justify-content-center account-page-bg">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

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
</body>

</html>
