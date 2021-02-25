jQuery(function() {
    //top slider 

    jQuery('.top__inner').slick({
        arrows: false,
        dots: true,
        autoplay: true,
        autoplaySpeed: 2000
    });

    //products__card-btn   
    jQuery('.products__card-btn').on('click', function(e) {
        e.preventDefault();
        jQuery(this).toggleClass('products__card-btn--active');
    });

    //faq
    jQuery('.faq__list-title').on('click', function(e) {
        jQuery(this).toggleClass('faq__list-title--active');
        jQuery(this).next().slideToggle('200');
    });


    //farm gallery
    jQuery('.about__family-farm').magnificPopup({
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
    jQuery('.header__menu-btn').on('click', function() {
        jQuery('.header__menu > ul').slideToggle();
    });



    //adding order items
    let countTotalOrderSum = function() {

        const orderTotal = jQuery('.order__total-num');
        const sum = [];
        const reducer = (accumulator, currentValue) => accumulator + currentValue;
        const orderCardSum = document.querySelectorAll('.order__card-sum');
        for (n of orderCardSum) {
            sum.push(parseFloat(n.innerText));
        }
        sum.push(0);
        orderTotal.text(sum.reduce(reducer));
    }

    $orderArray = [];
    jQuery('.products__card-btn').on('click', function() {
        let $cardName = jQuery(jQuery(this).parent().parent()[0].childNodes[1]).text(),
            $cardPrice = jQuery(jQuery(this).parent().parent()[0].childNodes[3].childNodes[1]).text(),
            $cardAmount = jQuery(jQuery(this).parent()[0].childNodes[1]).val(),
            $cardImageLink = jQuery(this).parent().parent().siblings()[0].childNodes[1].getAttribute('src'),
            $orderCardsContainer = jQuery('.order__cards');
        $orderForm = jQuery('.wpcf7-form');

        if ($cardAmount < 1) {
            alert('Укажите желаемое количество товара');
            // jQuery(this).addClass('.test');
            jQuery(this).removeClass('products__card-btn--active');
            return false;
        }

        jQuery(this).prop("disabled", true);

        //add card
        $orderCardsContainer.append(
            '<div class="order__card"><div class="order__card-img"><img src="' + $cardImageLink + '" alt="product image"></div><div class="order__card-info"><span class="order__card-name">' + $cardName + '</span><span class="order__card-num">' + $cardAmount + '</span><span ><span class="order__card-sum">' + ($cardPrice * $cardAmount) + '</span> грн.</span></div><div class="order__card-delete"></div></div>'
        );

        $orderArray.push($cardName + '-' + $cardAmount);

        countTotalOrderSum();

        //add input to order form
        $orderItemName = $cardName.replace(' ', '_');

        $orderForm.append('<p style="display:none"><span class="wpcf7-form-control-wrap client-order"><input type="text" name="' +
            $orderItemName + '" value="" size="40" class="wpcf7-form-control wpcf7-text order__input input" id="' +
            $orderItemName + '" aria-invalid="false"/></span></p>');

        $('#' + $orderItemName + '').val($cardAmount);


        //remove card
        jQuery('.order__card-delete').on('click', function() {

            $parent = jQuery(this).parent();
            $allCardNames = document.querySelectorAll('.products__card-name');
            $allCardBtns = document.querySelectorAll('.products__card-btn');
            $allCardNamesArray = [];
            $cardPosition = undefined;

            $deletedCardName = jQuery(jQuery(this).siblings()[1].childNodes[0]).text().replace(' ', '_');
            console.log($deletedCardName);

            for (n of $allCardNames) {
                $allCardNamesArray.push(jQuery(n.childNodes[0]).text());
            }

            $cardPosition = $allCardNamesArray.indexOf($cardName);
            jQuery($allCardBtns[$cardPosition]).removeClass('products__card-btn--active');
            jQuery($allCardBtns[$cardPosition]).prop("disabled", false);

            $parent.remove();
            countTotalOrderSum();

            //remove input to order form

            jQuery('#' + $deletedCardName).remove();



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