var owl_homebox_product_list = $('.homebox-product-list');
owl_homebox_product_list.owlCarousel({
    loop: true,
    margin: 10,
    responsive: {
        0: {
            items: 4
        },
        600: {
            items: 5
        },
        960: {
            items: 8
        },
        1200: {
            items: 12
        }
    },
});

var owl_carousel_image_customers = $('.carousel-image-customers');
owl_carousel_image_customers.owlCarousel({
    loop: true,
    margin: 24,
    nav: true,
    dots: false,
    navText: [`<span class="prev-thanks-box" ><svg  width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.90906 7.26521C9.50324 6.8906 8.87058 6.9159 8.49597 7.32172L5.2652 10.8217C4.9116 11.2047 4.9116 11.7952 5.26519 12.1782L8.49597 15.6783C8.87057 16.0841 9.50323 16.1094 9.90905 15.7348C10.3149 15.3602 10.3402 14.7276 9.96558 14.3217L8.28397 12.5L18 12.5C18.5523 12.5 19 12.0523 19 11.5C19 10.9477 18.5523 10.5 18 10.5L8.284 10.5L9.96557 8.67829C10.3402 8.27247 10.3149 7.63981 9.90906 7.26521Z" fill="currentColor"/>
    </svg></span>`, `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.0909 7.26521C14.4968 6.8906 15.1294 6.9159 15.504 7.32172L18.7348 10.8217C19.0884 11.2047 19.0884 11.7952 18.7348 12.1782L15.504 15.6783C15.1294 16.0841 14.4968 16.1094 14.091 15.7348C13.6851 15.3602 13.6598 14.7276 14.0344 14.3217L15.716 12.5L6 12.5C5.44771 12.5 5 12.0523 5 11.5C5 10.9477 5.44771 10.5 6 10.5L15.716 10.5L14.0344 8.67829C13.6598 8.27247 13.6851 7.63981 14.0909 7.26521Z" fill="currentColor"/>
    </svg>`],
    responsive: {
        0: {
            items: 2
        },
        600: {
            items: 3
        },
        960: {
            items: 4
        },
        1200: {
            items: 6,
        }
    },
});



var owl_product_new = $('.owl_product_new');
owl_product_new.owlCarousel({
    loop: true,
    margin: 24,
    nav: false,
    dots: false,
    navText: [`<span class="prev-thanks-box" ><svg  width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.90906 7.26521C9.50324 6.8906 8.87058 6.9159 8.49597 7.32172L5.2652 10.8217C4.9116 11.2047 4.9116 11.7952 5.26519 12.1782L8.49597 15.6783C8.87057 16.0841 9.50323 16.1094 9.90905 15.7348C10.3149 15.3602 10.3402 14.7276 9.96558 14.3217L8.28397 12.5L18 12.5C18.5523 12.5 19 12.0523 19 11.5C19 10.9477 18.5523 10.5 18 10.5L8.284 10.5L9.96557 8.67829C10.3402 8.27247 10.3149 7.63981 9.90906 7.26521Z" fill="currentColor"/>
    </svg></span>`, `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.0909 7.26521C14.4968 6.8906 15.1294 6.9159 15.504 7.32172L18.7348 10.8217C19.0884 11.2047 19.0884 11.7952 18.7348 12.1782L15.504 15.6783C15.1294 16.0841 14.4968 16.1094 14.091 15.7348C13.6851 15.3602 13.6598 14.7276 14.0344 14.3217L15.716 12.5L6 12.5C5.44771 12.5 5 12.0523 5 11.5C5 10.9477 5.44771 10.5 6 10.5L15.716 10.5L14.0344 8.67829C13.6598 8.27247 13.6851 7.63981 14.0909 7.26521Z" fill="currentColor"/>
    </svg>`],
    responsive: {
        0: {
            items: 2
        },
        600: {
            items: 3
        },
        960: {
            items: 4
        },
        1200: {
            items: 5,
        }
    },
});


var owl_homeall_img = $(".prodimg_carousel");
var owl_homeall_caption = $(".prodimg_carousel__thumb");
var syncedSecondary = true;

owl_homeall_img.owlCarousel({
    autoplay: false,
    autoplayTimeout: 4350,
    smartSpeed: 500,
    //autoplaySpeed: 1200,
    mouseDrag: false,
    touchDrag: false,
    margin: 2,
    items: 1,
    dots: false,
    loop: false,
    nav: true,
    navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
    onInitialized: function () {
        console.log('owl_homeall_img - onInitialized');
        $('.prodetail_img_wrapper').addClass('bg-none');
        $('.widget--prodetail-action').addClass('active');
    }

}).on('changed.owl.carousel', syncPosition);

owl_homeall_caption.owlCarousel({
    autoplay: false,
    autoplayTimeout: 3500,
    smartSpeed: 150,
    //autoplaySpeed: 1200,
    margin: 0,
    //autoWidth: true,
    items: 6,
    slideBy: 3,
    dots: false,
    loop: false,
    nav: true,
    navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
    responsive: {
        0: {
            items: 5
        },
        480: {
            items: 5
        },
        768: {
            items: 9
        },
        991: {
            items: 6
        },
        1201: {
            items: 5
        }
    },
    initialized: function () {
        console.log('owl_homeall_caption - onInitialized');
        owl_homeall_caption.find(".owl-item").eq(0).addClass("current");
    }
});
function syncPosition(el) {
    var count = el.item.count - 1;
    var current = el.item.index <= count ? el.item.index : 0;
    if (current < 0) {
        current = count;
    }
    if (current > count) {
        current = 0;
    }
    $(".prodimg_carousel__thumb").find(".owl-item")
        .removeClass("current")
        .eq(current)
        .addClass("current");
    owl_home_setcenter(current);

}

function syncPosition2(el) {
    if (syncedSecondary) {
        var number = el.item.index;
        //console.log( number );
        owl_homeall_img.data('owl.carousel').to(number, 100, true);
    }
}
owl_homeall_caption.on("click", ".owl-item", function (e) {
    var number = $(this).index();
    //console.log( number );

    owl_homeall_img.data('owl.carousel').to(number, 300, true);
});

function owl_home_setcenter(number) {
    var sync2visible = owl_homeall_caption.data('owl.carousel')._items;
    var num_center = Math.ceil(sync2visible.length / 2);
    var num = number;
    var found = false;
    for (var i in sync2visible) {
        if (num === sync2visible[i] && $(sync2visible[i][0]).hasClass('active')) {
            found = true;
        }
    }
    if (found === false) {
        //console.log( num , sync2visible.length - 1 );
        if (num > sync2visible.length - 1) {
            //console.log( 'a = ', num);
            owl_homeall_caption.trigger("to.owl.carousel", num - sync2visible.length + 1)
        } else {
            if (num - 1 < 1) {
                //console.log('e');
                num = 0;
            } else {
                num -= 1;
            }
            owl_homeall_caption.trigger("to.owl.carousel", num);
        }
    } else if (num === sync2visible.length - 1) {
        //console.log( 'c = ', num);
        owl_homeall_caption.trigger("to.owl.carousel", sync2visible[1]);
    } else {
        num = 1;
        //console.log( 'd = ', num );
        owl_homeall_caption.trigger("to.owl.carousel", num - 1);
    }
}