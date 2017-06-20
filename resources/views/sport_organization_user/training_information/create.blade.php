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
              <div class="text-muted bootstrap-admin-box-title clearfix">Training Schedule
             <!--  <a href="{{route('training.index')}}" class='btn btn-success pull-right'>Back</a> -->
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
              <ul class='nav nav-pills nav-justified'>
                <li id='newSchedule' class='active'><a href="#" data-toggle="tab"> Training Schedule</a></li>
                <li id='trainingInfo'><a href="#" data-toggle="tab">Training Information</a></li>
                
                <li id='attendance'><a href="#" data-toggle="tab">Training Attendance</a></li>
              </ul>
              <div style='margin-top: 20px'></div>
              <form action="{{route('search_training_schedule')}}" method="post">
                {{csrf_field()}}
                <div class='row'>
                  <div class='col-xs-6 clearfix'>
                    <div class='form-group'>
                    <label for='from' class='col-xs-2'>From:</label>
                      <div class='col-xs-10 input-group'>
                        <input type="date" name="from" class="form-control">
                      </div>
                   </div> 
                   <div class='form-group'>
                    <label for='day' class='col-xs-2'>Day</label>
                      <div class='col-xs-10 input-group'>
                        <select class='form-control' name='day'>
                          <option value="" disabled selected>Select day</option>
                          <?php $enum_day=App\EnumDaytable::all();
                        foreach($enum_day as $day):
                          ?>
                        <option value={{$day->day_id}}>{{$day->day_name}}</option>
                      <?php endforeach ?>
                        </select>
                      </div>
                  </div>
                  </div>
                  <div class='col-xs-6 clearfix'>
                    <div class='form-group'>
                    <label for='to' class='col-xs-2'>To </label>
                      <div class='col-xs-10 input-group'>
                        <input type="date" name="to" class="form-control">
                      </div>
                   </div>
                   <div class='form-group'>
                    <label for='coach' class='col-xs-2'>Coach</label>
                      <div class='col-xs-10 input-group'>
                        <select class='form-control' name='coach'>
                          <option value="" disabled selected>Select coach</option>
                          <?php 
                          $user=App\User::where('id',Session::get('user_id'))->first();
                          $coach=App\Tbl_Coach::where('sport_org_id',$user->sport_organization)->get();
                            foreach($coach as $coach):
                              ?>
                            <option value={{$coach->coach_id}}>{{$coach->coach_fname.' '.$coach->coach_mname.' '.$coach->coach_lname}}</option>
                          <?php endforeach ?>
                        </select>
                      </div>
                  </div>
                  </div>
                </div>
                  <div class="form-group clearfix">
                    <div class="col-xs-12 input-group ">
                      <input type="submit" class="btn btn-primary pull-right" value="Search">
                    </div>
                </div>
              </form>
              <div class="table-responsive">
               <table class="table table-bordered table-striped" id="table1">
                 <thead>
                    <tr>
                        <th>Sl_no:</th>
                        <th>Date</th>
                        <th>Day</th>
                        <th>Session Name</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Coach</th>
                        <th>Action</th>
                    </tr>   
                </thead>
                <tbody>
                 <?php $id=1?>
                 @foreach($training_info as $training)
                  <tr>
                    <td>{{$id++}}</td>
                    <td>{{$training->date}}</td>
                    <td>{{$training->day->day_name}}</td>
                    <td>{{$training->session_name}}</td>
                    <td>{{$training->start_time}}</td>
                    <td>{{$training->end_time}}</td>
                    <td>{{$training->coach->coach_fname.' '.$training->coach->coach_mname.' '.$training->coach->coach_lname}}</td>
                    <td>
                      <form class="form-group" action="" method='post'>
                          <input type="hidden" name="_method" value="delete">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <a class="btn btn-info" data-toggle='modal' data-target='#editTrainingSchedule' onclick='editTrainingSchedule({{$training->training_id}},{{$training->day_id}},{{$training->session_type}},{{$training->coach_id}})'>Edit</a>
                           <a href="{{route('showTrainingParticipants',$training->training_id)}}" class="btn btn-primary"> Participants</a>
                        </form>
                    </td>
                  </tr>
                  @endforeach
              </tbody>
              </table>
              </div>
               <input type="hidden" name="hidden_edit" id="hidden_edit" value="{{route('get_training_schedule')}}">

              <div class='form-group clearfix'>
                <div class=" col-xs-12 input-group" style='margin-top: 20px' >
                  <a href='' class='btn btn-success glyphicon glyphicon-plus pull-right' data-toggle='modal' data-target='#addScheduleModal'>Create New Schedule</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- create schedule modal begins -->
<div class="modal fade" id="addScheduleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create New Schedule</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('training.store')}}" method="post">
          {{csrf_field()}}
          <div class='row'>
            <div class='col-xs-6 clearfix'>
               <div class='form-group'>
                <label for='date' class='col-xs-2'>Date:<a class="test">*</a></label>
                  <div class='col-xs-10 input-group'>
                    <input type="date" name="date" class="form-control datepicker" placeholder="yy-mm-dd" required id='date'>
                  </div>
              </div>
              <div class='form-group clearfix'>
                <label for='session_name' class='col-xs-3'>Session Name:<a class="test">*</a></label>
                  <div class='col-xs-9 input-group'>
                    <input type="text" name="session_name" class="form-control" placeholder="Enter session name here" required>
                  </div>
              </div>
              <div class='form-group clearfix'>
              <label for='start_time' class='col-xs-2'>Start Time:<a class="test">*</a></label>
                <div class='col-xs-10 input-group'>
                  <input type="time" name="start_time" class="form-control timepicker" placeholder="HH:mm:ss" required>
                </div>
            </div>
            <div class='form-group'>
                <label for='venue' class='col-xs-2'>Venue:<a class="test">*</a></label>
                  <div class='col-xs-10 input-group'>
                    <input type="text" name="venue" class="form-control" placeholder="Enter venue here" required>
                  </div>
              </div>
              <div class='form-group'>
                <label for='comments' class='col-xs-3'>Comments</label>
                  <div class='col-xs-9 input-group'>
                    <textarea name='comments' class='form-control'></textarea>
                  </div>
              </div>
            </div>
            <div class='col-xs-6 clearfix'>
             
              <div class='form-group'>
                <label for='day' class='col-xs-2'>Day:<a class="test">*</a></label>
                  <div class='col-xs-10 input-group'>
                    <select class='form-control' name='day' required id='day'>
                      <option></option>
                    </select>
                  </div>
              </div>
              <div class='form-group clearfix'>
                <label for='session_type' class='col-xs-3'>Session Type:<a class="test">*</a></label>
                  <div class='col-xs-9 input-group'>
                    <select class='form-control' name='session_type' required>
                      <option value="" disabled selected>Select session type</option>
                        <?php $session_type=App\EnumSessionType::all();
                        foreach($session_type as $session):
                          ?>
                        <option value={{$session->session_type_id}}>{{$session->session_type_name}}</option>
                      <?php endforeach ?>
                    </select>
                  </div>
              </div>
               <div class='form-group clearfix'>
                <label for='end_time' class='col-xs-2'>End Time:<a class="test">*</a></label>
                  <div class='col-xs-10 input-group'>
                    <input type="time" name="end_time" class="form-control" placeholder="HH:mm:ss" required>
                  </div>
              </div>
              <div class='form-group'>
                <label for='coach' class='col-xs-2'>Coach:<a class="test">*</a></label>
                  <div class='col-xs-10 input-group'>
                    <select class='form-control' name='coach' required>
                      <option value="" disabled selected>Select coach</option>
                      <?php 
                          $user=App\User::where('id',Session::get('user_id'))->first();
                          $coach=App\Tbl_Coach::where('sport_org_id',$user->sport_organization)->get();
                            foreach($coach as $coach):
                              ?>
                            <option value={{$coach->coach_id}}>{{$coach->coach_fname.' '.$coach->coach_mname.' '.$coach->coach_lname}}</option>
                          <?php endforeach ?>
                    </select>
                  </div>
              </div>
            </div>
          </div> 
          <div style='margin-top:20px'>  
          <table class="table table-bordered table-striped table-responsive" id="table1">
             <thead>
                <tr>
                    <th>Sl_no:</th>
                    <th>Athlete ID</th>
                    <th>Athlete Name</th>
                    <th>CID</th>
                    <th>Date of Birth</th>
                    <th>Action</th>
                </tr>   
            </thead>
            <tbody>
             <?php $id=1;
              $associated=array();
              $user=App\User::where('id',Session::get('user_id'))->first();
              $associated_sport=App\Associated_Sport::where('sport_org_id',$user->sport_organization)->pluck('sport_id');
              $associated1=explode(',',$associated_sport);
              foreach($associated1 as $asso)
              {
                $associated[]=trim($asso,'[]');
              }

              $athlete_info=App\Athlete_bioinformation::whereIn('athlete_associatedSport',$associated)->get();
              foreach($athlete_info as $athlete):
              ?>
              <tr>
                <td>{{$id++}}</td>
                <td>{{$athlete->athlete_id}}</td>
                <td>{{$athlete->athlete_fname.' '.$athlete->athlete_lname}}</td>
                <td>{{$athlete->athlete_cid}}</td>
                <td>{{$athlete->athlete_dob}}</td>
                <td><input type="checkbox" name="select[]" value='{{$athlete->athlete_id}}'>Select</td>
              </tr>
            <?php endforeach?>
            </tbody>
          </table>
         </div>
         <div class="modal-footer">
           <button type='submit' class="btn btn-primary glyphicon glyphicon-plus col-xs-offset-8">Create</button>
            <button type="button" class="btn btn-warning glyphicon glyphicon-remove" data-dismiss="modal">Close</button>
        </div>
       </form>
      </div>
    </div>
  </div>
</div>  
<!-- schedule modal ends here-->
<!-- EditTrainingSchedule begins-->
<div class="modal fade" id="editTrainingSchedule" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Training Schedule</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('update_training_schedule')}}" method="post">
          {{csrf_field()}}
          <div class='row'>
            <div class='col-xs-6 clearfix'>
              <div class='form-group'>
                <label for='date' class='col-xs-2'>Date </label>
                  <div class='col-xs-10 input-group'>
                    <input type="date" name="date" class="form-control datepicker" placeholder="yy-mm-dd"  id='date_edit'>
                  </div>
              </div>
              <div class='form-group clearfix'>
                <label for='session_name' class='col-xs-3'>Session Name </label>
                  <div class='col-xs-9 input-group'>
                    <input type="text" name="session_name" class="form-control" placeholder="Enter session name here" id='session_name'>
                  </div>
              </div>
              <div class='form-group clearfix'>
              <label for='start_time' class='col-xs-2'>Start Time </label>
                <div class='col-xs-10 input-group'>
                  <input type="time" name="start_time" class="form-control timepicker" placeholder="HH:mm:ss"  id='start_time'>
                </div>
            </div>
            <div class='form-group'>
                <label for='venue' class='col-xs-2'>Venue</label>
                  <div class='col-xs-10 input-group'>
                    <input type="text" name="venue" class="form-control" placeholder="Enter venue here"  id='venue'>
                  </div>
              </div>
              <div class='form-group'>
                <label for='comments' class='col-xs-3'>Comments</label>
                  <div class='col-xs-9 input-group'>
                    <textarea name='comments' class='form-control' id='comments'></textarea>
                  </div>
              </div>
            </div>
            <div class='col-xs-6 clearfix'>
              <div class='form-group'>
                
                  <label for='day' class='col-xs-2'>Day</label>
                  <div class='col-xs-10 input-group'>
                    <select class='form-control' name='day' id='day_edit'>
                      <option value="" disabled selected>Select Day</option>
                      <?php $enum_day=App\EnumDaytable::all();
                        foreach($enum_day as $day):
                          ?>
                        <option value={{$day->day_id}}>{{$day->day_name}}</option>
                      <?php endforeach ?>
                    </select>
                  </div>
              </div>
              <div class='form-group clearfix'>
                <label for='session_type' class='col-xs-3'>Session Type</label>
                  <div class='col-xs-9 input-group'>
                    <select class='form-control' name='session_type'>
                      <option value="" disabled selected>Select session type</option>
                        <?php $session_type=App\EnumSessionType::all();
                        foreach($session_type as $session):
                          ?>
                        <option value={{$session->session_type_id}}>{{$session->session_type_name}}</option>
                      <?php endforeach ?>
                    </select>
                  </div>
              </div>
               <div class='form-group clearfix'>
                <label for='end_time' class='col-xs-2'>End Time</label>
                  <div class='col-xs-10 input-group'>
                    <input type="time" name="end_time" class="form-control" placeholder="HH:mm:ss" id='end_time'>
                  </div>
              </div>
              <div class='form-group'>
                <label for='coach' class='col-xs-2'>Coach</label>
                  <div class='col-xs-10 input-group'>
                    <select class='form-control' name='coach' id='coach'>
                      <option value="" disabled selected>Select coach</option>
                      <?php $coach=App\Tbl_Coach::all();
                            foreach($coach as $coach):
                              ?>
                            <option value={{$coach->coach_id}}>{{$coach->coach_fname.' '.$coach->coach_mname.' '.$coach->coach_lname}}</option>
                          <?php endforeach ?>
                    </select>
                  </div>
              </div>
            </div>
          </div> 
      <div class="modal-footer">
        <button type='submit' class="btn btn-primary col-xs-offset-8 glyphicon glyphicon-ok">Update</button>
        <button type="button" class="btn btn-warning glyphicon glyphicon-remove" data-dismiss="modal">Close</button>
      </div>
      <input type="hidden" id="edit_id" name="edit_id">
      </form>
      </div>
    </div>
  </div>
</div>
<br>
<br>
<!-- EditTrainingSchedule ends here -->
<script type="text/javascript">
  $('#table1').DataTable(
    {
        "responsive":true,
        "ordering": false,
        "info":     false,
        'searching':false
    });
  $(function()
  {
    $('#trainingInfo').click(function()
    {
      window.location="{{url(route('training.index'))}}";
    });
    $('#attendance').click(function()
    {
      window.location="{{url(route('training.attendance'))}}";
    });
  });

  function editTrainingSchedule(id,day_id,session_type,coach_id)
  {
    var edit_url = $("#hidden_edit").val();
    $.ajax({
        url: edit_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          $("#edit_id").val(result.training_id);
          $("#session_name").val(result.session_name);
          $("#start_time").val(result.start_time);
          $("#venue").val(result.venue);
          $("#comments").val(result.comments);
          $("#date_edit").val(result.date);
          $("#end_time").val(result.end_time);
        }
      });
     $('select[name="day"]').val(day_id);
     $('select[name="session_type"]').val(session_type);
     $('select[name="coach"]').val(coach_id);

  }

  $('#day').click(function(){
    var date=$('#date').val();
    var url='{{route('get_day')}}';
    $.ajax({
        url: url,
        type:"GET", 
        data: {"id":date}, 
        success: function(result){
          console.log(result);
          $('#day').empty();
      
          $('#day').append('<option value="'+result.day_id+'">'+result.day_name+'</option>');
        }
      });
  });
  $('#day_edit').click(function(){
    var date=$('#date_edit').val();
    var url='{{route('get_day')}}';
    $.ajax({
        url: url,
        type:"GET", 
        data: {"id":date}, 
        success: function(result){
          console.log(result);
          $('#day_edit').empty();
      
          $('#day_edit').append('<option value="'+result.day_id+'">'+result.day_name+'</option>');
        }
      });
  });
  $('input.timepicker').timepicker({ timeFormat: 'HH:mm:ss' });
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
