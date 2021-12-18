@extends('front.layouts.layout')
@section('content')
<section class="billing-section">
	<div class="auto-container">
    	<div class="sec-title"><h2>Billing Details</h2></div>
    	<!--Billing Form-->
        <div class="billing-form default-form">
        	<form method="post">
        		@csrf
            	<!--Column-->
                <div class="row clearfix">
                	
                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    	<div class="field-label">First Name <span class="req">*</span></div>
                        <div class="field-inner"><input type="text" name="field-name" value="" placeholder="Your First Name"></div>
                    </div>
                    
                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    	<div class="field-label">Last Name <span class="req">*</span></div>
                        <div class="field-inner"><input type="text" name="field-name" value="" placeholder="Your Last Name"></div>
                    </div>
                    
                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    	<div class="field-label">Email Address <span class="req">*</span></div>
                        <div class="field-inner"><input type="text" name="field-name" value="" placeholder="Your Email Address"></div>
                    </div>
                    
                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    	<div class="field-label">Phone <span class="req">*</span></div>
                        <div class="field-inner"><input type="text" name="field-name" value="" placeholder="Your Phone"></div>
                    </div>
                    
                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    	<div class="field-label">Pickup Date <span class="req">*</span></div>
                        <div class="field-inner"><input type="text" class="datepicker" id="field-one" name="field-name" value="" placeholder="Select the Start Date"><label class="input-icon" for="field-one"><span class="fa fa-calendar"></span></label></div>
                    </div>
                    
                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    	<div class="field-label">Drop off Date <span class="req">*</span></div>
                        <div class="field-inner"><input type="text" class="datepicker" id="field-two" name="field-name" value="" placeholder="Select the End Date"><label class="input-icon" for="field-one"><span class="fa fa-calendar"></span></label></div>
                    </div>
                    
                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    	<div class="field-label">Select the Timings <span class="req">*</span></div>
                        <div class="field-inner"><input type="text" id="field-three" name="field-name" value="" placeholder="Select the Timings"><label class="input-icon" for="field-three"><span class="fa fa-clock-o"></span></label></div>
                    </div>
                    
                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                        <div class="field-label">No of Passengers <span class="req">*</span></div>
                        <select name="passengers">
                            <option>Passengers</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </div>
                    
                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    	<div class="field-label">Pickup Locations <span class="req">*</span></div>
                        <div class="field-inner"><input type="text" id="pickup" name="pickup" value="" placeholder="Select the Location"><label class="input-icon" for="field-three"><span class="fa fa-map-marker"></span></label></div>
                    </div>
                    
                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                        <div class="field-label">Destinations <span class="req">*</span></div>
                        <div class="field-inner"><input type="text" id="desctination" name="desctination" value="" placeholder="Select the Location"><label class="input-icon" for="field-three"><span class="fa fa-map-marker"></span></label></div>
                    </div>
                    
                    <!-- <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <div class="check-box">
                            <input type="checkbox" id="cbox-one"><label for="cbox-one"><span class="icon"><span class="square"></span><span class="fa fa-check"></span></span> Create an Account?</label>
                        </div>
                    </div>-->
                    
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    	<div class="field-label">Order Note <span class="req">*</span></div>
                        <div class="field-inner"><textarea name="message" placeholder="Write your Message"></textarea></div>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
@section('js-libraries')
<script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_LOC_KEY')}}&libraries=places"></script>
@endsection
@section('script')
<script type="text/javascript">
    var rad = function(x) {
        return x * Math.PI / 180;
    };
    google.maps.event.addDomListener(window, 'load', function () {
        var places = new google.maps.places.Autocomplete(document.getElementById('pickup'));
        google.maps.event.addListener(places, 'place_changed', function () {
            var place = places.getPlace();
            var address = place.formatted_address;
            var latitude = place.geometry.location.lat();
            var longitude = place.geometry.location.lng();
            document.getElementById('end_location').disabled = false;
            $("#start_placeid").val(place.place_id);
            $("#start_latlong").val(latitude+','+longitude);
            var obj = {'lat':latitude,'long':longitude,'map':place.url,"address":place.address_components, "id":place.place_id};
            $("#start_additional").val(btoa(JSON.stringify(obj)));
        });
    });
    google.maps.event.addDomListener(window, 'load', function () {
        var places = new google.maps.places.Autocomplete(document.getElementById('desctination'));
        google.maps.event.addListener(places, 'place_changed', function () {
            var place = places.getPlace();
            var address = place.formatted_address;
            var latitude = place.geometry.location.lat();
            var longitude = place.geometry.location.lng();
            $("#end_latlong").val(latitude+','+longitude);
            starting_latlong = $("#start_latlong").val().split(",");
            starting_lat = starting_latlong[0];
            starting_long = starting_latlong[1];
            //document.getElementById('rate').value = d*parseFloat(document.getElementById('car_rate').value);
            var obj = {'lat':latitude,'long':longitude,'map':place.url,"address":place.address_components, "id":place.place_id};
            $("#end_additional").val(btoa(JSON.stringify(obj)));
            $.ajax({
                url: base+'/oneway/distance',
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    origin:$("#start_placeid").val(),
                    destination:place.place_id
                },
                beforeSend:function(){
                    Pace.restart();
                },
                success:function(response){
                    if(response.status != false){
                        $("#kmspan").html('Distance is '+response.distance.text);
                        $('.distance_div').show();
                        $("#distance").val(response.distance.value);
                        $("#rate").val(parseFloat(response.distance.value/1000).toFixed(2)*$("#car_rate").val());

                    }
                }
            });
        });
    });
    $(document).ready(function(){
        $( '.datepicker' ).datepicker();
        $("#car_id").on('change', function(){
            var car_id = $(this).val();
            if(car_id != ''){
                $.ajax({
                    url : base + '/cars/'+car_id,
                    beforeSend:function(){
                        Pace.restart();
                    },
                    success:function(response){
                        $('span.preview').children('img').attr({'src':'data:'+response.images.mime+';base64,'+response.images.source});
                        $("p.info").html(response.vehicle_type+' with '+response.fuel+' variant. '+response.seater_type+' passengers can seat comfortably. '+response.is_carrier_attached);
                        $("#car_rate").val(response.rate);
                        $('div#dz-image-preview').show();
                        var distance = parseFloat($("#distance").val()/1000).toFixed(2);
                        $("#rate").val(distance*response.rate);
                    }
                });
            }
        });
    });
</script>
@endsection