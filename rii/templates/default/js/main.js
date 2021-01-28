$(function () {
    if ($('.js-slider').length > 0) {
        $('.js-slider').slick({
            centerMode: true,
            variableWidth: true,
            slidesToScroll: 1,
            infinite: true,
            arrows: true,
            dots: true,
            speed: 800,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        centerMode: false,
                        variableWidth: false,
                    }
                },
            ]
        });
    }

    if ($('.js-slider-reviews').length > 0) {
        $('.js-slider-reviews').slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            infinite: true,
            arrows: true,
            dots: true,
            speed: 800,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1,
                    }
                },
            ]
        });
    }

    if ($('.js-slider-auto').length > 0) {
        $('.js-slider-auto').slick({
            slidesToShow: 8,
            slidesToScroll: 1,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: false,
            dots: false,
            speed: 800,
        });
    }

    if ($('.js-phone-mask').length > 0) {
        $(".js-phone-mask").mask("+(375) 99-999-99-99");
    }

    $("body").on("click", ".js-click-popup", function (e) {
        e.preventDefault();
        var dataClick = $(this).attr('data-click'),
            popApShow = $('.pop-up--item[data-block = ' + dataClick + ']');
        $('.pop-up--list').addClass("active");
        popApShow.addClass('active');
    });

    $("body").on("click", ".js-popup-close", function (e) {
        e.preventDefault();
        $('.pop-up--list, .pop-up--item').removeClass("active");
    });

    $("body").on("click", function (e) {
        if (!$(".pop-up--item, .js-click-popup").is(e.target) &&
            $(".pop-up--item, .js-click-popup").has(e.target).length === 0) {
            $(".pop-up--list, .pop-up--item").removeClass("active");
        }
    });

    $("body").on("click", ".js-click-section", function (e) {
        e.preventDefault();
        var dataMenuClick = $(this).attr('data-click'),
            idSection = $('.s-section[data-section = ' + dataMenuClick + ']'),
            top = $(idSection).offset().top;

        $('.js-mobile-block').removeClass('active');
        $('.s-section').removeClass('active-menu');
        $('body,html').animate({scrollTop: top}, 1500);
    });

    $("body").on('click', '.js-click-more', function (e) {
        e.preventDefault();
        $(this).addClass("active")
        $(this).siblings('.button-hidden').addClass('active');
        $('.js-price-block').addClass("full-height");
    });

    $('body').on('click', '.js-click-mobile', function (e) {
        e.preventDefault();
        $('.js-mobile-block').addClass('active');
        $(this).parents('.s-section').addClass('active-menu');
    });

    $('body').on('click', '.js-close-menu', function (e) {
        e.preventDefault();
        $('.js-mobile-block').removeClass('active');
        $('.s-section').removeClass('active-menu');
    });

    sliderMarkAuto();
});

priceItemHeight();

$(window).resize(function () {
    $('.js-mobile-block, .s-section').removeClass('active');
    priceItemHeight();
    sliderMarkAuto();
});

function sliderMarkAuto() {
    if ($('.js-slider-auto').length > 0 && $(window).width() > 768 && !($('.js-slider-auto').hasClass('slick-initialized'))) {
        $('.js-slider-auto').slick({
            slidesToShow: 8,
            slidesToScroll: 1,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: false,
            dots: false,
            speed: 800,
        });
        sliderIsLive = true;
    } else if ($('.js-slider-auto').length > 0 && $(window).width() < 768 && $('.js-slider-auto').hasClass('slick-initialized')) {
        $('.js-slider-auto').slick('unslick');
        sliderIsLive = false;
    }
}

function priceItemHeight() {
    var blockItems = $('.js-price-block').find('.price--item'),
        itemLength = blockItems.length,
        blockHeight = 0,
        numberItem;
    if ($(window).width() > 1024) {
        numberItem = 10;
    } else {
        numberItem = 5;
    }
    if (itemLength > numberItem) {
        blockItems.each(function (i, el) {
            if (i < numberItem) {
                blockHeight = blockHeight + $(el).outerHeight();
            }
        });
    }
    if ($(window).width() > 1024) {
        $('.js-price-block').css('height', (blockHeight / 2 - 8))
    } else {
        $('.js-price-block').css('height', (blockHeight - 8))
    }
}

scrollSectionActive();

function scrollSectionActive() {
    function e() {
        var t = document.getElementsByClassName("s-section"),
            e = document.getElementsByClassName("active-link-menu");

        e[0] && e[0].classList.remove("active-link-menu");
        for (var n = 0; n < t.length; n++) {
            var a = t[n];
            if (a.getBoundingClientRect().top > 100) break;
        }
        if (n--, n >= 0) {
            var i = t[n] && t[n].getAttribute("data-section"),
                r = document.querySelector('.sectionMenu--item[data-click = ' + i + ']');
            i && r && r.parentNode.classList.add("active-link-menu");
        }
    }

    document.addEventListener("DOMContentLoaded", function () {
        e(), window.addEventListener("scroll", e);
    });
}