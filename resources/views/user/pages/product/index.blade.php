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
                <a href="#">Sản phẩm</a>
            </li>
        </nav>
    </div>
</section>

<section class="navfocus-product-wrapper mt-4">
    <div class="container-xxl">
        <div class="prod-cate-list">
            <div class="prod-cate-item">
                <a href="#">
                    <div class="image-cate">
                        <img class="shadow" width="75px" height="75px" src="{{asset('user/assets/images/cate-mini/cate-1.png')}}" alt="">
                    </div>
                    <div class="title-cate">
                        <h2>iPhone 15 Pro Max</h2>
                    </div>
                </a>
            </div>
            <div class="prod-cate-item">
                <a href="#">
                    <div class="image-cate">
                        <img class="shadow" width="75px" height="75px" src="{{asset('user/assets/images/cate-mini/cate-1.png')}}" alt="">
                    </div>
                    <div class="title-cate">
                        <h2>iPhone 15 Pro Max</h2>
                    </div>
                </a>
            </div>
            <div class="prod-cate-item">
                <a href="#">
                    <div class="image-cate">
                        <img class="shadow" width="75px" height="75px" src="{{asset('user/assets/images/cate-mini/cate-1.png')}}" alt="">
                    </div>
                    <div class="title-cate">
                        <h2>iPhone 15 Pro Max</h2>
                    </div>
                </a>
            </div>
            <div class="prod-cate-item">
                <a href="#">
                    <div class="image-cate">
                        <img class="shadow" width="75px" height="75px" src="{{asset('user/assets/images/cate-mini/cate-1.png')}}" alt="">
                    </div>
                    <div class="title-cate">
                        <h2>iPhone 15 Pro Max</h2>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>


<section class="pronav-bestseller mt-4">
    <div class="container-xxl">
        <div class="boxproduct__title progroup-bestseller">
            <p>Sản Phẩm Bán Chạy</p>
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


<section class="products-by-category mt-4 mb-3">
    <div class="profilter_header__container">
        <div class="container-xxl">
            <div class="profilter_header_item">
                <p class="boxproduct__title ">Chọn sản phẩm theo thương hiệu</p>
            </div>

            <div class="filterbox_container_collapse mt-3">
                <div class="row">
                    <div class="col-12 col-md col-lg">
                        <div class="filterbox_group_container">
                            <div class="filterbox_ulgroup_item">
                                <div class="dropdown">
                                    <a class="filterbox_dropdown_label filterbox_label_box1 dropdown-toggle" href="#" role="button" id="dropdown_filter_1" data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-expanded="false">
                                        Màn hình </a>
                                    <ul class="dropdown-menu filterbox_group filterbox_manhinh filterbox_box1" aria-labelledby="dropdown_filter_1" style="">
                                        <li class="rightbox__filteritem">
                                            <a class="dropdown-item rightbox__itemval " href="https://minhtuanmobile.com/iphone/option-man-hinh-4-7-inch/" data-value="manhinh" data-title="Màn hình">
                                                4.7 INCH </a>
                                        </li>
                                        <li class="rightbox__filteritem">
                                            <a class="dropdown-item rightbox__itemval " href="https://minhtuanmobile.com/iphone/option-man-hinh-5-8-inch/" data-value="manhinh" data-title="Màn hình">
                                                5.8 INCH </a>
                                        </li>
                                        <li class="rightbox__filteritem">
                                            <a class="dropdown-item rightbox__itemval " href="https://minhtuanmobile.com/iphone/option-man-hinh-6-1-inch/" data-value="manhinh" data-title="Màn hình">
                                                6.1 INCH </a>
                                        </li>
                                        <li class="rightbox__filteritem">
                                            <a class="dropdown-item rightbox__itemval " href="https://minhtuanmobile.com/iphone/option-man-hinh-5-5-inch/" data-value="manhinh" data-title="Màn hình">
                                                5.5 INCH </a>
                                        </li>
                                        <li class="rightbox__filteritem">
                                            <a class="dropdown-item rightbox__itemval " href="https://minhtuanmobile.com/iphone/option-man-hinh-6-5-inch/" data-value="manhinh" data-title="Màn hình">
                                                6.5 INCH </a>
                                        </li>
                                        <li class="rightbox__filteritem">
                                            <a class="dropdown-item rightbox__itemval " href="https://minhtuanmobile.com/iphone/option-man-hinh-5-4-inch/" data-value="manhinh" data-title="Màn hình">
                                                5.4 INCH </a>
                                        </li>
                                        <li class="rightbox__filteritem">
                                            <a class="dropdown-item rightbox__itemval " href="https://minhtuanmobile.com/iphone/option-man-hinh-6-7-inch/" data-value="manhinh" data-title="Màn hình">
                                                6.7 INCH </a>
                                        </li>
                                        <li class="rightbox__filteritem">
                                            <a class="dropdown-item rightbox__itemval " href="https://minhtuanmobile.com/iphone/option-man-hinh-6-3-inch/" data-value="manhinh" data-title="Màn hình">
                                                6.3 INCH </a>
                                        </li>
                                        <li class="rightbox__filteritem">
                                            <a class="dropdown-item rightbox__itemval " href="https://minhtuanmobile.com/iphone/option-man-hinh-6-9-inch/" data-value="manhinh" data-title="Màn hình">
                                                6.9 INCH </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="filterbox_ulgroup_item">
                                <div class="dropdown">
                                    <a class="filterbox_dropdown_label filterbox_label_box2 dropdown-toggle" href="#" role="button" id="dropdown_filter_2" data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-expanded="false">
                                        Dung lượng </a>

                                    <ul class="dropdown-menu filterbox_group filterbox_dungluong filterbox_box2" aria-labelledby="dropdown_filter_2" style="">
                                        <li class="rightbox__filteritem">
                                            <button class="dropdown-item rightbox__itemval " value="16g" name="dungluong" data-title="Dung lượng">
                                                16G </button>
                                        </li>
                                        <li class="rightbox__filteritem">
                                            <button class="dropdown-item rightbox__itemval " value="32g" name="dungluong" data-title="Dung lượng">
                                                32G </button>
                                        </li>
                                        <li class="rightbox__filteritem">
                                            <button class="dropdown-item rightbox__itemval " value="64g" name="dungluong" data-title="Dung lượng">
                                                64G </button>
                                        </li>
                                        <li class="rightbox__filteritem">
                                            <button class="dropdown-item rightbox__itemval " value="128g" name="dungluong" data-title="Dung lượng">
                                                128G </button>
                                        </li>
                                        <li class="rightbox__filteritem">
                                            <button class="dropdown-item rightbox__itemval " value="256g" name="dungluong" data-title="Dung lượng">
                                                256G </button>
                                        </li>
                                        <li class="rightbox__filteritem">
                                            <button class="dropdown-item rightbox__itemval " value="512g" name="dungluong" data-title="Dung lượng">
                                                512G </button>
                                        </li>
                                        <li class="rightbox__filteritem">
                                            <button class="dropdown-item rightbox__itemval " value="1tb" name="dungluong" data-title="Dung lượng">
                                                1TB </button>
                                        </li>
                                        <li class="rightbox__filteritem p-0 rightbox__filteritem--btnaction">
                                            <button type="button" class="btn rightbox__filteritem_runfilter">
                                                <i class="fa fa-filter"></i>
                                                Áp dụng
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="filterbox_ulgroup_item">
                                <div class="dropdown">

                                    <a class="filterbox_dropdown_label filterbox_label_price dropdown-toggle" href="#" role="button" id="dropdown_filter_price" data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-expanded="false">
                                        Giá bán
                                    </a>
                                    <ul class="dropdown-menu filterbox_group filterbox_price" aria-labelledby="dropdown_filter_price" style="">
                                        <li class="rightbox__filteritem ">
                                            <button class="dropdown-item rightbox__itemval ">
                                                Dưới 10 triệu </button>
                                        </li>
                                        <li class="rightbox__filteritem ">
                                            <button class="dropdown-item rightbox__itemval ">
                                                Từ 10 - 15 triệu </button>
                                        </li>
                                        <li class="rightbox__filteritem ">
                                            <button class="dropdown-item rightbox__itemval ">
                                                Từ 15-20 triệu </button>
                                        </li>
                                        <li class="rightbox__filteritem ">
                                            <button class="dropdown-item rightbox__itemval ">
                                                Trên 20 triệu </button>
                                        </li>
                                        <li class="rightbox__filteritem p-0 rightbox__filteritem--btnaction">
                                            <button type="button" class="btn rightbox__filteritem_runfilter">
                                                <i class="fa fa-filter"></i>
                                                Áp dụng
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="filterbox_ulgroup_item filterbox_ulgroup_item-ttm">
                                <div class="dropdown">
                                    <a class="filterbox_dropdown_label filterbox_label_ttm dropdown-toggle" href="#" role="button" id="dropdown_filter_ttm" data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-expanded="false">
                                        Tình trạng máy
                                    </a>
                                    <ul class="dropdown-menu filterbox_group filterbox_ttm" aria-labelledby="dropdown_filter_ttm">
                                        <li class=" rightbox__filteritem">
                                            <button class="dropdown-item rightbox__filteritem rightbox__itemval ">
                                                New </button>
                                        </li>
                                        <li class=" rightbox__filteritem">
                                            <button class="dropdown-item rightbox__filteritem rightbox__itemval ">
                                                Like New </button>
                                        </li>
                                        <li class=" rightbox__filteritem">
                                            <button class="dropdown-item rightbox__filteritem rightbox__itemval ">
                                                Trả góp </button>
                                        </li>
                                        <li class=" rightbox__filteritem">
                                            <button class="dropdown-item rightbox__filteritem rightbox__itemval ">
                                                Có khuyến mãi </button>
                                        </li>
                                        <li class="rightbox__filteritem p-0 rightbox__filteritem--btnaction">
                                            <button type="button" class="btn rightbox__filteritem_runfilter">
                                                <i class="fa fa-filter"></i>
                                                Áp dụng
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-auto ms-md-auto">
                        <div class="proheader__order dropdown">
                            <button class="btn btn-sm btn-light dropdown-toggle filterbox_dropdown_label" type="button" id="profilter_orderby" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="text_hide d-none d-md-inline"><i class="fa fa-sort-numeric-up-alt"></i> Giá bán tăng dần</span>
                                <span class="text_hide d-inline d-md-none"><i class="fas fa-sort me-1"></i>Sắp xếp</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right filterbox_group filterbox_group__order" aria-labelledby="profilter_orderby">
                                <li><a class="dropdown-item rightbox__itemval selected " href=""><i class="fa fa-sort-alpha-down-alt"></i> Theo mã sản phẩm</a></li>
                                <li><a class="dropdown-item rightbox__itemval  " href=""><i class="fa fa-clock"></i> Gần đây nhất</a></li>
                                <li><a class="dropdown-item rightbox__itemval  " href=""><i class="fa fa-sort-numeric-up-alt"></i> Giá bán tăng dần</a></li>
                                <li><a class="dropdown-item rightbox__itemval  " href=""><i class="fa fa-sort-numeric-down-alt"></i> Giá bán giảm dần</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container-xxl">

        <div class="d-flex flex-wrap list-product-cate gap-3 mt-1">

            <div class="product-item rounded-2 p-2">
                <div class="d-flex flex-column">
                    <div class="img-product">
                        <a href="#">
                            <img src="http://127.0.0.1:8000/user/assets/images/products/product3.png" alt="">
                        </a>
                    </div>
                    <div class="title-product py-1">
                        <a href="#">IPhone 16 Pro 265GB</a>
                    </div>
                    <div class="status_place py-1">
                        <a href="#">
                            <img width="100%" src="http://127.0.0.1:8000/user/assets/images/place_order.png" alt="">
                        </a>
                    </div>
                    <div class="pre-price pb-1 py-1">Giá dự kiến: </div>
                    <div class="price-product py-1">
                        <a href="#">
                            <h2>34.990.000đ <del class="old-price">34.990.000đ</del></h2>
                            <h2 class="fw-light mt-2">Hoặc trả trước: <span class="ml-2 fw-bold">8.500.000đ</span></h2>
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
                    <img class="w-100" src="http://127.0.0.1:8000/user/assets/images/new-icon.png" alt="">
                </div>
            </div>
            <div class="product-item rounded-2 p-2">
                <div class="d-flex flex-column">
                    <div class="img-product">
                        <a href="#">
                            <img src="http://127.0.0.1:8000/user/assets/images/products/product3.png" alt="">
                        </a>
                    </div>
                    <div class="title-product py-1">
                        <a href="#">IPhone 16 Pro 265GB</a>
                    </div>
                    <div class="status_place py-1">
                        <a href="#">
                            <img width="100%" src="http://127.0.0.1:8000/user/assets/images/place_order.png" alt="">
                        </a>
                    </div>
                    <div class="pre-price pb-1 py-1">Giá dự kiến: </div>
                    <div class="price-product py-1">
                        <a href="#">
                            <h2>34.990.000đ <del class="old-price">34.990.000đ</del></h2>
                            <h2 class="fw-light mt-2">Hoặc trả trước: <span class="ml-2 fw-bold">8.500.000đ</span></h2>
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
                    <img class="w-100" src="http://127.0.0.1:8000/user/assets/images/new-icon.png" alt="">
                </div>
            </div>
            <div class="product-item rounded-2 p-2">
                <div class="d-flex flex-column">
                    <div class="img-product">
                        <a href="#">
                            <img src="http://127.0.0.1:8000/user/assets/images/products/product3.png" alt="">
                        </a>
                    </div>
                    <div class="title-product py-1">
                        <a href="#">IPhone 16 Pro 265GB</a>
                    </div>
                    <div class="status_place py-1">
                        <a href="#">
                            <img width="100%" src="http://127.0.0.1:8000/user/assets/images/place_order.png" alt="">
                        </a>
                    </div>
                    <div class="pre-price pb-1 py-1">Giá dự kiến: </div>
                    <div class="price-product py-1">
                        <a href="#">
                            <h2>34.990.000đ <del class="old-price">34.990.000đ</del></h2>
                            <h2 class="fw-light mt-2">Hoặc trả trước: <span class="ml-2 fw-bold">8.500.000đ</span></h2>
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
                    <img class="w-100" src="http://127.0.0.1:8000/user/assets/images/new-icon.png" alt="">
                </div>
            </div>
            <div class="product-item rounded-2 p-2">
                <div class="d-flex flex-column">
                    <div class="img-product">
                        <a href="#">
                            <img src="http://127.0.0.1:8000/user/assets/images/products/product3.png" alt="">
                        </a>
                    </div>
                    <div class="title-product py-1">
                        <a href="#">IPhone 16 Pro 265GB</a>
                    </div>
                    <div class="status_place py-1">
                        <a href="#">
                            <img width="100%" src="http://127.0.0.1:8000/user/assets/images/place_order.png" alt="">
                        </a>
                    </div>
                    <div class="pre-price pb-1 py-1">Giá dự kiến: </div>
                    <div class="price-product py-1">
                        <a href="#">
                            <h2>34.990.000đ <del class="old-price">34.990.000đ</del></h2>
                            <h2 class="fw-light mt-2">Hoặc trả trước: <span class="ml-2 fw-bold">8.500.000đ</span></h2>
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
                    <img class="w-100" src="http://127.0.0.1:8000/user/assets/images/new-icon.png" alt="">
                </div>
            </div>
            <div class="product-item rounded-2 p-2">
                <div class="d-flex flex-column">
                    <div class="img-product">
                        <a href="#">
                            <img src="http://127.0.0.1:8000/user/assets/images/products/product3.png" alt="">
                        </a>
                    </div>
                    <div class="title-product py-1">
                        <a href="#">IPhone 16 Pro 265GB</a>
                    </div>
                    <div class="status_place py-1">
                        <a href="#">
                            <img width="100%" src="http://127.0.0.1:8000/user/assets/images/place_order.png" alt="">
                        </a>
                    </div>
                    <div class="pre-price pb-1 py-1">Giá dự kiến: </div>
                    <div class="price-product py-1">
                        <a href="#">
                            <h2>34.990.000đ <del class="old-price">34.990.000đ</del></h2>
                            <h2 class="fw-light mt-2">Hoặc trả trước: <span class="ml-2 fw-bold">8.500.000đ</span></h2>
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
                    <img class="w-100" src="http://127.0.0.1:8000/user/assets/images/new-icon.png" alt="">
                </div>
            </div>
            <div class="product-item rounded-2 p-2">
                <div class="d-flex flex-column">
                    <div class="img-product">
                        <a href="#">
                            <img src="http://127.0.0.1:8000/user/assets/images/products/product3.png" alt="">
                        </a>
                    </div>
                    <div class="title-product py-1">
                        <a href="#">IPhone 16 Pro 265GB</a>
                    </div>
                    <div class="status_place py-1">
                        <a href="#">
                            <img width="100%" src="http://127.0.0.1:8000/user/assets/images/place_order.png" alt="">
                        </a>
                    </div>
                    <div class="pre-price pb-1 py-1">Giá dự kiến: </div>
                    <div class="price-product py-1">
                        <a href="#">
                            <h2>34.990.000đ <del class="old-price">34.990.000đ</del></h2>
                            <h2 class="fw-light mt-2">Hoặc trả trước: <span class="ml-2 fw-bold">8.500.000đ</span></h2>
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
                    <img class="w-100" src="http://127.0.0.1:8000/user/assets/images/new-icon.png" alt="">
                </div>
            </div>
            <div class="product-item rounded-2 p-2">
                <div class="d-flex flex-column">
                    <div class="img-product">
                        <a href="#">
                            <img src="http://127.0.0.1:8000/user/assets/images/products/product3.png" alt="">
                        </a>
                    </div>
                    <div class="title-product py-1">
                        <a href="#">IPhone 16 Pro 265GB</a>
                    </div>
                    <div class="status_place py-1">
                        <a href="#">
                            <img width="100%" src="http://127.0.0.1:8000/user/assets/images/place_order.png" alt="">
                        </a>
                    </div>
                    <div class="pre-price pb-1 py-1">Giá dự kiến: </div>
                    <div class="price-product py-1">
                        <a href="#">
                            <h2>34.990.000đ <del class="old-price">34.990.000đ</del></h2>
                            <h2 class="fw-light mt-2">Hoặc trả trước: <span class="ml-2 fw-bold">8.500.000đ</span></h2>
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
                    <img class="w-100" src="http://127.0.0.1:8000/user/assets/images/new-icon.png" alt="">
                </div>
            </div>
            <div class="product-item rounded-2 p-2">
                <div class="d-flex flex-column">
                    <div class="img-product">
                        <a href="#">
                            <img src="http://127.0.0.1:8000/user/assets/images/products/product3.png" alt="">
                        </a>
                    </div>
                    <div class="title-product py-1">
                        <a href="#">IPhone 16 Pro 265GB</a>
                    </div>
                    <div class="status_place py-1">
                        <a href="#">
                            <img width="100%" src="http://127.0.0.1:8000/user/assets/images/place_order.png" alt="">
                        </a>
                    </div>
                    <div class="pre-price pb-1 py-1">Giá dự kiến: </div>
                    <div class="price-product py-1">
                        <a href="#">
                            <h2>34.990.000đ <del class="old-price">34.990.000đ</del></h2>
                            <h2 class="fw-light mt-2">Hoặc trả trước: <span class="ml-2 fw-bold">8.500.000đ</span></h2>
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
                    <img class="w-100" src="http://127.0.0.1:8000/user/assets/images/new-icon.png" alt="">
                </div>
            </div>
            <div class="product-item rounded-2 p-2">
                <div class="d-flex flex-column">
                    <div class="img-product">
                        <a href="#">
                            <img src="http://127.0.0.1:8000/user/assets/images/products/product3.png" alt="">
                        </a>
                    </div>
                    <div class="title-product py-1">
                        <a href="#">IPhone 16 Pro 265GB</a>
                    </div>
                    <div class="status_place py-1">
                        <a href="#">
                            <img width="100%" src="http://127.0.0.1:8000/user/assets/images/place_order.png" alt="">
                        </a>
                    </div>
                    <div class="pre-price pb-1 py-1">Giá dự kiến: </div>
                    <div class="price-product py-1">
                        <a href="#">
                            <h2>34.990.000đ <del class="old-price">34.990.000đ</del></h2>
                            <h2 class="fw-light mt-2">Hoặc trả trước: <span class="ml-2 fw-bold">8.500.000đ</span></h2>
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
                    <img class="w-100" src="http://127.0.0.1:8000/user/assets/images/new-icon.png" alt="">
                </div>
            </div>
            <div class="product-item rounded-2 p-2">
                <div class="d-flex flex-column">
                    <div class="img-product">
                        <a href="#">
                            <img src="http://127.0.0.1:8000/user/assets/images/products/product3.png" alt="">
                        </a>
                    </div>
                    <div class="title-product py-1">
                        <a href="#">IPhone 16 Pro 265GB</a>
                    </div>
                    <div class="status_place py-1">
                        <a href="#">
                            <img width="100%" src="http://127.0.0.1:8000/user/assets/images/place_order.png" alt="">
                        </a>
                    </div>
                    <div class="pre-price pb-1 py-1">Giá dự kiến: </div>
                    <div class="price-product py-1">
                        <a href="#">
                            <h2>34.990.000đ <del class="old-price">34.990.000đ</del></h2>
                            <h2 class="fw-light mt-2">Hoặc trả trước: <span class="ml-2 fw-bold">8.500.000đ</span></h2>
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
                    <img class="w-100" src="http://127.0.0.1:8000/user/assets/images/new-icon.png" alt="">
                </div>
            </div>
            <div class="product-item rounded-2 p-2">
                <div class="d-flex flex-column">
                    <div class="img-product">
                        <a href="#">
                            <img src="http://127.0.0.1:8000/user/assets/images/products/product3.png" alt="">
                        </a>
                    </div>
                    <div class="title-product py-1">
                        <a href="#">IPhone 16 Pro 265GB</a>
                    </div>
                    <div class="status_place py-1">
                        <a href="#">
                            <img width="100%" src="http://127.0.0.1:8000/user/assets/images/place_order.png" alt="">
                        </a>
                    </div>
                    <div class="pre-price pb-1 py-1">Giá dự kiến: </div>
                    <div class="price-product py-1">
                        <a href="#">
                            <h2>34.990.000đ <del class="old-price">34.990.000đ</del></h2>
                            <h2 class="fw-light mt-2">Hoặc trả trước: <span class="ml-2 fw-bold">8.500.000đ</span></h2>
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
                    <img class="w-100" src="http://127.0.0.1:8000/user/assets/images/new-icon.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>


<!-- News -->
@include('user.partials.news')

<!-- Comment -->
<section class="comment-user mt-3">
    <div class="container-xxl">
        <p class="boxcomment-title mb-3">Mời bạn cùng thảo luận</p>
        <div class="prodetail__box__content">
            <form class="comment-wrapper d-flex " action="">
                <div class="comment-input-group w-50">
                    <div class="mb-2">
                        <textarea class="form-control mb-0" autocomplete="off" minlength="15" placeholder="Xin để lại câu hỏi. Itech sẽ giúp bạn trả lời câu hỏi của mình."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fas fa-paper-plane me-1"></i>
                        Gửi hỏi đáp </button>
                </div>
            </form>
        </div>
    </div>
</section>


@endsection