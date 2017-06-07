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
	                        </div>
	                    </div>
                    	<div class="bootstrap-admin-panel-content">
                      	@if(Session::has('success'))
                          <div class="alert alert-success">
                            {{ Session::get('success') }}
                          </div>	
						 	          @endif
                        <div class='row'>
                <div class='col-xs-6 clearfix'>
                <form action='{{route('search_coach_info')}}' method='post'>
                  <input type="hidden" name="_token" value='{{csrf_token()}}'>
                  <div class='form-group clearfix'>
                    <label for='coach_appointmentDate' class='col-xs-2'>From Date:</label>
                      <div class='col-xs-10 col-xs-offset-3 input-group'>
                        <input type="date" name="coach_appointmentDate" class="form-control" placeholder="Enter athlate id here">
                      </div>
                  </div>
                  <div class='form-group clearfix'>
                    <label for='coach_name' class='col-xs-2'>Coach Name:</label>
                      <div class='col-xs-10 col-xs-offset-3 input-group'>
                        <input type="text" name="coach_name" class="form-control" placeholder="Enter Coach name here">
                      </div>
                  </div>
                </div>
                
                <div class='col-xs-6 clearfix'>
                   <div class='form-group clearfix'>
                    <label for='coach_expiryDate' class='col-xs-2'>To Date:</label>
                      <div class='col-xs-10 input-group'>
                        <input type="date" name="coach_expiryDate" class="form-control" placeholder="Enter coach name here">
                      </div>
                  </div>
                  <div class='form-group clearfix'>
                    <label for='coach_id' class='col-xs-2'>Coach ID</label>
                      <div class='col-xs-10 input-group'>
                        <input type="text" name="coach_id" class="form-control" placeholder="Enter coach id here">
                
                      </div>
                  </div>
                </div>
              </div>
              <div class="form-group clearfix">
                <div class="col-xs-12 input-group ">
                  <input type="submit" class="btn btn-primary pull-right" value="Search" name='search'>
                  </div>
              </div>
              </form>
              <div class="table-responsive">
        				 			<table class="table table-bordered table-striped" id="table">
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
                        @if($coachs->status==0)
        								<tr>
        									<td>{{$id++}}</td>
        									<td>{{$coachs->coach_id}}</td>
        									<td>{{$coachs->coach_fname.' '.$coachs->coach_mname.' '.$coachs->coach_lname}}</td>
                          <td>{{$coachs->coach_appointmentDate}}</td>
                          <td>{{$coachs->coach_passport}}</td>
        									<td>
							              <a class="btn btn-info glyphicon glyphicon-edit" data-toggle='modal' data-target='#editModal' onclick='fun_edit({{$coachs->coach_id}})'>Edit</a>
                            <a class="btn btn-danger glyphicon glyphicon-trash" data-toggle='modal' data-target='#seperationModal' onclick='coach_seperation({{$coachs->coach_id}})'>Seperate</a>
        									</td>
        								</tr>
                        @endif
        								@endforeach
        								</tbody>
        					 		</table>
                    </div>
                      <div class='form-group clearfix'>
                     <div class=" col-xs-12 input-group" style='margin-top: 20px' >
                      <a class='btn btn-success glyphicon glyphicon-plus pull-right' data-toggle='modal' data-target="#addModal" onclick="">Add Coach</a> 
                     </div>
                    </div>
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
          <div class='form-group clearfix'>
                  <label for='coach_title' class='col-xs-3'>Title:<a class="test">*</a></label>
                    <div class='col-xs-9 input-group'>
                      <select class='form-control' name='coach_title' required>
                        <option disabled selected>Select One</option>
                        <option>Ms.</option>
                        <option>Mrs.</option>
                        <option>Mr.</option>
                      </select>
                    </div>
                </div>
          <div class='form-group clearfix'>
            <label for='coach_fname' class='col-xs-3'>First Name:<a class="test">*</a></label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="coach_fname" class="form-control" placeholder="Enter first name here" required>
              </div>
          </div>
           <div class='form-group clearfix'>
            <label for='coach_mname' class='col-xs-3'>Middle Name:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="coach_mname" class="form-control" placeholder="Enter middle name here">
              </div>
          </div>
           <div class='form-group clearfix'>
            <label for='coach_lname' class='col-xs-3'>Last Name:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="coach_lname" class="form-control" placeholder="Enter last name here">
              </div>
          </div>
          <div class='form-group clearfix'>
            <label for='coach_dob' class='col-xs-3'>Date of Birth:<a class="test">*</a></label>
              <div class='col-xs-9 input-group'>
                <input type="date" name="coach_dob" class="form-control" placeholder="date" required>
              </div>
          </div>
         <div class='form-group clearfix'>
          <label for='type' class='col-xs-3'>Nationality:<a class="test">*</a></label>
            <div class='col-xs-9 input-group'>
              <select class='form-control' name='type' required>
                <option disabled selected>Select Nationality</option>
                
               <?php 
                  $serverName = "192.168.1.100"; 
                  $connectionInfo = array( "Database"=>"boc", "UID"=>"sa", "PWD"=>"P@ssw0rd");
                  $conn = sqlsrv_connect( $serverName, $connectionInfo);
                  if( $conn )
                  {
                     $sql="SELECT * from MASTER.mstCountry";
                     $stmt = sqlsrv_query( $conn, $sql );
                      if( $stmt === false) 
                      {
                          die( print_r( sqlsrv_errors(), true) );
                      }
                      while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
                      {
                        echo '<option value='.$row["CountryID"].'>'.$row['CountryName'].'</option>';
                      }
                      sqlsrv_free_stmt( $stmt);
                      }
                      else
                      {
                       echo "Connection could not be established.<br />";
                       die( print_r( sqlsrv_errors(), true));          
                      }
                ?>
              </select>
            </div>
         </div>
              <div class='form-group clearfix'>
            <label for='coach_phone' class='col-xs-3'>Phone:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="coach_phone" class="form-control" placeholder="enter phone number" id='coach_phone1'>
              </div>
          </div>
            <div class='form-group clearfix'>
            <label for='coach_mobile' class='col-xs-3'>Mobile:<a class="test">*</a></label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="coach_mobile" class="form-control" placeholder="enter mobile number" required id='coach_mobile1'>
              </div>
          </div>
            <div class='form-group clearfix'>
            <label for='coach_email' class='col-xs-3'>Email:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="coach_email" class="form-control" placeholder="enter email">
              </div>
          </div>
            <div class='form-group clearfix'>
            <label for='coach_passport' class='col-xs-3'>Passport NO/CID:<a class="test">*</a></label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="coach_passport" class="form-control" placeholder="enter passport number" required>
              </div>
          </div>
            <div class='form-group clearfix'>
            <label for='coach_appointmentDate' class='col-xs-3'>Appointment Date:<a class="test">*</a><a class="test">*</a></label>
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
            <label for='coach_contactAddress' class='col-xs-3'>Contact Address:<a class="test">*</a></label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="coach_contactAddress" class="form-control" placeholder="Contaxt Address" required>
            </div>
          </div>
             <div class='form-group'>
            <label for='coach_type' class='col-xs-3'>Type:<a class="test">*</a></label>
              <div class="col-xs-9 input-group">
               <input name="coach_type" type="radio" value="Paid" class="pull-left">Paid</br>
               <input name="coach_type" type="radio" value="Volunteer">Volunteer
            </div>
          </div>
       <div class="modal-footer">
          <button type="submit" class="btn btn-primary glyphicon glyphicon-ok" id='save1'>Save</button>
          <button type="button" class="btn btn-warning glyphicon glyphicon-remove" data-dismiss="modal">Cancel</button>
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
            <div class='form-group clearfix'>
                  <label for='coach_title' class='col-xs-3'>Title:</label>
                    <div class='col-xs-9 input-group'>
                      <select class='form-control' name='coach_title' id="coach_title" required>
                        <option></option>
                        <option>Ms.</option>
                        <option>Mrs.</option>
                        <option>Mr.</option>
                      </select>
                    </div>
                </div>
          <div class='form-group clearfix'>
            <label for='coach_fname' class='col-xs-3'>First Name:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="coach_fname" class="form-control" placeholder="Enter first name here" id="coach_fname" required>
              </div>
          </div>
           <div class='form-group clearfix'>
            <label for='coach_mname' class='col-xs-3'>Middle Name:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="coach_mname" class="form-control" placeholder="Enter middle name here" id="coach_mname">
              </div>
          </div>
           <div class='form-group clearfix'>
            <label for='coach_lname' class='col-xs-3'>Last Name:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="coach_lname" class="form-control" placeholder="Enter last name here" id="coach_lname">
              </div>
          </div>
          <div class='form-group clearfix'>
            <label for='coach_dob' class='col-xs-3'>Date of Birth:</label>
              <div class='col-xs-9 input-group'>
                <input type="date" name="coach_dob" class="form-control" placeholder="date" id="coach_dob" required>
              </div>
          </div>
          <div class='form-group clearfix'>
          <label for='type' class='col-xs-3'>Nationality:</label>
            <div class='col-xs-9 input-group'>
              <select class='form-control' name='type' id='type4'>
                <option></option>
                  <?php 
                      $country=App\Mst_country::all();
                      foreach($country as $nationality):
              ?>
                <option value="{{$nationality->country_id}}">{{$nationality->country_nationality}}</option>
               <?php endforeach ?>
              </select>
            </div>
         </div>
              <div class='form-group clearfix'>
            <label for='coach_phone' class='col-xs-3'>Phone:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="coach_phone" class="form-control" placeholder="enter phone number" id="coach_phone" value="0">
              </div>
          </div>
            <div class='form-group clearfix'>
            <label for='coach_mobile' class='col-xs-3'>Mobile:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="coach_mobile" class="form-control" placeholder="enter mobile number" id="coach_mobile" required>
              </div>
          </div>
            <div class='form-group clearfix'>
            <label for='coach_email' class='col-xs-3'>Email:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="coach_email" class="form-control" placeholder="enter email" id="coach_email">
              </div>
          </div>
            <div class='form-group clearfix'>
            <label for='coach_passport' class='col-xs-3'>Passport NO/CID:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="coach_passport" class="form-control" placeholder="enter passport number" id="coach_passport" required>
              </div>
          </div>
            <div class='form-group clearfix'>
            <label for='coach_appointmentDate' class='col-xs-3'>Appointment Date:</label>
              <div class='col-xs-9 input-group'>
                <input type="date" name="coach_appointmentDate" class="form-control" placeholder="date" id="coach_appointmentDate" required>
              </div>
          </div>
            <div class='form-group clearfix'>
            <label for='coach_expiryDate' class='col-xs-3'>Contact Expiry Date:</label>
              <div class='col-xs-9 input-group'>
                <input type="date" name="coach_expiryDate" class="form-control" placeholder="date" id="coach_expiryDate">
              </div>
          </div>
            <div class='form-group clearfix'>
            <label for='coach_contactAddress' class='col-xs-3'>Contact Address:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="coach_contactAddress" class="form-control" placeholder="Contaxt Address" id="coach_contactAddress" required>
            </div>
          </div>
             <div class='form-group' id='coach_type'>
            <label for='coach_type' class='col-xs-3'>Type:</label>
              <div class="col-xs-9 input-group">
               <input name="coach_type" type="radio" value="Paid" class="pull-left">Paid</br>
               <input name="coach_type" type="radio" value="Volunteer">Volunteer
            </div>
          </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary glyphicon glyphicon-ok" id='update'>Update</button>
        <button type="button" class="btn btn-warning glyphicon glyphicon-remove" data-dismiss="modal">Close</button>
      </div>
      <input type="hidden" name="edit_id" id='edit_id'>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- ends addModal-->
<!-- seperationModal begins-->
<div class="modal fade" id="seperationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Coach Seperation Information</h4>      </div>
      <div class="modal-body">
          <form action="{{route('coach_master.storeSeperation')}}" method="post">
          {{csrf_field()}}  
          <div class='form-group clearfix'>
            <label for='seperation_date' class='col-xs-3'>Seperation Date:</label>
              <div class='col-xs-9 input-group'>
                <input type="date" name="seperation_date" class="form-control" placeholder="" required>
              </div>
          </div>
           <div class='form-group clearfix'>
            <label for='seperation_comment' class='col-xs-3'>Comments:</label>
              <div class='col-xs-9 input-group'>
                <textarea name="seperation_comment" class="form-control" placeholder="Give comments here" required></textarea>
              </div>
          </div>
           
      <div class="modal-footer">
        <button type="submit" class="btn btn-info">Save</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
      </div>
      <input type="hidden" name="hidden_coach_id" id='hidden_coach_id'>
      </form>
      </div>
    </div>
  </div>
</div>
</br>
</br>
<script type="text/javascript">
   $(function()
    {
        $('#table').DataTable(
           {
          "ordering": false,
        "info":     false,
        'searching':false,
        'responsive':true
     }
          );
    });  
  function fun_edit(id)
  {
    var view_url = $("#hidden_show").val();
    $.ajax({
      url: view_url,
      type:"GET", 
      data: {"id":id}, 
      success: function(result){
       // console.log(result.coach_type);
        // console.log(result->coach_fname);
        $("#edit_id").val(result.coach_id);
        $("#type4").val(result.coach_nationality);
        $('#coach_title').val(result.coach_title)
        $("#coach_fname").val(result.coach_fname);
        $("#coach_mname").val(result.coach_mname);
        $("#coach_lname").val(result.coach_lname);
        $("#coach_dob").val(result.coach_dob);
        $("#coach_nationality").val(result.coach_nationality);
        $("#coach_phone").val(result.coach_phone);
        $("#coach_mobile").val(result.coach_mobile);
        $("#coach_email").val(result.coach_email);
        $("#coach_passport").val(result.coach_passport);
        $("#coach_appointmentDate").val(result.coach_appointmentDate);
        $("#coach_expiryDate").val(result.coach_expiryDate);
        $("#coach_contactAddress").val(result.coach_email);
        //$("#coach_type").val(result.coach_type);
        if(result.coach_type=='Paid')
        {
          $('#coach_type').find(':radio[name=coach_type][value="Paid"]').prop('checked',true)
        }
        else
          $('#coach_type').find(':radio[name=coach_type][value="Volunteer"]').prop('checked',true)
      }
    });
  }
  function coach_seperation(id)
  {
    $('#hidden_coach_id').val(id);
  }
//phone and mobile number validation during add 
  $('#save1').click(function()
  {
    
    var coach_mobile=$('#coach_mobile1').val();
    if(!$.isNumeric(coach_mobile) || coach_mobile.length!=8)
    {
      alert('Please enter 8 digit mobile number');
      return false;
    }
    else
      return true;
  });
//mobile number and phone validation on edit
$('#update').click(function()
{
  
  var coach_mobile=$('#coach_mobile').val();
 if(!$.isNumeric(coach_mobile) || coach_mobile.length!=8)
  {
    alert('Please enter 8 digits mobile number');
    return false;
  }
  else
    return true;
});
</script>
<style type="text/css">
a.test {
font-size: 20px;
color: red;
}
</style>
@endsection
@section('footer')
<div class="container">
    <div class="row">
        @include('includes.footer')
    </div>
</div>
@endsection


