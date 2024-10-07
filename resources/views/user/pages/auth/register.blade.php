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
                <a href="#">Đăng ký</a>
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
                    <p class="form-header-title">Đăng ký</p>
                </div>
                <div class="form-wrapper">
                    <div class="row mb-3">
                        <div class="col-12 col-lg-6 col-md-6">
                            <label for="formiput1" class="f-title">Tên của bạn</label>
                            <input id="formiput1" type="text" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6">
                            <label for="formiput2" class="f-title">Email của bạn</label>
                            <input id="formiput2" type="text" class="form-control" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="formiput3" class="f-title">Mật khẩu của bạn</label>
                            <input id="formiput3" type="text" class="form-control" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <p class="col-auto small text-primary">
                            Bạn đã có tài khoản : <a style="color: #1E36D5;" href="#">Đăng nhập</a>
                        </p>
                        <p class="col small text-primary text-end">
                            <a href="#">Quên tài khoản</a>
                        </p>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit">
                            <i class="fas fa-user-plus me-1"></i>
                            Đăng ký
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection