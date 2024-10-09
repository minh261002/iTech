// SLIDE OUTER 
document.querySelector('.prev-slide-outer').onclick = function () {
    const widthItem = document.querySelector('.slider-outer .slide-item').offsetWidth;
    document.querySelector('.slider-outer .list-slide').scrollLeft -= widthItem;
}

document.querySelector('.next-slide-outer').onclick = function () {
    const widthItem = document.querySelector('.slider-outer .slide-item').offsetWidth;
    document.querySelector('.slider-outer .list-slide').scrollLeft += widthItem;
}

setInterval(function () {
    const widthItem = document.querySelector('.slider-outer .slide-item').offsetWidth;
    document.querySelector('.slider-outer .list-slide').scrollLeft += widthItem;

    const totalWidth = document.querySelector('.slider-outer .list-slide').scrollWidth;
    const containerWidth = document.querySelector('.slider-outer .list-slide').clientWidth;

    if (document.querySelector('.slider-outer .list-slide').scrollLeft >= totalWidth - containerWidth) {
        document.querySelector('.slider-outer .list-slide').scrollLeft = 0;
    }
}, 5000);


