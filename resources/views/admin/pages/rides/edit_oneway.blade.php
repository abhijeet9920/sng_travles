@extends('admin.layouts.layout')
@section('css-libraries')
<link rel="stylesheet" href="{{ URL::asset('/assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('/assets/admin/plugins/dropzone/min/dropzone.min.css') }}">
@endsection
@section('inline-css')
<style type="text/css">
    div.col-auto {
        -webkit-flex: 0 0 auto;
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
        width: auto;
        max-width: 100%;
    }
    span.lead {
        font-size: 1.25rem;
        font-weight: 300;
    }
</style>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>General Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add One Way</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form method="post" enctype="multipart/form-data" id="create_car" name="create_car" class="md-form" url="{{ url('admin/oneway').'/'.$car_id }}">
                    @csrf
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Car Configurations</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="{{ $route->title }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="description">{{ $route->description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="car_id">Car Model</label>
                                        <select class="custom-select form-control" id="car_id" name="car_id">
                                            <option value="">Please select a Car</option>
                                            @foreach($cars as $car)
                                                @if($car->id == $route->car->id)
                                                    <option value="{{$car->id}}" selected>{{ $car->model }}</option>
                                                @else
                                                    <option value="{{$car->id}}" >{{ $car->model }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div id="dz-image-preview" class="row mt-2 dz-image-preview">
                                            <div class="col-auto">
                                                <span class="preview"><img src="data:{{$route->car->images['mime']}};base64,{{$route->car->images['source']}}" width="664" height="374"></span>
                                            </div>
                                            <div class="col d-flex align-items-center">
                                                <p class="info lead">{{ $route->car->vehicle_type.' with '.$route->car->fuel.' variant. '.$route->car->seater_type.' passengers can seat comfortably. '.$route->car->is_carrier_attached }}</p>                    
                                            </div>
                                            <input type="hidden" name="car_rate" id="car_rate" value="1">
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                        <div class="col-md-6">
                            <!-- Form Element sizes -->
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Distance & Rates</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="start_location">Starting Location</label>
                                        <input type="text" class="form-control" id="start_location" name="start_location" placeholder="Enter Start Location" value="{{$route->start_location}}">
                                        <input type="hidden" id="start_latlong" name="start_latlong" value="{{$route->start_latlong}}">
                                        <input type="hidden" id="start_additional" name="start_additional">
                                    </div>
                                    <div class="form-group">
                                        <label for="end_location">Starting Location</label>
                                        <input type="text" class="form-control" id="end_location" name="end_location" placeholder="Enter Start Location" value="{{$route->end_location}}">
                                        <input type="hidden" id="end_latlong" name="end_latlong" value="{{$route->end_latlong}}">
                                        <input type="hidden" id="distance" name="distance" value="1">
                                        <input type="hidden" id="end_additional" name="end_additional">
                                    </div>
                                    <div class="form-group distance_div">
                                        <span id="kmspan">Total distance is {{ number_format((float)($route->distance/1000), 3, '.', '') }} kms</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="rate">Rate (Per KM)</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-rupee-sign"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="rate" id="rate" value="{{$route->rate}}">
                                            <div class="input-group-append">
                                                <div class="input-group-text"><i class="fas fa-car"></i></div>
                                            </div>
                                        </div>
                                        <code>Note: Rate is calculated from distance and your car rate per km. You can still change it.</code>
                                    </div>
                                    <div class="form-group">
                                        <label for="schedules">Days</label>
                                        <div class="input-group clearfix">
                                            @foreach($days as $day)
                                                <div class="icheck-primary d-inline col-sm-12 col-md-4">
                                                    <input type="checkbox" id="day_{{$day['text']}}" name="schedules[]" value="{{$day['index']}}">
                                                    <label for="day_{{$day['text']}}">{{ $day['text']}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    <!--/.col (right) -->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" disabled="">Submit</button>
                                    <a class="btn btn-info" href="{{ url('admin/oneway')}}">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection('content')
@section('js-libraries')
<script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_LOC_KEY')}}&libraries=places"></script>
@endsection
@section('inline-js')
<script type="text/javascript">
    var rad = function(x) {
        return x * Math.PI / 180;
    };
    google.maps.event.addDomListener(window, 'load', function () {
        var places = new google.maps.places.Autocomplete(document.getElementById('start_location'));
        google.maps.event.addListener(places, 'place_changed', function () {
            var place = places.getPlace();
            var address = place.formatted_address;
            var latitude = place.geometry.location.lat();
            var longitude = place.geometry.location.lng();
            document.getElementById('end_location').disabled = false;
            document.getElementById("start_latlong").value = latitude+','+longitude;
            var obj = {'lat':latitude,'long':longitude,'map':place.url,"address":place.address_components};
            document.getElementById("start_additional").value = btoa(JSON.stringify(obj));
        });
    });
    google.maps.event.addDomListener(window, 'load', function () {
        var places = new google.maps.places.Autocomplete(document.getElementById('end_location'));
        google.maps.event.addListener(places, 'place_changed', function () {
            var place = places.getPlace();
            var address = place.formatted_address;
            var latitude = place.geometry.location.lat();
            var longitude = place.geometry.location.lng();
            document.getElementById("end_latlong").value = latitude+','+longitude;
            starting_latlong = document.getElementById("start_latlong").value.split(",");
            starting_lat = starting_latlong[0];
            starting_long = starting_latlong[1];
            var R = 6378137; // Earth’s mean radius in meter
            var dLat = rad(place.geometry.location.lat() - starting_lat);
            var dLong = rad(place.geometry.location.lng() - starting_long);
            var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
            Math.cos(rad(place.geometry.location.lat())) * Math.cos(rad(place.geometry.location.lat())) *
            Math.sin(dLong / 2) * Math.sin(dLong / 2);
            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            var d = parseFloat((R * c)/1000).toFixed(3);
            document.getElementsByClassName('distance_div')[0].style.display = 'block';
            document.getElementById('distance').value = (R * c);
            document.getElementById('kmspan').innerHTML = 'Total distance is '+d+' kms.';
            document.getElementById('rate').value = d*parseFloat(document.getElementById('car_rate').value);
            var obj = {'lat':latitude,'long':longitude,'map':place.url,"address":place.address_components};
            document.getElementById("end_additional").value = btoa(JSON.stringify(obj));
        });
    });
    $(document).ready(function(){
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
                        $("#rate").val($("#distance").val()*response.rate);
                    }
                });
            }
        });
    });
</script>
@endsection