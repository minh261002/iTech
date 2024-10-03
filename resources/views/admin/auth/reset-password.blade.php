<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{ env('APP_URL') }}">
    <meta charset="utf-8" />
    <title>Cập nhật mật khẩu</title>
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
                                                        <img src="{{ asset('admin/assets/images/logo.png') }}"
                                                            alt="logo-dark" class="mx-auto" height="60" />
                                                    </a>
                                                </div>

                                                <div class="auth-title-section mb-3">
                                                    <h3 class="text-dark fs-20 fw-medium mb-2">
                                                        Xin Chào
                                                    </h3>
                                                    <p class="text-dark text-capitalize fs-14 mb-0">
                                                        Vui lòng cập nhật mật khẩu của bạn
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="pt-0">
                                            <form action="{{ route('admin.password.update') }}" class="my-4"
                                                method="POST">
                                                @csrf
                                                <input type="hidden" name="token" value="{{ request()->token }}">
                                                <div class="form-group mb-3">
                                                    <label for="emailaddress" class="form-label">Email</label>
                                                    <input class="form-control" type="email" id="emailaddress"
                                                        value="{{ request()->email }}" name="email" readonly>
                                                    @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="password" class="form-label">Mật khẩu</label>
                                                    <div class="position-relative">
                                                        <input class="form-control" type="password" name="password">
                                                        <i
                                                            class="eye-icon-pass cursor-pointer fa-solid fa-eye position-absolute end-0 me-2 top-50 translate-middle-y"></i>
                                                    </div>

                                                    @error('password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="password" class="form-label">Nhập lại mật khẩu</label>
                                                    <div class="position-relative">
                                                        <input class="form-control" type="password"
                                                            name="password_confirmation">
                                                        <i
                                                            class="eye-icon-conf cursor-pointer fa-solid fa-eye position-absolute end-0 me-2 top-50 translate-middle-y"></i>
                                                    </div>

                                                    @error('password_confirmation')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-0 row">
                                                    <div class="col-12">
                                                        <div class="d-grid">
                                                            <button class="btn btn-primary" type="submit">
                                                                Cập nhật mật khẩu
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <a href="{{ route('admin.login') }}"
                                                    class="text-muted fs-14 mt-3 d-block">
                                                    Quay lại đăng nhập
                                                </a>
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
    <script src="{{ asset('admin/assets/libs/jquery/jquery.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.eye-icon-pass').click(function() {
                var input = $(this).prev();
                if (input.attr('type') == 'password') {
                    input.attr('type', 'text');
                    $(this).removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    input.attr('type', 'password');
                    $(this).removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });

            $('.eye-icon-conf').click(function() {
                var input = $(this).prev();
                if (input.attr('type') == 'password') {
                    input.attr('type', 'text');
                    $(this).removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    input.attr('type', 'password');
                    $(this).removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });
        })
    </script>
</body>

</html>
