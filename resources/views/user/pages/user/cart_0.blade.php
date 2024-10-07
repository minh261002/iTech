@extends('user.layouts.master')
@section('title', 'Sản phẩm')



@section('content')
<!-- Breadcrumb -->
<section class="breadcrumb-container mb-0" style="background-color: rgb(241, 240, 241);">
    <div class="container-xxl">
        <nav class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">Đơn hàng của bạn</a>
            </li>
        </nav>
    </div>
</section>

<section class="cart-container wrapper-container pt-0 pt-0 pt-lg-0">
    <div class="cart-wrapper bg-white border">
        <h1 class="cart-title px-3">Đơn hàng của bạn</h1>
        <div class="px-3 pt-3 py-2">
            <div class="cart-content alert alert-warning mb-4">
                <p>Hiện chưa có thông tin đặt hàng.</p>
            </div>
            <div class="">
                <a href="" class="cart_btnitem btn">
                    <i class="fa fa-home"></i>
                    Tiếp tục mua hàng...
                </a>
            </div>
        </div>
    </div>
</section>
@endsection