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
              <div class="text-muted bootstrap-admin-box-title clearfix">Training Information
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
            <ul class='nav nav-pills nav-justified'>
              <li class='active'><a href="#" data-toggle="tab">Training Information</a></li>
              <li id='newSchedule'><a href="#" data-toggle="tab">Training Schedule</a></li>
              <li id='attendance'><a href="#" data-toggle="tab">Training Attendance</a></li>
            </ul>
              <div style='margin-top: 20px'></div>
              <form action="{{--route('sport_organization.store')--}}" method="post">
                {{csrf_field()}}
                  <div class='form-group'>
                    <label for='ath_id' class='col-xs-2'>AthleteID </label>
                      <div class='col-xs-10 input-group'>
                        <input type="text" name="ath_id" class="form-control" placeholder="Enter athlate id here">
                      </div>
                  </div>
                  <div class='form-group'>
                    <label for='ath_name' class='col-xs-2'>Athlete Name </label>
                      <div class='col-xs-10 input-group'>
                        <input type="text" name="ath_name" class="form-control" placeholder="Enter athlate name here">
                      </div>
                  </div>
                  <div class='form-group'>
                    <label for='type' class='col-xs-2'>Sport</label>
                      <div class='col-xs-10 input-group'>
                        <select class='form-control' name='type'>
                          <option value="" disabled selected>Select sport</option>
                        </select>
                      </div>
                  </div>
                   <div class="form-group clearfix">
                    <div class="col-xs-12 input-group ">
                      <input type="submit" class="btn btn-default pull-right" value="Search">
                    </div>
                </div>
              </form>
               <table class="table table-bordered table-striped table-responsive" id="table1">
                 <thead>
                    <tr>
                        <th>Sl_no:</th>
                        <th>Sport</th>
                        <th>Athlete ID</th>
                        <th>Athlete Name</th>
                        <th>CID</th>
                        <th>DOB</th>
                        <th>Action</th>
                    </tr>   
                </thead>
                <tbody>
                 <?php $id=1?>
                 @foreach($athlete_info as $athlete)
                  <tr>
                    <td>{{$id++}}</td>
                    <td>{{$athlete->displayAsport->sport_name}}</td>
                    <td>{{$athlete->athlete_id}}</td>
                    <td>{{$athlete->athlete_fname.' '.$athlete->athlete_lname}}</td>
                    <td>{{$athlete->athlete_cid}}</td>
                    <td>{{$athlete->athlete_dob}}</td>
                    <td>
                        <form class="form-group" action="" method='post'>
                            <input type="hidden" name="_method" value="delete">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <a href="{{--route('training.show')--}}" data-toggle='modal' data-target='#viewDetails' class="btn btn-info" onclick='view_details({{$athlete->athlete_id}})'>Details</a>
                            <a href="{{--route('training.showschedule')--}}" class="btn btn-primary" data-toggle='modal' data-target='#viewTrainingSchedule'>Training Schedule</a>
                        </form>
                        <input type="hidden" name="hidden_id" id='hidden_id' value='{{$athlete->athlete_id}}'>
                    </td>
                  </tr>
                  @endforeach
              </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<input type="hidden" name="view_details" id='view_details' value='{{route('show_athlete_info')}}'>
<input type="hidden" name="view_address" id='view_address' value='{{route('show_athlete_address')}}'>
<input type="hidden" name="view_associated_sport" id='view_associated_sport' value='{{route('show_associated_sport')}}'>

<!-- view details modal begins-->
<div class="modal fade" id="viewDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">View Details</h4>
      </div>
      <div class="modal-body">

        <div class='col-md-6'>
        <label>Title:</label>
        <input type="text" name="title" id='title' style='border-style:none'>
        <br>
        <label>First Name:</label>
         <input type="text" name="fname" id='fname' style='border-style:none'><br>
        <label>Last Name:</label>
        <input type="text" name="lname" id='lname' style='border-style:none'><br>
        <label>Occupation:</label>
        <input type="text" name="occupation" id='occupation' style='border-style:none'><br>
        <label>Date of Birth:</label>
        <input type="text" name="birth_date" id='birth_date' style='border-style:none'><br>
        <label>Place of Birth:</label>
        <input type="text" name="birth_place" id='birth_place' style='border-style:none'><br>
        <label>Gender:</label>
        <input type="text" name="gender" id='gender' style='border-style:none'><br>
        <label>Height:</label>
        <input type="text" name="height" id='height' style='border-style:none'><br>
        <label>Weight:</label>
        <input type="text" name="weight" id='weight' style='border-style:none'><br>
        <label>Father's Name:</label>
        <input type="text" name="father_name" id='father_name' style='border-style:none'><br>
        <label>Phone No.:</label>
        <input type="text" name="phone_no" id='phone_no' style='border-style:none'><br>
        <label>Mobile No:</label>
        <input type="text" name="mobile_no" id='mobile_no' style='border-style:none'><br>
        <label>Email:</label>
        <input type="text" name="email" id='email' style='border-style:none'><br>
        <label>Passport No.:</label>
        <input type="text" name="passport" id='passport' style='border-style:none'><br>
        <label>CID:</label>
        <input type="text" name="cid" id='cid' style='border-style:none'><br>
        <label>Associated Sport:</label>
        <input type="text" name="associated_sport" id='associated_sport' style='border-style:none'>
      </div>
      <div class='col-md-6' id='photo'>
      </div>
      <div class='clearfix'></div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default glyphicon glyphicon-remove" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
</div>
<!-- ends viewDetails modal-->
<!-- viewTrainingSchedule modal begins-->
<div class="modal fade" id="viewTrainingSchedule" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content"> 
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">View Training Schedule</h4>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-striped table-responsive" id="table1">
           <thead>
              <tr>
                  <th>Sl_no:</th>
                  <th>Day</th>
                  <th>Date</th>
                  <th>Training Type</th>
                  <th>Session Name</th>
                  <th>Start Time</th>
                  <th>End Time</th>
              </tr>   
          </thead>
          <tbody>
           <?php $id=1?>
            <tr>
              <td>{{$id++}}</td>
              <td>Tuesday</td>
              <td>21/3/17</td>
              <td>football training</td>
              <td>dfdfggf</td>
              <td>9</td>
              <td>5</td>
            </tr>
          </tbody>
        </table>
        <div class="modal-footer">
        <button type="button" class="btn btn-default glyphicon glyphicon-remove" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
</div>
<!-- ends viewTrainingSchedule modal-->
<script type="text/javascript">
  $(function(){
    $('#table1').DataTable();
  });
</script>
<script type="text/javascript">
  $(function()
  {
    $('#newSchedule').click(function()
    {
      window.location="{{url(route('training.create'))}}";
    });
    $('#attendance').click(function()
    {
      window.location="{{url(route('training.attendance'))}}";
    });
  });
  function view_details(id)
  {
    var view_url=$('#view_details').val();
    var view_address=$('#view_address').val();
    var view_sport=$('#view_associated_sport').val();
    var image_path='{{URL::asset('/images/')}}';
    $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          console.log(result);
          $("#title").val(result.athlete_title);
          $("#fname").val(result.athlete_fname);
          $("#lname").val(result.athlete_lname);
          $("#occupation").val(result.athlete_occupation);
          $("#birth_date").val(result.athlete_dob);
          $("#birth_place").val(result.athlete_pob);
          $("#gender").val(result.athlete_gender);
          $("#height").val(result.athlete_height);
          $("#weight").val(result.athlete_weight);
          $("#father_name").val(result.athlete_fathername);
          $("#passport").val(result.athlete_passportNo);
          $("#cid").val(result.athlete_cid);
          $('#photo').html('<img style="border:3px solid gray; border-radius: 7px; margin-left: 20px;" height="200px" width="200px" src='+image_path+'/'+result.athlete_photo+'>');
          var sport_id=result.athlete_associatedSport;
           $.ajax({
            url: view_sport,
            type:"GET", 
            data: {"id":sport_id}, 
            success: function(result){
              //console.log(result);
              $("#associated_sport").val(result.sport_name);
            }
          });
         
        }
      });

     $.ajax({
        url: view_address,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          $("#phone_no").val(result.Caddress_phone);
          $("#mobile_no").val(result.Caddress_mobile);
          $("#email").val(result.Caddress_email);
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