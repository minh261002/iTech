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
                <a href="#">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">Trang chi tiết sản phẩm</a>
            </li>
        </nav>
    </div>
</section>


<!-- Product detail main -->
<section class="product-detail-container">
    <div class="container-xxl">
        <div class="wrapper-container">
            <div class="row">
                <div class="col-12 col-lg-12 col-xl-9">
                    <div class="prodetail-wrapper row">
                        <div class="col-12 col-lg-5 prodetail__overview_img">
                            <section class="prodetail_img_wrapper">
                                <div class="owl-carousel prodimg_carousel">
                                    <div class="prodetail-item">
                                        <img width="370" height="370" class="img-responsive" src="{{asset('user/assets/images/slide-prodetail/prod6.png')}}" alt="">
                                    </div>
                                    <div class="prodetail-item">
                                        <img width="370" height="370" class="img-responsive" src="{{asset('user/assets/images/slide-prodetail/prod1.png')}}" alt="">
                                    </div>
                                    <div class="prodetail-item">
                                        <img width="370" height="370" class="img-responsive" src="{{asset('user/assets/images/slide-prodetail/prod2.png')}}" alt="">
                                    </div>
                                    <div class="prodetail-item">
                                        <img width="370" height="370" class="img-responsive" src="{{asset('user/assets/images/slide-prodetail/prod3.png')}}" alt="">
                                    </div>
                                    <div class="prodetail-item">
                                        <img width="370" height="370" class="img-responsive" src="{{asset('user/assets/images/slide-prodetail/prod4.png')}}" alt="">
                                    </div>
                                    <div class="prodetail-item">
                                        <img width="370" height="370" class="img-responsive" src="{{asset('user/assets/images/slide-prodetail/prod5.png')}}" alt="">
                                    </div>
                                </div>
                                <div class="owl-carousel prodimg_carousel__thumb">
                                    <div class="prodimg__img">
                                        <img width="60px" height="60px" src="{{asset('user/assets/images/slide-prodetail/prod6.png')}}" alt="">
                                    </div>
                                    <div class="prodimg__img">
                                        <img width="60px" height="60px" src="{{asset('user/assets/images/slide-prodetail/prod1.png')}}" alt="">
                                    </div>
                                    <div class="prodimg__img">
                                        <img width="60px" height="60px" src="{{asset('user/assets/images/slide-prodetail/prod2.png')}}" alt="">
                                    </div>
                                    <div class="prodimg__img">
                                        <img width="60px" height="60px" src="{{asset('user/assets/images/slide-prodetail/prod3.png')}}" alt="">
                                    </div>
                                    <div class="prodimg__img">
                                        <img width="60px" height="60px" src="{{asset('user/assets/images/slide-prodetail/prod4.png')}}" alt="">
                                    </div>
                                    <div class="prodimg__img">
                                        <img width="60px" height="60px" src="{{asset('user/assets/images/slide-prodetail/prod5.png')}}" alt="">
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="col-12 col-lg-7 prodetail__overview_info pb-0 pb-md-4">
                            <h1 class="prodetail-title mb-2">iPhone 16 Pro Max 256GB - Chính hãng VN/A</h1>

                            <div class="pro-rating mb-3">
                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                <i class="fa-solid fa-star-half-stroke" style="color: #FFD43B;"></i>
                                <i class="fa-regular fa-star" style="color: #FFD43B;"></i>
                            </div>

                            <div class="prodetail-price mb-3">
                                <div class="text-black fw-bold fs-14 mb-1">Giá bán:</div>
                                <p class="price">35,490,000đ</p>
                            </div>

                            <div class="row row-cols-2 row-cols-sm-4 row-cols-md-4 row-cols-lg-3 proprice-codegroup-links gap-2 mb-3">
                                <div class="col proprice-item active">
                                    <a href="#" class="d-flex text-center flex-column">
                                        <b class="mb-2 fs-12 fw-bolder">256GB</b>
                                        <strong class="fs-14 fw-bolder">35,490,000đ</strong>
                                    </a>
                                </div>
                                <div class="col proprice-item shadow">
                                    <a href="#" class="d-flex text-center flex-column">
                                        <b class="mb-2 fs-12 fw-bolder">256GB</b>
                                        <strong class="fs-14 fw-bolder">35,490,000đ</strong>
                                    </a>
                                </div>
                                <div class="col proprice-item shadow">
                                    <a href="#" class="d-flex text-center flex-column">
                                        <b class="mb-2 fs-12 fw-bolder">256GB</b>
                                        <strong class="fs-14 fw-bolder">35,490,000đ</strong>
                                    </a>
                                </div>
                                <div class="col proprice-item shadow">
                                    <a href="#" class="d-flex text-center flex-column">
                                        <b class="mb-2 fs-12 fw-bolder">256GB</b>
                                        <strong class="fs-14 fw-bolder">35,490,000đ</strong>
                                    </a>
                                </div>
                            </div>

                            <div class="proprice-codegroup-color mb-3">
                                <h1 class="proprice-color-title mb-2">Màu sắc</h1>
                                <div class="row row-cols-2 row-cols-sm-4 row-cols-md-4 row-cols-lg-3 gap-2" style="margin-left:0;">
                                    <div class="col proprice-item-color active">
                                        <input type="radio" value="">
                                        <span class="d-flex flex-nowrap">
                                            <img width="35" height="35" src="{{asset('user/assets/images/slide-prodetail/prod6.png')}}" alt="">
                                            <div class="proprice-item-color_des d-flex text-center flex-column">
                                                <b class="mb-2 ">Titan den</b>
                                                <strong>35,490,000đ</strong>
                                            </div>
                                        </span>
                                    </div>
                                    <div class="col proprice-item-color shadow">
                                        <input type="radio" value="">
                                        <span class="d-flex flex-nowrap">
                                            <img width="35" height="35" src="{{asset('user/assets/images/slide-prodetail/prod6.png')}}" alt="">
                                            <div class="proprice-item-color_des d-flex text-center flex-column">
                                                <b class="mb-2 ">Titan den</b>
                                                <strong>35,490,000đ</strong>
                                            </div>
                                        </span>
                                    </div>
                                    <div class="col proprice-item-color shadow">
                                        <input type="radio" value="">
                                        <span class="d-flex flex-nowrap">
                                            <img width="35" height="35" src="{{asset('user/assets/images/slide-prodetail/prod6.png')}}" alt="">
                                            <div class="proprice-item-color_des d-flex text-center flex-column">
                                                <b class="mb-2 ">Titan den</b>
                                                <strong>35,490,000đ</strong>
                                            </div>
                                        </span>
                                    </div>
                                    <div class="col proprice-item-color shadow">
                                        <input type="radio" value="">
                                        <span class="d-flex flex-nowrap">
                                            <img width="35" height="35" src="{{asset('user/assets/images/slide-prodetail/prod6.png')}}" alt="">
                                            <div class="proprice-item-color_des d-flex text-center flex-column">
                                                <b class="mb-2 ">Titan den</b>
                                                <strong>35,490,000đ</strong>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <article class="prodetail-overview_tabinfo mb-3">
                                <div class="card-header prodetail-overview_quote_label rounded-1">
                                    <i class="fa fa-gift"></i>
                                    Khuyến mãi khi mua iPhone 16 Pro Max
                                </div>
                                <div class="card-body py-2 rounded-1">
                                    <div class="procontent">
                                        <p><strong>💎Ưu đãi dành cho khách hàng&nbsp;đặt trước 27.09:</strong></p>

                                        <p>- Nhận ngay Voucher trị giá lên đến&nbsp;<span style="color:#ff0000"><span style="font-size:16px"><strong>3.050.000đ&nbsp;</strong></span></span></p>

                                        <p>-&nbsp;Ưu đãi thanh toán:</p>

                                        <ul>
                                            <li>Giảm&nbsp;<span style="color:#ff0000"><span style="font-size:16px"><strong>1.000.000đ&nbsp;</strong></span></span>cho khách hàng&nbsp;mới mở thẻ tín dụng VPbank tại Minh Tuấn Mobile. Áp dụng cho khách hàng mở thẻ thành công từ ngày 20.09 - 26.09&nbsp;(Số lượng có hạn,&nbsp;<a href="#">xem chi tiết</a>)</li>
                                            <li>Giảm&nbsp;<span style="color:#ff0000"><span style="font-size:16px"><strong>500.000đ</strong>&nbsp;</span></span>khi thanh toán từ 20 Triệu&nbsp;trở lên qua Zalopay&nbsp;(Số lượng có hạn,&nbsp;<a href="#">xem chi tiết</a>)</li>
                                            <li>Lưu ý: Chỉ áp dụng 1 trong 2 chương trình</li>
                                        </ul>

                                        <p><strong>💎Ưu đãi dành cho khách hàng không đặt trước:</strong></p>

                                        <p>- Nhận ngay Voucher trị giá lên đến<span style="color:#ff0000"><span style="font-size:16px">&nbsp;<strong>1.800.000đ&nbsp;</strong></span></span></p>

                                        <p>-&nbsp;Ưu đãi thanh toán:</p>

                                        <ul>
                                            <li>Giảm<span style="color:#ff0000"><span style="font-size:16px">&nbsp;</span></span><strong><span style="color:#ff0000"><span style="font-size:16px">800.000đ</span></span>&nbsp;</strong>cho khách hàng&nbsp;mới mở thẻ tín dụng VPbank tại Minh Tuấn Mobile. Áp dụng cho khách hàng mở thẻ thành công từ ngày 27.09 - 31.12&nbsp;(Số lượng có hạn,&nbsp;<a href="#">xem chi tiết</a>)</li>
                                        </ul>

                                    </div>
                                </div>
                            </article>

                            Này là sản phẩm sắp ra mắt
                            <section class="prodetail-pre-order">
                                <div class="row">
                                    <div class="col-12 col-md-12 mb-3">
                                        <a class="add-to-cart-pre__submit btn-prodetail fs-13 text-white bg-primary text-center btn" href="#">
                                            <b class="d-block">ĐẶT HÀNG - KHÔNG CẦN CỌC</b>
                                            Liên hệ đăng ký & nhận thông tin
                                        </a>
                                    </div>
                                </div>
                            </section>

                            Này là sản phẩm đang bán
                            <section class="prodetail-order">
                                <div class="buy-now">
                                    <div class="row mb-2">
                                        <div class="col">
                                            <a class="buynow-submit btn-prodetail fs-13 text-white bg-primary text-center btn" href="#">
                                                <b class="d-block">ĐẶT HÀNG - KHÔNG CẦN CỌC</b>
                                                Liên hệ đăng ký & nhận thông tin
                                            </a>
                                        </div>
                                        <div class="col-auto">
                                            <a class="add-to-cart-submit btn-prodetail fs-13 text-white text-center btn border" href="#">
                                                <b class="d-block"><i class="fa-solid fa-cart-plus"></i></b>
                                                Thêm giỏ hàng
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-md-6 mb-3 mb-md-3">
                                            <a class="pay-submit btn-prodetail bg-primary fs-13 text-white text-center btn" href="#">
                                                <b class="d-block">TRẢ GÓP 0%</b>
                                                Qua thẻ tín dụng
                                            </a>
                                        </div>
                                        <div class="col-6 col-md-6 mb-3 mb-md-3">
                                            <a class="pay-submit btn-prodetail bg-primary fs-13 text-white text-center btn" href="#">
                                                <b class="d-block">MUA TRẢ GÓP</b>
                                                Qua công ty tài chính
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <p class="mb-3 mb-md-0 mb-lg-3">
                                <a class="href_protradein" href="#">
                                    Đổi cũ mua mới - iPhone 16 Pro Max 256GB - Chính hãng VN/A
                                </a>
                            </p>

                        </div>
                    </div>
                </div>

                <div class=" col-12 col-lg-12 col-xl-3">
                    <section class="store-province-wrapper rounded-2 mb-4">
                        <div class="card-header prodetail-overview_quote_label rounded-1">
                            <i class="fa-solid fa-map-location-dot"></i>
                            Hệ thống cửa hàng
                        </div>
                        <div class="row gx-2 p-2 mx-0 border-bottom">
                            <div class="col-6">
                                <select class="form-select fs-14 form-select-sm" name="">
                                    <option value="">Chọn thành phố</option>
                                    <option value="">Hồ Chí Minh</option>
                                    <option value="">Lâm Đồng</option>
                                    <option value="">Cần Thơ</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <select class="form-select fs-14 form-select-sm" name="" autocomplete="off" disabled>
                                    <option value="" style="display: block;">Thành phố Bảo Lộc</option>
                                    <option value="" style="display: block;">Thành phố Bảo Lộc</option>
                                </select>
                            </div>
                        </div>
                        <div class="prodetail-liststore rounded-2">
                            <li class="prodetail-liststore-item d-flex">39 - 43 Trần Quang Khải, P.Tân Định, Quận 1</li>
                            <li class="prodetail-liststore-item d-flex">39 - 43 Trần Quang Khải, P.Tân Định, Quận 1</li>
                            <li class="prodetail-liststore-item d-flex">39 - 43 Trần Quang Khải, P.Tân Định, Quận 1</li>
                            <li class="prodetail-liststore-item d-flex">39 - 43 Trần Quang Khải, P.Tân Định, Quận 1</li>
                            <li class="prodetail-liststore-item d-flex">39 - 43 Trần Quang Khải, P.Tân Định, Quận 1</li>
                            <li class="prodetail-liststore-item d-flex">39 - 43 Trần Quang Khải, P.Tân Định, Quận 1</li>
                            <li class="prodetail-liststore-item d-flex">39 - 43 Trần Quang Khải, P.Tân Định, Quận 1</li>
                            <li class="prodetail-liststore-item d-flex">39 - 43 Trần Quang Khải, P.Tân Định, Quận 1</li>
                            <li class="prodetail-liststore-item d-flex">39 - 43 Trần Quang Khải, P.Tân Định, Quận 1</li>
                            <li class="prodetail-liststore-item d-flex">39 - 43 Trần Quang Khải, P.Tân Định, Quận 1</li>
                        </div>
                    </section>

                    <section class="card guarante-wrapper">
                        <div class="d-flex text-center flex-column">
                            <i class="fa fa-shield-alt "></i>
                            <b class="d-block text-uppercase">Bảo hành chính hãng</b>
                        </div>
                        <p style="line-height: 1.3rem;" class="mb-2">✔️ Máy mới fullbox 100% - Chưa Active - Chính hãng Apple</p>
                        <p style="line-height: 1.3rem;" class="mb-2">✔️ Được hỗ trợ 1 đổi 1 trong 30 ngày nếu có lỗi từ nhà sản xuất</p>
                        <p style="line-height: 1.3rem;" class="mb-1">✔️ Bảo hành chính hãng Apple 12 tháng</p>
                    </section>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Similar products -->
<section class="pronav-similar mb-4">
    <div class="container-xxl pronav-similar-wrapper">
        <div class="boxproduct__title progroup-similar">
            <p>Sản phẩm tương tự</p>
        </div>
        <div class="prosaleoff-list list-new-product mt-3">
            <div class="owl-carousel owl_product_new px-3">
                <div class="product-new-item rounded-2 border">
                    <div class="d-flex flex-column">
                        <div class="img-product">
                            <a href="#">
                                <img src="{{asset('user/assets/images/products/product1.png')}}" alt="">
                            </a>
                        </div>
                        <div class="title-product py-1">
                            <a href="#">IPhone 16 Pro Max 265GB-
                                Chính hảng VN/A Chính hảng VN/A</a>
                        </div>
                        <div class="status_place py-1">
                            <a href="#">
                                <img src="{{asset('user/assets/images/place_order.png')}}" alt="">
                            </a>
                        </div>
                        <div class="pre-price pb-1 py-1">Giá dự kiến: </div>
                        <div class="price-product py-1">
                            <a href="#">
                                <h2>34.990.000đ</h2>
                            </a>
                        </div>

                        <div class="vote-product py-1">
                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                            <i class="fa-solid fa-star-half-stroke" style="color: #FFD43B;"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                    </div>
                    <div class="status-icon">
                        <img class="w-100" src="{{asset('user/assets/images/new-icon.png')}}" alt="">
                    </div>
                </div>
                <div class="product-new-item rounded-2 border">
                    <div class="d-flex flex-column">
                        <div class="img-product">
                            <a href="#">
                                <img src="{{asset('user/assets/images/products/product3.png')}}" alt="">
                            </a>
                        </div>
                        <div class="title-product py-1">
                            <a href="#">IPhone 16 Pro 265GB</a>
                        </div>
                        <div class="status_place py-1">
                            <a href="#">
                                <img src="{{asset('user/assets/images/place_order.png')}}" alt="">
                            </a>
                        </div>
                        <div class="pre-price pb-1 py-1">Giá dự kiến: </div>
                        <div class="price-product py-1">
                            <a href="#">
                                <h2>34.990.000đ</h2>
                            </a>
                        </div>

                        <div class="vote-product py-1">
                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                            <i class="fa-solid fa-star-half-stroke" style="color: #FFD43B;"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Content product -->
<section class="prodetail-content-container mb-3">
    <div class="container-xxl">
        <div class="row">
            <div class="col-12 col-lg-8 order-2 order-lg-1 pe-lg-4 prodetail-text-content">
                <div class="prodetail-text-wrapper">
                    <p class="prodetail-text-title pt-3">Thông tin sản phẩm</p>
                    <div class="prodetail-text-box procontent">
                        <h2>Vô cùng mạnh mẽ</h2>
                        <p><strong>iPhone 16 Pro. Sở hữu thiết kế titan tuyệt đẹp. Điều Khiển Camera. <a href="https://minhtuanmobile.com/tin-tuc/hd-full-hd-4k-chuan-quay-video-nao-phu-hop-voi-ban/#toc-4k" target="_blank">4K</a> <a href="https://minhtuanmobile.com/tin-tuc/dolby-vision-la-gi-dolby-vision-co-diem-gi-noi-bat/" target="_blank">Dolby Vision</a> tốc độ 120 fps. Và chip A18 Pro.</strong></p>
                        <h2>Tính năng nổi bật&nbsp;</h2>
                        <ul>
                            <li>THIẾT KẾ TITAN TUYỆT ĐẸP – iPhone 16 Pro có thiết kế titan nhẹ và cứng cáp với màn hình Super Retina XDR 6,3 inch lớn hơn. Thiết bị bền bỉ tuyệt vời với chất liệu <a href="https://minhtuanmobile.com/tin-tuc/mat-kinh-bao-ve-ceramic-shield-tren-iphone-co-gi-dac-biet/" target="_blank">Ceramic Shield</a> thế hệ mới nhất, bền chắc gấp 2 lần mặt kính các điện thoại thông minh khác.</li>
                            <li>NẮM TOÀN QUYỀN ĐIỀU KHIỂN CAMERA – Điều Khiển Camera giúp bạn truy cập nhanh các công cụ camera dễ dàng hơn, như thu phóng hoặc độ sâu trường ảnh, nhờ vậy bạn có thể chụp ảnh hoàn hảo siêu nhanh.</li>
                            <li>QUAY CHỤP ẤN TƯỢNG – Với camera Ultra Wide 48MP tiên tiến hơn, bạn có thể ghi lại những chi tiết đầy mê hoặc trong những tấm ảnh chụp cận cảnh và ảnh chụp góc rộng bao quát. Bạn muốn ảnh chụp sắc nét hơn từ khoảng cách xa hơn? Camera Telephoto 5x giúp bạn dễ dàng làm điều đó.</li>
                            <li>QUAY VIDEO ĐẲNG CẤP PRO – Nâng tầm video bạn quay lên đẳng cấp hoàn toàn mới với 4K Dolby Vision tốc độ 120 fps, nhờ sự hỗ trợ của camera Fusion 48MP, và các micrô chất lượng chuẩn studio để thu âm chất lượng cao hơn. Một studio Pro ngay trong túi bạn.</li>
                            <li>PHONG CÁCH NHIẾP ẢNH – Phong Cách Nhiếp Ảnh thế hệ mới nhất cho phép bạn linh hoạt sáng tạo hơn, nhờ đó bạn có thể biến hóa khiến mỗi bức ảnh đều đậm chất riêng của mình. Và nhờ những tiến bộ trong quy trình xử lý hình ảnh, bạn nay có thể đổi qua đổi lại mọi phong cách, mọi lúc.</li>
                            <li>SỨC MẠNH CỦA A18 PRO – Chip A18 Pro hỗ trợ các tính năng chụp ảnh và quay video tiên tiến như Điều Khiển Camera, đồng thời mang đến hiệu năng đồ họa vượt trội để chơi game AAA.</li>
                            <li>BƯỚC NHẢY VỌT VỀ THỜI LƯỢNG PIN – iPhone 16 Pro mang lại hiệu năng tiết kiệm điện đáng kinh ngạc với thời gian xem video lên đến 27 giờ. Sạc qua USB-C hoặc gắn vào bộ sạc MagSafe để sạc không dây nhanh hơn.</li>
                            <li>TÙY CHỈNH IPHONE CỦA BẠN – Với iOS 18, bạn có thể chọn sắc thái màu cho các biểu tượng trên Màn Hình Chính với màu bất kỳ. Tìm ảnh ưa thích nhanh hơn bằng ứng dụng Ảnh được thiết kế mới. Và thêm các hiệu ứng động vui nhộn cho bất kỳ từ, cụm từ hoặc biểu tượng nào trong iMessage.</li>
                            <li>CÁC TÍNH NĂNG AN TOÀN QUAN TRỌNG – Với tính năng Phát Hiện Va Chạm, iPhone có thể phát hiện va chạm ô tô nghiêm trọng và gọi trợ giúp khi cần kíp.</li>
                        </ul>
                        <p class="image-center"><img loading="lazy" alt="iPhone 16 Pro 128GB - Chính hãng VN/A" height="660" data-src="https://static.minhtuanmobile.com/uploads/editer/2024-09/10/images/iphone-16-pro-128gb-chinh-hang-vna-1.webp" width="660" src="https://static.minhtuanmobile.com/uploads/editer/2024-09/10/images/iphone-16-pro-128gb-chinh-hang-vna-1.webp" data-ll-status="native"></p>
                        <p>iPhone 16 Pro là một trong những sản phẩm được Apple gửi gắm niềm tin và nhiều cải tiến mới trong sự kiện công nghệ It’s Glow Time 2024. Bên cạnh những điểm mới về mẫu mã, iPhone 16 Pro còn được nâng cấp so với phiên bản iPhone 15 Pro đi trước ở các thông số về chip, camera… Trong bài viết này, Minh Tuấn Mobile sẽ tổng hợp các thông tin về giá bán, cấu hình, so sánh và đánh giá của iPhone 16 Pro để bạn có thể quyết định có nên mua hay không.</p>
                        <p>Đây là toàn bộ thông tin chính thức về iPhone 16 Pro: thông số kỹ thuật, thiết kế, tính năng và đặc biệt mà màn so sánh giữa chiếc iPhone mới với thế hệ trước có gì khác biệt.</p>
                        <h2>Tổng quan iPhone 16 Pro 128 GB</h2>
                        <p>iPhone 16 Pro sở hữu nhiều tính năng vô cùng nổi bật, gồm:</p>
                        <ul>
                            <li>Màn hình lên đến 6.3 inch</li>
                            <li>Chip A18 Pro mạnh mẽ</li>
                            <li>Lớp vỏ Titan cấp 5 nhẹ bền</li>
                            <li>Camera chính và góc rộng được nâng cấp lên 48MP</li>
                            <li>Màu mới Titan Sa mạc sang trọng</li>
                        </ul>
                        <h2>iPhone 16 Pro&nbsp;128 GB có mấy màu?</h2>
                    </div>
                    <p class="text-center">
                        <button class="prodetail-action-btn show-max text-center">
                            <p>Xem thêm nội dung</p>
                        </button>
                    </p>
                    <p class="text-center">
                        <button class="prodetail-action-btn show-min text-center">
                            <p>Thu gọn</p>
                        </button>
                    </p>
                </div>

                <div class="prodetail-reviewbox-rating">
                    <h4 class="prodetail-reviewbox-title">Đánh giá & nhận xét về iPhone 16 Pro Max 512GB - Chính hãng VN/A</h4>
                    <div class="prodetail-reviewbox-content">
                        <div class="row rating-overview-wrapper mx-0">
                            <div class="col-12 col-md-5 rating-overview-total">
                                <button class="btn-writing-rate btn-prodetail bg-primary fs-13 text-white text-center btn" href="#">
                                    <b class="d-block"><i class="fa-solid fa-pen-to-square"></i>Gửi đánh giá</b>
                                    Hãy là người đầu tiên gửi đánh giá
                                </button>
                            </div>
                            <div class="col-12 col-md-7 rating-overview-listdetail">
                                <div class="rating-overview-listdetail-item">
                                    <div class="rating-overview-listdetail-item-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="rating-overview-listdetail-item-progress progress">
                                        <div class="progress-bar" role="progressbar" aria-label="Đánh giá 5 sao" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="rating-overview-listdetail-item-text">0 đánh giá</div>
                                </div>
                                <div class="rating-overview-listdetail-item">
                                    <div class="rating-overview-listdetail-item-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="rating-overview-listdetail-item-progress progress">
                                        <div class="progress-bar" role="progressbar" aria-label="Đánh giá 5 sao" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="rating-overview-listdetail-item-text">0 đánh giá</div>
                                </div>
                                <div class="rating-overview-listdetail-item">
                                    <div class="rating-overview-listdetail-item-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="rating-overview-listdetail-item-progress progress">
                                        <div class="progress-bar" role="progressbar" aria-label="Đánh giá 5 sao" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="rating-overview-listdetail-item-text">0 đánh giá</div>
                                </div>
                                <div class="rating-overview-listdetail-item">
                                    <div class="rating-overview-listdetail-item-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="rating-overview-listdetail-item-progress progress">
                                        <div class="progress-bar" role="progressbar" aria-label="Đánh giá 5 sao" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="rating-overview-listdetail-item-text">0 đánh giá</div>
                                </div>
                                <div class="rating-overview-listdetail-item">
                                    <div class="rating-overview-listdetail-item-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="rating-overview-listdetail-item-progress progress">
                                        <div class="progress-bar" role="progressbar" aria-label="Đánh giá 5 sao" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="rating-overview-listdetail-item-text">0 đánh giá</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <section class="comment-user mt-4">
                    <p class="boxcomment-title mb-3">Mời bạn cùng thảo luận</p>
                    <div class="prodetail__box__content">
                        <form class="comment-wrapper d-flex " action="">
                            <div class="comment-input-group w-100">
                                <div class="mb-2">
                                    <textarea class="form-control mb-0" autocomplete="off" minlength="15" placeholder="Xin để lại câu hỏi. Itech sẽ giúp bạn trả lời câu hỏi của mình."></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fas fa-paper-plane me-1"></i>
                                    Gửi hỏi đáp </button>
                            </div>
                        </form>
                    </div>
                </section>

                <section class="commentlist-wrapper mb-1">
                    <div class="commentlist-item">
                        <div class="commentlist-item-level commentlist-item-level_main">
                            <div class="ratinglist-item-header">
                                <div class="col d-flex flex-wrap">
                                    <span class="ratinglist-item-header-info ps-0">
                                        <b class="ratinglist-item-header-name">Khánh Vinh</b>
                                        <time class="ratinglist-item-header-time">
                                            <i class="far fa-clock me-1"></i>
                                            21 tiếng trước
                                        </time>
                                    </span>
                                </div>
                            </div>
                            <div class="ratinglist-item-text shadow-sm py-2 px-3 rounded border bg-light">
                                Em muốn đổi từ IPHONE 15PRM 256GB TITAN TỰ NHIÊN VN/A - PIn 93 thu lại giá nhiêu ạ
                                <p class="mb-0 mt-1 text-end"><button type="button" class="btn-comment-reaply btn btn-sm btn-outline-danger border-0 py-0 fs-11"><i class="fas fa-comments me-1"></i>Trả lời</button></p>
                            </div>
                        </div>
                        <ul class="commentlist-item-level commentlist-item-level--sub pb-1 list-unstyled">
                            <li class="commentlist-item">
                                <div class="ratinglist-item-header">
                                    <div class="col d-flex flex-wrap">
                                        <span class="ratinglist-item-header-avatar"><img src="{{asset('admin/assets/images/logo-vertical.png')}}" alt=""></span>
                                        <span class="ratinglist-item-header-info pe-0">
                                            <b class="ratinglist-item-header-name">Quản trị viên</b>
                                            <time class="ratinglist-item-header-time">
                                                <i class="far fa-clock me-1"></i>
                                                18 tiếng trước
                                            </time>
                                        </span>
                                    </div>
                                </div>
                                <div class="ratinglist-item-text">
                                    Dạ Itech mobile chào anh ạ!
                                    <br>
                                    <br>
                                    Bên em có hỗ trợ thu cũ lên đời máy anh nha. Trường hợp chị thu đổi từ máy iPhone 15 Promax lên iPhone 16 Promax bên em sẽ trợ giá thu lại lên đến 95% với máy mua tại chi nhánh của Minh Tuấn giá thu tối đa tầm khoảng 23.400.000 với điều kiện máy đẹp, ngoại hình 99% và còn bảo hành ạ. Tuy nhiên anh cần ghé trực tiếp tại của hàng để được kỹ thuật viên kiểm tra và báo giá chính xác cho mình anh nhé!
                                </div>
                            </li>
                        </ul>
                    </div>
                </section>


            </div>

            <div class="col-12 col-lg-4 order-1 order-lg-2 prodetail-technology-wrapper  p-0 ">
                <div class="prodetail-tech-box border rounded-2 pb-3">
                    <b class="prodetail-technology-title d-block pt-3 px-3">Thông số kỹ thuật</b>
                    <div class="table-tech-content">
                        <table align="left" border="0" style="width: 100%;">
                            <tbody>
                                <tr>
                                    <td>
                                        <p>Model</p>
                                    </td>
                                    <td>
                                        <p>iPhone 16 Pro 128GB</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Màu</p>
                                    </td>
                                    <td>
                                        <p>Titan Sa Mạc</p>
                                        <p>Titan Tự Nhiên</p>
                                        <p>Titan Trắng</p>
                                        <p>Titan Đen</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Dung lượng lưu trữ</p>
                                    </td>
                                    <td>
                                        <p>128GB</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Trọng lượng</p>
                                    </td>
                                    <td>
                                        <p>99 gram</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Kích thước</p>
                                    </td>
                                    <td>
                                        <p>149,6mm x 71,5 mm x 8,25 mm</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Màn hình</p>
                                    </td>
                                    <td>
                                        <p>Màn hình Super Retina XDR</p>
                                        <p>Màn hình toàn phần OLED 6,3 inch (theo đường chéo)R</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="text-center">
                            <button class="prodetail-action-btn show-max text-center">
                                <p>Xem tất cả thông số</p>
                            </button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- News -->
@include('user.partials.news')

@endsection