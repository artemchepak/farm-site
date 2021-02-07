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