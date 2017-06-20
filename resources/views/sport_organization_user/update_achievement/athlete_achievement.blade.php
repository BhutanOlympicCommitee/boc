@extends('layouts.app')
@section('nav-bar')
@include('includes.header')
@endsection
@section('side-bar')
  <div class="row">
    @include('includes.sidebar')
  </div>
@endsection
@section('content')
<div class="container-fluid">
  <div class="row">
    <!-- content -->
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-11 col-md-offset-1">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="text-muted bootstrap-admin-box-title">Update Athlete achievement information
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
              <ul class='nav nav-pills nav-justified'>
                <li id='reports'><a href="#Report" data-toggle="tab">Activity Report</a></li>
                <li class="active" id='participants'><a href="#Participant" data-toggle="tab">Participant Information</a></li>
              </ul>
              <div class='tab-content'>
              </br>
                <form action='{{route('search_participants')}}' method='post'>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class='form-group clearfix'>
                    <label class='col-xs-2'>CID/Student ID</label>
                    <div class='col-xs-10 input-group'>
                      <input type="text" name="cid" class="form-control" id='form-cid'>
                    </div>
                  </div>
                  <div class='form-group clearfix'>
                    <label class='col-xs-2'>Name</label>
                    <div class='col-xs-10 input-group'>
                      <input type="text" name="name" class="form-control">
                    </div>  
                  </div>
                
                <div class='form-group clearfix'>
                 {{-- <a class='btn btn-success glyphicon glyphicon-plus pull-right' data-toggle='modal' name='searchAthlete' data-target="#addModal"> Search</a> --}}
                 <button type='submit' class='btn btn-primary pull-right' name='search' id='search'>Search</button>
               </div>
             </form>
             <!-- show if the match is found-->
             @if(sizeof($athlete_achievement)!=0)
             <div class="table-responsive">
                <table class="table table-bordered table-striped" id="table">
               <thead>
                <tr>
                  <th>Sl_no:</th>
                  <th>CID/Student ID</th>
                  <th>Name</th>
                  <th>Dzongkhag</th>
                  <th>Gewog</th>
                  <th>Village</th>
                  <th>Father's Name</th>
                  <th>Action</th>
                </tr>   
              </thead>
              <tbody>
                <?php $id=1;?>
                @foreach($athlete_achievement as $athletes)
                <tr>
                  <td>{{$id++}}</td>
                  <td>{{$athletes->athlete_cid}}</td>
                  <td>{{$athletes->athlete_name}}</td>
                  <td>{{$athletes->displayDzongkhag->dzongkhag_name}}</td>
                  <td>{{$athletes->displayGewog->gewog_name}}</td>
                  <td>{{$athletes->village}}</td>
                  <td>{{$athletes->fathername}}</td>
                  <td>
                    <button class='btn btn-info' data-toggle='modal' data-target='#updateParticipantsModal' onclick='addAthlete({{$athletes->athlete_id}})'>Update</button>
                  </td>
                </tr>
                @endforeach
              </tbody>
              </table>
            </div>
              @else
                <script type="text/javascript">
                  $(function()
                  {
                    $('#addModal').modal('show');
                  });
                </script>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- if particpants not found show this form -->
 <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog " role="document">
     <div class="modal-content">
       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Athlete Information</h4>
      </div>
      <div class="modal-body">
       <form action="{{route('update_achievement.storeAthlete')}}" method="post">
         {{csrf_field()}}
         <div class='form-group clearfix'>
          <label for='athlete_cid' class='col-xs-3'>CID/Student ID:<a class="test">*</a></label>
          <div class='col-xs-9 input-group'>
            <input type="text" name="athlete_cid" class="form-control" id='cid' required value="{{Session::get('cid')}}">
          </div>  
        </div>
        <div class='form-group clearfix'>
          <label for='athlete_name' class='col-xs-3'>Name:<a class="test">*</a></label>
          <div class='col-xs-9 input-group'>
            <input type="text" name="athlete_name" class="form-control" required>
          </div>  
        </div>
        <div class='form-group clearfix'>
          <label for='athlete_dob' class='col-xs-3'>Date of Birth:<a class="test">*</a></label>
          <div class='col-xs-9 input-group'>
            <input type="date" name="athlete_dob" class="form-control" required>
          </div>  
        </div>
        <div class='form-group clearfix'>
          <label for='dzongkhag_id' class='col-xs-3'>Dzongkhag:<a class="test">*</a></label> 
          <div class='col-xs-9 input-group'>
            <select class='form-control' name='dzongkhag_id' id='type1' required>
                  <option disabled selected>Select Dzongkhag</option>
                   <?php 
                  $serverName = "192.168.1.100"; 
                  $connectionInfo = array( "Database"=>"boc", "UID"=>"sa", "PWD"=>"P@ssw0rd");
                  $conn = sqlsrv_connect( $serverName, $connectionInfo);
                  if( $conn )
                  {
                     $sql="SELECT * from MASTER.mstDzonkhag";
                     $stmt = sqlsrv_query( $conn, $sql );
                      if( $stmt === false) 
                      {
                          die( print_r( sqlsrv_errors(), true) );
                      }
                      while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
                      {
                        echo '<option value='.$row["DzonkhagID"].'>'.$row['Name'].'</option>';
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
        <label for='gewog_id' class='col-xs-3'>Gewog:<a class="test">*</a></label> 
        <div class='col-xs-9 input-group'>
        <select class='form-control' name='gewog_id' id='gewog'required>
                         <option></option>

                      </select>
      </div>
    </div>
    <div class='form-group clearfix'>
      <label for='village' class='col-xs-3'>Village:<a class="test">*</a></label>
      <div class='col-xs-9 input-group'>
        <input type="text" name="village" class="form-control" required>
      </div>  
    </div>
    <div class='form-group clearfix'>
      <label class='col-xs-3' for='occupation_id'>Occupation:<a class="test">*</a></label> 
      <div class='col-xs-9 input-group'>
        <select name="occupation_id" class="form-control" required>
          <option value="0">
            Select the occupation
          </option>
          <?php 
          $occupations = App\Athlete_occupation::all();
          foreach($occupations as $occupation):
            ?>
          <option value="{{$occupation->occupation_id}}">{{$occupation->occupation_name}}</option>
        <?php endforeach;?>
      </select> 
    </div>
  </div>
  <div class='form-group clearfix'>
    <label for='fathername' class='col-xs-3'>Father's Name:</label>
    <div class='col-xs-9 input-group'>
      <input type="text" name="fathername" class="form-control">
    </div>  
  </div>
  <div class='form-group clearfix'>
    <label for='mobile' class='col-xs-3'>Mobile:<a class="test">*</a></label>
    <div class='col-xs-9 input-group'>
      <input type="text" name="mobile" class="form-control" required>
    </div>  
  </div>
  <div class='form-group clearfix'>
    <label for='email' class='col-xs-3'>Email:</label>
    <div class='col-xs-9 input-group'>
      <input type="email" name="email" class="form-control">
    </div>  
  </div>
  <div class='form-group clearfix'>
    <label for='contact_address' class='col-xs-3'>Contact Address:</label>
    <div class='col-xs-9 input-group'>
      <textarea name="contact_address" class="form-control" rows=3></textarea> 
    </div>
  </div>

  <div class="modal-footer">
    <button type="submit" class="btn btn-primary glyphicon glyphicon-ok" id='save'>Save</button>
    <button type="button" class="btn btn-warning glyphicon glyphicon-remove" data-dismiss="modal">Cancel</button>
  </div>
</form>
</div>
</div>
</div>
</div>

<!-- update Modal -->
<div class="modal fade" id="updateParticipantsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Update participants details</h4>
      </div>
      <div class="modal-body">
       <form action="{{route('update_achievement.storeAthleteAchievement')}}" method='post'>
         {{csrf_field()}}
         <div class="form-group clearfix">
          <label for="activity_id"  class='col-xs-3'>Activity</label> 
          <div class='col-xs-9 input-group'>
              <?php 
              $activity = App\Tbl_sport_org_activities_approved::where('activity_id',Session::get('activity_id'))->first();
              
                ?>
                <input type="text" class="form-control" name="activity_id" value="{{$activity->approved_activity_name}}" disabled>
        </div>
      </div>
      <div class="form-group clearfix">
        <label for=""  class='col-xs-3'>Activity Timeline</label> 
        <div class='col-xs-9 input-group'>
          <input type="text" id="actual_timeline" class="form-control" value="{{$activity->approved_actual_timeline}}" disabled>
      </div>
    </div>
    <div class="form-group clearfix">
      <label for=""  class='col-xs-3'>Activity Venue</label> 
      <div class='col-xs-9 input-group'>
         <input type="text" id="activity_venue" class="form-control" value="{{$activity->approved_activity_venue}}" disabled>
    </div>
  </div>
  <div class="form-group clearfix">
    <label for="sport_id"  class='col-xs-3'>Sport</label> 
    <div class='col-xs-9 input-group'>
      <select name="sport_id" class="form-control" required>
        <option value="0">
          Select the sport
        </option>
        <?php 
        $asso_sports = App\Associated_Sport::all();
        foreach($asso_sports as $asso_sport):
          ?>
        <option value="{{$asso_sport->sport_id}}">{{$asso_sport->sport_name}}</option>
      <?php endforeach;?>
    </select> 
  </div>
</div>
<div class="form-group clearfix">
  <label for="medal_id"  class='col-xs-3'>Medal/Certificate</label> 
  <div class='col-xs-9 input-group'>
    <select name="medal_id" class="form-control" required>
      <option value="0">
        Select metal
      </option>
      <?php 
      $medals = App\Enum_Medal::all();
      foreach($medals as $medal):
        ?>
      <option value="{{$medal->medal_id}}">{{$medal->Type}}</option>
    <?php endforeach;?>
  </select> 
</div>
</div>
<div class='form-group clearfix'>
  <label for='remarks' class='col-xs-3'>Remarks</label>
  <div class='col-xs-9 input-group'>
    <textarea name="remarks" class="form-control" rows=3></textarea> 
  </div>
</div>
<input type="hidden" name="hidden_athlete_id" id='hidden_athlete_id'>
<input type="hidden" name="hidden_view1" id='hidden_view1' value='{{route('view_update_achievement')}}'> 
<div class="modal-footer">
  <button type="submit" class="btn btn-default glyphicon glyphicon-ok" name='next' id='next'>Save</button>
  <button  class="btn btn-warning glyphicon glyphicon-remove" data-dismiss="modal">Cancel</button>
</div>
</form>
</div>
</div>
</div>
</div>
</br>
</br>
<!-- end update modal -->
<script type="text/javascript">
// $(function()
// {
//   $('#reports').click(function(){
//    window.location="{{URL::previous()}}";   
//  });
// });
$(function()
    {
      $('#reports').attr('class','disabled');
    });
function addAthlete(id)
{
  $('#hidden_athlete_id').val(id);
}
$(function()
{
  $('#table').dataTable();
});

 $('#activity_id').change(function()
  {
    var acti_id=$(this).val();
    var view_url = $("#hidden_view1").val();
    $.ajax({
      url: view_url,
      type:"GET", 
      data: {"id":acti_id}, 
      success: function(result){
      //console.log(result);
      $('#actual_timeline').empty();
       $.each(result,function(key,val)
      {
        $('#actual_timeline').append('<option value="'+val.activity_id+'">'+val.approved_actual_timeline+'</option>');
      });

        $('#activity_venue').empty();
       $.each(result,function(key,val)
      {
        $('#activity_venue').append('<option value="'+val.activity_id+'">'+val.approved_activity_venue+'</option>');
      });
      }
    });
  });
// $('#search').click(function()
// {
//   var cid=$('#form-cid').val();
//   $.session.set('cid1',cid);
//   if(!$.isNumeric(cid) || cid.length!=11)
//   {
//     alert('Please enter 11 digits numeric cid number');
//     return false;
//   }
//   else 
//   {
//     return true;
//   }
// });
$('#save').click(function()
{
  var cid=$('#cid').val();
  if(!$.isNumeric(cid) || cid.length!=11)
    {
      alert('Please enter 11 digits numeric cid number');
      return false;
    }
    else 
      return true;
});
$('#table').dataTable({
  'searching':false,
  'responsive':true
});
 $('#type1').change(function()
  {
    var gewg_id=$(this).val();
    var view1_url = "{{route("view1_athlete_address")}}";
    $.ajax({
      url: view1_url,
      type:"GET", 
      data: {"id":gewg_id}, 
      success: function(result){
        console.log(result);
      $('#gewog').empty();
      $("#gewog").prepend("<option disabled selected>Select Gewog</option>");
       $.each(result,function(key,val)
      {
        $('#gewog').append('<option value="'+val.GeowgID+'">'+val.Description+'</option>');
      });
      }
    });
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