<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/front') }}/img/favicon.ico">

    <!-- CSS
 ============================================ -->
    <!-- google fonts -->
    <link rel="stylesheet" href="{{ asset('assets/front') }}/css/bootstrap.min.css">

    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>

    <link href="https://fonts.googleapis.com/css?family=Sarabun:300,300i,400,400i,500,600,700,800&display=swap"
        rel="stylesheet">
    <script src="{{ asset('assets/front') }}/js/jquery-3.3.1.min.js"></script>

    <script type="text/javascript" src="https://kenwheeler.github.io/slick/slick/slick.js"></script>

    <link rel="stylesheet" type="text/css" href="https://kenwheeler.github.io/slick/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://kenwheeler.github.io/slick/slick/slick-theme.css" />


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Bootstrap CSS -->
    <script src="{{ asset('assets') }}/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands", "simple-line-icons"
                ],
                urls: ['{{ asset('assets') }}/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- Slick slider css -->
    <link rel="stylesheet" href="{{ asset('assets/front') }}/css/slick.min.css">
    <!-- Odometer css -->
    <link rel="stylesheet" href="{{ asset('assets/front') }}/css/odometer.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset('assets/front') }}/css/animate.css">
    <!-- main style css -->
    <link rel="stylesheet" href="{{ asset('assets/front') }}/css/style.css">

</head>
<style>
    .carousel {
        width: 100%;
        margin: 0px auto;
    }

    .slick-slide {
        margin: 10px;
    }

    .slick-slide img {
        width: 100%;
        border: 2px solid #000;
    }

    .wrapper .slick-dots li button:before {
        font-size: 20px;
        color: #000;
    }

</style>

<body>


    <!-- Start Header Area -->
    <header class="header-area">
        <div class="main-header d-none d-lg-block">
            <!-- main menu start -->
            <div class="main-menu-wrapper sticky header-transparent">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-4">
                            <!-- logo area start -->
                            <div class="brand-logo">
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset('assets/front') }}/img/logo.png" alt="brand logo">
                                </a>
                            </div>
                            <!-- logo area end -->
                        </div>
                        <div class="col-lg-4">
                            <!-- logo area start -->
                            <div class="brand-logo">
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset('assets/front') }}/img/logo2.png" alt="brand logo">
                                </a>
                            </div>
                            <!-- logo area end -->
                        </div>

                        <div class="col-lg-4">
                            <div class="main-menu-inner">
                                <!-- main menu navbar start -->
                                <nav class="main-menu">
                                    <ul>
                                        <li><a href="{{ url('colaboration') }}">Collaboration</a></li>
                                        <li><a href="contact.html" class="btn btn-ceunah" style="background-color: #732B80;
                                            font-size: 18px;
                                            padding: 4px 14px 7px 14px;
                                            color: #fff;
                                            margin-top: 10px;">Login</a></li>
                                    </ul>
                                </nav>
                                <!-- main menu navbar end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main menu end -->
        </div>

        <!-- mobile header start -->
        <!-- mobile header start -->
        <div class="mobile-header d-lg-none d-md-block sticky">
            <!--mobile header top start -->
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="mobile-main-header">
                            <div class="mobile-logo">
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset('assets/front') }}/img/logo.png" alt="Brand Logo">
                                </a>
                            </div>
                            <div class="mobile-menu-toggler">
                                <button class="mobile-menu-btn">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile header top start -->
        </div>

        <aside class="off-canvas-wrapper">
            <div class="off-canvas-overlay"></div>
            <div class="off-canvas-inner-content">
                <div class="btn-close-off-canvas">
                    <i class="fa fa-close"></i>
                </div>

                <div class="off-canvas-inner">
                    <!-- search box start -->
                    <div class="search-box-offcanvas">
                        <form>
                            <input type="text" placeholder="Search Here...">
                            <button class="search-btn"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <!-- search box end -->

                    <!-- mobile menu start -->
                    <div class="mobile-navigation">
                        <!-- mobile menu navigation start -->
                        <nav>
                            <ul class="mobile-menu">
                                @php
                                    $j = 1;
                                @endphp
                                @foreach (Properti_app::service() as $ls)
                                    @php
                                        $url = str_replace(' ', '_', strtolower($ls));
                                    @endphp

                                    <li><a href="{{ url('p/' . $url) }}">{{ $ls }}</a></li>
                                    @php
                                        $j++;
                                    @endphp
                                @endforeach
                            </ul>
                        </nav>
                        <!-- mobile menu navigation end -->
                    </div>
                    <!-- mobile menu end -->




                </div>
            </div>
        </aside>
        <!-- off-canvas menu end -->
        <!-- offcanvas mobile menu end -->

    </header>
    <!-- end Header Area -->
    <main>
        @yield('content')
    </main>
    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->

    <!-- footer section start -->
    <footer>
        <div class="footer-widget-area gray-bg section-padding pb-125">
            <div class="container">
                <div class="row mtn-40">
                    <div class="col-lg-2 col-md-4">
                        <img src="{{ asset('assets/front') }}/img/logo.png" alt="brand logo"
                            style="width: 100%;height: 80px;">
                    </div>

                    <div class="col-lg-4 col-md-8">
                        <!-- footer single widget start -->
                        <h3 class="widget-title">MENU</h3>
                        <div class="widget-body">
                            <ul class="useful-link">
                                @foreach (Properti_app::produk() as $produk)
                                    <li><a href="{{ url('/') }}"><i
                                                class="fa fa-list"></i>&nbsp;&nbsp;{{ strtoupper($produk) }}</a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <!-- footer single widget start -->
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <p>
                            CONTACT US
                            Booking? <button class="btn btn-all" id="mc-submit"><i class="fa fa fa-whatsapp"></i>
                                Click here</button></p>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <p>Subscribe to get the latest news and promos
                        </p>
                        <div class="newsletter-inner">
                            <form id="mc-form" novalidate="true">
                                <input type="email" class="news-field" id="mc-email" autocomplete="off"
                                    placeholder="Enter your email here" name="EMAIL">
                                <button class="btn btn-all" id="mc-submit">Subscribe</button>
                            </form>
                            <!-- mailchimp-alerts Start -->
                            <div class="mailchimp-alerts">
                                <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                            </div>
                            <!-- mailchimp-alerts end -->
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- footer section end -->
    @yield('script')



    <script src="{{ asset('assets/front') }}/js/modernizr-3.6.0.min.js"></script>
    <!-- jQuery JS -->

    <!-- Popper JS -->
    <script src="{{ asset('assets/front') }}/js/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/front') }}/js/bootstrap.min.js"></script>
    <!-- wow js -->
    <script src="{{ asset('assets/front') }}/js/wow.min.js"></script>
    <!-- slick Slider JS -->
    <!-- odometer js -->
    <script src="{{ asset('assets/front') }}/js/odometer.min.js"></script>
    <!-- appear js -->
    <script src="{{ asset('assets/front') }}/js/appear.min.js"></script>
    <!-- mailchimp active js -->
    <script src="{{ asset('assets/front') }}/js/ajaxchimp.js"></script>
    <!-- waypoint js  -->
    <script src="{{ asset('assets/front') }}/js/waypoints.min.js"></script>
    <!-- google map api -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2D8wrWMY3XZnuHO6C31uq90JiuaFzGws"></script>
    <!-- google map active js -->
    <script src="{{ asset('assets/front') }}/js/google-map.js"></script>
    <!-- Main JS -->
    <script src="{{ asset('assets/front') }}/js/main.js"></script>
</body>

</html>
