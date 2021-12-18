@extends('front.layouts.layout')
@section('content')
	<section class="page-title" style="background-image:url(".{{ URL::asset('asset/front/images/background/page-title-1.jpg') }}.";">
        <div class="auto-container">
            <h1>Contact Us</h1>
            <div class="bread-crumb-outer">
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Contact Us</li>
                </ul>
            </div>
        </div>
    </section>
    
    <!--Map Section-->
    <section class="map-section">
        <div class="map-outer">

            <!--Map Canvas-->
            <div class="map-canvas"
                data-zoom="14"
                data-lat="-37.817085"
                data-lng="144.955631"
                data-type="roadmap"
                data-hue="#ffc400"
                data-title="Envato"
                data-content="Melbourne VIC 3000, Australia<br><a href='mailto:info@youremail.com'>info@youremail.com</a>"
                style="height:480px;">
            </div>

        </div>
    </section>
    
    
    <!--Contact Section-->
    <section class="contact-section">
        <div class="auto-container">
                
            <div class="contact-info">
                <div class="sec-title">
                    <h2>Contact Information</h2>
                    <div class="desc-text">The weather started getting rough the tiny ship was tossed if not for the courage</div>
                </div>
                
                <div class="row clearfix">
                    <!--Info Column-->
                    <div class="info-column col-md-4 col-sm-6 col-xs-12">
                        <h3>Head Office</h3>
                        <ul>
                            <li><span class="icon flaticon-construction"></span> 123A, Mainbridge, Lotopride, United States.</li>
                            <li><span class="icon flaticon-technology-5"></span> +1800 - 2374 - 190  /  +1800 - 2374 - 190</li>
                            <li><span class="icon flaticon-envelope"></span> valencia@support.com</li>
                            <li><span class="icon flaticon-earth-1"></span> www.valencia.com</li>
                        </ul>
                    </div>
                    
                    <!--Info Column-->
                    <div class="info-column col-md-4 col-sm-6 col-xs-12">
                        <h3>Los Angeles Office</h3>
                        <ul>
                            <li><span class="icon flaticon-construction"></span> 123A, Mainbridge, Lotopride, United States.</li>
                            <li><span class="icon flaticon-technology-5"></span> +1800 - 2374 - 190  /  +1800 - 2374 - 190</li>
                            <li><span class="icon flaticon-envelope"></span> valencia@support.com</li>
                            <li><span class="icon flaticon-earth-1"></span> www.valencia.com</li>
                        </ul>
                    </div>
                    
                    <!--Info Column-->
                    <div class="info-column col-md-4 col-sm-6 col-xs-12">
                        <h3>Melbourne Office</h3>
                        <ul>
                            <li><span class="icon flaticon-construction"></span> 123A, Mainbridge, Lotopride, United States.</li>
                            <li><span class="icon flaticon-technology-5"></span> +1800 - 2374 - 190  /  +1800 - 2374 - 190</li>
                            <li><span class="icon flaticon-envelope"></span> valencia@support.com</li>
                            <li><span class="icon flaticon-earth-1"></span> www.valencia.com</li>
                        </ul>
                    </div>
                </div>
            </div>  
            
            <!--Form Container -->
            <div class="form-container">
                <div class="sec-title"><h2>Fill the Form</h2></div>
                <!--Contact Form-->
                <div class="contact-form default-form">
                    <form method="post" action="sendemail.php" id="contact-form">
                        <div class="row clearfix">
                        
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <div class="field-label">First Name <span class="req">*</span></div>
                                <input type="text" name="firstname" value="" placeholder="Your First Name">
                            </div>
                            
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <div class="field-label">Last Name <span class="req">*</span></div>
                                <input type="text" name="lastname" value="" placeholder="Your Last Name">
                            </div>

                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <div class="field-label">Email Address <span class="req">*</span></div>
                                <input type="email" name="email" value="">
                            </div>
                            
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <div class="field-label">Phone <span class="req">*</span></div>
                                <input type="text" name="phone" value="">
                            </div>
                            
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <div class="field-label">Message <span class="req">*</span></div>
                                <textarea name="message" placeholder="Write Your Message"></textarea>
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <button type="submit" class="theme-btn btn-style-four">SUBMIT </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </section>
@endsection
@section('js-libraries')
<script src="{{ URL::asset('/assets/front/js/validate.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKQRVX8T_DabkBMuX786vXh31QFgXimjQ" async=""></script>
<script src="{{ URL::asset('/assets/front/js/map-script.js') }}"></script>
@endsection
@section('script')
<script>
$('#contact-form').validate({
    rules: {
        firstname: {
            required: true
        },
        lastname: {
            required: true
        },
        email: {
            required: true,
            email: true
        },
        phone: {
            required: true
        },
        message: {
            required: true
        }
    }
});
</script>
@endsection