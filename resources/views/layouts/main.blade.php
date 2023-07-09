<head>

    <!-- META ============================================= -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />

    <!-- DESCRIPTION -->
    <meta name="description" content="EduChamp : Education HTML Template" />

    <!-- OG -->
    <meta property="og:title" content="EduChamp : Education HTML Template" />
    <meta property="og:description" content="EduChamp : Education HTML Template" />
    <meta property="og:image" content="" />
    <meta name="format-detection" content="telephone=no">

    <!-- FAVICONS ICON ============================================= -->
    <link rel="icon" href="{{ asset('assets/dashboard/images/favicon.ico')}}" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/dashboard/images/favicon.png')}}" />

    <!-- PAGE TITLE HERE ============================================= -->
    <title>EduChamp : Education HTML Template </title>

    <!-- MOBILE SPECIFIC ============================================= -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    

    <!-- All PLUGINS CSS ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css/assets.css')}}">

    <!-- TYPOGRAPHY ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css/typography.css')}}">

    <!-- SHORTCODES ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css/shortcodes/shortcodes.css')}}">

    <!-- STYLESHEETS ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css/style.css')}}">
    <link class="skin" rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css/color/color-1.css')}}">

    <!-- REVOLUTION SLIDER CSS ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/vendors/revolution/css/layers.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/vendors/revolution/css/settings.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/vendors/revolution/css/navigation.css')}}">
    <!-- REVOLUTION SLIDER END -->
</head>

<body id="bg">
    <div class="page-wraper">
        <!--<div id="loading-icon-bx"></div> -->
        <!-- Header Top ==== -->



        @include('layouts.sidebar')

        <div class="page-content bg-white">
            @yield('content')
        </div>
        <footer>
            <div class="footer-top">
                <div class="pt-exebar" style="margin-bottom:0px">
                    <div class="container">
                        <div class="d-flex align-items-stretch">
                            <div class="pt-logo mr-auto">
                                <a href="index.html"><img src="{{ asset('storage/foto/logo1.png')}}" style="width:100px" alt="" /></a>
                            </div>
                            <div class="pt-social-link">
                                <ul class="list-inline m-a0">
                                    <li><a href="#" class="btn-link"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" class="btn-link"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" class="btn-link"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#" class="btn-link"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                            <div class="pt-btn-join">
                                <a href="/register" class="btn ">Join Now</a>
                            </div>
                        </div>
                    </div>
                </div>
           
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 text-center"> <a target="_blank"
                                href="">Copy Right 2023</a></div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer END ==== -->
        <button class="back-to-top fa fa-chevron-up"></button>
    </div>


    <!-- External JavaScripts -->
    <script src="{{ asset('assets/dashboard/js/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/dashboard/vendors/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{ asset('assets/dashboard/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/dashboard/vendors/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{ asset('assets/dashboard/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js')}}"></script>
    <script src="{{ asset('assets/dashboard/vendors/magnific-popup/magnific-popup.js')}}"></script>
    <script src="{{ asset('assets/dashboard/vendors/counter/waypoints-min.js')}}"></script>
    <script src="{{ asset('assets/dashboard/vendors/counter/counterup.min.js')}}"></script>
    <script src="{{ asset('assets/dashboard/vendors/imagesloaded/imagesloaded.js')}}"></script>
    <script src="{{ asset('assets/dashboard/vendors/masonry/masonry.js')}}"></script>
    <script src="{{ asset('assets/dashboard/vendors/masonry/filter.js')}}"></script>
    <script src="{{ asset('assets/dashboard/vendors/owl-carousel/owl.carousel.js')}}"></script>
    <script src="{{ asset('assets/dashboard/js/assets/js/functions.js')}}"></script>
    <script src="{{ asset('assets/dashboard/js/assets/js/contact.js')}}"></script>
    <script src="{{ asset('assets/dashboard/vendors/switcher/switcher.js')}}"></script>
    <!-- Revolution JavaScripts Files -->
    <script src="{{ asset('assets/dashboard/vendors/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{ asset('assets/dashboard/vendors/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
    <!-- Slider revolution 5.0 Extensions  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
    <script src="{{ asset('assets/dashboard/vendors/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <script src="{{ asset('assets/dashboard/vendors/revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
    <script src="{{ asset('assets/dashboard/vendors/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script src="{{ asset('assets/dashboard/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script src="{{ asset('assets/dashboard/vendors/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
    <script src="{{ asset('assets/dashboard/vendors/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script src="{{ asset('assets/dashboard/vendors/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
    <script src="{{ asset('assets/dashboard/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script src="{{ asset('assets/dashboard/vendors/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
    <script>
        jQuery(document).ready(function () {
            var ttrevapi;
            var tpj = jQuery;
            if (tpj("#rev_slider_486_1").revolution == undefined) {
                revslider_showDoubleJqueryError("#rev_slider_486_1");
            } else {
                ttrevapi = tpj("#rev_slider_486_1").show().revolution({
                    sliderType: "standard",
                    jsFileLocation: "'{{ asset('assets/dashboard/vendors/revolution/js/')}}",
                    sliderLayout: "fullwidth",
                    dottedOverlay: "none",
                    delay: 9000,
                    navigation: {
                        keyboardNavigation: "on",
                        keyboard_direction: "horizontal",
                        mouseScrollNavigation: "off",
                        mouseScrollReverse: "default",
                        onHoverStop: "on",
                        touch: {
                            touchenabled: "on",
                            swipe_threshold: 75,
                            swipe_min_touches: 1,
                            swipe_direction: "horizontal",
                            drag_block_vertical: false
                        },
                        arrows: {
                            style: "uranus",
                            enable: true,
                            hide_onmobile: false,
                            hide_onleave: false,
                            tmp: '',
                            left: {
                                h_align: "left",
                                v_align: "center",
                                h_offset: 10,
                                v_offset: 0
                            },
                            right: {
                                h_align: "right",
                                v_align: "center",
                                h_offset: 10,
                                v_offset: 0
                            }
                        },

                    },
                    viewPort: {
                        enable: true,
                        outof: "pause",
                        visible_area: "80%",
                        presize: false
                    },
                    responsiveLevels: [1240, 1024, 778, 480],
                    visibilityLevels: [1240, 1024, 778, 480],
                    gridwidth: [1240, 1024, 778, 480],
                    gridheight: [768, 600, 600, 600],
                    lazyType: "none",
                    parallax: {
                        type: "scroll",
                        origo: "enterpoint",
                        speed: 400,
                        levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 46, 47, 48, 49, 50, 55],
                        type: "scroll",
                    },
                    shadow: 0,
                    spinner: "off",
                    stopLoop: "off",
                    stopAfterLoops: -1,
                    stopAtSlide: -1,
                    shuffle: "off",
                    autoHeight: "off",
                    hideThumbsOnMobile: "off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        nextSlideOnWindowFocus: "off",
                        disableFocusListener: false,
                    }
                });
            }
        });
    </script>

     


</body>

</html>