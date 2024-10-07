@extends('user.layouts.master')
@section('title', 'Sản phẩm')



@section('content')
<!-- Breadcrumb -->
<section class="breadcrumb-container">
    <div class="container-xxl">
        <nav class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">Đăng nhập</a>
            </li>
        </nav>
    </div>
</section>

<div class="container wrapper-container mb-3 mb-lg-5">
    <div class="row align-items-center justify-content-center">
        <div class="col-12 col-md-11 col-lg-10 col-xl-9">
            <form class="auth-form" action="" method="">
                <div class="form-header">
                    <span class="form-header-avatar"></span>
                    <p class="form-header-title">Lấy lại mật khẩu</p>
                </div>
                <div class="form-wrapper">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="formiput1" class="f-title">Mật khẩu mới</label>
                            <input id="formiput1" type="text" class="form-control" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="formiput2" class="f-title">Xác nhận mật khẩu mới</label>
                            <input id="formiput2" type="text" class="form-control" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <p class="col-auto small text-primary">
                            <a style="color: #1E36D5;" href="#">Quay lại</a>
                        </p>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit">
                            Đổi mật khẩu
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection