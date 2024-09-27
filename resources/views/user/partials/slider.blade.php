<section class="slider-container">
    <div class="carousel slide" id="carouselSlider" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="5000">
                <a href="#">
                    <img class="img-fluid w-100" src="{{asset('user/assets/images/slide1.png')}}" alt="">
                </a>
            </div>
            <div class="carousel-item" data-bs-interval="5000">
                <a href="#">
                    <img class="img-fluid w-100" src="{{asset('user/assets/images/slide2.png')}}" alt="">
                </a>
            </div>
            <div class="carousel-item" data-bs-interval="5000">
                <a href="#">
                    <img class="img-fluid w-100" src="{{asset('user/assets/images/slide3.png')}}" alt="">
                </a>
            </div>
        </div>


        <button class="carousel-control-prev" data-bs-target="#carouselSlider" data-bs-slide="prev" type="button">
            <div style="background-color: #857E7E;" class="rounded-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="39" height="39" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left">
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg>
            </div>
        </button>

        <button class="carousel-control-next" data-bs-target="#carouselSlider" data-bs-slide="next" type="button">
            <div style="background-color: #857E7E;" class="rounded-5">
                <svg xmlns=" http://www.w3.org/2000/svg" width="39" height="39" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
            </div>
        </button>
    </div>
</section>



<section class="slider-outer">
    <div class="container">
        <div class="list-slide row">
            <div class="slide-item col-6">
                <a href="#" draggable="false">
                    <img class="w-100" src="{{asset('user/assets/images/mini-slide-1.png')}}" alt="" draggable="false">
                </a>
            </div>
            <div class="slide-item col-6">
                <a href="#" draggable="false">
                    <img class="w-100" src="{{asset('user/assets/images/mini-slide-2.png')}}" alt="" draggable="false">
                </a>
            </div>
            <div class="slide-item col-6">
                <a href="#" draggable="false">
                    <img class="w-100" src="{{asset('user/assets/images/mini-slide-3.png')}}" alt="" draggable="false">
                </a>
            </div>
            <div class="slide-item col-6">
                <a href="#" draggable="false">
                    <img class="w-100" src="{{asset('user/assets/images/mini-slide-2.png')}}" alt="" draggable="false">
                </a>
            </div>
        </div>
    </div>




    <button class="prev-slide-outer">
        <svg xmlns="http://www.w3.org/2000/svg" width="39" height="39" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left">
            <line x1="19" y1="12" x2="5" y2="12"></line>
            <polyline points="12 19 5 12 12 5"></polyline>
        </svg>
    </button>
    <button class="next-slide-outer">
        <svg xmlns=" http://www.w3.org/2000/svg" width="39" height="39" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
            <line x1="5" y1="12" x2="19" y2="12"></line>
            <polyline points="12 5 19 12 12 19"></polyline>
        </svg>
    </button>

</section>