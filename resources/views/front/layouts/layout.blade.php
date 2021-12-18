<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sharayu | {{ $title }}</title>
        <!-- Stylesheets -->
        <link href="{{ URL::asset('assets/front/css/bootstrap.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL::asset('assets/front/css/jquery-ui.css') }}">
        <link href="{{ URL::asset('assets/front/css/style.css') }}" rel="stylesheet">
        <!--Favicon-->
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">
        <!-- Responsive -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <link href="{{ URL::asset('assets/front/css/responsive.css') }}" rel="stylesheet">
        @yield('css-libraries')
        <style type="text/css">
            .hide { 
                display: none; 
            }
        </style>
        @yield('inline-css')
    </head>
    <body>
        <div class="page-wrapper">
            <!-- Preloader -->
            <div class="preloader"></div>
            <div class="ajaxpreloader"></div>
            <!-- Main Header / Header Style One-->
            <header class="main-header header-style-one">
                <!--Header-Upper-->
                <div class="header-upper">
                    <div class="auto-container">
                        <div class="clearfix">
                            <div class="logo-outer">
                                <div class="logo"><a href="{{ url('/') }}"><img src="/assets/front/images/logo.png" alt="Valencia" title="Valencia"></a></div>
                            </div>
                            <div class="upper-right clearfix">
                                <!--Info Box-->
                                <div class="info-box">
                                    <div class="icon-box"><span class="flaticon-buildings"></span></div>
                                    <ul>
                                        <li><strong>Visit Us:</strong></li>
                                        <li>123A, Mainbridge, USA</li>
                                    </ul>
                                </div>
                                <!--Info Box-->
                                <div class="info-box">
                                    <div class="icon-box"><span class="flaticon-technology-5"></span></div>
                                    <ul>
                                        <li><strong>Call Us:</strong></li>
                                        <li>+91 - 88503 - 04560</li>
                                    </ul>
                                </div>
                                <div class="info-box">
                                    <div class="icon-box"><span class="flaticon-envelope"></span></div>
                                    <ul>
                                        <li><strong>Mail Us:</strong></li>
                                        <li>valencia@support.com</li>
                                    </ul>
                                </div>
                                <div class="info-box btn-box">
                                    <a href="{{ url('/booking') }}" class="theme-btn">Bookings</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Header-Lower-->
                <div class="header-lower">
                    <div class="auto-container">
                        <div class="nav-outer clearfix">
                            <!-- Main Menu -->
                            <nav class="main-menu">
                                <div class="navbar-header">
                                    <!-- Toggle Button -->      
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <div class="navbar-collapse collapse clearfix">
                                    <ul class="navigation clearfix">
                                        <li class="{{ (url()->current() == url('/')) ? 'current':'' }}">
                                            <a href="{{ url('/') }}">Home</a>
                                        </li>
                                        <li  class="{{ (url()->current() == url('/about-us')) ? 'current':'' }}">
                                            <a href="{{ url('/about-us') }}">About Us</a>
                                        </li>
                                        <!-- <li  class="{{ (url()->current() == url('/our-cars')) ? 'current':'' }}">
                                            <a href="{{ url('/our-cars') }}">Our Cars</a></li>
                                        </li> -->
                                        <li  class="{{ (url()->current() == url('/one-way')) ? 'current':'' }}">
                                            <a href="{{ url('/one-way') }}">One Way</a>
                                        </li>
                                        <li  class="{{ (url()->current() == url('/booking')) ? 'current':'' }}">
                                            <a href="{{ url('/booking') }}">Outstation</a>
                                        </li>
                                        <li  class="{{ (url()->current() == url('/blogs')) ? 'current':'' }}">
                                            <a href="{{ url('/blogs') }}">Blogs</a>
                                        </li>
                                        <li  class="{{ (url()->current() == url('/contact-us')) ? 'current':'' }}">
                                            <a href="{{ url('/contact-us') }}">Contact</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                            <!-- Main Menu End-->
                            <!--Social Links-->
                            <div class="social-links">
                                <a href="#"><span class="fa fa-facebook-f"></span></a>
                                <a href="#"><span class="fa fa-twitter"></span></a>
                                <a href="#"><span class="fa fa-google-plus"></span></a>
                                <a href="#"><span class="fa fa-linkedin"></span></a>
                                <a href="#"><span class="fa fa-instagram"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Sticky Header-->
                <div class="sticky-header">
                    <div class="auto-container clearfix">
                        <!--Logo-->
                        <div class="logo pull-left">
                            <a href="index.html" class="img-responsive"><img src="/assets/front/images/logo-small.png" alt="Valencia" title="Valencia"></a>
                        </div>
                        <!--Right Col-->
                        <div class="right-col pull-right">
                            <!-- Main Menu -->
                            <nav class="main-menu">
                                <div class="navbar-header">
                                    <!-- Toggle Button -->      
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <div class="navbar-collapse collapse clearfix">
                                    <ul class="navigation clearfix">
                                        <li class="{{ (url()->current() == url('/')) ? 'current':'' }}">
                                            <a href="{{ url('/') }}">Home</a>
                                        </li>
                                        <li  class="{{ (url()->current() == url('/about-us')) ? 'current':'' }}">
                                            <a href="{{ url('/about-us') }}">About Us</a>
                                        </li>
                                        <!-- <li  class="{{ (url()->current() == url('/our-cars')) ? 'current':'' }}">
                                            <a href="{{ url('/our-cars') }}">Our Cars</a></li>
                                        </li> -->
                                        <li  class="{{ (url()->current() == url('/one-way')) ? 'current':'' }}">
                                            <a href="{{ url('/one-way') }}">One Way</a>
                                        </li>
                                        <li  class="{{ (url()->current() == url('/booking')) ? 'current':'' }}">
                                            <a href="{{ url('/booking') }}">Outstation</a>
                                        </li>
                                        <li  class="{{ (url()->current() == url('/blogs')) ? 'current':'' }}">
                                            <a href="{{ url('/blogs') }}">Blogs</a>
                                        </li>
                                        <li  class="{{ (url()->current() == url('/contact-us')) ? 'current':'' }}">
                                            <a href="{{ url('/contact-us') }}">Contact</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                            <!-- Main Menu End-->
                        </div>
                    </div>
                </div>
                <!--End Sticky Header-->
            </header>
            <!--End Main Header -->
            <!--Main Slider-->
            @yield('content')
            <!--Call To Action Footer-->
            <div class="call-to-action-footer">
                <div class="auto-container">
                    <div class="row clearfix">
                        <!--Left Column-->
                        <div class="left-column col-lg-5 col-md-12 col-sm-12 col-xs-12">
                            <div class="inner-box">
                                <div class="icon-box"><span class="fa fa-phone"></span></div>
                                Book by Phone:  <strong>+1-800-91234-890</strong>
                            </div>
                        </div>
                        <!--Right Column-->
                        <div class="right-column col-lg-7 col-md-12 col-sm-12 col-xs-12">
                            <div class="inner-box">
                                <div class="content-box">
                                    <figure class="logo-box"><a href="{{ url('/') }}"><img src="/assets/front/images/logo-5.png" alt=""></a></figure>
                                    <div class="text">The weather started getting rough the tiny ship was lost the min ting anti maxi security road and back stock a against ade lost the minnow ther started getting rough the tiny ship minnow.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Main Footer-->
            <footer class="main-footer">
                <!--Widgets Section-->
                <div class="widgets-section">
                    <div class="auto-container">
                        <div class="row clearfix">
                            <!--Big Column-->
                            <div class="big-column col-md-6 col-sm-12 col-xs-12">
                                <div class="row clearfix">
                                    <!--Footer Column-->
                                    <div class="footer-column col-md-7 col-sm-6 col-xs-12">
                                        <div class="footer-widget work-hours-widget">
                                            <h2>Opening Hours</h2>
                                            <div class="widget-content">
                                                <div class="text">The weather started getting rough the tiny ship was lost the min ting a maximum.</div>
                                                <ul class="hours-info">
                                                    <li class="clearfix">
                                                        <div class="pull-left">Monday - Friday</div>
                                                        <div class="pull-right">9.00am to 8.00pm</div>
                                                    </li>
                                                    <li class="clearfix">
                                                        <div class="pull-left">Saturday</div>
                                                        <div class="pull-right">10.00am to 7.30pm</div>
                                                    </li>
                                                    <li class="clearfix">
                                                        <div class="pull-left">Sunday</div>
                                                        <div class="pull-right">11.00am to 6.00pm</div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Footer Column-->
                                    <div class="footer-column col-md-5 col-sm-6 col-xs-12">
                                        <div class="footer-widget links-widget">
                                            <h2>Explore</h2>
                                            <div class="widget-content">
                                                <ul class="list">
                                                    <li><a href="#">About Us</a></li>
                                                    <li><a href="#">Service Rates</a></li>
                                                    <li><a href="#">Our Cars</a></li>
                                                    <li><a href="#">Portfolio</a></li>
                                                    <li><a href="#">Contact Us</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Big Column-->
                            <div class="big-column col-md-6 col-sm-12 col-xs-12">
                                <div class="row clearfix">
                                    <!--Footer Column-->
                                    <div class="footer-column col-md-6 col-sm-6 col-xs-12">
                                        <div class="footer-widget gallery-widget">
                                            <h2>Our YouTube Channel</h2>
                                            <div class="widget-content">
                                                <div class="images-outer clearfix">
                                                    <iframe src="{{$you_tube_link}}" style="position: relative; height: 100%; width: 100%;" allow="fullscreen;"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Footer Column-->
                                    <div class="footer-column col-md-6 col-sm-6 col-xs-12">
                                        <div class="footer-widget subscribe-widget">
                                            <h2>Newsletter</h2>
                                            <div class="widget-content">
                                                <div class="text">The weather started getting rough tining</div>
                                                <div class="newsletter-form">
                                                    <form method="post" action="contact.html">
                                                        <div class="form-group">
                                                            <input type="email" name="email" value="" placeholder="Email Address..." required>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="theme-btn btn-style-one">SUBSCRIBE NOW</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Footer Bottom-->
                <div class="footer-bottom">
                    <div class="auto-container">
                        <div class="text">Copyrights &copy; 2017 <a href="#">Valencia</a>. All Rights Reserved</div>
                    </div>
                </div>
            </footer>
            <div class="modal fade" id="status_model" tabindex="-1" role="dialog" aria-labelledby="status_modelLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <span class="modal-title" id="status_modelLabel"></span>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body default-form" id="status_modelBody">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End pagewrapper-->
        
        <!--Scroll to top-->
        <div class="scroll-to-top scroll-to-target" data-target=".main-header"><span class="icon fa fa-long-arrow-up"></span></div>
        <script type="text/javascript" src="{{ URL::asset('/assets/front/js/lib/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('/assets/front/js/lib/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('/assets/front/js/lib/revolution.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('/assets/front/js/lib/mixitup.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('/assets/front/js/lib/owl.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('/assets/front/js/lib/wow.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('/assets/front/js/lib/aes.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('/assets/front/js/lib/aes-json-format.js') }}"></script>
        <script type="text/javascript">
            var base = "{{ url('/')}}";
            var gbkey = "{{$key}}";
        </script>
        @yield('js-libraries')
        <script src="{{ URL::asset('/assets/front/js/lib/script.js') }}"></script>
        @yield('script')
    </body>
</html>