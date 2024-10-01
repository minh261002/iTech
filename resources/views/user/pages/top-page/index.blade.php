@extends('user.layouts.master')
@section('title', 'Trang chủ')



@section('content')
<!-- LIST BOX PRODUCTS -->
<section class="homebox-product mt-4">
    <div class="container-xxl">
        <div class="owl-carousel homebox-product-list">
            <div class="homebox-product-item d-flex flex-column justify-content-center align-items-center text-center">
                <a href="#">
                    <img src="{{asset('user/assets/images/boxhome-products/airpods.png')}}" alt="">
                </a>
                <h3 class="title-product-box">Ipad Gen 9 đẹp lắm</h3>
            </div>
            <div class="homebox-product-item d-flex flex-column justify-content-center align-items-center text-center">
                <a href="#">
                    <img src="{{asset('user/assets/images/boxhome-products/apple-watch-s9.png')}}" alt="">
                </a>
                <h3 class="title-product-box">Ipad Gen 9</h3>

            </div>
            <div class="homebox-product-item d-flex flex-column justify-content-center align-items-center text-center">
                <a href="#">
                    <img src="{{asset('user/assets/images/boxhome-products/apple-watch-se-2023.png')}}" alt="">
                </a>
                <h3 class="title-product-box">Ipad Gen 9 đẹp lắm</h3>
            </div>

        </div>
    </div>
</section>


<!-- SECTION THANKS FOR CUSTOMERS-->
<section class="thanks-box mt-4">
    <div class="container-xxl ">
        <div class="content-box py-4 px-3">
            <div class="title-box  text-center">
                <h2 class="title">Cảm ơn hơn 15000 người nổi tiếng và khách hàng thân yêu đã tin tưởng lựa chọn !</h2>
            </div>

            <div class="owl-carousel owl-theme carousel-image-customers">
                <div class="item-customer">
                    <img src="{{asset('user/assets/images/image-customer.jpg')}}" alt="">
                </div>
                <div class="item-customer">
                    <img src="{{asset('user/assets/images/image-customer.jpg')}}" alt="">
                </div>
                <div class="item-customer">
                    <img src="{{asset('user/assets/images/image-customer.jpg')}}" alt="">
                </div>
                <div class="item-customer">
                    <img src="{{asset('user/assets/images/image-customer.jpg')}}" alt="">
                </div>
                <div class="item-customer">
                    <img src="{{asset('user/assets/images/image-customer.jpg')}}" alt="">
                </div>
                <div class="item-customer">
                    <img src="{{asset('user/assets/images/image-customer.jpg')}}" alt="">
                </div>
                <div class="item-customer">
                    <img src="{{asset('user/assets/images/image-customer.jpg')}}" alt="">
                </div>
            </div>
        </div>

    </div>
</section>


<!-- NEW PRODUCTS -->
<section class="new-products-container mt-5">
    <div class="container-xxl">
        <div class="new-products-box p-3">
            <div class="title-box text-center">
                <h2>Sản Phẩm Mới Ra Mắt </h2>
            </div>

            <div class="list-new-product">
                <div class="nav gap-2 mb-3 mt-4" id="nav-tab" role="tablist">
                    <button class="active nav-new-product " id="nav-new-product-1" data-bs-toggle="tab" data-bs-target="#new-product-1" type="button" role="tab" aria-controls="new-product-1" aria-selected="true">Điện thoại</button>
                    <button class="nav-new-product" id="nav-new-product-2" data-bs-toggle="tab" data-bs-target="#new-product-2" type="button" role="tab" aria-controls="new-product-2" aria-selected="false">Phụ kiện IPhone 16</button>
                    <button class="nav-new-product" id="nav-new-product-3" data-bs-toggle="tab" data-bs-target="#new-product-3" type="button" role="tab" aria-controls="new-product-3" aria-selected="false">Hot Sale</button>
                </div>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="new-product-1" role="tabpanel" aria-labelledby="nav-new-product-1">
                        <div class="owl-carousel owl_product_new px-3">
                            <div class="product-new-item rounded-2">
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
                            <div class="product-new-item rounded-2">
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

                    <div class="tab-pane fade" id="new-product-2" role="tabpanel" aria-labelledby="nav-new-product-2">
                        <div class="owl-carousel owl_product_new">
                            <div class="product-new-item rounded-2">
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
                    <div class="tab-pane fade" id="new-product-3" role="tabpanel" aria-labelledby="nav-new-product-3">
                        <div class="owl-carousel owl_product_new">
                            <div class="product-new-item rounded-2">
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
            </div>

        </div>
    </div>
</section>



<!-- SHOW PRODUCTS BY CATEGORY-->
<section class="products-by-category mt-4">
    <div class="container-xxl">
        <div class="prod-cate-container">
            <div class="prod-cate-list">
                <div class="prod-cate-item">
                    <a href="#">
                        <div class="image-cate">
                            <img width="75px" height="75px" src="{{asset('user/assets/images/cate-mini/cate-1.png')}}" alt="">
                        </div>
                        <div class="title-cate">
                            <h2>iPhone 15 Pro Max</h2>
                        </div>
                    </a>
                </div>
                <div class="prod-cate-item">
                    <a href="#">
                        <div class="image-cate">
                            <img width="75px" height="75px" src="{{asset('user/assets/images/cate-mini/cate-1.png')}}" alt="">
                        </div>
                        <div class="title-cate">
                            <h2>iPhone 15 Pro Max</h2>
                        </div>
                    </a>
                </div>
                <div class="prod-cate-item">
                    <a href="#">
                        <div class="image-cate">
                            <img width="75px" height="75px" src="{{asset('user/assets/images/cate-mini/cate-1.png')}}" alt="">
                        </div>
                        <div class="title-cate">
                            <h2>iPhone 15 Pro Max</h2>
                        </div>
                    </a>
                </div>
                <div class="prod-cate-item">
                    <a href="#">
                        <div class="image-cate">
                            <img width="75px" height="75px" src="{{asset('user/assets/images/cate-mini/cate-1.png')}}" alt="">
                        </div>
                        <div class="title-cate">
                            <h2>iPhone 15 Pro Max</h2>
                        </div>
                    </a>
                </div>
            </div>



            <div class="d-flex flex-wrap list-product-cate gap-3 mt-4">

                <div class="product-item rounded-2 p-2">
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
                                <img width="100%" src="{{asset('user/assets/images/place_order.png')}}" alt="">
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
                        <img class="w-100" src="{{asset('user/assets/images/new-icon.png')}}" alt="">
                    </div>
                </div>
                <div class="product-item rounded-2 p-2">
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
                                <img width="100%" src="{{asset('user/assets/images/place_order.png')}}" alt="">
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
                        <img class="w-100" src="{{asset('user/assets/images/new-icon.png')}}" alt="">
                    </div>
                </div>
                <div class="product-item rounded-2 p-2">
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
                                <img width="100%" src="{{asset('user/assets/images/place_order.png')}}" alt="">
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
                        <img class="w-100" src="{{asset('user/assets/images/new-icon.png')}}" alt="">
                    </div>
                </div>
                <div class="product-item rounded-2 p-2">
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
                                <img width="100%" src="{{asset('user/assets/images/place_order.png')}}" alt="">
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
                        <img class="w-100" src="{{asset('user/assets/images/new-icon.png')}}" alt="">
                    </div>
                </div>
                <div class="product-item rounded-2 p-2">
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
                                <img width="100%" src="{{asset('user/assets/images/place_order.png')}}" alt="">
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
                        <img class="w-100" src="{{asset('user/assets/images/new-icon.png')}}" alt="">
                    </div>
                </div>
                <div class="product-item rounded-2 p-2">
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
                                <img width="100%" src="{{asset('user/assets/images/place_order.png')}}" alt="">
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
                        <img class="w-100" src="{{asset('user/assets/images/new-icon.png')}}" alt="">
                    </div>
                </div>
                <div class="product-item rounded-2 p-2">
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
                                <img width="100%" src="{{asset('user/assets/images/place_order.png')}}" alt="">
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
                        <img class="w-100" src="{{asset('user/assets/images/new-icon.png')}}" alt="">
                    </div>
                </div>
                <div class="product-item rounded-2 p-2">
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
                                <img width="100%" src="{{asset('user/assets/images/place_order.png')}}" alt="">
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
                        <img class="w-100" src="{{asset('user/assets/images/new-icon.png')}}" alt="">
                    </div>
                </div>
                <div class="product-item rounded-2 p-2">
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
                                <img width="100%" src="{{asset('user/assets/images/place_order.png')}}" alt="">
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
                        <img class="w-100" src="{{asset('user/assets/images/new-icon.png')}}" alt="">
                    </div>
                </div>
                <div class="product-item rounded-2 p-2">
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
                                <img width="100%" src="{{asset('user/assets/images/place_order.png')}}" alt="">
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
                        <img class="w-100" src="{{asset('user/assets/images/new-icon.png')}}" alt="">
                    </div>
                </div>

            </div>

            <div class="show-all-product-cate text-center d-flex justify-content-center mt-2">
                <div class="btn-show-all">
                    <a href="#">Xem toàn bộ sản phầm</a>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- ACCESSORIES -->

<section class="accessories-container mt-3">
    <div class="container-xxl">
        <h2 class="title-accessories-container mb-3">Danh mục phụ kiện :</h2>
        <div class="accessories-list">
            <div class="row row-cols-lg-6">
                <div class="access-item col mb-3">
                    <a href="#" class="text-decoration-none">
                        <div class="d-flex flex-column justify-content-center align-items-center gap-2">
                            <div class="image-access">
                                <img src="{{asset('user/assets/images/accessories/phukien1.png')}}" alt="">
                            </div>
                            <div class="title-access">
                                <h2>Phụ kiện Apple</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="access-item col mb-3">
                    <a href="#" class="text-decoration-none">
                        <div class="d-flex flex-column justify-content-center align-items-center gap-2">
                            <div class="image-access">
                                <img src="{{asset('user/assets/images/accessories/phukien1.png')}}" alt="">
                            </div>
                            <div class="title-access">
                                <h2>Phụ kiện Apple</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="access-item col mb-3">
                    <a href="#" class="text-decoration-none">
                        <div class="d-flex flex-column justify-content-center align-items-center gap-2">
                            <div class="image-access">
                                <img src="{{asset('user/assets/images/accessories/phukien1.png')}}" alt="">
                            </div>
                            <div class="title-access">
                                <h2>Phụ kiện Apple</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="access-item col mb-3">
                    <a href="#" class="text-decoration-none">
                        <div class="d-flex flex-column justify-content-center align-items-center gap-2">
                            <div class="image-access">
                                <img src="{{asset('user/assets/images/accessories/phukien1.png')}}" alt="">
                            </div>
                            <div class="title-access">
                                <h2>Phụ kiện Apple</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="access-item col mb-3">
                    <a href="#" class="text-decoration-none">
                        <div class="d-flex flex-column justify-content-center align-items-center gap-2">
                            <div class="image-access">
                                <img src="{{asset('user/assets/images/accessories/phukien1.png')}}" alt="">
                            </div>
                            <div class="title-access">
                                <h2>Phụ kiện Apple</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="access-item col mb-3">
                    <a href="#" class="text-decoration-none">
                        <div class="d-flex flex-column justify-content-center align-items-center gap-2">
                            <div class="image-access">
                                <img src="{{asset('user/assets/images/accessories/phukien1.png')}}" alt="">
                            </div>
                            <div class="title-access">
                                <h2>Phụ kiện Apple</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="access-item col mb-3">
                    <a href="#" class="text-decoration-none">
                        <div class="d-flex flex-column justify-content-center align-items-center gap-2">
                            <div class="image-access">
                                <img src="{{asset('user/assets/images/accessories/phukien1.png')}}" alt="">
                            </div>
                            <div class="title-access">
                                <h2>Phụ kiện Apple</h2>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>


@endsection