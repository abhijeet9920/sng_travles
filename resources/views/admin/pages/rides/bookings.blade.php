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
		                        <h3 class="card-title">Our Oneway Bookings</h3>
		                    </div>
		                    <!-- /.card-header -->
		                    <div class="card-body">
		                    	<table id="oneway_bookings" class="table table-bordered table-striped"></table>
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
    <div class="modal fade" id="modal-confirm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirm</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure&#63;</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="hidden" name="enq_id" id="enq_id">
                    <button type="button" class="btn btn-primary" id="confirm">Yes</button>
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
        $(".alert").fadeOut(1000);
    	var cars_list = $('#oneway_bookings').DataTable({
            "processing": true,
            "ordering": false,
            "serverSide": true,
            "ajax":{
	            "url": "{{ url('admin/oneway/bookings') }}",
	            "dataType": "json",
	            "type": "POST",
	            "data":{ 
	             	_token: "{{csrf_token()}}"
	            }
            },
            "columns": [
                {"data":"title","title":"Ride Title", render: function(data, type, row){
                    return '<span title="'+row.ride_short+'">'+row.title+'</pan>';
                }},
                {"data":"name","title":"Booked By"},
                {"data":"contact_no","title":"Contact No."},
                {"data":"booking_time","title":"Booking Time"},
                {"title":"Actions", render:function(data, type, row){
                    if(row.is_confirmed){
                        return '<span style="background-color: #10d310;">Ride is Confirmed</span>';
                    }
                    return '<button data-id="'+row.id+'" class="btn btn-primary is_confirm">Confirm Booking</button>';
                }}
            ]	 
        });
        $("body").on('click', '.is_confirm', function(){
            $("#enq_id").val($(this).data('id'));
            $("#modal-confirm").modal({
                show:true
            });
        });

        $("#confirm").on('click', function(){
            $.ajax({
                url: "{{ url('/admin/oneway/bookings/confirm')}}",
                type:"POST",
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                data:{
                    oneway:$("#enq_id").val()
                },
                beforeSend:function(){
                    Pace.restart();
                },
                success:function(response){
                    $("#response_p").html(response.message);
                    $("#modal-confirm").modal('hide');
                    $("#modal-status").modal({
                        show:true
                    });
                    setTimeout(function(){
                        $("#modal-status").modal('hide');
                    }, 1500);
                    $('#oneway_bookings').DataTable().ajax.reload();
                }
            });
        });
    });
</script>
@endsection