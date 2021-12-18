@extends('admin.layouts.layout')
@section('css-libraries')
<link rel="stylesheet" href="{{ URL::asset('/assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('/assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('/assets/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
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
	    <section class="content">
		    <div class="container-fluid">
                @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first()}}
                </div>
                @endif
		        <div class="row">
		            <div class="col-12">
		                <!-- /.card -->
		                <div class="card">
		                    <div class="card-header">
		                        <h3 class="card-title">Our Oneway Rides</h3>
		                    </div>
		                    <!-- /.card-header -->
		                    <div class="card-body">
		                    	<table id="oneway_lists" class="table table-bordered table-striped"></table>
		                    </div>
		                    <!-- /.card-body -->
		                </div>
		                <!-- /.card -->
		            </div>
		            <!-- /.col -->
		        </div>
		        <!-- /.row -->
		    </div>
	    <!-- /.container-fluid -->
		</section>
	</div>
@endsection('content')
@section('js-libraries')
<script src="{{ URL::asset('/assets/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('/assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('/assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('/assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('/assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('/assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
@endsection
@section('inline-js')
<script type="text/javascript">
    $(document).ready(function(){
        $(".alert").fadeOut(1000);
    	var cars_list = $('#oneway_lists').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
	            "url": "{{ url('admin/oneway/lists') }}",
	            "dataType": "json",
	            "type": "POST",
	            "data":{ 
	             	_token: "{{csrf_token()}}"
	            }
            },
            "columns": [
                {"data":"title","title":"Title"},
                {"data":"start_location","title":"Starting Point", render: function(data, type, row){
                    return '<span title="'+row.start_location+'">'+row.short_starting+'</pan>';
                }},
                {"data":"end_location","title":"Ending Point", render: function(data, type, row){
                    return '<span title="'+row.end_location+'">'+row.short_ending+'</pan>';
                }},
                {"data":"vehicle", "title":"Available Car", "orderable":false, render:function(data, type, row){
                    return '<span title="'+row.vehicle_additional+'">'+row.vehicle+'</pan>'; 
                }},
                {"data":"distance","title":"Distance", "render":function(data, type, row){
                    return parseFloat(row.distance/1000).toFixed(3)+' km';
                }},
                {"data":"rate","title":"Rate"},
                {"title":"Actions", render:function(data, type, row){
                    return '<a href="'+base+'/oneway/'+row.id+'" class="btn btn-primary">View</a>';
                }}
            ]	 
        });
    });
</script>
@endsection