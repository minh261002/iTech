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
            <span class="cart-navstep-item cart-navstep-item--payment ">
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
            <a href="#">Thông tin nhận hàng</a>
        </h1>
        <div class="fcartbox fcartbox--cusinfo row gy-3 gx-3">
            <p class="col-12 mt-0 fcartbox-title">Thông tin đơn hàng</p>
            <div class="col-12">
                <input class="form-control" type="text" autocomplete="off" required placeholder="Vui lòng nhập họ và tên (bắt buộc)">
            </div>
            <div class="col-12">
                <input class="form-control" type="text" autocomplete="off" required placeholder="Vui lòng nhập số điện thoại (bắt buộc)">
            </div>
            <div class="col-12">
                <input class="form-control" type="text" autocomplete="off" required placeholder="Vui lòng nhập địa chỉ email (bắt buộc)">
            </div>

            <p class="col-12 fcartbox-title">Chọn phương thức nhận hàng:</p>
            <div class="row gx-4 mt-3 mb-0 col-12 px-0 mx-0 delivery_method_group align-items-center">
                <div class="col-auto">
                    <label class="d-flex align-items-center">
                        <input class="form-check-input me-1 mt-0" name="is_delivery" type="radio" data-element="delivery-method-showroom" checked>
                        <span class="delivery_method_group_label_showroom" style="line-height: 20px">Nhận tại cửa hàng</span>
                    </label>
                </div>
                <div class="col-auto">
                    <label class="d-flex align-items-center">
                        <input class="form-check-input me-1 mt-0" name="is_delivery" type="radio" data-element="delivery-method-address">
                        <span class="delivery_method_group_label_address" style="line-height: 20px">Giao hàng tận nơi</span>
                    </label>
                </div>
            </div>
            <div class="col-12 g-3 delivery-method-boxitem delivery-method-showroom active">
                <div class="col-12 form-floating">
                    <select name="delivery_showroom" id="fselect_showroom" class="form-select" aria-label="Hệ thống cửa hàng" required autocomplete="off">
                        <option value="">Hồ Chí Minh - 43 Trần Quang Khải</option>
                        <option value="">Hồ Chí Minh - 179 Khánh Hội </option>
                    </select>
                    <label for="fselect_showroom">Hệ thống cửa hàng</label>
                </div>
            </div>
            <div class="col-12 g-3 delivery-method-boxitem delivery-method-address">
                <div class="col-12 col-md-6">
                    <div class="form-floating">
                        <select id="fselect_province" class="form-select fselect__item" aria-label="Tỉnh/thành phố" required name="province" autocomplete="off">
                            <option value="">Tỉnh/thành phố</option>
                            <option value="">Hồ Chí Minh</option>
                            <option value="">Hà Nội</option>
                        </select>
                        <label for="fselect_province" class="form-label b500">Tỉnh/thành phố</label>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-floating">
                        <select id="fselect_district" class="form-select fselect__item" aria-label="Quận/huyện" required name="district" autocomplete="off">
                            <option value="">Chọn quận/huyện</option>
                            <option value="">Huyện Bình Chánh</option>
                            <option value="">Huyện Cần Giờ</option>
                        </select>
                        <label for="fselect_district" class="form-label b500">Quận/huyện</label>
                    </div>
                </div>
            </div>

            <p class="col-12 fcartbox-title">Ghi chú của khách hàng</p>
            <div class="col-12">
                <textarea rows="1" class="form-control" name="" id=""></textarea>
            </div>
            <div class="col-12">
                <p class="mb-0">
                    <label class="fw-bold" for="vatInvoice">
                        <input id="vatInvoice" type="checkbox" autocomplete="off"> Xuất hóa đơn công ty (VAT)
                    </label>
                </p>
                <div class="row mt-2 g-2 fcartbox-invoice">
                    <div class="col-12">
                        <input class="form-control" type="text" autocomplete="off" required placeholder="Tên công ty đầy đủ xuất hoá đơn">
                    </div>
                    <div class="col-12">
                        <input class="form-control" type="text" autocomplete="off" required placeholder="Địa chỉ công ty">
                    </div>
                    <div class="col-12 col-md-6">
                        <input class="form-control" type="text" autocomplete="off" placeholder="Mã số thuế">
                    </div>
                    <div class="col-12 col-md-6">
                        <input class="form-control" type="text" autocomplete="off" placeholder="Email nhận hoá đơn điện tử">
                    </div>
                </div>
            </div>
            <div class="col-12 mb-0">
                <button class="btn cart_btnitem w-100 cart_btnitem-red" type="submit">Tiếp tục</button>
            </div>
        </div>
    </div>
</section>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const radioDelivery = document.querySelectorAll('input[name="is_delivery"]');
        const deliveryShowroom = document.querySelector('.delivery-method-showroom');
        const deliveryAddress = document.querySelector('.delivery-method-address');

        // function check base status checked with radio when load page
        function checkInitialSelection() {
            const selectedRadio = document.querySelector('input[name="is_delivery"]:checked');
            if (selectedRadio) {
                if (selectedRadio.dataset.element === 'delivery-method-showroom') {
                    deliveryShowroom.classList.add('active');
                    deliveryAddress.classList.remove('active');
                } else if (selectedRadio.dataset.element === 'delivery-method-address') {
                    deliveryAddress.classList.add('active');
                    deliveryShowroom.classList.remove('active');
                }
            }
        }
        // Check base status checked with radio
        checkInitialSelection();


        radioDelivery.forEach(radio => {
            radio.addEventListener('change', function() {
                if (this.dataset.element === 'delivery-method-showroom') {
                    deliveryShowroom.classList.add('active');
                    deliveryAddress.classList.remove('active');
                } else if (this.dataset.element === 'delivery-method-address') {
                    deliveryAddress.classList.add('active');
                    deliveryShowroom.classList.remove('active');
                }
            });
        });


        const vatInvoiceCheckbox = document.getElementById('vatInvoice');
        const invoiceBox = document.querySelector('.fcartbox-invoice');

        vatInvoiceCheckbox.addEventListener('change', function() {
            if (this.checked) {
                invoiceBox.classList.add('active');
            } else {
                invoiceBox.classList.remove('active');
            }
        });
    });
</script>
@endsection