@extends('layouts.app')
@section('nav-bar')
@include('includes.header')
@endsection
@section('side-bar')
<div class="container">
   <div class="row">
    @include('includes.sidebar')
   </div>
</div>
@endsection
@section('content')
<div class="container">
	<div class="row">
        <!-- content -->
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="text-muted bootstrap-admin-box-title">Secretariate Information
                        	</div>
                        </div>
                        <div class="bootstrap-admin-panel-content">
                        	<ul class='nav nav-pills nav-justified'>
						      <li id='org_info'><a href="#Org-info" data-toggle="tab">Organization Information</a></li>
						      <li id='contact_info'><a href="#Contact-info" data-toggle="tab">Contact Person Information</a></li>
						      <li class='active'><a href="#Management-info" data-toggle="tab">Secretariate Information</a></li>
						      <li id='advisory_info'><a href="#Advisory-info" data-toggle="tab">Executive Board Information</a></li>
				    		</ul>
				    		@if($errors->any())
								<div class="alert alert-danger">
								    @foreach($errors->all() as $error)
								        <p>{{ $error }}</p>
								    @endforeach
								</div>
							@endif
							@if(Session::has('success'))
							   	<div class="alert alert-success">
							        {{ Session::get('success') }}
							    </div>
						    @endif
						    <table class="table table-bordered table-striped table-responsive" id="table1">
					  			<thead>
									<tr>
										<th>Sl_no:</th>
										<th>Name</th>
										<th>Designation</th>
										<th>Appointment Date</th>
										<th>Action</th>
									</tr>	
								</thead>
								<tbody>
									<?php $id=1?>
									@foreach($management as $manage)
									@if($manage->status==0)
										<tr>
											<td>{{$id++}}</td>
											<td>{{$manage->mg_member_name}}</td>
											<td>{{$manage->mg_member_designation}}</td>
											<td>{{$manage->appointment_date}}</td>
											<td>
												<form class="form-group" action="{{route('management_committee.destroy',$manage->mg_member_id)}}" method='post'>
							              			<input type="hidden" name="_method" value="delete">
							              			<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <a class="btn btn-info glyphicon glyphicon-edit" data-toggle='modal' data-target='#editModal' onclick='fun_edit({{$manage->mg_member_id}})'>Edit</a>
							              			<button type="submit" class="btn btn-danger glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete this data');" name='name'>Remove
							              			</button>
							            		</form>
											</td>
										</tr>
									@endif
									@endforeach
								</tbody>
			  				</table>
                <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('management/view')}}">
			  				<div class='form-group'>
			  				<div class="row col-xs-10 col-xs-offset-6 input-group" style='margin-top:10px'>
								{{-- <a href="{{route('management_committee.create')}}" class="btn btn-default glyphicon glyphicon-plus">Add</a> --}}
                    <a class='btn btn-success glyphicon glyphicon-plus' data-toggle='modal' data-target="#addModal">Add</a> 
						        <a href="#Advisory-info-info" data-toggle="tab" class='btn btn-default col-xs-offset-1 next3'>Next</a>
						        <a href="#Advisory-info" data-toggle="tab" class='btn btn-default col-xs-offset-1 next3'>Skip</a>
						        <a href="{{route('sport_organization.index')}}" class='btn btn-warning col-xs-offset-1 glyphicon glyphicon-remove'>Cancel</a>
						    </div>
						   	</div>
			           	</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id='Advisory-info'>
    <script type="text/javascript">
	    $(function(){
	      $('.next3').click(function(){
	          window.location="{{url(route('advisory_board_members.index'))}}";
	      });
	      $('#advisory_info').click(function(){
	          window.location="{{url(route('advisory_board_members.index'))}}";
	      });
	    });
    </script>
	</div>
	<div id='Org-info'>
	<script type="text/javascript">
		$(function()
		{
			$('#org_info').click(function()
			{
				window.location="{{url(route('sport_organization.edit',Session::get('key1')))}}"
			});
		});
	</script>
</div>
<div id='Contact-info'>
	<script type="text/javascript">
		$(function()
		{
			$('#contact_info').click(function()
			{
				window.location="{{url(route('contact_person.edit',Session::get('key2')))}}"
			});
		});
	</script>
</div>
</div>
<!-- addModal begins -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Secretariate details</h4>
      </div>
      <div class="modal-body">
         <form action='{{route('management_committee.store')}}' method='post'>
           {{csrf_field()}}
           <div class='form-group'>
              <label for='mg_name' class='col-xs-3'>Name</label>
                  <div class='col-xs-9 input-group'>
                      <input type="text" name="mg_name" class="form-control" placeholder="Enter Secretariate  name" required>
                </div>
           </div>
           <div class='form-group'>
              <label for='mg_designation' class='col-xs-3'>Designation</label>
                  <div class='col-xs-9 input-group'>
                      <input type="text" name="mg_designation" class="form-control" placeholder="Enter Secretariate  designation" required>
                </div>
           </div>
           <div class='form-group'>
              <label for='mg_phone' class='col-xs-3'>Phone</label>
                  <div class='col-xs-9 input-group'>
                      <input type="text" name="mg_phone" class="form-control" placeholder="Enter Secretariate  phone number">
                </div>
           </div>
           <div class='form-group'>
            <label for='mg_email' class='col-xs-3'>Email</label>
                <div class='col-xs-9 input-group'>
                    <input type="email" name="mg_email" class="form-control" placeholder="Enter Secretariate  email">
              </div>
         </div>
         <div class='form-group'>
            <label for='mg_mobile' class='col-xs-3'>Mobile</label>
                <div class='col-xs-9 input-group'>
                    <input type="text" name="mg_mobile" class="form-control" placeholder="Enter Secretariate  mobile number" required>
              </div>
        </div>
         <div class='form-group'>
            <label for='mg_appointment' class='col-xs-3'>Appointment date</label>
                <div class='col-xs-9 input-group'>
                    <input type="date" name="mg_appointment" class="form-control" placeholder="enter Secretariate appointment date" required>
              </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default glyphicon glyphicon-ok" name='next' id='next'>Save</button>
          <button type="button" class="btn btn-warning glyphicon glyphicon-remove" data-dismiss="modal">Cancel</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- addModal ends-->
<!-- editModal begins -->
<div class="modal fade" id="editModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Secretariate Details</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('update_management')}}" method="post" id='form3'>
          {{csrf_field()}}
          <div class='form-group'>
          <label for='mg_name' class='col-xs-3'>Name</label>
            <div class='col-xs-9 input-group'>
              <input type="text" name="mg_name" class="form-control" placeholder="Enter management member name here" id='mg_name'>
            </div>
        </div>
        <div class='form-group'>
          <label for='mg_designation' class='col-xs-3'>Designation</label>
            <div class='input-group col-xs-9'>
              <input type="text" name="mg_designation" class="form-control" placeholder="enter member designation" id='mg_designation'>
            </div>
        </div>
        <div class='form-group'>
          <label for='mg_phone' class='col-xs-3'>Phone</label>
            <div class='input-group col-xs-9'>
              <input type="text" name="mg_phone" class="form-control" placeholder="enter phone number" id="mg_phone">
            </div>
        </div>
        <div class='form-group'>
          <label for='mg_email' class='col-xs-3'>Email</label>
            <div class='input-group col-xs-9'>
              <input type="text" name="mg_email" class="form-control" placeholder="enter email" id="mg_email">
            </div>
        </div>
        <div class='form-group'>
          <label for='mg_mobile' class='col-xs-3'>Mobile</label>
            <div class='input-group col-xs-9'>
              <input type="text" name="mg_mobile" class="form-control" placeholder="enter mobile number" id="mg_mobile">
            </div>
        </div>
        <div class='form-group'>
          <label for='appointment' class='col-xs-3'>Appointment Date</label>
            <div class='input-group col-xs-9'>
              <input type="text" name="appointment" class="form-control" placeholder="enter appointment date" id="appointment">
            </div>
        </div>
        <input type="hidden" id="edit_id" name="edit_id">
      <div class="modal-footer">
        <button type="submit" class="btn btn-info">Update</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- editModal ends -->

<script type="text/javascript">
	$(function(){
		$('#table1').DataTable({
			'searching':false,
			'paging':false,
			'info':false,
   			// dom: 'Bfrtip',
      //   	buttons: [
      //       'copy', 'csv', 'excel', 'pdf', 'print'
        	//]
   		 });
	});
  function fun_edit(id)
    {
      var view_url = $("#hidden_view").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          $("#edit_id").val(result.mg_member_id);
          $("#mg_name").val(result.mg_member_name);
          $("#mg_designation").val(result.mg_member_designation);
          $("#mg_phone").val(result.mg_member_phone);
          $("#mg_email").val(result.mg_member_email);
          $("#mg_mobile").val(result.mg_member_mobile);
          $("#appointment").val(result.appointment_date);
        }
      });
    }
</script>
@endsection
@section('footer')
<div class="container">
    <div class="row">
        @include('includes.footer')
   
    </div>
</div>
@endsection
          			
           		
    


  	
  	
	
		
		
		
		