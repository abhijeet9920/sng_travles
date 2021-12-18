@extends('admin.layouts.layout')
@section('css-libraries')
<link rel="stylesheet" href="{{ URL::asset('/assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('/assets/admin/plugins/dropzone/min/dropzone.min.css') }}">
@endsection
@section('inline-css')
<style type="text/css">
    div#dz-image-preview{
        display: none;
    }
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
                            <li class="breadcrumb-item active">General Form</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form method="post" enctype="multipart/form-data" id="create_car" name="create_car" class="md-form">
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
                                        <label for="car_model">Car Model</label>
                                        <select class="custom-select form-control" id="car_model" name="car_model">
                                            @foreach($model as $item)
                                                <option value="{{$item}}">{{ $item}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="fuel_type">Fuel Type</label>
                                        <select class="custom-select form-control" id="fuel_type" name="fuel_type">
                                            @foreach($fuel as $item)
                                                <option value="{{$item}}">{{ $item}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="vehicle_type">Vehicle Type</label>
                                        <select class="custom-select form-control" id="vehicle_type" name="vehicle_type">
                                            @foreach($vehicle_ty as $item)
                                                <option value="{{$item}}">{{ $item}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="seater_typ">Seater Type</label>
                                        <select class="custom-select form-control" id="seater_typ" name="seater_typ">
                                            @foreach($seater_typ as $item)
                                                <option value="{{$item}}">{{ $item}}</option>
                                            @endforeach
                                        </select>
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
                                    <h3 class="card-title">Car Meta</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Car Image</label>
                                        <div class="input-group custom-file">
                                            <input type="file" id="car_image" name="car_image" accept="image/png, image/jpeg" class="custom-file-input">
                                            <label class="custom-file-label" for="car_image">Choose file</label>
                                        </div>
                                        <div id="dz-image-preview" class="row mt-2 dz-image-preview">
                                            <div class="col-auto">
                                                <span class="preview">
                                                    <img src="">
                                                </span>
                                            </div>
                                            <div class="col d-flex align-items-center">
                                                <p class="mb-0">
                                                    <span id="fname" class="lead" data-dz-name=""></span>
                                                    (<span id="fsize" style="font-weight: bold;"></span>)
                                                </p>
                                                <strong class="error text-danger" data-dz-errormessage=""></strong>                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="rate">Rate (Per KM)</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-rupee-sign"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="rate">
                                            <div class="input-group-append">
                                                <div class="input-group-text"><i class="fas fa-car"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label for="rate">Is Carrier Attached</label>
                                        <div class="input-group">
                                            <div class="icheck-primary d-inline col-md-6 col-sm-6">
                                                <input type="radio" id="carrier_yes" name="is_carrier" value="Yes">
                                                <label for="carrier_yes">Yes
                                                </label>
                                            </div>
                                            <div class="icheck-primary d-inline col-md-6 col-sm-6">
                                                <input type="radio" id="carrier_no" name="is_carrier" value="No">
                                                <label for="carrier_no">No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    <!--/.col (right) -->
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
<script src="{{ URL::asset('/assets/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
@endsection
@section('inline-js')
<script type="text/javascript">
    $(document).ready(function(){
        bsCustomFileInput.init();
        $("#car_image").on('change', function(event){
            if (typeof (FileReader) != "undefined") {
                var reader = new FileReader();
                console.log();
                $("#fname").html('').html($(this)[0].files[0].name);
                filesize = parseFloat($(this)[0].files[0].size/1024).toFixed(2);
                $("#fsize").html('').html(filesize+" KB");
                reader.onload = function (thefile) {
                    var image = new Image();
                    image.src = thefile.target.result;
                    image.onload = function() {
                        // access image size here 
                        $("span.preview").children('img').attr({'src':thefile.target.result, 'height':this.height*0.2, 'width':this.width*0.2});
                    };
                }
                $("#dz-image-preview").show();
            } else {
                alert("This browser does not support FileReader.");
            }

        });
    });
</script>
@endsection