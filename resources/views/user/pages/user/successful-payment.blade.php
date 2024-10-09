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

<section class="cart-container successful-payment-container wrapper-container pt-0 pt-0 pt-lg-0">
    <div class="container-xxl cart-wrapper">
        <div class="cart-navstep">
            <span class="cart-navstep-item cart-navstep-item--order active">
                <b class="cart-navstep-item-label">
                    Kiểm tra
                    <br>
                    giỏ hàng
                </b>
            </span>
            <span class="cart-navstep-item cart-navstep-item--customer active">
                <b class="cart-navstep-item-label">
                    Thông tin
                    <br>
                    mua hàng
                </b>
            </span>
            <span class="cart-navstep-item cart-navstep-item--payment active">
                <b class="cart-navstep-item-label">
                    Hình thức
                    <br>
                    thanh toán
                </b>
            </span>
            <span class="cart-navstep-item cart-navstep-item--complete active">
                <b class="cart-navstep-item-label">
                    Đặt hàng
                    <br>
                    thành công
                </b>
            </span>
        </div>
        <div class="fcartbox p-0">
            <div class="successful-payment-box d-flex flex-column justify-content-center align-items-center p-5 text-center">
                <p class="successful-payment-icon">
                    <i class="fa-solid fa-circle-check"></i>
                </p>
                <p class="successful-payment-title">Thanh toán thành công</p>
                <span>Thông tin đơn hàng sẽ sớm gửi về gmail của bạn </span>
            </div>
        </div>
        <div class="fcartbox px-0 pb-5 mb-0 pt-md-4 pt-lg-0 text-center ">
            <a href="{{route('user.home')}}" class="btn cart_btnitem w-100 cart_btnitem-red">Quay lại trang chủ</a>
        </div>
    </div>
</section>
@endsection