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
              <div class="text-muted bootstrap-admin-box-title clearfix">Training Attendance
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
             <ul class='nav nav-pills nav-justified'>
               <li id='newSchedule'><a href="#" data-toggle="tab"> Training Schedule</a></li>
              <li id='trainingInfo'><a href="#" data-toggle="tab">Training Information</a></li>
             
              <li id='attendance' class='active'><a href="#" data-toggle="tab">Training Attendance</a></li>
            </ul>
              <div style='margin-top: 20px'></div>
              <form action="{{route('search_training_attendance')}}" method="post">
                {{csrf_field()}}
                <div class='row'>
                  <div class='col-xs-6'>
                    <div class='form-group'>
                    <label for='day' class='col-xs-2'>From</label>
                      <div class='col-xs-10 input-group'>
                        <select class='form-control' name='day' required>
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
                           <?php $enum_session=App\EnumSessionType::all();
                              foreach($enum_session as $session):
                                ?>
                              <option value={{$session->session_type_id}}>{{$session->session_type_name}}</option>
                            <?php endforeach ?>
                        </select>
                      </div>
                  </div>
                  </div>
                  <div class='col-xs-6'>
                    <div class='form-group'>
                    <label for='to' class='col-xs-2'>To </label>
                      <div class='col-xs-10 input-group'>
                        <input type="date" name="to" class="form-control" required>
                      </div>
                  </div>
                  <div class='form-group'>
                    <label for='coach' class='col-xs-2'>Coach</label>
                      <div class='col-xs-10 input-group'>
                        <select class='form-control' name='coach' required>
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
                      <a href='{{route('athlete_attendance',$training->training_id)}}' class='btn btn-info'>Attendance</a>
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
</div>
<br>
<br>
<script type="text/javascript">
 $('#table1').dataTable(
    {
       "responsive":true,
        "ordering": false,
        "info":     false,
        'searching':false
    });
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
</script>
@endsection
@section('footer')
<div class="container">
  <div class="row">
     @include('includes.footer')
  </div>
</div>
@endsection