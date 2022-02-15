<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Science Fair</title>
        <link rel="icon" href="images/fav-icon.png" />
        <link rel="stylesheet" href="{{URL::asset('public/frontend/css/bootstrap.min.css')}}" />
        <link rel="stylesheet" href="{{URL::asset('public/frontend/css/bootstrap-grid.css')}}" />
        <link rel="stylesheet" href="{{URL::asset('public/frontend/css/custom.css')}}" />
        <link rel="stylesheet" href="{{URL::asset('public/frontend/css/custom_responsive.css')}}" />
        <link rel="stylesheet" href="{{URL::asset('public/frontend/css/animate.css')}}" />
        <link rel="stylesheet" href="{{URL::asset('public/frontend/css/owl.carousel.min.css')}}" />
        <link rel="stylesheet" href="{{URL::asset('public/frontend/css/icofont.css')}}" />
        <link rel="stylesheet" href="{{URL::asset('public/frontend/css/font-awesome.min.css')}}" />
    </head>
    <body>
        
        <main>
            <div class="home-banner" style="height:600px; background: transparent linear-gradient(108deg, #529EFD 0%, #161617 100%) 0% 0% no-repeat padding-box;">
                <div class="banner-content-sec">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="banner-content">
                                    <h2>THE SITE IS UNDER CONSTURCTION</h2>
                                    <p>Coming Soon...</p>
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12">
                                <h1 style="font-size: 80px; font-weight:bold;">Science Fair</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </main>
        

        <script type="text/javascript" src="{{URL::asset('public/frontend/js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('public/frontend/js/popper.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('public/frontend/js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('public/frontend/js/owl.carousel.js')}}"></script>
        <script type="text/javascript">
jQuery(document).ready(function ($) {

    $('#nav-toggle').click(function () {
        $('.site-menu ul').slideToggle();
    });
    $('#nav-toggle').on('click', function () {
        this.classList.toggle('active');
    });

    // window height //

    // fixed header //

    //                $(window).scroll(function () {
    //                    var sticky = $('.site-menu'),
    //                            scroll = $(window).scrollTop();
    //                    if (window.innerWidth < 768) {
    //                        if (scroll >= 75) {
    //                            sticky.addClass('fixed-header');
    //                            sticky.addClass('animated');
    //                            sticky.addClass('fadeInDown');
    //                        } else {
    //                            sticky.removeClass('fixed-header');
    //                            sticky.removeClass('animated');
    //                            sticky.removeClass('fadeInDown');
    //                        }
    //                    } else {
    //                        if (scroll >= 75) {
    //                            sticky.addClass('fixed-header');
    //                            sticky.addClass('animated');
    //                            sticky.addClass('fadeInDown');
    //                        } else {
    //                            sticky.removeClass('fixed-header');
    //                            sticky.removeClass('animated');
    //                            sticky.removeClass('fadeInDown');
    //                        }
    //                    }
    //                });

    // scroll to top //

    $(window).scroll(function () {
        if ($(this).scrollTop() > 75) {
            $('#scroll_top').show();
        } else {
            $('#scroll_top').hide();
        }
    });
    $('#scroll_top').click(function () {
        $("html, body").animate({scrollTop: 0}, 1500);
        return false;
    });

    var owl3 = $('.tts-slider');
    owl3.owlCarousel({
        loop: true,
        autoplay: false,
        autoplayHoverPause: true,
        nav: false,
        dots: true,
        margin: 15,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2,
                nav: false
            },
            1000: {
                items: 3,
                margin: 20
            }
        }
    });
});

jQuery(document).ready(function ($) {
    adjustWinHeight();

    $(window).resize(function () {
        adjustWinHeight();
    });

});

function adjustWinHeight() {
    var $ = jQuery;
    var winHeight = $(window).height();
    var footerHeight = $('.site-footer').height();
    var headerHeight = $('.site-header').height();
    var mainHeight = winHeight - (footerHeight + headerHeight);
    $('main').css('min-height', mainHeight);
}

        </script>
    </body>
</html>
