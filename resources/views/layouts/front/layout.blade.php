<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @yield('title')
        <meta name="description" content="{{ general_settings('description') }}">
        <meta name="robots" content="index, follow">

        {{-- <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script> --}}
        <link rel="icon" type="image/x-icon" href="{{ general_settings('favicon') }}" />

        <meta property="og:title" content="{{ general_settings('name') }}">
        <meta property="og:description" content="{{ general_settings('description') }}">
        <meta property="og:image" content="{{ general_settings('logo') }}">
        <meta name="twitter:card" content="{{ general_settings('description') }}">
        <meta name="keywords" content="{{ general_settings('keywords') }}">


        <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/fontawesome-6.css') }}">

        <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/swiper.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/aos.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/unicons.css') }}">
        <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/metismenu.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/hover-revel.css') }}"> --}}
        {{-- <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/timepickers.min.css') }}"> --}}

        <link rel="stylesheet" href="{{ asset('front/assets/css/vendor/bootstrap.min.css') }}">

        <link rel="stylesheet" href="{{ asset('front/assets/css/style.css') }}">

        @yield('styles')
    </head>

    <body class="index-cleaning-home onepage">



        <header id="home" class="rts-header-area header-one  header--sticky">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header--one-main">
                            <div class="row align-items-center header-top-one">
                                <div class="col-lg-3">
                                    <a href="/" class="logo-area">
                                        <img src="{{ asset(general_settings('logo')) }}" alt="logo-area">
                                    </a>
                                </div>
                                <div class="col-lg-9">
                                    <div class="header-right-area">

                                        <div class="single-info-contact">
                                            <i class="fa-light fa-clock"></i>
                                            <div class="inner-content">
                                                <span>24/7
                                                    خدمة العملاء
                                                </span>
                                                <a href="tel:+201061258566">
                                                    <h6 class="title">
                                                        01061258566
                                                    </h6>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="single-info-contact map">
                                            <i class="fa-light fa-location-dot"></i>
                                            <div class="inner-content">
                                                <span>
                                                    العنوان
                                                </span>
                                                <a href="https://maps.app.goo.gl/tTLCV976yrqqTFRA6" target="_blank">
                                                    <h6 class="title">سيدي عبد الرحمان ، مطروح</h6>
                                                </a>
                                            </div>
                                        </div>


                                        <div class="btn-area-header">
                                            <a href="https://api.whatsapp.com/send?phone=201061258566&text=السلام عليكم ورحمة الله وبركاته"
                                                class="rts-btn btn-primary with-arrow">
                                                احجز الان
                                                <i class="fa-regular fa-arrow-up-right"></i></a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="header-nav-area d-none">
                                        <div class="logo-md-sm-device">
                                            <a href="#" class="logo">
                                                <img src="{{ asset('front/assets/images/logo/logo-01.svg') }}"
                                                    alt="logo">
                                            </a>
                                        </div>

                                        <div class="header-nav main-nav-one">
                                            <nav>
                                                <ul>
                                                    <li class="nav-item"><a class="nav-link" href="#home">HOME</a>
                                                    </li>
                                                    <li class="nav-item"><a class="nav-link" href="#about">ABOUT</a>
                                                    </li>
                                                    <li class="nav-item"><a class="nav-link"
                                                            href="#services">SERVICES</a></li>
                                                    <li class="nav-item"><a class="nav-link"
                                                            href="#portfolio">PORTFOLIO</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="#blog">BLOG</a>
                                                    </li>
                                                    <li class="nav-item"><a class="nav-link" href="#contact">CONTACT</a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                        <div class="actions-area">
                                            <div class="search-btn" id="search">
                                                <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M15.75 14.7188L11.5625 10.5312C12.4688 9.4375 12.9688 8.03125 12.9688 6.5C12.9688 2.9375 10.0312 0 6.46875 0C2.875 0 0 2.9375 0 6.5C0 10.0938 2.90625 13 6.46875 13C7.96875 13 9.375 12.5 10.5 11.5938L14.6875 15.7812C14.8438 15.9375 15.0312 16 15.25 16C15.4375 16 15.625 15.9375 15.75 15.7812C16.0625 15.5 16.0625 15.0312 15.75 14.7188ZM1.5 6.5C1.5 3.75 3.71875 1.5 6.5 1.5C9.25 1.5 11.5 3.75 11.5 6.5C11.5 9.28125 9.25 11.5 6.5 11.5C3.71875 11.5 1.5 9.28125 1.5 6.5Z"
                                                        fill="#1F1F25" />
                                                </svg>
                                            </div>
                                            <div class="menu-btn" id="menu-btn">
                                                <svg width="20" height="16" viewBox="0 0 20 16"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect y="14" width="20" height="2" fill="#1F1F25" />
                                                    <rect y="7" width="20" height="2" fill="#1F1F25" />
                                                    <rect width="20" height="2" fill="#1F1F25" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>


        @yield('content')


        <div id="side-bar" class="side-bar header-two">
            <button class="close-icon-menu"><i class="far fa-times"></i></button>

            <div class="inner-main-wrapper-desk">
                <div class="thumbnail">
                    <img src="{{ asset('front/assets/images/banner/04.jpg') }}" alt="elevate">
                </div>
                <div class="inner-content">
                    <h4 class="title">We Build Building and Great Constructive Homes.</h4>
                    <p class="disc">
                        We successfully cope with tasks of varying complexity, provide long-term guarantees and
                        regularly master
                        new technologies.
                    </p>
                    <div class="footer">
                        <h4 class="title">Got a project in mind?</h4>
                        <a href="contact.html" class="rts-btn btn-primary">Let's talk</a>
                    </div>
                </div>
            </div>

            <div class="mobile-menu-main">
                <nav class="nav-main mainmenu-nav mt--30">
                    <ul class="mainmenu metismenu" id="mobile-menu-active">
                        <li><a href="#home" class="main">Home</a></li>
                        <li><a href="#about" class="main">About</a></li>
                        <li><a href="#services" class="main">Services</a></li>
                        <li><a href="#portfolio" class="main">Portfolio</a></li>
                        <li><a href="#blog" class="main">Blog</a></li>
                        <li><a href="#contact" class="main">Contact Us</a></li>
                    </ul>
                </nav>

                <div class="rts-social-style-one pl--20 mt--100">
                    <ul>
                        <li>
                            <a href="#">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa-brands fa-youtube"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa-brands fa-linkedin-in"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>


        <div class="rts-footer-one footer-bg-one mt--160 pb--85">
            <div class="container">
                <div class="row g-0 bg-cta-footer-one">
                    <div class="col-lg-12">
                        <div class="bg-cta-footer-one wrapper">
                            <div class="row align-items-center">
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <a href="#" class="logo-area-footer">
                                        <img src="{{ asset('front/assets/images/logo/logo-02.png') }}"
                                            alt="logo">
                                    </a>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">

                                    <div class="single-cta-area">
                                        <div class="icon">
                                            <i class="fa-solid fa-phone"></i>
                                        </div>
                                        <div class="contact-info">
                                            <p>
                                                تواصل معنا
                                            </p>
                                            <a href="tel:+201061258566">+201061258566</a>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">

                                    <div class="single-cta-area">
                                        <div class="icon">
                                            <i class="fa-solid fa-envelope"></i>
                                        </div>
                                        <div class="contact-info">
                                            <p>
                                                البريد الالكتروني
                                            </p>
                                            <a href="mailto:weclean0services@gmail.com">weclean0services@gmail.com</a>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">

                                    <div class="single-cta-area last">
                                        <div class="icon">
                                            <i class="fa-regular fa-location-dot"></i>
                                        </div>
                                        <div class="contact-info">
                                            <p>
                                                العنوان
                                            </p>
                                            <a href="https://maps.app.goo.gl/tTLCV976yrqqTFRA6" target="_blank">
                                                سيدي عبد الرحمان ، مطروح
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row pt--90 d-none">
                    <div class="col-lg-12">
                        <div class="single-footer-one-wrapper">
                            <div class="single-footer-component first">
                                <div class="title-area">
                                    <h5 class="title">About Company</h5>
                                </div>
                                <div class="body">
                                    <p class="disc">
                                        Centric aplications productize before front end vortals visualize front end is
                                        results
                                        and value added
                                    </p>
                                    <div class="rts-social-style-one">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <i class="fa-brands fa-facebook-f"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa-brands fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa-brands fa-youtube"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa-brands fa-linkedin-in"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="single-footer-component">
                                <div class="title-area">
                                    <h5 class="title">Useful Links</h5>
                                </div>
                                <div class="body">
                                    <div class="pages-footer">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                    <p>About Us</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                    <p>Our Gallery</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                    <p>Our Services</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                    <p>Our Team</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                    <p>Contact Us</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="single-footer-component">
                                <div class="title-area">
                                    <h5 class="title">What We Do</h5>
                                </div>
                                <div class="body">
                                    <div class="pages-footer">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                    <p>Our Service</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                    <p>Office Service</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                    <p>Industry Service</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                    <p>Private Service</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                    <p>Single Service</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="single-footer-component last">
                                <div class="title-area">
                                    <h5 class="title">Photo Gallery</h5>
                                </div>
                                <div class="body">
                                    <div class="gallery-footer">
                                        <ul>
                                            <li><a href="#"><img
                                                        src="{{ asset('front/assets/images/footer/gallery/01.png') }}"
                                                        alt="gallery"></a></li>
                                            <li><a href="#"><img
                                                        src="{{ asset('front/assets/images/footer/gallery/02.png') }}"
                                                        alt="gallery"></a></li>
                                            <li><a href="#"><img
                                                        src="{{ asset('front/assets/images/footer/gallery/03.png') }}"
                                                        alt="gallery"></a></li>
                                            <li><a href="#"><img
                                                        src="{{ asset('front/assets/images/footer/gallery/04.png') }}"
                                                        alt="gallery"></a></li>
                                            <li><a href="#"><img
                                                        src="{{ asset('front/assets/images/footer/gallery/05.png') }}"
                                                        alt="gallery"></a></li>
                                            <li><a href="#"><img
                                                        src="{{ asset('front/assets/images/footer/gallery/06.png') }}"
                                                        alt="gallery"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="copyright-footer-one">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="wrapper">
                            <p>Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with
                                <i class="fas fa-heart"></i>
                                by Mood
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="search-input-area">
            <div class="container">
                <div class="search-input-inner">
                    <div class="input-div">
                        <input id="searchInput1" class="search-input" type="text"
                            placeholder="Search by keyword or #">
                        <button><i class="far fa-search"></i></button>
                    </div>
                </div>
            </div>
            <div id="close" class="search-close-icon"><i class="far fa-times"></i></div>
        </div>

        <div id="anywhere-home" class="">
        </div>



        <!-- progress area start -->
        {{-- <div class="progress-wrap">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                    style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
                </path>
            </svg>
        </div> --}}
        <!-- progress area end -->


        <!-- pre loader start -->
        <div id="elevate-load">
            <div class="loader-wrapper">
                <div class="lds-ellipsis">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
        <!-- pre loader end -->


        @yield('scripts')


        <script src="{{ asset('front/assets/js/plugins/jquery.min.js') }}"></script>
        <script src="{{ asset('front/assets/js/vendor/jqueryui.js') }}"></script>
        <script src="{{ asset('front/assets/js/plugins/counter-up.js') }}"></script>
        <script src="{{ asset('front/assets/js/plugins/swiper.js') }}"></script>


        {{-- <script src="{{ asset('front/assets/js/vendor/twinmax.js') }}"></script>
        <script src="{{ asset('front/assets/js/vendor/split-text.js') }}"></script>
        <script src="{{ asset('front/assets/js/plugins/text-plugins.js') }}"></script> --}}
        <script src="{{ asset('front/assets/js/plugins/metismenu.js') }}"></script>


        <script src="{{ asset('front/assets/js/vendor/waypoint.js') }}"></script>
        <script src="{{ asset('front/assets/js/vendor/waw.js') }}"></script>


        <script src="{{ asset('front/assets/js/plugins/gsap.min.js') }}"></script>
        <script src="{{ asset('front/assets/js/plugins/scrolltigger.js') }}"></script>
        {{-- <script src="{{ asset('front/assets/js/plugins/aos.js') }}"></script>
        <script src="{{ asset('front/assets/js/plugins/jquery-ui.js') }}"></script> --}}
        <script src="{{ asset('front/assets/js/plugins/jquery-timepicker.js') }}"></script>
        {{-- <script src="{{ asset('front/assets/js/vendor/sal.min.js') }}"></script> --}}

        <script src="{{ asset('front/assets/js/plugins/bootstrap.min.js') }}"></script>
        {{-- <script src="{{ asset('front/assets/js/plugins/jquery-slideNav.js') }}"></script>
        <script src="{{ asset('front/assets/js/plugins/hover-revel.js') }}"></script>
        <script src="{{ asset('front/assets/js/plugins/contact-form.js') }}"></script> --}}

        <script src="{{ asset('front/assets/js/main.js') }}"></script>

        {{-- <script src="{{ asset('front/assets/js/plugins/swip-img.js') }}"></script> --}}
        <script>
            function backToTopInit() {
                "use strict";

                var progressPath = document.querySelector('.progress-wrap path');
                var pathLength = progressPath.getTotalLength();
                initializeProgressPath(progressPath, pathLength);

                updateProgress(progressPath, pathLength);
                $(window).scroll(function() {
                    updateProgress(progressPath, pathLength);
                    toggleActiveClassOnScroll();
                    console.log(pathLength, progressPath);
                    // console.log(updateProgress(progressPath, pathLength));
                });

                $('.progress-wrap').on('click', function(event) {
                    event.preventDefault();
                    scrollToTop();
                });
            }

            function initializeProgressPath(progressPath, pathLength) {
                progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
                progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
                progressPath.style.strokeDashoffset = pathLength;
                progressPath.getBoundingClientRect();
                progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
            }

            function updateProgress(progressPath, pathLength) {
                var scroll = $(window).scrollTop();
                var height = $(document).height() - $(window).height();
                var progress = pathLength - (scroll * pathLength / height);
                progressPath.style.strokeDashoffset = progress;
            }

            function toggleActiveClassOnScroll() {
                var offset = 50;
                if ($(window).scrollTop() > offset) {
                    $('.progress-wrap').addClass('active-progress');
                } else {
                    $('.progress-wrap').removeClass('active-progress');
                }
            }

            function scrollToTop() {
                $('html, body').animate({
                    scrollTop: 0
                }, 550);
            }

            // تنفيذ الدالة فور تحميل الصفحة
            $(document).ready(backToTopInit);
        </script>

    </body>

</html>
