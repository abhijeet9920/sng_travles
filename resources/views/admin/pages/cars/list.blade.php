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
		        <div class="row">
		            <div class="col-12">
		                <!-- /.card -->
		                <div class="card">
		                    <div class="card-header">
		                        <h3 class="card-title">Our Cars</h3>
		                    </div>
		                    <!-- /.card-header -->
		                    <div class="card-body">
		                    	<table id="car_lists" class="table table-bordered table-striped"></table>
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
	<div class="modal fade" id="img_preview">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="ekko-lightbox-container" style="height: auto;"><div class="ekko-lightbox-item fade"></div><div class="ekko-lightbox-item fade in show"><img src="" class="img-fluid" style="width: 100%;"></div></div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
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
    	var cars_list = $('#car_lists').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
	            "url": "{{ url('admin/cars/lists') }}",
	            "dataType": "json",
	            "type": "POST",
	            "data":{ 
	             	_token: "{{csrf_token()}}"
	            }
            },
            "columns": [
                { "data": "model", "title":"Model" },
                { "data": "fuel_type", "title":"Fuel Variant" },
                { "data": "seater_type", "title":"No. Of Passangers" },
                { "data": "is_carrier_attached", "title":"Carrier Available?" },
                {
                	"mRender": function(data, type, full) {
                		return '<a href="javascript:void(0)" class="btn btn-info btn-sm showimg" data-source="'+full.images.source+'" data-type="'+full.images.mime+'">View Image</a>';
  					}
                }
            ]	 
        });

        $("#car_lists tbody").on('click','.showimg', function(e){
        	$(".img-fluid").attr('src', 'data:'+$(this).data('type')+';base64,'+$(this).data('source'));
        	$('#img_preview').modal('show'); 
        });
    });
</script>
@endsection