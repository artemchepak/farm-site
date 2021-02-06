$(function() {
    //top slider 

    $('.top__inner').slick({
        arrows: false,
        dots: true,
        autoplay: true,
        autoplaySpeed: 2000
    });

    //products__card-btn   
    $('.products__card-btn').on('click', function(e) {
        e.preventDefault();
        $(this).toggleClass('products__card-btn--active');
    });
});