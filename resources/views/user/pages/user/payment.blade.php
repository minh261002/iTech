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
    <div class="container-xxl cart-wrapper">
        <div class="cart-navstep">
            <span class="cart-navstep-item cart-navstep-item--order active">
                <b class="cart-navstep-item-label">
                    Kiểm tra
                    <br>
                    giỏ hàng
                </b>
            </span>
            <span class="cart-navstep-item cart-navstep-item--customer active ">
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
            <span class="cart-navstep-item cart-navstep-item--complete ">
                <b class="cart-navstep-item-label">
                    Đặt hàng
                    <br>
                    thành công
                </b>
            </span>
        </div>
        <h1 class="fcart__title">
            <a href="#">Thông tin thanh toán</a>
        </h1>
        <div class="fcartbox paymentbox row gy-3 gx-3">
            <div class="border fcart-payment-boxitem">
                <p class="fcart-payment-boxitem-title">
                    <span class="icon-fcartorder">Thông tin đơn hàng</span>
                </p>
                <p class="d-flex flex-wrap">
                    <b class="col-12 col-md-5 col-lg-4">
                        <i class="fas fa-shopping-basket"></i>
                        Tổng tiền sản phẩm:
                    </b>
                    <span class="col-12 col-md-7 col-lg-8">68,080,000đ</span>
                </p>
                <p class="d-flex flex-wrap">
                    <b class="col-12 col-md-5 col-lg-4">
                        <i class="fas fa-shipping-fast"></i>
                        Phí vận chuyển
                    </b>
                    <span class="col-12 col-md-7 col-lg-8">Free Ship <small class="text-primary" style="font-style:italic">(Nội thành giao trong 24h)</small></span>
                </p>
                <p class="d-flex flex-wrap">
                    <b class="col-12 col-md-5 col-lg-4">
                        <i class="fas fa-ticket-alt"></i>
                        Mã giảm giá:
                    </b>
                    <span class="col-12 col-md-7 col-lg-8">-1000đ</span>
                </p>
                <div class="mb-3">
                    <b class="d-block">
                        <i class="fas fa-gift me-2"></i>
                        Quà tặng:
                    </b>
                    <div class="alert alert-info dcontent fcart-payment-boxitem-promotion">
                        <p style="font-weight: bold;">Ưu đãi khi mua iPhone 15 Pro</p>
                        <p>
                            <strong>✔️</strong>
                            Tặng quà lưu niệm Itechcenter
                        </p>
                        <p>
                            <strong>✔️</strong>
                            Giảm 150.000đ khi mua gói bảo hành VIP 12 tháng (sẽ được trừ trực tiếp vào giá máy)
                        </p>
                    </div>
                </div>
                <p class="d-flex flex-wrap">
                    <b class="col-12 col-md-5 col-lg-4">
                        <i class="far fa-credit-card"></i>
                        Tổng tiền đơn hàng:
                    </b>
                    <span class="col-12 col-md-7 col-lg-8 fw-bold">68,080,000đ</span>
                </p>
            </div>
            <div class="border fcart-payment-boxitem">
                <p class="fcart-payment-boxitem-title">
                    <span class="icon-fcartcustomer">Thông tin đơn hàng</span>
                </p>
                <p>
                    <b>
                        <i class="far fa-user-circle"></i>
                        Người nhận:
                    </b> <span>Lộc</span>
                </p>
                <p>
                    <b>
                        <i class="fas fa-phone-alt"></i>
                        Số điện thoại:
                    </b> <span>0212923218</span>
                </p>
                <p>
                    <b>
                        <i class="far fa-envelope"></i>
                        Email:
                    </b> <span>abc@gmail.com</span>
                </p>
                <p>
                    <b>
                        <i class="far fa-edit"></i>
                        Ghi chú:
                    </b> <span>abcdef</span>
                </p>
            </div>

            <div class="px-0 fcart-payment-group mb-3">
                <p class="col-12 mt-0 fcartbox-title">Hình thức thanh toán</p>
                <span class="d-block">
                    <label for="fr_payment-banking-1" class="fcart-payment-item ">
                        <input class="form-check-input" name="delivery_method" type="radio" id="fr_payment-banking-1" autocomplete="off" required checked>
                        <span class="fcart-payment-icon--payment-banking transition">
                            Chuyển khoản ngân hàng </span>
                    </label>
                </span>
                <span class="d-block">
                    <label for="fr_payment-banking-2" class="fcart-payment-item ">
                        <input class="form-check-input" name="delivery_method" type="radio" id="fr_payment-banking-2" autocomplete="off" required>
                        <span class="fcart-payment-icon--payment-cod transition">
                            Thanh toán khi nhận hàng </span>
                    </label>
                </span>
            </div>

            <button class="btn cart_btnitem w-100 cart_btnitem-red" type="submit">Thanh toán</button>
        </div>
    </div>
</section>
@endsection