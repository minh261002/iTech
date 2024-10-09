<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{ env('APP_URL') }}">
    <meta charset="utf-8" />
    <title>Quản Trị Viên</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset(config('settings.site_favicon')) }}">

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
                                                        <img src="{{ asset(config('settings.site_logo')) }}"
                                                            alt="logo-dark" class="mx-auto" height="60" />
                                                    </a>
                                                </div>

                                                <div class="auth-title-section mb-3">
                                                    <h3 class="text-dark fs-20 fw-medium mb-2">
                                                        Xin Chào
                                                    </h3>
                                                    <p class="text-dark text-capitalize fs-14 mb-0">
                                                        Vui lòng đăng nhập để tiếp tục
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="pt-0">
                                            <form action="{{ route('admin.authenticate') }}" class="my-4"
                                                method="POST">
                                                @csrf
                                                <div class="form-group mb-3">
                                                    <label for="emailaddress" class="form-label">Email</label>
                                                    <input class="form-control" type="email" id="emailaddress"
                                                        value="{{ old('email') }}" name="email">
                                                    @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="password" class="form-label">Mật khẩu</label>
                                                    <div class="position-relative">
                                                        <input class="form-control" type="password" name="password">
                                                        <i class="cursor-pointer fa-solid fa-eye position-absolute end-0 me-2 top-50 translate-middle-y"
                                                            id="eye-icon"></i>
                                                    </div>

                                                    @error('password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group d-flex mb-3">
                                                    <div class="col-sm-6">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="checkbox-signin">
                                                            <label class="form-check-label" for="checkbox-signin">Lưu
                                                                thông tin</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 text-end">
                                                        <a class='text-muted fs-14'
                                                            href='{{ route('admin.password.request') }}'>
                                                            Quên mật khẩu ?
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="form-group mb-0 row">
                                                    <div class="col-12">
                                                        <div class="d-grid">
                                                            <button class="btn btn-primary" type="submit">
                                                                Đăng nhập
                                                            </button>
                                                        </div>
                                                    </div>
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
    <script src="{{ asset('admin/assets/libs/jquery/jquery.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('form').submit(function() {
                $('button[type="submit"]').html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Đang xử lý...'
                );
                $('button[type="submit"]').attr('disabled', 'disabled');
            })

            $('#eye-icon').click(function() {
                if ($(this).hasClass('fa-eye')) {
                    $(this).removeClass('fa-eye');
                    $(this).addClass('fa-eye-slash');
                    $('input[name="password"]').attr('type', 'text');
                } else {
                    $(this).removeClass('fa-eye-slash');
                    $(this).addClass('fa-eye');
                    $('input[name="password"]').attr('type', 'password');
                }
            })
        })
    </script>
</body>

</html>
