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
	                        <div class="text-muted bootstrap-admin-box-title clearfix">Coach Information
	                         <a class='btn btn-success glyphicon glyphicon-plus pull-right' data-toggle='modal' data-target="#addModal">Add</a> 
	                        </div>
	                    </div>
                    	<div class="bootstrap-admin-panel-content">
                      	@if(Session::has('success'))
                          <div class="alert alert-success">
                            {{ Session::get('success') }}
                          </div>	
						 	          @endif
        				 			<table class="table table-bordered table-striped table-responsive" id="table1">
        				 				<thead>
        									<tr>
        										<th>Sl. No:</th>
        										<th>Coach ID</th>
        										<th>Coach Name</th>
                            <th>Appointment Date</th>
                            <th>Passport No</th>
        										<th style='width:20%'>Action</th>
        									</tr>	
        								</thead>
        								<tbody>
        								<?php $id=1 ?>
        								@foreach($coach as $coachs)
        								<tr>
        									<td>{{$id++}}</td>
        									<td>{{$coachs->coach_id}}</td>
        									<td>{{$coachs->coach_fname.' '.$coachs->coach_mname.' '.$coachs->coach_lname}}</td>
                          <td>{{$coachs->coach_appointmentDate}}</td>
                          <td>{{$coachs->coach_passport}}</td>
        									<td>
        										<form>

        							              <a class="btn btn-info glyphicon glyphicon-edit" data-toggle='modal' data-target='#editModal' onclick='fun_edit({{$coachs->coach_id}})'>Edit</a>
                                    <a class="btn btn-danger glyphicon glyphicon-remove" data-toggle='modal' data-target='#editModal' onclick='fun_edit({{$coachs->coach_id}})'>Seperate</a>
        							              
                                   
        					
        							            </form>
        									</td>
        								</tr>
        								@endforeach
        								</tbody>
        					 		</table>
                      <input type="hidden" name="hidden_show" id="hidden_show" value="{{route('view_coach')}}">
                     </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add coach modal begins-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Coach</h4>
      </div>
      <div class="modal-body">
       <form action="{{route('coach_master.store')}}" method="post">
          {{csrf_field()}}
          <div class='form-group'>
                  <label for='coach_title' class='col-xs-3'>Title</label>
                    <div class='col-xs-9 input-group'>
                      <select class='form-control' name='coach_title' required>
                        <option></option>
                        <option>Ms.</option>
                        <option>Mrs.</option>
                        <option>Mr.</option>
                      </select>
                    </div>
                </div>
          <div class='form-group'>
            <label for='coach_fname' class='col-xs-3'>First Name:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="coach_fname" class="form-control" placeholder="Enter first name here" required>
              </div>
          </div>
           <div class='form-group'>
            <label for='coach_mname' class='col-xs-3'>Middle Name:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="coach_mname" class="form-control" placeholder="Enter middle name here">
              </div>
          </div>
           <div class='form-group'>
            <label for='coach_lname' class='col-xs-3'>Last Name:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="coach_lname" class="form-control" placeholder="Enter last name here">
              </div>
          </div>
          <div class='form-group'>
            <label for='coach_dob' class='col-xs-3'>Date of Birth:</label>
              <div class='col-xs-9 input-group'>
                <input type="date" name="coach_dob" class="form-control" placeholder="date" required>
              </div>
          </div>
           <div class='form-group'>
                  <label for='coach_nationality' class='col-xs-3'>Nationality:</label>
                    <div class='col-xs-9 input-group'>
                      <select class='form-control' name='coach_nationality' required>
                        <option></option>
                        <option>Ms.</option>
                        <option>Mrs.</option>
                        <option>Mr.</option>
                      </select>
                    </div>
                </div>
              <div class='form-group'>
            <label for='coach_phone' class='col-xs-3'>Phone:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="coach_phone" class="form-control" placeholder="enter phone number">
              </div>
          </div>
            <div class='form-group'>
            <label for='coach_mobile' class='col-xs-3'>Mobile:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="coach_mobile" class="form-control" placeholder="enter mobile number" required>
              </div>
          </div>
            <div class='form-group'>
            <label for='coach_email' class='col-xs-3'>Email:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="coach_email" class="form-control" placeholder="enter email">
              </div>
          </div>
            <div class='form-group'>
            <label for='coach_passport' class='col-xs-3'>Passport NO:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="coach_passport" class="form-control" placeholder="enter passport number" required>
              </div>
          </div>
            <div class='form-group clearfix'>
            <label for='coach_appointmentDate' class='col-xs-3'>Appointment Date:</label>
              <div class='col-xs-9 input-group'>
                <input type="date" name="coach_appointmentDate" class="form-control" placeholder="date" required>
              </div>
          </div>
            <div class='form-group clearfix'>
            <label for='coach_expiryDate' class='col-xs-3'>Contact Expiry Date:</label>
              <div class='col-xs-9 input-group'>
                <input type="date" name="coach_expiryDate" class="form-control" placeholder="date">
              </div>
          </div>
            <div class='form-group clearfix'>
            <label for='coach_contactAddress' class='col-xs-3'>Contact Address:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="coach_contactAddress" class="form-control" placeholder="Contaxt Address" required>
            </div>
          </div>
             <div class='form-group'>
            <label for='coach_type' class='col-xs-3'>Type:</label>
              <div class="col-xs-9 input-group">
               <input name="coach_type" type="radio" value="Paid" class="pull-left">Paid</br>
               <input name="coach_type1" type="radio" value="Volunteer">Volunteer
            </div>
          </div>
       <div class="modal-footer">
          <button type="submit" class="btn btn-default glyphicon glyphicon-ok">Save</button>
          <button type="button" class="btn btn-default glyphicon glyphicon-remove" data-dismiss="modal">Cancel</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- ends addModal-->
<!-- editModal begins-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Coach Information</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('update_coach')}}" method="post">
          {{csrf_field()}}
            <div class='form-group'>
                  <label for='coach_title' class='col-xs-3'>Title</label>
                    <div class='col-xs-9 input-group'>
                      <select class='form-control' name='coach_title' id="title" required>
                        <option></option>
                        <option>Ms.</option>
                        <option>Mrs.</option>
                        <option>Mr.</option>
                      </select>
                    </div>
                </div>
          <div class='form-group'>
            <label for='coach_fname' class='col-xs-3'>First Name:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="coach_fname" class="form-control" placeholder="Enter first name here" id="fname" required>
              </div>
          </div>
           <div class='form-group'>
            <label for='coach_mname' class='col-xs-3'>Middle Name:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="coach_mname" class="form-control" placeholder="Enter middle name here" id="mname">
              </div>
          </div>
           <div class='form-group'>
            <label for='coach_lname' class='col-xs-3'>Last Name:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="coach_lname" class="form-control" placeholder="Enter last name here" id="lname">
              </div>
          </div>
          <div class='form-group'>
            <label for='coach_dob' class='col-xs-3'>Date of Birth:</label>
              <div class='col-xs-9 input-group'>
                <input type="date" name="coach_dob" class="form-control" placeholder="date" id="dob" required>
              </div>
          </div>
           <div class='form-group'>
                  <label for='coach_title' class='col-xs-3'>Nationality:</label>
                    <div class='col-xs-9 input-group'>
                      <select class='form-control' name='coach_title' id="nationality" required>
                        <option></option>
                        <option>Ms.</option>
                        <option>Mrs.</option>
                        <option>Mr.</option>
                      </select>
                    </div>
                </div>
              <div class='form-group'>
            <label for='coach_phone' class='col-xs-3'>Phone:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="coach_phone" class="form-control" placeholder="enter phone number" id="phone">
              </div>
          </div>
            <div class='form-group'>
            <label for='coach_mobile' class='col-xs-3'>Mobile:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="coach_mobile" class="form-control" placeholder="enter mobile number" id="mobile" required>
              </div>
          </div>
            <div class='form-group'>
            <label for='coach_email' class='col-xs-3'>Email:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="coach_email" class="form-control" placeholder="enter email" id="email">
              </div>
          </div>
            <div class='form-group'>
            <label for='coach_passport' class='col-xs-3'>Passport NO:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="coach_passport" class="form-control" placeholder="enter passport number" id="passport" required>
              </div>
          </div>
            <div class='form-group clearfix'>
            <label for='coach_appointmentDate' class='col-xs-3'>Appointment Date:</label>
              <div class='col-xs-9 input-group'>
                <input type="date" name="coach_appointmentDate" class="form-control" placeholder="date" id="appointment" required>
              </div>
          </div>
            <div class='form-group clearfix'>
            <label for='coach_expiryDate' class='col-xs-3'>Contact Expiry Date:</label>
              <div class='col-xs-9 input-group'>
                <input type="date" name="coach_expiryDate" class="form-control" placeholder="date" id="expiry">
              </div>
          </div>
            <div class='form-group clearfix'>
            <label for='coach_contactAddress' class='col-xs-3'>Contact Address:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="coach_contcatAddress" class="form-control" placeholder="Contaxt Address" id="contact" required>
            </div>
          </div>
             <div class='form-group'>
            <label for='coach_type' class='col-xs-3'>Type:</label>
              <div class="col-xs-9 input-group" id="type">
               <input name="coach_type" type="radio" value="Paid" class="pull-left">Paid</br>
               <input name="coach_type" type="radio" value="Volunteer">Volunteer
            </div>
          </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-info">Update</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
      </div>
      <input type="hidden" name="edit_id" id='edit_id'>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- editModal ends here-->
<script type="text/javascript">
  $(function()
  {
    $('#table1').dataTable();
  });
  function fun_edit(id)
  {
    var view_url = $("#hidden_show").val();
    // alert(view_url);
    $.ajax({
      url: view_url,
      type:"GET", 
      data: {"id":id}, 
      success: function(result){
        // console.log(result);
        $("#edit_id").val(result.coach_id);
        
        $("#fname").val(result.coach_fname);
        $("#mname").val(result.coach_fmname);
        $("#lname").val(result.coach_lname);
        $("#dob").val(result.coach_dob);
        $("#nationality").val(result.coach_nationality);
        $("#phone").val(result.coach_phone);
        $("#mobile").val(result.coach_mobile);
        $("#email").val(result.coach_email);
        $("#passport").val(result.coach_passport);
        $("#appointment").val(result.coach_appointmentdate);
        $("#expiry").val(result.coach_expiryDate);
        $("#contact").val(result.coach_email);
        $("#type").val(result.coach_type);
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



