@extends('front.layouts.layout')
@section('css-libraries')
<link href="{{ URL::asset('/assets/front/css/nouislider.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/assets/front/css/nouislider.pips.css') }}" rel="stylesheet">  
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
</style>
@endsection


@section('content')
<!--Page Title-->
    <section class="page-title" style="background-image:url(/assets/front/images/background/page-title-1.jpg);">
        <div class="auto-container">
            <h1>Our One Way Trips</h1>
            <div class="bread-crumb-outer">
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ url('/')}}">Home</a></li>
                    <li class="active">One Way</li>
                </ul>
            </div>
        </div>
    </section>
    
    
    <!--Sidebar Page-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Content Side-->
                <div class="content-side col-lg-9 col-md-8 col-sm-12 col-xs-12">
                    <!--News Section-->
                    <section class="cars-section">
                        <div class="row clearfix">
                            <div id="oneways"></div>
                        </div>
                    </section>
                </div>
                <!--Content Side-->

                <!--Sidebar-->
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 padd-left-40">
                    <aside class="sidebar">


                        <!-- Car Types -->
                        <div class="sidebar-widget car-types">
                            <div class="widget-box">
                                <div class="sidebar-title"><h3>Car Types</h3></div>
                                <ul class="list">
                                    <li><a class="clearfix"><span class="pull-left all">All</span> <span class="pull-right">({{$filter['vehicle']['All']}})</span></a></li>
                                    @foreach($type as $item)
                                        <li><a class="clearfix filter {{ (!isset($filter['vehicle'][$item]))? 'disabled_input' : '' }}" id="{{$item}}" type="vehicle"><span class="pull-left">{{ $item }}</span><span class="pull-right">({{$filter['vehicle'][$item] ?? 0}})</span></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        
                        <!-- Range Widget -->
                        <div class="sidebar-widget rangeslider-widget">
                            <div class="widget-box">
                                <div class="sidebar-title"><h3>Price Range</h3></div>
                                
                                <div class="outer-box">
                                    <div class="range-slider-price" id="range-slider-price"></div>
                                    <div class="form-group clearfix">
                                        <div class="pull-left">
                                            <span class="left-val">Rs.<input type="text" class="val-box text-left" id="min-value-rangeslider" value="{{number_format((float)($filter['rates']['min_rate']), 2, '.', '')}}"></span> - <span class="right-val">Rs.<input type="text" class="val-box text-right" id="max-value-rangeslider" value="{{number_format((float)($filter['rates']['min_rate']+100), 2, '.', '')}}"></span>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        </div>

                        <!-- Fuel Types -->
                        <div class="sidebar-widget fuel-types">
                            <div class="widget-box">
                                <div class="sidebar-title"><h3>Fuel Types</h3></div>
                                <ul class="list">
                                    <li><a class="clearfix"><span class="pull-left">All</span><span class="pull-right">({{ $filter['fuel']['All']}})</a></li>
                                    @foreach($fuel as $item)
                                        <li><a class="clearfix filter {{ (!isset($filter['fuel'][$item]))? 'disabled_input' : '' }}" id="{{$item}}" type="fuel"><span class="pull-left">{{ $item }}</span><span class="pull-right">({{ $filter['fuel'][$item] ?? 0}})</span></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </aside>


                </div>
                <!--Sidebar-->
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
                                                <input type="hidden" class="form-control" id="hidden_oneway" name="hidden_oneway" value="">
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
    </div>
@endsection
@section('js-libraries')
<script src="{{ URL::asset('/assets/front/js/lib/nouislider.js') }}"></script>
<script src="{{ URL::asset('/assets/front/js/lib/moment-with-locales.js') }}"></script>
<script src="{{ URL::asset('/assets/front/js/lib/bootstrap-datetimepicker.js') }}"></script>
@endsection
@section('script')
<script>
    function loadRides(params){
        $.ajax({
            url: base+'/one-way/lists',
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:params,
            beforeSend:function(){
                $('.ajaxpreloader').show();
            },
            success:function(response){
                $('.ajaxpreloader').hide();
                $("#oneways").html(response.data);
            }
        });
    }
    var priceRange = document.getElementById('range-slider-price');
    var minPrice = parseFloat("{{ $filter['rates']['min_rate'] }}");
    var maxPrice = parseFloat("{{ $filter['rates']['max_rate'] }}");
    noUiSlider.create(priceRange, {
        start: [ minPrice, minPrice+100 ],
        limit: maxPrice,
        behaviour: 'drag',
        connect: true,
        range: {
            'min': minPrice,
            'max': maxPrice
        }
    });

    var limitFieldMin = document.getElementById('min-value-rangeslider');
    var limitFieldMax = document.getElementById('max-value-rangeslider');

    priceRange.noUiSlider.on('set', function( values, handle ){
        (handle ? limitFieldMax : limitFieldMin).value = values[handle];
        loadRides({mode:"view", "filter":"range", "min":limitFieldMin.value, "max":limitFieldMax.value});
    });

    $(document).ready(function(){
        loadRides({mode:"view"});
        $(".filter").on('click', function(){
            var filter = $(this).attr('type');
            var value = $(this).attr('id');
            var params = {
                "filter":filter,
                "value":value,
                "mode":"view"
            };
            loadRides(params);
        });
        $(".all").on('click', function(){
            loadRides({mode:"view"});
        });
        $("#hidden_pickuptime").val(moment().add(12, 'hours').format('YYYY-MM-DD HH:mm'));
        $('#user_pickuptime').datetimepicker({
            format: 'DD-MM-YYYY hh:mm a',
            minDate: moment().add(12, 'hours')
        }).on('dp.change', function (e){
            var dates = e.date;
            var formatedValue = e.date.format('YYYY-MM-DD HH:mm');
            $("#hidden_pickuptime").val(formatedValue);
        });;
        $(".open_booking_form").on('click', function(){
            $("#book_ride_form").modal({
                show:true
            });
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
    })
</script>
@endsection