<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>AUM Consulting</title>
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
        <header class="site-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-7">
                        <div class="site-logo"><a href="#">AUM CONSULTING LOGO</a></div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-5">
                        <div class="nav-mobile">
                            <a id="nav-toggle" href="javascript:;"><span><i class="icofont-navigation-menu"></i></span></a>
                        </div>
                        <div class="site-menu d-lg-block d-sm-none">
                            <ul>
                                <li><a href="#">How It Works</a></li>
                                <li class="nav-item dropdown">
                                    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">For Business</a>
                                    <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                    </div>
                                </li>
                                <li><a href="#">Additional Services</a></li>
                                <li><a href="#">Pricing</a></li>
                                <li class="signup-btn"><a href="#">Sign Up</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12 d-none d-lg-none d-sm-block">
                        <div class="site-menu">
                            <ul>
                                <li><a href="#">How It Works</a></li>
                                <li class="nav-item dropdown">
                                    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">For Business</a>
                                    <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                    </div>
                                </li>
                                <li><a href="#">Additional Services</a></li>
                                <li><a href="#">Pricing</a></li>
                                <li class="signup-btn"><a href="#">Sign Up</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <div class="signup-sec padding-100">
                <div class="container">
                    <div class="signup-box">
    <div class="common-form">
        <h2>SIGN UP</h2>
    <div class="heading-line"></div>
    <h6>Sign Up for AUM Consulting</h6>
        <form action="" method="get">
        <div class="form-group"><input type="email" placeholder="Enter email address"></div>
        <div class="form-group"><input type="password" placeholder="Password"></div>
        <div class="form-group"><input type="password" placeholder="Confirm Password"></div>
        <div class="form-group">Captcha here</div>
        <div class="form-group"><button type="submit">Sign Up Now!</button></div>
        </form>
        <div class="form-bottom"><a href="#">Or Return To Previous Page</a></div>
    </div>
 </div>
                </div>
            </div>

        </main>
        <div class="newsletter-sec">
            <div class="container">
                <div class="newsletter-sec-box">
                    <div class="row">
                        <div class="col-lg-7 col-sm-7">
                            <div class="newsletter-heading">
                                <h4>LET AUM CONSULTANT HELP YOU REACH<br> YOUR GOALS. SAVE. INVEST. RETIRE.</h4>
                            </div>
                        </div>
                        <div class="col-lg-5 col-sm-5">
                            <div class="newsletter-btn">
                                <a href="#" class="common-btn white-btn">Get Started</a>
                                <a href="#" class="common-btn color-btn">Speak To A Representative</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-sm-4">
                        <div class="footer-menu">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Sigh Up</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Contact Us </a></li>
                            </ul>
                        </div> 
                    </div>
                    <div class="col-lg-2 col-sm-4">
                        <div class="footer-menu">
                            <ul>
                                <li><a href="#">How It Works</a></li>
                                <li><a href="#">Pricing</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-4">
                        <div class="footer-menu">
                            <ul>
                                <li><a href="#">For Business  </a></li>
                                <li><a href="#">For Advertisement</a></li>
                                <li><a href="#">Self-Directed Brokerage Account</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-8">
                        <div class="footer-menu footer-social">
                            <ul>
                                <li><i class="icofont-paper-plane"></i>4064 Franklin Street<br> Montgomery<br> Alabama, USA</li>
                                <li><i class="icofont-envelope"></i><a href="mailto:Info@aumconsultant.com">Info@aumconsultant.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-4">
                        <div class="footer-menu footer-phone">
                            <ul>
                                <li><i class="icofont-phone"></i> (770) 642-4902</li>
                                <li><i class="icofont-phone"></i>(770) 642-4902</li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="copyright">
                    © 2019 Howard Capital Management Inc. All Rights Reserved.
                </div>
            </div>
        </footer>

        <a href="#" class="scroll_top" id="scroll_top" style="display: none;"><i class="icofont-long-arrow-up"></i></a>

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
