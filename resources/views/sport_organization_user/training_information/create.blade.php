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
              <div class="text-muted bootstrap-admin-box-title clearfix">Training Schedule
              <a href="{{route('training.index')}}" class='btn btn-default pull-right'>Back</a>
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
              <ul class='nav nav-pills nav-justified'>
                <li id='trainingInfo'><a href="#" data-toggle="tab">Training Information</a></li>
                <li id='newSchedule' class='active'><a href="#" data-toggle="tab"> Training Schedule</a></li>
                <li id='attendance'><a href="#" data-toggle="tab">Training Attendance</a></li>
              </ul>
              <div style='margin-top: 20px'></div>
              <form action="" method="post">
                {{csrf_field()}}
                <div class='row'>
                  <div class='col-xs-6 clearfix'>
                    <div class='form-group'>
                    <label for='from' class='col-xs-2'>From</label>
                      <div class='col-xs-10 input-group'>
                        <input type="text" name="from" class="form-control" placeholder="Enter from date here">
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
                        <input type="text" name="to" class="form-control" placeholder="Enter to date here">
                      </div>
                   </div>
                   <div class='form-group'>
                    <label for='coach' class='col-xs-2'>Coach</label>
                      <div class='col-xs-10 input-group'>
                        <select class='form-control' name='coach'>
                          <option value="" disabled selected>Select coach</option>
                        </select>
                      </div>
                  </div>
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
                    <td>{{$training->coach_id}}</td>
                    <td>
                      <form class="form-group" action="" method='post'>
                          <input type="hidden" name="_method" value="delete">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <a href="{{--route('training.show')--}}" class="btn btn-info">Edit</a>
                           <a href="" class="btn btn-primary" data-toggle='modal' data-target='#viewParticipants'>View Participants</a>
                        </form>
                    </td>
                  </tr>
                  @endforeach
              </tbody>
              </table>
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
<!-- viewParticipants modal begins-->
<div class="modal fade" id="viewParticipants" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">View Participants</h4>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-striped table-responsive" id="table1">
           <thead>
              <tr>
                  <th>Sl_no:</th>
                  <th>Athlete ID</th>
                  <th>Athlete Name</th>
                  <th>CID</th>
                  <th>Date of Birth</th>
                  <th>Mobile No.</th>
                  <th>Email</th>
              </tr>   
          </thead>
          <tbody>
           <?php $id=1?>
            <tr>
              <td>{{$id++}}</td>
              <td>123</td>
              <td>pema</td>
              <td>10601002699</td>
              <td>22/3/1995</td>
              <td>17771004</td>
              <td>pema@gmail.com</td>
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
<!-- ends viewParticipants modal-->
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
                <label for='day' class='col-xs-2'>Day</label>
                  <div class='col-xs-10 input-group'>
                    <select class='form-control' name='day' required>
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
                <label for='session_name' class='col-xs-3'>Session Name </label>
                  <div class='col-xs-9 input-group'>
                    <input type="text" name="session_name" class="form-control" placeholder="Enter session name here">
                  </div>
              </div>
              <div class='form-group clearfix'>
              <label for='start_time' class='col-xs-2'>Start Time </label>
                <div class='col-xs-10 input-group'>
                  <input type="time" name="start_time" class="form-control" placeholder="Enter start time here" required>
                </div>
            </div>
            <div class='form-group'>
                <label for='venue' class='col-xs-2'>Venue</label>
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
                <label for='date' class='col-xs-2'>Date </label>
                  <div class='col-xs-10 input-group'>
                    <input type="date" name="date" class="form-control" placeholder="Enter date here" required>
                  </div>
              </div>
              <div class='form-group clearfix'>
                <label for='session_type' class='col-xs-3'>Session Type</label>
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
                <label for='end_time' class='col-xs-2'>End Time</label>
                  <div class='col-xs-10 input-group'>
                    <input type="time" name="end_time" class="form-control" placeholder="Enter end time here" required>
                  </div>
              </div>
              <div class='form-group'>
                <label for='coach' class='col-xs-2'>Coach</label>
                  <div class='col-xs-10 input-group'>
                    <select class='form-control' name='coach'>
                      <option value="" disabled selected>Select coach</option>
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
              $athlete_info=App\Athlete_bioinformation::all();
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
           <button type='submit' class="btn btn-success glyphicon glyphicon-plus col-xs-offset-8">Create</button>
            <button type="button" class="btn btn-default glyphicon glyphicon-remove" data-dismiss="modal">Close</button>
        </div>
       </form>
      </div>
    </div>
  </div>
</div>  
<!-- schedule modal ends here-->
<script type="text/javascript">
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
</script>

@endsection
