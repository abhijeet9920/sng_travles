@extends('front.layouts.layout')
@section('css-libraries')
<link href="{{ URL::asset('assets/front/css/revolution-slider.css') }}" rel="stylesheet">
@endsection
@section('inline-css')
<style type="text/css">
    img.mult_img {
        height: 220px;
        width: 330px;
    }
</style>
@endsection

@section('content')
    <section class="main-slider" data-start-height="800" data-slide-overlay="yes">
        <div class="tp-banner-container">
            <div class="tp-banner">
                <ul>
                    <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-thumb="images/main-slider/1.jpg"  data-saveperformance="off"  data-title="Awesome Title Here">
                        <img src="/assets/front/images/main-slider/1.jpg"  alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat"> 
                        <div class="tp-caption sfl sfb tp-resizeme"
                            data-x="left" data-hoffset="15"
                            data-y="center" data-voffset="-90"
                            data-speed="1500"
                            data-start="0"
                            data-easing="easeOutExpo"
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0.01"
                            data-endelementdelay="0.3"
                            data-endspeed="1200"
                            data-endeasing="Power4.easeIn">
                            <div class="small-title">No. 1 Car Rental / Hire Company</div>
                        </div>
                        <div class="tp-caption sfr sfb tp-resizeme"
                            data-x="left" data-hoffset="15"
                            data-y="center" data-voffset="10"
                            data-speed="1500"
                            data-start="0"
                            data-easing="easeOutExpo"
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0.01"
                            data-endelementdelay="0.3"
                            data-endspeed="1200"
                            data-endeasing="Power4.easeIn">
                            <h2 class="big-title">We are trusted by Millions of <br>Customers Worldwide</h2>
                        </div>
                        <div class="tp-caption sfl sfb tp-resizeme"
                            data-x="left" data-hoffset="15"
                            data-y="center" data-voffset="130"
                            data-speed="1500"
                            data-start="0"
                            data-easing="easeOutExpo"
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0.01"
                            data-endelementdelay="0.3"
                            data-endspeed="1200"
                            data-endeasing="Power4.easeIn"><a href="#" class="theme-btn btn-style-one">Rent a Car</a></div>
                    </li>
                    <li data-transition="zoomin" data-slotamount="1" data-masterspeed="1000" data-thumb="images/main-slider/2.jpg"  data-saveperformance="off"  data-title="Awesome Title Here">
                        <img src="/assets/front/images/main-slider/2.jpg"  alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat"> 
                        <div class="tp-caption sfr sfb tp-resizeme"
                            data-x="center" data-hoffset="0"
                            data-y="center" data-voffset="-90"
                            data-speed="1500"
                            data-start="0"
                            data-easing="easeOutExpo"
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0.01"
                            data-endelementdelay="0.3"
                            data-endspeed="1200"
                            data-endeasing="Power4.easeIn">
                            <div class="small-title">Welcome to Valencia Car Hire</div>
                        </div>
                        <div class="tp-caption sfl sfb tp-resizeme"
                            data-x="center" data-hoffset="0"
                            data-y="center" data-voffset="10"
                            data-speed="1500"
                            data-start="0"
                            data-easing="easeOutExpo"
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0.01"
                            data-endelementdelay="0.3"
                            data-endspeed="1200"
                            data-endeasing="Power4.easeIn">
                            <div class="text-center">
                                <h2 class="big-title">Enjoy the Ride with Brand New <br>Ducatti Cars</h2>
                            </div>
                        </div>
                        <div class="tp-caption sfr sfb tp-resizeme"
                            data-x="center" data-hoffset="0"
                            data-y="center" data-voffset="130"
                            data-speed="1500"
                            data-start="0"
                            data-easing="easeOutExpo"
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0.01"
                            data-endelementdelay="0.3"
                            data-endspeed="1200"
                            data-endeasing="Power4.easeIn"><a href="#" class="theme-btn btn-style-two">Rent a Car</a> &nbsp; <a href="#" class="theme-btn btn-style-one">Contact Us</a></div>
                    </li>
                    <li data-transition="zoomout" data-slotamount="1" data-masterspeed="1000" data-thumb="images/main-slider/3.jpg"  data-saveperformance="off"  data-title="Awesome Title Here">
                        <img src="/assets/front/images/main-slider/3.jpg"  alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat"> 
                        <div class="tp-caption sft sfb tp-resizeme"
                            data-x="center" data-hoffset="0"
                            data-y="center" data-voffset="-90"
                            data-speed="1500"
                            data-start="0"
                            data-easing="easeOutExpo"
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0.01"
                            data-endelementdelay="0.3"
                            data-endspeed="1200"
                            data-endeasing="Power4.easeIn">
                            <div class="small-title">Starts from $500/day</div>
                        </div>
                        <div class="tp-caption sfb sfb tp-resizeme"
                            data-x="center" data-hoffset="0"
                            data-y="center" data-voffset="10"
                            data-speed="1500"
                            data-start="0"
                            data-easing="easeOutExpo"
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0.01"
                            data-endelementdelay="0.3"
                            data-endspeed="1200"
                            data-endeasing="Power4.easeIn">
                            <div class="text-center">
                                <h2 class="big-title">The Classic Aston Martin Dark Shiny <br>Sport Car in the Street</h2>
                            </div>
                        </div>
                        <div class="tp-caption sfb sfb tp-resizeme"
                            data-x="center" data-hoffset="0"
                            data-y="center" data-voffset="130"
                            data-speed="1500"
                            data-start="0"
                            data-easing="easeOutExpo"
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0.01"
                            data-endelementdelay="0.3"
                            data-endspeed="1200"
                            data-endeasing="Power4.easeIn"><a href="#" class="theme-btn btn-style-two">Rent a Car</a> &nbsp; <a href="#" class="theme-btn btn-style-one">Contact Us</a></div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!--Welcome Section-->
    <section class="welcome-section">
        <div class="auto-container">
            <div class="row clearfix">
                <!--Content Column-->
                <div class="content-column pull-right col-md-8 col-sm-12 col-xs-12">
                    <!--Heading Title-->
                    <div class="sec-title">
                        <h2>Welcome to Valencia Car Hire</h2>
                        <div class="desc-text">The weather started getting rough the tiny ship was tossed if not for the courage of the fearless crew the minnow would be lost the minnow would be lost.</div>
                    </div>
                    <div class="row clearfix">
                        <!--Service Block-->
                        <div class="service-block col-md-6 col-sm-6 col-xs-12">
                            <div class="inner-box">
                                <div class="icon-box"><span class="flaticon-tax"></span></div>
                                <h3>Tax & Insurance Included</h3>
                                <div class="text">The weather started getting rough the ship was tossed if courage.</div>
                            </div>
                        </div>
                        <!--Service Block-->
                        <div class="service-block col-md-6 col-sm-6 col-xs-12">
                            <div class="inner-box">
                                <div class="icon-box"><span class="flaticon-money"></span></div>
                                <h3>Refundable Deposit</h3>
                                <div class="text">The weather started getting rough the ship was tossed if courage.</div>
                            </div>
                        </div>
                        <!--Service Block-->
                        <div class="service-block col-md-6 col-sm-6 col-xs-12">
                            <div class="inner-box">
                                <div class="icon-box"><span class="flaticon-shape-1"></span></div>
                                <h3>Free Fuel </h3>
                                <div class="text">The weather started getting rough the ship was tossed if courage.</div>
                            </div>
                        </div>
                        <!--Service Block-->
                        <div class="service-block col-md-6 col-sm-6 col-xs-12">
                            <div class="inner-box">
                                <div class="icon-box"><span class="flaticon-support"></span></div>
                                <h3>24/7 Assistance Support</h3>
                                <div class="text">The weather started getting rough the ship was tossed if courage.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Form Column-->
                <div class="form-column pull-left col-md-4 col-sm-12 col-xs-12">
                    <div class="form-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <!--Tabs Box-->
                        <div class="tabs-box booking-tabs">
                            <!--Tab Buttons-->
                            <ul class="tab-buttons clearfix">
                                <li class="tab-btn active-btn" data-tab="#car-rental-tab">
                                    <div class="icon-box"><span class="flaticon-car-3"></span></div>
                                    <span class="txt"> Car Rental</span>
                                </li>
                                <li class="tab-btn" data-tab="#van-rental-tab">
                                    <div class="icon-box"><span class="flaticon-truck"></span> </div>
                                    <span class="txt">Van Rental</span>
                                </li>
                            </ul>
                            <!--Tabs Content-->
                            <div class="tabs-content">
                                <!--Tab / Active Tab-->
                                <div class="tab active-tab" id="car-rental-tab">
                                    <div class="default-form">
                                        <form method="post" action="contact.html">
                                            <div class="field-label">Pickup</div>
                                            <div class="row clearfix">
                                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                    <div class="field-inner"><input type="text" name="field-name" value="" placeholder="Airport Code, City, Hotel, Zip, etc.."></div>
                                                </div>
                                                <div class="form-group col-lg-6 col-md-12 col-sm-6 col-xs-12">
                                                    <div class="field-inner"><input type="text" class="datepicker" id="field-one" name="field-name" value="" placeholder="Date"><label class="input-icon" for="field-one"><span class="fa fa-calendar"></span></label></div>
                                                </div>
                                                <div class="form-group col-lg-6 col-md-12 col-sm-6 col-xs-12">
                                                    <div class="field-inner"><input type="text" id="field-two" name="field-name" value="" placeholder="Time"><label class="input-icon" for="field-two"><span class="fa fa-clock-o"></span></label></div>
                                                </div>
                                            </div>
                                            <div class="span-bottom-20"></div>
                                            <div class="field-label">Drop</div>
                                            <div class="row clearfix">
                                                <div class="form-group col-lg-6 col-md-12 col-sm-6 col-xs-12">
                                                    <div class="field-inner"><input type="text" class="datepicker" id="field-three" name="field-name" value="" placeholder="Date"><label class="input-icon" for="field-three"><span class="fa fa-calendar"></span></label></div>
                                                </div>
                                                <div class="form-group col-lg-6 col-md-12 col-sm-6 col-xs-12">
                                                    <div class="field-inner"><input type="text" id="field-four" name="field-name" value="" placeholder="Time"><label class="input-icon" for="field-four"><span class="fa fa-clock-o"></span></label></div>
                                                </div>
                                                <div class="form-group col-sm-12 col-xs-12">
                                                    <div class="check-box">
                                                        <input type="checkbox" id="cbox-one"><label for="cbox-one"><span class="icon"><span class="square"></span><span class="fa fa-check"></span></span> Return to Pickup Location</label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-12 col-xs-12">
                                                    <button type="submit" class="theme-btn btn-style-three">Book Now</button>
                                                </div>
                                                <div class="form-group col-sm-12 col-xs-12">
                                                    <div class="check-box">
                                                        <input type="checkbox" id="cbox-two"><label for="cbox-two"><span class="icon"><span class="square"></span><span class="fa fa-check"></span></span> Valencia Customer Login</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!--Tab-->
                                <div class="tab" id="van-rental-tab">
                                    <div class="default-form">
                                        <form method="post" action="contact.html">
                                            <div class="field-label">Pickup</div>
                                            <div class="row clearfix">
                                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                    <div class="field-inner"><input type="text" name="field-name" value="" placeholder="Airport Code, City, Hotel, Zip, etc.."></div>
                                                </div>
                                                <div class="form-group col-lg-6 col-md-12 col-sm-6 col-xs-12">
                                                    <div class="field-inner"><input type="text" class="datepicker" id="field-five" name="field-name" value="" placeholder="Date"><label class="input-icon" for="field-five"><span class="fa fa-calendar"></span></label></div>
                                                </div>
                                                <div class="form-group col-lg-6 col-md-12 col-sm-6 col-xs-12">
                                                    <div class="field-inner"><input type="text" id="field-six" name="field-name" value="" placeholder="Time"><label class="input-icon" for="field-six"><span class="fa fa-clock-o"></span></label></div>
                                                </div>
                                            </div>
                                            <div class="span-bottom-20"></div>
                                            <div class="field-label">Drop</div>
                                            <div class="row clearfix">
                                                <div class="form-group col-lg-6 col-md-12 col-sm-6 col-xs-12">
                                                    <div class="field-inner"><input type="text" class="datepicker" id="field-seven" name="field-name" value="" placeholder="Date"><label class="input-icon" for="field-seven"><span class="fa fa-calendar"></span></label></div>
                                                </div>
                                                <div class="form-group col-lg-6 col-md-12 col-sm-6 col-xs-12">
                                                    <div class="field-inner"><input type="text" id="field-eight" name="field-name" value="" placeholder="Time"><label class="input-icon" for="field-eight"><span class="fa fa-clock-o"></span></label></div>
                                                </div>
                                                <div class="form-group col-sm-12 col-xs-12">
                                                    <div class="check-box">
                                                        <input type="checkbox" id="cbox-three"><label for="cbox-three"><span class="icon"><span class="square"></span><span class="fa fa-check"></span></span> Return to Pickup Location</label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-12 col-xs-12">
                                                    <button type="submit" class="theme-btn btn-style-three">Book Now</button>
                                                </div>
                                                <div class="form-group col-sm-12 col-xs-12">
                                                    <div class="check-box">
                                                        <input type="checkbox" id="cbox-four"><label for="cbox-four"><span class="icon"><span class="square"></span><span class="fa fa-check"></span></span> Valencia Customer Login</label>
                                                    </div>
                                                </div>
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
    </section>
    <!--Drive Cars-->
    <section class="drive-cars-section">
        <div class="auto-container">
            <!--Floated Title-->
            <div class="floated-title">
                <div class="inner clearfix">
                    <div class="heading-block">Book A Single Journey</div>
                    <div class="or">OR</div>
                    <div class="heading-block">Book An Outstation Ride</div>
                </div>
            </div>
            <!--Big Image-->
            <figure class="big-image"><img src="/assets/front/images/resource/featured-image-1.jpg" alt=""></figure>
            <!--Heading Title-->
            <div class="row clearfix">
                <!--Service Block Two-->
                <div class="service-block-two col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="icon-box"><span class="flaticon-clipboard-1"></span></div>
                        <h3>Book Your Ride</h3>
                        <div class="text">The weather started getting rough the tiny ship was lost the min ting a maximum security stockade lost the minnow.</div>
                    </div>
                </div>
                <div class="service-block-two col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="icon-box"><span class="flaticon-car-3"></span></div>
                        <h3>Enjoy Your Journey</h3>
                        <div class="text">The weather started getting rough the tiny ship was lost the min ting a maximum security stockade lost the minnow.</div>
                    </div>
                </div>
                <!--Service Block Two-->
                <div class="service-block-two col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="icon-box"><span class="flaticon-money-3"></span></div>
                        <h3>Pay the Fare</h3>
                        <div class="text">The weather started getting rough the tiny ship was lost the min ting a maximum security stockade lost the minnow.</div>
                    </div>
                </div>
                <!--Service Block Two-->
                
            </div>
        </div>
    </section>
    <!--FUn Facts Section-->
    <section class="fun-facts-section fact-counter" style="background-image:url(images/background/image-1.jpg);">
        <div class="auto-container">
            <!--Heading Title / Light Version-->
            <div class="sec-title centered light-version">
                <div class="icon-box"><span class="flaticon-car-2"></span></div>
                <h2>Our Fun Facts</h2>
                <div class="desc-text">The weather started getting rough the tiny ship was tossed if not for the courage</div>
            </div>
            <div class="row clearfix">
                <!--Column-->
                <div class="column counter-column wow fadeIn col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="inner">
                        <div class="icon-box"><span class="flaticon-sports-car"></span></div>
                        <div class="content">
                            <h4 class="counter-title">Cabs</h4>
                            <div class="count-outer">
                                <span class="count-text" data-speed="5000" data-stop="8350">0</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Column-->
                <div class="column counter-column wow fadeIn col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="inner">
                        <div class="icon-box"><span class="flaticon-settings"></span></div>
                        <div class="content">
                            <h4 class="counter-title">Trips Daily</h4>
                            <div class="count-outer">
                                <span class="count-text" data-speed="7000" data-stop="25000">0</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Column-->
                <div class="column counter-column wow fadeIn col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="inner">
                        <div class="icon-box"><span class="flaticon-room-key"></span></div>
                        <div class="content">
                            <h4 class="counter-title">Clients Annually</h4>
                            <div class="count-outer">
                                <span class="count-text" data-speed="10000" data-stop="5500000">0</span> +
                            </div>
                        </div>
                    </div>
                </div>
                <!--Column-->
                <div class="column counter-column wow fadeIn col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="inner">
                        <div class="icon-box"><span class="flaticon-dashboard-1"></span></div>
                        <div class="content">
                            <h4 class="counter-title">Kilometers Daily</h4>
                            <div class="count-outer">
                                <span class="count-text" data-speed="8000" data-stop="12000">0</span> +
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Gallery Section-->
    <section class="gallery-section">
        <div class="auto-container">
            <!--Heading Title-->
            <div class="sec-title centered">
                <div class="icon-box"><span class="flaticon-sports-car"></span></div>
                <h2>Our Latest Oneway</h2>
                <div class="desc-text">The weather started getting rough the tiny ship was tossed if not for the courage.</div>
            </div>
            <div class="mixitup-gallery">
                <!--Filter-->
                <!--Filter List-->
                <div class="filter-list row clearfix">
                    <!--Default Car Item-->
                    @foreach($oneways as $oneway)
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 default-car-item mix mix_all all wagon crossover">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><a href=" {{ url('/one-way').'/'.$oneway['id'] }}"><img src="data:{{ $oneway['images']['mime'].';base64,'.$oneway['images']['source'] }}" class="mult_img" alt="{{ $oneway['title'] }}"></a></figure>
                                </div>
                                <div class="lower-content">
                                    <h3><a href="{{ url('/one-way').'/'.$oneway['id'] }}">{{ $oneway['title'] }}</a></h3>
                                    <ul class="info clearfix">
                                        <li>Fare: <span class="price"><strong><span>&#8377;</span>{{ $oneway['rate'] }}</strong></span></li>
                                        <li>Km: <span class="price"><strong> {{ $oneway['distance'] }}</strong></span></li>
                                    </ul>
                                    <a href="{{ url('/one-way').'/'.$oneway['id'] }}" class="theme-btn btn-style-four">Book A Trip</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="auto-container">
            <!--Heading Title-->
            <div class="sec-title centered">
                <div class="icon-box"><span class="flaticon-sports-car"></span></div>
                <h2>Our Latest Outstation Trips</h2>
                <div class="desc-text">The weather started getting rough the tiny ship was tossed if not for the courage.</div>
            </div>
            <div class="mixitup-gallery">
                <!--Filter-->
                <!--Filter List-->
                <div class="filter-list row clearfix">
                    <!--Default Car Item-->
                    @foreach($outstations as $oneway)
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 default-car-item mix mix_all all wagon crossover">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><a href=" {{ url('/one-way').'/'.base64_encode($oneway['id']) }}"><img src="data:{{ $oneway['images']['mime'].';base64,'.$oneway['images']['source'] }}" class="mult_img" alt="{{ $oneway['title'] }}"></a></figure>
                                </div>
                                <div class="lower-content">
                                    <h3><a href="{{ url('/one-way').'/'.base64_encode($oneway['id']) }}">{{ $oneway['title'] }}</a></h3>
                                    <ul class="info clearfix">
                                        <li>Fare: <span class="price"><strong><span>&#8377;</span>{{ $oneway['rate'] }}</strong></span></li>
                                        <li>Km: <span class="price"><strong> {{ $oneway['distance'] }}</strong></span></li>
                                    </ul>
                                    <a href="{{ url('/one-way').'/'.base64_encode($oneway['id']) }}" class="theme-btn btn-style-four">Book A Trip</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--Subscribe Section-->
    <section class="subscribe-section" style="background-image:url(/assets/front/images/background/image-2.jpg);">
        <div class="auto-container">
            <div class="logo"><a href="{{ url('/') }}"><img src="/assets/front/images/logo-4.png" alt=""></a></div>
            <!--Heading Title / Light Version-->
            <div class="sec-title centered light-version">
                <h2>Never Miss a Deal. Let’s Go.</h2>
                <div class="desc-text">The weather started getting rough the tiny ship was tossed if not for the courage</div>
            </div>
            <!--Form-->
            <div class="form">
                <form method="post" action="contact.html">
                    <div class="form-group">
                        <input type="email" name="email" value="" placeholder="Enter your Email Address..." required>
                        <button type="submit" class="theme-btn btn-style-one">SIGNUP</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--News Section-->
    <section class="news-section">
        <div class="auto-container">
            <!--Heading Title-->
            <div class="sec-title centered">
                <div class="icon-box"><span class="flaticon-sports-car"></span></div>
                <h2>Our Latest News</h2>
                <div class="desc-text">The weather started getting rough the tiny ship was tossed if not for the courage.</div>
            </div>
            <div class="row clearfix">
                <!--News Style One-->
                <div class="news-style-one col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box wow fadeIn" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <figure class="image-box">
                            <a href="blog-single.html"><img src="/assets/front/images/resource/blog-image-1.jpg" alt=""></a> 
                            <div class="date-box"><span class="day">01</span><span class="month">Sep</span></div>
                        </figure>
                        <div class="lower-content">
                            <h3><a href="blog-single.html">Group would some form a family</a></h3>
                            <ul class="post-meta clearfix">
                                <li><a href="#"><span class="fa fa-eye"></span> 12 Views</a></li>
                                <li><a href="#"><span class="fa fa-share-alt"></span> 15 Shares</a></li>
                            </ul>
                            <div class="text">The weather started getting rough the tiny ship was lost the min ting a maximum security road and back stock a against ade lost the minnow.</div>
                            <a href="blog-single.html" class="theme-btn btn-style-four">Read More</a>
                        </div>
                    </div>
                </div>
                <!--News Style One-->
                <div class="news-style-one col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box wow fadeIn" data-wow-delay="300ms" data-wow-duration="1500ms">
                        <figure class="image-box">
                            <a href="blog-single.html"><img src="/assets/front/images/resource/blog-image-2.jpg" alt=""></a> 
                            <div class="date-box"><span class="day">27</span><span class="month">Aug</span></div>
                        </figure>
                        <div class="lower-content">
                            <h3><a href="blog-single.html">The tale of our castaways</a></h3>
                            <ul class="post-meta clearfix">
                                <li><a href="#"><span class="fa fa-eye"></span> 46 Views</a></li>
                                <li><a href="#"><span class="fa fa-share-alt"></span> 38 Shares</a></li>
                            </ul>
                            <div class="text">The weather started getting rough the tiny ship was lost the min ting a maximum security road and back stock a against ade lost the minnow.</div>
                            <a href="blog-single.html" class="theme-btn btn-style-four">Read More</a>
                        </div>
                    </div>
                </div>
                <!--News Style One-->
                <div class="news-style-one col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box wow fadeIn" data-wow-delay="600ms" data-wow-duration="1500ms">
                        <figure class="image-box">
                            <a href="blog-single.html"><img src="/assets/front/images/resource/blog-image-3.jpg" alt=""></a> 
                            <div class="date-box"><span class="day">19</span><span class="month">Jul</span></div>
                        </figure>
                        <div class="lower-content">
                            <h3><a href="blog-single.html">Flying away on a wings and prayer</a></h3>
                            <ul class="post-meta clearfix">
                                <li><a href="#"><span class="fa fa-eye"></span> 51 Views</a></li>
                                <li><a href="#"><span class="fa fa-share-alt"></span> 42 Shares</a></li>
                            </ul>
                            <div class="text">The weather started getting rough the tiny ship was lost the min ting a maximum security road and back stock a against ade lost the minnow.</div>
                            <a href="blog-single.html" class="theme-btn btn-style-four">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Testimonials Section-->
    <section class="testimonials-section">
        <div class="auto-container">
            <!--Testimonials Carousel-->
            <div class="testimonials-carousel">
                <!--Slide Item-->
                <div class="slide-item">
                    <div class="inner-box">
                        <figure class="author-thumb img-circle"><img class="img-circle" src="images/resource/author-thumb-1.jpg" alt=""></figure>
                        <div class="text">The weather started getting rough the tiny ship was tossed if not for the courage of the fearless crew the minnow.</div>
                        <div class="author-info">
                            <h4 class="author-title">Erick Bishop</h4>
                            <div class="designation">Poppies, Founder</div>
                        </div>
                    </div>
                </div>
                <!--Slide Item-->
                <div class="slide-item">
                    <div class="inner-box">
                        <figure class="author-thumb img-circle"><img class="img-circle" src="images/resource/author-thumb-2.jpg" alt=""></figure>
                        <div class="text">The weather started getting rough the tiny ship was tossed if not for the courage of the fearless crew the minnow.</div>
                        <div class="author-info">
                            <h4 class="author-title">Lulie Ceasar</h4>
                            <div class="designation">Rofin, Founder</div>
                        </div>
                    </div>
                </div>
                <!--Slide Item-->
                <div class="slide-item">
                    <div class="inner-box">
                        <figure class="author-thumb img-circle"><img class="img-circle" src="images/resource/author-thumb-3.jpg" alt=""></figure>
                        <div class="text">The weather started getting rough the tiny ship was tossed if not for the courage of the fearless crew the minnow.</div>
                        <div class="author-info">
                            <h4 class="author-title">Matt Wagh</h4>
                            <div class="designation">Poppies, Founder</div>
                        </div>
                    </div>
                </div>
                <!--Slide Item-->
                <div class="slide-item">
                    <div class="inner-box">
                        <figure class="author-thumb img-circle"><img class="img-circle" src="images/resource/author-thumb-1.jpg" alt=""></figure>
                        <div class="text">The weather started getting rough the tiny ship was tossed if not for the courage of the fearless crew the minnow.</div>
                        <div class="author-info">
                            <h4 class="author-title">Erick Bishop</h4>
                            <div class="designation">Poppies, Founder</div>
                        </div>
                    </div>
                </div>
                <!--Slide Item-->
                <div class="slide-item">
                    <div class="inner-box">
                        <figure class="author-thumb img-circle"><img class="img-circle" src="images/resource/author-thumb-2.jpg" alt=""></figure>
                        <div class="text">The weather started getting rough the tiny ship was tossed if not for the courage of the fearless crew the minnow.</div>
                        <div class="author-info">
                            <h4 class="author-title">Lulie Ceasar</h4>
                            <div class="designation">Rofin, Founder</div>
                        </div>
                    </div>
                </div>
                <!--Slide Item-->
                <div class="slide-item">
                    <div class="inner-box">
                        <figure class="author-thumb img-circle"><img class="img-circle" src="images/resource/author-thumb-3.jpg" alt=""></figure>
                        <div class="text">The weather started getting rough the tiny ship was tossed if not for the courage of the fearless crew the minnow.</div>
                        <div class="author-info">
                            <h4 class="author-title">Matt Wagh</h4>
                            <div class="designation">Poppies, Founder</div>
                        </div>
                    </div>
                </div>
                <!--Slide Item-->
                <div class="slide-item">
                    <div class="inner-box">
                        <figure class="author-thumb img-circle"><img class="img-circle" src="images/resource/author-thumb-1.jpg" alt=""></figure>
                        <div class="text">The weather started getting rough the tiny ship was tossed if not for the courage of the fearless crew the minnow.</div>
                        <div class="author-info">
                            <h4 class="author-title">Erick Bishop</h4>
                            <div class="designation">Poppies, Founder</div>
                        </div>
                    </div>
                </div>
                <!--Slide Item-->
                <div class="slide-item">
                    <div class="inner-box">
                        <figure class="author-thumb img-circle"><img class="img-circle" src="images/resource/author-thumb-2.jpg" alt=""></figure>
                        <div class="text">The weather started getting rough the tiny ship was tossed if not for the courage of the fearless crew the minnow.</div>
                        <div class="author-info">
                            <h4 class="author-title">Lulie Ceasar</h4>
                            <div class="designation">Rofin, Founder</div>
                        </div>
                    </div>
                </div>
                <!--Slide Item-->
                <div class="slide-item">
                    <div class="inner-box">
                        <figure class="author-thumb img-circle"><img class="img-circle" src="images/resource/author-thumb-3.jpg" alt=""></figure>
                        <div class="text">The weather started getting rough the tiny ship was tossed if not for the courage of the fearless crew the minnow.</div>
                        <div class="author-info">
                            <h4 class="author-title">Matt Wagh</h4>
                            <div class="designation">Poppies, Founder</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Sponsors Section-->
    <section class="sponsors-section">
        <div class="auto-container">
            <!--Sponsors SLider-->
            <ul class="sponsors-slider">
                <li>
                    <div class="image-box"><a href="#"><img src="/assets/front/images/clients/1.png" alt=""></a></div>
                </li>
                <li>
                    <div class="image-box"><a href="#"><img src="/assets/front/images/clients/2.png" alt=""></a></div>
                </li>
                <li>
                    <div class="image-box"><a href="#"><img src="/assets/front/images/clients/3.png" alt=""></a></div>
                </li>
                <li>
                    <div class="image-box"><a href="#"><img src="/assets/front/images/clients/4.png" alt=""></a></div>
                </li>
                <li>
                    <div class="image-box"><a href="#"><img src="/assets/front/images/clients/5.png" alt=""></a></div>
                </li>
                <li>
                    <div class="image-box"><a href="#"><img src="/assets/front/images/clients/1.png" alt=""></a></div>
                </li>
                <li>
                    <div class="image-box"><a href="#"><img src="/assets/front/images/clients/2.png" alt=""></a></div>
                </li>
                <li>
                    <div class="image-box"><a href="#"><img src="/assets/front/images/clients/3.png" alt=""></a></div>
                </li>
                <li>
                    <div class="image-box"><a href="#"><img src="/assets/front/images/clients/4.png" alt=""></a></div>
                </li>
                <li>
                    <div class="image-box"><a href="#"><img src="/assets/front/images/clients/5.png" alt=""></a></div>
                </li>
            </ul>
        </div>
    </section>
@endsection