@extends('front.layouts.layout')
@section('css-libraries')
<link href="{{ URL::asset('/assets/front/css/nouislider.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/assets/front/css/nouislider.pips.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/assets/front/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">

@endsection
@section('inline-css')
<style type="text/css">
    img.mult_img {
        height: 220px;
        width: 330px;
    }
    .disabled_input{
        pointer-events: none;
    }
    #map {
        height: 100%;
    }

/* Optional: Makes the sample page fill the window. */

    #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: "Roboto", "sans-serif";
        line-height: 30px;
        padding-left: 10px;
    }
</style>
@endsection


@section('content')
    <section class="page-title" style="background-image:url({{ URL::asset('assets/front/images/background/page-title-1.jpg')}});">
        <div class="auto-container">
            <h1>Our Cars</h1>
            <div class="bread-crumb-outer">
                <ul class="bread-crumb clearfix">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Our Cars</li>
                </ul>
            </div>
        </div>
    </section>
    
    
    <!--Sidebar Page-->
    <div class="single-car car-details">
        <div class="auto-container">
        	<!--Basic Details-->
            <div class="basic-details">
            	<div class="row clearfix">
                	<!--Carousel Column-->
                    <div class="carousel-column col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    	<!--Product Carousel-->
                        <div class="product-carousel-outer">
                            <!--Product image Carousel-->
                            <ul class="prod-image-carousel">
                                <li>
                                    <figure class="image"><img src="data:{{$car->images['mime'].';base64,'.$car->images['source']}}" alt=""></figure>
                                </li>
                            </ul>
                        </div><!--End Product Carousel-->
                    </div>
                    <!--Info Column-->
                    <div class="info-column col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    	<div class="info-outer">
                        	<div class="upper-info">
                        		<div class="sidebar-title"><h3>{{$route->title}}</h3></div>
                            	<ul class="list">
                                    <li><a class="clearfix"><span class="col">Start</span><span class="col" title="{{$route->start_location}}">{{$route->short_starting}}</span></a></li>
                                    <li><a class="clearfix"><span class="col">Destination</span><span class="col" title="{{$route->end_location}}">{{$route->short_ending}}</span></a></li>
                                    <li><a class="clearfix"><span class="col">Fuel Type</span><span class="col">{{$car->fuel}}</span></a></li>
                                    <li><a class="clearfix"><span class="col">Seats</span><span class="col">{{$car->seater_type}}</span></a></li>
                                    <li><a class="clearfix"><span class="col">Carrier Attached</span><span class="col">{{$car->is_carrier_attached}}</span></a></li>
                                </ul>
                            </div>
                            <ul class="info clearfix">
                                <li>Price: <span class="price"><strong>{{ $route->rate }}</strong></span></li>
                                <li>Distance: <span class="price"><strong>{{ number_format($route->distance/1000, 2) }}</strong> km</span></li>
                            </ul>
                        </div>
                        <a class="theme-btn btn-style-four" id="book_ride">Book A Ride</a>
                    </div>
                    
                </div>
            </div><!--End Basic Details-->
            
            
            <!--Product Info Tabs-->
            <div class="product-info-tabs">
                    
                <!--Product Tabs-->
                <div class="prod-tabs tabs-box" id="product-tabs">
                
                    <!--Tab Btns-->
                    <ul class="tab-btns tab-buttons clearfix">
                        <li data-tab="#prod-description" class="tab-btn active-btn">Overview</li>
                        <li data-tab="#prod-reviews" class="tab-btn">Customer Review</li>
                    </ul>
                    <!--Tabs Content-->
                    <div class="tabs-container tabs-content">
                        <!--Tab / Active Tab-->
                        <div class="tab active-tab" id="prod-description">
                            <div class="content">
                            	<h3>Description</h3>
                                <p>{{$route->description}}</p>
                            </div>
                            <div class="content">
                                <h3>Route</h3>
                                <div class="map-outer">
                                    <div class="map-canvas"
                                        data-zoom="14"
                                        data-lat="-37.817085"
                                        data-lng="144.955631"
                                        data-type="roadmap"
                                        data-hue="#ffc400"
                                        data-title="Envato"
                                        data-content="Melbourne VIC 3000, Australia<br><a href='mailto:info@youremail.com'>info@youremail.com</a>"
                                        style="height:480px;" id="map">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Tab-->
                        <div class="tab" id="prod-reviews">
                            <h3>{{ $reviews['count'] }} Reviews Found</h3>
                            <!--Reviews Container-->
                            <div class="reviews-container">
                                <!--Reviews-->
                                @foreach($reviews['data'] as $review)
                                    <article class="review-box clearfix">
                                        <figure class="rev-thumb"><img src="images/resource/author-thumb-1.jpg" alt=""></figure>
                                        <div class="rev-content">
                                            <div class="rating"><span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star-o"></span></div>
                                            <div class="rev-info">Admin – April 03, 2016: </div>
                                            <div class="rev-text"><p>Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis</p></div>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                            <!--Add Review-->
                            <div class="add-review">
                                <h3>Add a Review</h3>
                                <form method="post">
                                    <div class="row clearfix">
                                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                            <label>Name *</label>
                                            <input type="text" name="name" value="" placeholder="" required>
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                            <label>Email *</label>
                                            <input type="email" name="email" value="" placeholder="" required>
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                            <label>Website *</label>
                                            <input type="text" name="website" value="" placeholder="" required>
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                            <label>Rating </label>
                                            <div class="rating">
                                                <a href="#" class="rate-box" title="1 Out of 5"><span class="fa fa-star"></span></a>
                                                <a href="#" class="rate-box" title="2 Out of 5"><span class="fa fa-star"></span> <span class="fa fa-star"></span></a>
                                                <a href="#" class="rate-box" title="3 Out of 5"><span class="fa fa-star"></span> <span class="fa fa-star"> </span> <span class="fa fa-star"></span></a>
                                                <a href="#" class="rate-box" title="4 Out of 5"><span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span></a>
                                                <a href="#" class="rate-box" title="5 Out of 5"><span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span></a>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                            <label>Your Review</label>
                                            <textarea name="review-message"></textarea>
                                        </div>
                                        <div class="form-group text-right col-md-12 col-sm-12 col-xs-12">
                                            <button type="button" class="theme-btn btn-style-three">Add Review</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="book_ride_form" tabindex="-1" role="dialog" aria-labelledby="book_ride_formLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <span class="modal-title" id="book_ride_formLabel">Book Ride</span>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body default-form">
                            <form id="book_form">
                                <div class="row clearfix">
                                    <div class="col-md-12 col-lg-12 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <div class="field-label">First Name <span class="req">*</span></div>
                                            <div class="field-inner"><input type="text" class="form-control" id="user_fname" name="user_fname" placeholder="Your First Name"></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="field-label">Last Name <span class="req">*</span></div>
                                            <div class="field-inner"><input type="text" class="form-control" id="user_lname" name="user_lname" placeholder="Your Last Name"></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="field-label">Email <span class="req">*</span></div>
                                            <div class="field-inner"><input type="email" class="form-control" id="user_email" name="user_email" placeholder="Your email"></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="field-label">Mobile Number <span class="req">*</span></div>
                                            <div class="field-inner"><input type="text" class="form-control" id="user_mobile" name="user_mobile" placeholder="Your Mobile Number"></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="field-label">Pickup Time <span class="req">*</span></div>
                                            <div class="field-inner"><input type="text" class="form-control" id="user_pickuptime" name="user_pickuptime" placeholder="Pickup Time"><label class="input-icon" for="user_pickuptime"><span class="fa fa-calendar"></span></label></div>
                                            <input type="hidden" class="form-control" id="hidden_pickuptime" name="hidden_pickuptime">
                                            <input type="hidden" class="form-control" id="hidden_oneway" name="hidden_oneway" value="{{$oneway}}">
                                        </div>
                                        <!-- <div class="form-group">
                                            <div class="field-label">OTP <span class="req">*</span></div>
                                            <div class="field-inner"><input type="text" class="form-control" id="user_otp" placeholder="Enter OTP which you've recieved on mobile"></div>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="row">
                                        <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6">
                                            <button type="button" class="btn btn-secondary btn-lg btn-block" data-dismiss="modal">Close</button>
                                        </div>
                                        <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6">
                                            <button type="button" class="btn btn-primary btn-lg btn-block" id="book">Book</button>
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
@endsection
@section('js-libraries')
<script src="{{ URL::asset('/assets/front/js/lib/moment-with-locales.js') }}"></script>
<script src="{{ URL::asset('/assets/front/js/lib/bootstrap-datetimepicker.js') }}"></script>
pay@section('script')
<script type="text/javascript">
    var start_loc = '{{$route->start_latlong}}';
    var splitted = start_loc.split(',');
    function initMap() {
        const directionsService = new google.maps.DirectionsService();
        const directionsRenderer = new google.maps.DirectionsRenderer();
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 7,
            center: { lat: parseFloat(splitted[0]), lng: parseFloat(splitted[1]) },
        });

        directionsRenderer.setMap(map);
        calculateAndDisplayRoute(directionsService, directionsRenderer);
    }

    function calculateAndDisplayRoute(directionsService, directionsRenderer) {
        directionsService.route({
            origin: {
                query: '{{$route->start_location}}',
            },
            destination: {
                query: '{{$route->end_location}}',
            },
            travelMode: google.maps.TravelMode.DRIVING,
        }).then((response) => {
            directionsRenderer.setDirections(response);
        }).catch((e) => window.alert("Directions request failed due to " + status));
    }
    $(document).ready(function(){
        $("#book_ride").on('click', function(){
            $("#book_ride_form").modal({
                show:true
            });
        });
        $("#hidden_pickuptime").val(moment().add(12, 'hours').format('YYYY-MM-DD HH:mm'));
        $('#user_pickuptime').datetimepicker({
            format: 'DD-MM-YYYY hh:mm a',
            minDate: moment().add(12, 'hours')
        }).on('dp.change', function (e){
            var dates = e.date;
            var formatedValue = e.date.format('YYYY-MM-DD HH:mm');
            $("#hidden_pickuptime").val(formatedValue);
        });
        $("#book").on('click', function(){
            var params = $("#book_form").serializeArray();
            var post = {};
            $.each(params, function(i){
                let keys = params[i].name
                post[keys] = params[i].value
            });
            $(".is-invalid").removeClass('is-invalid')
            $.ajax({
                url: base+'/one-way/book',
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:post,
                beforeSend:function(){
                    $('.ajaxpreloader').show();
                },
                success:function(response){
                    if(response.status == false){
                        var elements = response.invalid_elem;
                        $.each(elements, function(i){
                            $("#"+elements[i]).addClass('is-invalid');
                        })
                    }else{
                        $("#book_ride_form").modal('hide');
                        $("#status_modelLabel").html('').html('Success');
                        $("#status_modelBody").html('').html(response.message);
                        $("#status_model").modal('show');
                        $("#user_fname,#user_lname,#user_email,#user_mobile").val('');
                    }
                    $('.ajaxpreloader').hide();
                }
            });
        });
    });
</script>

<script src="http://maps.google.com/maps/api/js?key={{env('GOOGLE_LOC_KEY')}}&callback=initMap"></script>
@endsection