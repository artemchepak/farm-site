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

    //burger-menu
    $('.header__menu-btn').on('click', function() {
        $('.header__menu > ul').slideToggle();
    });



    //adding order items
    let countTotalOrderSum = function() {

        const orderTotal = $('.order__total-num');
        const sum = [];
        const reducer = (accumulator, currentValue) => accumulator + currentValue;
        const orderCardSum = document.querySelectorAll('.order__card-sum');
        for (n of orderCardSum) {
            sum.push(parseFloat(n.innerText));
        }
        sum.push(0);
        orderTotal.text(sum.reduce(reducer));
    }


    $('.products__card-btn').on('click', function() {
        let $cardName = $($(this).parent().parent()[0].childNodes[1]).text(),
            $cardPrice = $($(this).parent().parent()[0].childNodes[3].childNodes[1]).text(),
            $cardAmount = $($(this).parent()[0].childNodes[1]).val(),
            $cardImageLink = $(this).parent().parent().siblings()[0].childNodes[1].getAttribute('src'),
            $orderCardsContainer = $('.order__cards');

        if ($cardAmount < 1) {
            alert('Укажите желаемое количество товара');
            // $(this).addClass('.test');
            $(this).removeClass('products__card-btn--active');
            return false;
        }

        $(this).prop("disabled", true);

        //add card
        $orderCardsContainer.append(
            '<div class="order__card"><div class="order__card-img"><img src="' + $cardImageLink + '" alt="product image"></div><div class="order__card-info"><span class="order__card-name">' + $cardName + '</span><span class="order__card-num">' + $cardAmount + ' шт.</span><span ><span class="order__card-sum">' + ($cardPrice * $cardAmount) + '</span> грн.</span></div><img class="order__card-delete" src="images/plus.svg" alt="close img"></div>'
        );

        countTotalOrderSum();

        //remove card
        $('.order__card-delete').on('click', function() {

            let $parent = $(this).parent(),
                $allCardNames = document.querySelectorAll('.products__card-name'),
                $allCardBtns = document.querySelectorAll('.products__card-btn'),
                $allCardNamesArray = [],
                $cardPosition = undefined;

            for (n of $allCardNames) {
                $allCardNamesArray.push($(n.childNodes[0]).text());
            }

            $cardPosition = $allCardNamesArray.indexOf($cardName);
            $($allCardBtns[$cardPosition]).removeClass('products__card-btn--active');
            $($allCardBtns[$cardPosition]).prop("disabled", false);



            console.log($allCardBtns);
            $parent.remove();
            countTotalOrderSum();



        })




    })


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