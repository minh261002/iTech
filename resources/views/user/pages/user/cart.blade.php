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
            <span class="cart-navstep-item cart-navstep-item--customer ">
                <b class="cart-navstep-item-label">
                    Thông tin
                    <br>
                    mua hàng
                </b>
            </span>
            <span class="cart-navstep-item cart-navstep-item--payment ">
                <b class="cart-navstep-item-label">
                    Hình thức
                    <br>
                    thanh toán
                </b>
            </span>
            <span class="cart-navstep-item cart-navstep-item--complete ">
                <b class="cart-navstep-item-label">
                    Kiểm tra
                    <br>
                    giỏ hàng
                </b>
            </span>
        </div>
        <h1 class="fcart__title">Đơn hàng của bạn</h1>
        <div class="fcartbox p-0">
            <div class="cart-content">
                <div class="cartitem row">
                    <div class="photo col">
                        <a href="#">
                            <img class="img-responsive proimg" src="{{asset('user/assets/images/products/product1.png')}}" alt="">
                        </a>
                    </div>
                    <div class="product px-0 row col flex-column">
                        <div class="product-info col">
                            <h5 class="title d-flex flex-nowrap align-items-start">
                                <a class="col" href="#">iPhone 16 Pro Max 512GB - Chính hãng VN/A</a>
                                <button class="col-auto ms-auto btn-hover btn-sm btn-light border cartbtn_removeitem">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </h5>
                            <div class="color col-12 d-flex flex-wrap flex-column">
                                <select class="form-select form-select-sm order-color mb-2" name="" id="">
                                    <option value="">Màu sắc</option>
                                    <option value="" selected>Titan Tự Nhiên</option>
                                </select>
                            </div>
                            <div class="des-price-qty mt-auto">
                                <div class="col des-price">
                                    <b class="price">40,490,000đ</b>
                                    <s>40,990,000đ</s>
                                </div>
                                <div class="qty col-auto ms-auto">
                                    <div class="faddcart-qtygroup ">
                                        <button class="prodetail-faddcart-button" type="button">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                        <input class="form-control num_text order-qty" type="number" value="1" min="0" max="30" name="" id="">
                                        <button class="prodetail-faddcart-button" type="button">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cartitem row">
                    <div class="photo col">
                        <a href="#">
                            <img class="img-responsive proimg" src="{{asset('user/assets/images/products/product1.png')}}" alt="">
                        </a>
                    </div>
                    <div class="product px-0 row col flex-column">
                        <div class="product-info col">
                            <h5 class="title d-flex flex-nowrap align-items-start">
                                <a class="col" href="#">iPhone 16 Pro Max 512GB - Chính hãng VN/A</a>
                                <button class="col-auto ms-auto btn-hover btn-sm btn-light border cartbtn_removeitem">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </h5>
                            <div class="color col-12 d-flex flex-wrap flex-column">
                                <select class="form-select form-select-sm order-color mb-2" name="" id="">
                                    <option value="">Màu sắc</option>
                                    <option value="" selected>Titan Tự Nhiên</option>
                                </select>
                            </div>
                            <div class="des-price-qty mt-auto">
                                <div class="col des-price">
                                    <b class="price">40,490,000đ</b>
                                    <s>40,990,000đ</s>
                                </div>
                                <div class="qty col-auto ms-auto">
                                    <div class="faddcart-qtygroup ">
                                        <button class="prodetail-faddcart-button" type="button">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                        <input class="form-control num_text order-qty" type="number" value="1" min="0" max="30" name="" id="">
                                        <button class="prodetail-faddcart-button" type="button">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="cartitem row voucher border p-0 mb-3 voucher-deactive">
                    <div id="input-group--voucher" class="input-group input-group--voucher collapse show">
                        <input type="text" autocomplete="off" placeholder="Nhập mã giảm giá (nếu có)" name="" id="">
                        <button class="input-group-text input-group--voucher-btn" type="button">Áp dụng</button>
                    </div>
                </div>

                <div class="cartitem cartfooter row  d-none d-lg-flex">
                    <div class="col">Tạm tính</div>
                    <div class="price col price-amount cart_amount_item text-end">68,080,000</div>
                </div>
            </div>
        </div>
        <div class="fcartbox px-0 pb-5 mb-0 pt-md-4 pt-lg-0 text-center d-none d-lg-block">
            <button class="btn cart_btnitem w-100 cart_btnitem-red" type="submit">Đặt hàng</button>
        </div>
    </div>
</section>
@endsection