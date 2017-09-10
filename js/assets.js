/**
 * Created by danialiaga on 26-04-17.
 */

$(document).ready(function () {
    if ($("#menu-agenda").length > 0) {
        $("#menu-agenda span").prepend("<hr>");
    }
    ;

    if ($(".bx-controls").length > 0) {
        $(".bx-controls-direction .bx-prev a").prepend('<i class="fa fa-long-arrow-left" aria-hidden="true"></i>');
        $(".bx-controls-direction .bx-next a").prepend('<i class="fa fa-long-arrow-rigth" aria-hidden="true"></i>');
    }
    ;

    $(document).scroll(function () {
        var y = $(document).height() - 1115;
        var t = $(document).scrollTop();
        if (y <= t) {
            $('#menu-redes-sociales').fadeOut() && $('#menu-agenda').fadeOut();
        } else {
            $('#menu-redes-sociales').fadeIn() && $('#menu-agenda').fadeIn();
        }
    });

    /*
     if($(".blog-content img").hover(function () {
     $(".blog-content figcaption").hide();
     }));*/

    if ($(".link-item").hover()) {
        $(".title-item").show().fadeIn();
    } else {
        $(".title-item").hide().fadeOut();
    }
});


//Menu

$(document).ready(function () {
    togglescroll();
    $(".icon").click(function () {
        $(".mobilenav").fadeToggle(500);
        $(".top-menu").toggleClass("top-animate");
        $("body").toggleClass("noscroll");
        $(".mid-menu").toggleClass("mid-animate");
        $(".bottom-menu").toggleClass("bottom-animate");
    });
});

function togglescroll() {
    $('body').on('click', function (e) {
        if (!$(e.target).hasClass('icon') && $('body').hasClass('noscroll')) {
        }
    });
}

$(document).keydown(function (e) {
    if (e.keyCode == 27) {
        $(".mobilenav").fadeOut(500);
        $(".top-menu").removeClass("top-animate");
        $("body").removeClass("noscroll");
        $(".mid-menu").removeClass("mid-animate");
        $(".bottom-menu").removeClass("bottom-animate");
    }
});

if ($('#back-to-top').length) {
    var scrollTrigger = 100, // px
        backToTop = function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                $('#back-to-top').addClass('show');
            } else {
                $('#back-to-top').removeClass('show');
            }
        };
    backToTop();
    $(window).on('scroll', function () {
        backToTop();
    });
    $('#back-to-top').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 2000);
    });
}

if ($('.item-services').hasClass('active')) {
    $('.item-services a').parent().addClass('selected');
}

var slideCount = $('#slider-services ul li').length;
var slideWidth = $('#slider-services ul li').width();
var slideHeight = $('#slider-services ul li').height();
var sliderUlWidth = slideCount * slideWidth + 80; // (10*4)*2 where 10 is margin between li elements.

$('#slider-services').css({width: sliderUlWidth, height: slideHeight});

$('#slider-services ul').css({width: sliderUlWidth /*, marginLeft: - slideWidth */});

$('#slider-services ul li:last-child').prependTo('#slider-services ul');

function moveLeft2() {
    $('#slider-services ul').animate({
        left: +slideWidth
    }, 200, function () {
        $('#slider-services ul li:last-child').prependTo('#slider-services ul');
        $('#slider-services ul').css('left', '');
    });
};

function moveRight2() {
    $('#slider-services ul').animate({
        left: -slideWidth
    }, 200, function () {
        $('#slider-services ul li:first-child').appendTo('#slider-services ul');
        $('#slider-services ul').css('left', '');
    });
};

$(function () {
    $('a.control_next, a.control_prev').on("click", function (e) {
        e.preventDefault();
    });
});

$('a.control_prev').click(function () {
    moveLeft2();
});

$('a.control_next').click(function () {
    moveRight2();
});

$("#slider-services ul li").on("swipeleft", function () {
    //alert("You swiped left!");
    moveRight2();
});

$("#slider-services ul li").on("swiperight", function () {
    //alert("You swiped left!");
    moveLeft2();
});


