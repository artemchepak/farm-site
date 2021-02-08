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

    //faq
    $('.faq__list-title').on('click', function(e) {
        $(this).toggleClass('faq__list-title--active');
        $(this).next().slideToggle('200');
    });


    //farm gallery
    $('.about__family-farm').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',

        }
    });

    //бургер-меню
    $('.header__menu-btn').on('click', function() {
        $('.header__menu > ul').slideToggle();
    });

});

//about

const familyMembers = document.querySelectorAll('.about__family-member');

familyMembers.forEach(familyMember => {
    familyMember.addEventListener('click', () => {
        removeActiveClasses()
        familyMember.classList.add('active');
    })
})

function removeActiveClasses() {
    familyMembers.forEach(familyMember => {
        familyMember.classList.remove('active');
    })
}