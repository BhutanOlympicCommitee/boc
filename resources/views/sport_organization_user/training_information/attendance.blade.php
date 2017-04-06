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
              <div class="text-muted bootstrap-admin-box-title clearfix">Training Attendance
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
             <ul class='nav nav-pills nav-justified'>
              <li id='trainingInfo'><a href="#" data-toggle="tab">Training Information</a></li>
              <li id='newSchedule'><a href="#" data-toggle="tab"> Training Schedule</a></li>
              <li id='attendance' class='active'><a href="#" data-toggle="tab">Training Attendance</a></li>
            </ul>
              <div style='margin-top: 20px'></div>
              <form action="{{--route('sport_organization.store')--}}" method="post">
                {{csrf_field()}}
                <div class='row'>
                  <div class='col-xs-6'>
                    <div class='form-group'>
                    <label for='day' class='col-xs-2'>From</label>
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
                      <div class='form-group'>
                    <label for='type' class='col-xs-2'>Session Type</label>
                      <div class='col-xs-10 input-group'>
                        <select class='form-control' name='type'>
                          <option value="" disabled selected>Select session type</option>
                        </select>
                      </div>
                  </div>
                  </div>
                  <div class='col-xs-6'>
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
                        <th>From Time</th>
                        <th>To Time</th>
                        <th>Venue</th>
                        <th>Action</th>
                    </tr>   
                </thead>
                <tbody>
                 <?php $id=1?>
                 @foreach($training_schedule as $training)
                  <tr>
                    <td>{{$id++}}</td>
                    <td>{{$training->date}}</td>
                    <td>{{$training->day->day_name}}</td>
                    <td>{{$training->start_time}}</td>
                    <td>{{$training->end_time}}</td>
                    <td>{{$training->venue}}</td>
                    <td>
                      <a class='btn btn-default' data-toggle='modal' data-target='#attendanceModal' onclick='getTrainingID({{$training->training_id}})'>Attendance</a>
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
<!-- attendanceModal begins -->
<div class="modal fade" id="attendanceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content"> 
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Take attendance</h4>
      </div>
      <div class="modal-body">
      <form action='{{route('save_attendance')}}' method='post'>
        {{csrf_field()}}
      <input type="hidden" name="hidden_training_id" id='hidden_training_id'>
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
      <div class="modal-footer">
        <button type='submit' class="btn btn-info col-xs-offset-8">save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- attendanceModal ends -->
<script type="text/javascript">
  $(function()
  {
    $('#newSchedule').click(function()
    {
      window.location="{{url(route('training.create'))}}";
    });
    $('#trainingInfo').click(function()
    {
      window.location="{{url(route('training.index'))}}";
    });
  });
  function getTrainingID(id)
  {
    $('#hidden_training_id').val(id);
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