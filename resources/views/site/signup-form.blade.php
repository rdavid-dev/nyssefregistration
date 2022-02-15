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

            <div class="step-section">

                <section class="top-step">
                    <div class="container">
                        <div class="btm-part">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <ol class="progress progress--large">
                                        <li class="cst-right-step nav-step-1 is-complete" data-step="1">
                                            Personal<br/>Information
                                        </li>
                                        <li class="nav-step-2" data-step="2">
                                            Advisor<br/>Information
                                        </li>
                                        <li class="progress__last cst-left-step nav-step-3" data-step="3">
                                            Promo Code
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="step-form-bottom">
                    <div class="container">
                        <div class="row">

                            <div id="step_1" class="step-form">
                                <h2>Tell Us About Yourself</h2>
                                <form>
                                    <div class="form-group"><input type="text" placeholder="First Name" /></div>
                                    <div class="form-group"><input type="text" placeholder="Last Name" /></div>
                                    <div class="form-group">
                                        <select>
                                            <option value="" selected="selected">Select Wholeseller</option>
                                            <option value="">Wholeseller 1</option>
                                            <option value="">Wholeseller 2</option>
                                            <option value="">Wholeseller 3</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check_1">
                                            <label class="custom-control-label" for="check_1">Speak to someone about a wholesaler in my area</label>
                                        </div>
                                    </div>
                                    <div class="btn-rap text-center"><button type="Submit">Next Step</button></div>
                                </form>
                            </div>

                            <div id="step_2" class="step-form">
                                <h2>Advisor Information</h2>
                                <form>
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group"><input type="text" placeholder="Your Broker Dealer/RIA" /></div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group"><input type="text" placeholder="Business Name" /></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group"><input type="text" placeholder="Website URL" /></div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group"><input type="text" placeholder="Phone Number" /></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group"><input type="text" placeholder="Other Number" /></div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group"><input type="text" placeholder="Address Line 1" /></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group"><input type="text" placeholder="Address Line 2" /></div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group"><input type="text" placeholder="City" /></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <select>
                                                    <option value="" selected="">Select State</option>
                                                    <option value="">State 1</option>
                                                    <option value="">State 2</option>
                                                    <option value="">State 3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group"><input type="text" placeholder="Zip" /></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="form-group"><textarea type="text" placeholder="Paste your disclosure here"></textarea></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="input-group file_upload">
                                                    <input type="text" class="form-control" readonly="" placeholder="Upload Advisor Photo">
                                                    <label class="input-group-btn d-flex align-items-stretch align-items-center">
                                                        <span class="btn up-btn align-self-center">
                                                            <i class="icofont-upload-alt"></i> Upload<input type="file" style="display: none;" multiple="">
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="input-group file_upload">
                                                    <input type="text" class="form-control" readonly="" placeholder="Upload Advisor Photo">
                                                    <label class="input-group-btn d-flex align-items-stretch align-items-center">
                                                        <span class="btn up-btn align-self-center">
                                                            <i class="icofont-upload-alt"></i> Upload<input type="file" style="display: none;" multiple="">
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-rap text-center">
                                        <button type="Submit" class="prev-step">Previous</button>
                                        <button type="Submit">Next Step</button>
                                    </div>
                                </form>
                            </div>
                            <div id="step_3" class="step-form">
                                <h2>Purchase Promo Code</h2>
                                <p>Purchasing an advisor subscription allows you to create a custom promo code for your clients and prospects. How would I benefit from this purchase?</p>
                                <ul>
                                    <li><i class="icofont-check"></i>Complimentary subscriptions for clients</li>
                                    <li><i class="icofont-check"></i>Lead generator - offering promo codes to clients' family, friends, and coworkers</li>
                                    <li><i class="icofont-check"></i>Easy client sign up process</li>
                                    <li><i class="icofont-check"></i>Connect clients directly to your account</li>
                                </ul>
                                <form>
                                    <div class="subscription-plan">
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="subscription-plan-box active">
                                                    <div class="active-icon"><i class="icofont-check"></i></div>
                                                    <h6>Monthly</h6>
                                                    <h2>$96.00</h2>
                                                    <p>Up to 30 Subscriptions</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="subscription-plan-box">
                                                    <div class="active-icon"><i class="icofont-check"></i></div>
                                                    <h6>Monthly</h6>
                                                    <h2>$96.00</h2>
                                                    <p>Up to 30 Subscriptions</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="subscription-plan-box">
                                                    <div class="active-icon"><i class="icofont-check"></i></div>
                                                    <h6>Monthly</h6>
                                                    <h2>$96.00</h2>
                                                    <p>Up to 30 Subscriptions</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="subscription-plan-box">
                                                    <div class="active-icon"><i class="icofont-check"></i></div>
                                                    <h6>Monthly</h6>
                                                    <h2>$96.00</h2>
                                                    <p>Up to 30 Subscriptions</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="promocode-upload">
                                        <p>Create your unique promo code to give free access to your clients.</p>
                                        <div class="promocode-box">
                                            <div class="input-group file_upload">
                                                <input type="text" class="form-control" readonly="" placeholder="Enter your promo code">
                                                <label class="input-group-btn d-flex align-items-stretch align-items-center">
                                                    <button type="button" class="btn up-btn align-self-center">Check</button>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-rap text-center">
                                        <button type="Submit" class="prev-step">Previous</button>
                                        <button type="Submit">Make Payment</button>
                                    </div>
                                </form>
                            </div>
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

        <script>
            $(function () {

                // We can attach the `fileselect` event to all file inputs on the page
                $(document).on('change', ':file', function () {
                    var input = $(this),
                            numFiles = input.get(0).files ? input.get(0).files.length : 1,
                            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                    input.trigger('fileselect', [numFiles, label]);
                });

                // We can watch for our custom `fileselect` event like this
                $(document).ready(function () {
                    $(':file').on('fileselect', function (event, numFiles, label) {

                        var input = $(this).parents('.input-group').find(':text'),
                                log = numFiles > 1 ? numFiles + ' files selected' : label;

                        if (input.length) {
                            input.val(log);
                        } else {
                            if (log)
                                alert(log);
                        }

                    });
                });

            });
        </script>

    </body>
</html>
