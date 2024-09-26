<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title> Apartment Complex </title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="resources/assets/images/logos/favicon.png" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/vendor/fontawesome-5.14.0.min.css">
    <link rel="stylesheet" href="p">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="assets/vendor/magnific-popup/css/magnific-popup.min.css">
    <!-- Nice Select -->
    <link rel="stylesheet" href="assets/vendor/nice-select/css/nice-select.min.css">
    <!-- Animate -->
    <link rel="stylesheet" href="assets/vendor/animate.min.css">
    <!-- Slick -->
    <link rel="stylesheet" href="assets/vendor/slick/css/slick.min.css">
    <!-- Main Style -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <div class="page-wrapper">

        <!-- Preloader -->
        <div class="preloader">
            <div class="custom-loader"></div>
        </div>

        <!-- main header -->
        <header class="main-header">
            <!--Header-Upper-->
            <div class="header-upper">
                <div class="container clearfix">

                    <div class="header-inner rel d-flex align-items-center">
                        <div class="logo-outer">
                            <div class="logo"><a href="index.html"><img src="assets/images/logos/company logo.png" alt="Logo" title="Logo" style=" height: 82px;width: 157px;"></a></div>

                        </div>

                        <div class="nav-outer mx-auto clearfix">
                            <!-- Main Menu -->
                            <nav class="main-menu navbar-expand-lg">
                                <div class="navbar-header py-10">
                                    <div class="mobile-logo">
                                        <a href="index.html">
                                            <img src="assets/images/logos/company logo.png" alt="Logo" title="Logo">
                                       </a>
                                    </div>

                                    <!-- Toggle Button -->
                                    <button type="button" class="navbar-toggle" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>

                                <!-- <div class="navbar-collapse collapse clearfix">
                                    <ul class="navigation onepage clearfix">
                                        <li><a href="#home">Home</a></li>
                                        <li><a href="#about">about</a></li>
                                        <li><a href="">Login</a></li>
                                        <li><a href="">Register</a></li>
                                        

                                    </ul>
                                </div> -->
                                <div class="navbar-collapse collapse clearfix">
    <ul class="navigation onepage clearfix">
        <li><a href="#home">Home</a></li>
        <!-- <li><a href="#about">About</a></li> -->

        <!-- Authentication Links -->
        @guest
            @if (Route::has('login'))
                <li><a href="{{ route('login') }}">Login</a></li>
            @endif

            @if (Route::has('register'))
                <li><a href="{{ route('register') }}">Register</a></li>
            @endif
        @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }} <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        @endguest
    </ul>
</div>


                            </nav>
                            <!-- Main Menu End-->
                        </div>

                        <!-- Menu Button -->
                        <!-- <div class="menu-btns">
                            <a href="contact.html" class="theme-btn style-three">Ask a Question <i class="far fa-comment-dots"></i></a>
                        </div> -->
                    </div>
                </div>
            </div>
            <!--End Header Upper-->
        </header>


        <!-- Hero Section Start -->
        <section id="home" class="hero-area py-250 rpt-150 rpb-150 corner-shapes-wrap" style="background-image: url(assets/images/background/hero-bg.jpg);">
            <div class="corner-shapes"></div>
            <div class="container container-1170 pb-200 rpb-0">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-7 col-lg-8">
                        <div class="hero-content rmb-65 wow fadeInUp delay-0-2s">
                            <h1>A unique fusion of convenience and <span id="about"></span>luxury</h1>
                            <a href="about.html" class="theme-btn style-two">Explore Dax</a>
                            <a href="https://my.matterport.com/show/?m=Cgmxg6gtDVb" class="theme-btn"><i class="far fa-book-open"></i> Take a look at VR</a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="hero-video-btn text-lg-end wow fadeInUp delay-0-4s">
                            <a href="https://elcon.kwst.net/site/video/3.mp4" class="mfp-iframe video-play"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Hero Section End -->


        <!-- About Area start -->
        <!-- <section class="about-area pt-120">
            <div class="container">
                <div class="row rel z-1 justify-content-center">
                    <div class="col-xl-8 col-lg-11">
                        <div class="section-title text-center">
                            <span class="sub-title mb-55 wow fadeInUp delay-0-2s">About DAx</span>
                        </div>
                        <div class="about-logo-icon wow zoomIn delay-0-4s"><img src="assets/images/logos/logo-icon.png" alt="Logo Icon"></div>
                    </div>
                    <div class="col-xl-8 col-lg-11">
                        <div class="section-title mb-65 rmb-45 wow fadeInUp delay-0-3s">
                            <h2>DAX is a modern residential comlex in your city</h2>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-text wow fadeInUp delay-0-4s">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Etiam dignissim diam quis enim lobortis.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- About Area end -->


        <!-- Introducing Area start -->
        <!-- <section class="introducing-area pt-100">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-5">
                        <div class="introducing-left-image wow fadeInLeft delay-0-2s">
                            <img src="assets/images/about/about-left.jpg" alt="About Left">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="introducing-right-content mt-120 mb-240 rmb-150 wow fadeInUp delay-0-2s">
                                    <div class="section-title mb-35">
                                        <h3>Location, Community, Quality Living. It Starts Here!</h3>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua sed faucibus turpis.</p>
                                    <a href="https://my.matterport.com/show/?m=Cgmxg6gtDVb" class="theme-btn mt-25"><i class="far fa-book-open"></i> Take a look at VR</a>
                                </div>
                            </div>
                        </div>
                        <div class="introducing-right-image wow fadeInUp delay-0-3s">
                            <img src="assets/images/about/about-right.jpg" alt="About Right">
                            <a href="https://elcon.kwst.net/site/video/3.mp4" class="mfp-iframe video-play"><i class="fal fa-gem"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- Introducing Area end -->


        <!-- Blockquote Area start -->
        <!-- <section class="blockquote-area rel z-1 py-120">
            <div class="container">
                <div class="row rel z-1 justify-content-center">
                    <div class="col-xl-7 col-lg-10">
                        <div class="blockquote-author mb-40 wow fadeInUp delay-0-2s">
                            <img src="assets/images/blog/blockquote-author.jpg" alt="Author">
                        </div>
                        <div class="blockquote-content wow fadeInUp delay-0-4s">
                            <div class="blockquote-text mb-40">“Quis lectus nulla at volutpat diam. Sed nisi lacus sed viverra tellus in hac. Enim nunc faucibus a pellentesque sit. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus. Risus ultricies tristique nulla aliquet enim
                                tortor.”</div>
                            <h6 class="name">Philip Demarco</h6>
                            <span class="designation">Lead architect and partner</span>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- Blockquote Area end -->


        <!-- Video Area start -->
        <!-- <section class="video-area pt-140 pb-110 bgs-cover overlay" style="background-image: url(assets/images/background/video-bg.jpg);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class="video-content-part text-center wow fadeInUp delay-0-2s">
                            <a href="https://elcon.kwst.net/site/video/3.mp4" class="mfp-iframe video-play"><i class="fab fa-youtube"></i></a>
                            <div class="section-title mt-55 text-white wow fadeInUp delay-0-4s">
                                <h2>Discover the true definition of luxury</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- Video Area end -->


     





        <!-- footer area start -->
        <!-- <footer class="main-footer rel z-1">
            <div class="footer-top pt-120 pb-190" style="background-image: url(assets/images/footer/footer-top-bg.jpg);">
                <div class="container">
                    <div class="row gap-100 justify-content-center">
                        <div class="col-xl-4 col-lg-7">
                            <div class="section-title text-white mb-50">
                                <span class="sub-title mb-50 rmb-20">DEVELOPER</span>
                                <h2>Do you want to visit us?</h2>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-5">
                            <div class="footer-top-text mb-50">
                                121 King Street, Melbourne Victoria 3000 Australia <br>
                                <a class="d-inline-block mt-30" href="#"><small><i class="fas fa-location"></i> Look at the map</small></a>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="footer-top-text mb-50">
                                <a href="callto:+61383766284">+61 3 8376 6284</a><br>
                                <a href="mailto:info@dax.com">info@dax.com</a><br>
                                <a href="#" class="theme-btn style-two mt-35"><i class="fal fa-envelope"></i> Send a Message</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-cta-wrap">
                <div class="container">
                    <div class="footer-cta-inner pt-115 rpt-0 pb-105 text-center">
                        <h5>For more details, leave your phone number and we will be happy to answer all your questions.</h5>
                        <form class="cta-form mt-40" action="#">
                            <input type="tel" required placeholder="Tel.: +1  ( ___ ) ___ - __ - __">
                            <button class="theme-btn style-three">More Details</button>
                        </form>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="footer-bottom pt-100 pb-70">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-2 col-md-4">
                            <div class="footer-logo mb-50 text-center text-md-start">
                                <a href="index.html"><img src="assets/images/logos/logo-two.png" alt="Logo"></a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-md-8">
                            <div class="footer-text text-white mb-50 text-center text-md-start">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Purus gravida quis blandit turpis cursus in hac habitasse platea.</div>
                        </div>
                        <div class="col-xl-2 col-md-4">
                            <div class="footer-social text-center text-md-start">
                                <div class="social-style-one mb-50">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-8">
                            <div class="copyright-area mb-50 text-xl-end text-center text-md-start">
                                © 2023 DAX Residental Complex. All Rights Reserved / <a href="#">Privaci Policy</a> / <a href="#">Cookies</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer> -->
        <!-- footer area end -->


        <!-- Scroll Top Button -->
        <button class="scroll-top scroll-to-target" data-target="html"><span class="fas fa-angle-double-up"></span></button>

    </div>
    <!--End pagewrapper-->


    <!-- Jquery -->
    <script src="assets/vendor/jquery-3.6.0.min.js"></script>
    <!-- Popper -->
    <script src="assets/vendor/bootstrap/js/popper.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Appear Js -->
    <script src="assets/vendor/appear.min.js"></script>
    <!-- Slick -->
    <script src="assets/vendor/slick/js/slick.min.js"></script>
    <!-- Magnific Popup -->
    <script src="assets/vendor/magnific-popup/js/jquery.magnific-popup.min.js"></script>
    <!-- Nice Select -->
    <script src="assets/vendor/nice-select/js/jquery.nice-select.min.js"></script>
    <!-- Image Loader -->
    <script src="assets/vendor/imagesloaded.pkgd.min.js"></script>
    <!-- Circle Progress -->
    <script src="assets/vendor/circle-progress.min.js"></script>
    <!-- Isotope -->
    <script src="assets/vendor/isotope.pkgd.min.js"></script>
    <!--  WOW Animation -->
    <script src="assets/vendor/wow.min.js"></script>
    <!-- Custom script -->
    <script src="assets/js/script.js"></script>

</body>

</html>