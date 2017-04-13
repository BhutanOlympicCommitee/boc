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
              <div class="text-muted bootstrap-admin-box-title clearfix">Record attendance for athlete for each training
              <a href="{{route('training.attendance')}}" class='btn btn-default pull-right'>Back</a>
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
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
             <?php $id=1;?>
             @foreach($training_schedule as $training)
             @foreach($training->athlete as $athlete)
              <tr>
                <td>{{$id++}}</td>
                <td>{{$athlete->athlete_id}}</td>
                <td>{{$athlete->athlete_fname.' '.$athlete->athlete_lname}}</td>
                <td>{{$athlete->athlete_cid}}</td>
                <td>{{$athlete->athlete_dob}}</td>
                {{-- <td><input type="checkbox" name="select[]" value='{{$athlete->athlete_id}}'>Select</td> --}}
                <td>
                  <button class='btn btn-info' data-toggle='modal' data-target='#addModal' onclick='getAthleteIDTrainingID({{$athlete->athlete_id}},{{$training->training_id}})'>Select</button>
                </td>
              </tr>
            @endforeach
            @endforeach
            </tbody>
          </table>
          <input type="hidden" name="hidden_training_id" value='{{$training->training_id}}'>
          {{-- <div class='clearfix'>
            <button type='submit' class="btn btn-info pull-right">save</button>
          </div> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Add save attendance modal begins-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Save attendance of athlelete</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('save_attendance')}}" method="post">
          {{csrf_field()}}
          <input type="hidden" name="hidden_training_id" id='hidden_training_id'>
          <input type="hidden" name="hidden_athlete_id" id='hidden_athlete_id'>
          <div class='form-group'>
            <label for='attendance' class='col-xs-3'>Attendance</label>
              <div class='col-xs-9 input-group'>
                <select class='form-control' name='attendance' id='attendance'>
                <option value="" disabled selected>Select attendance</option>
                  <?php 
                      $attendance_status=App\Attendance_status::all();
                      foreach($attendance_status as $attendance):
                    ?>
                    <option value="{{$attendance->attendance_id}}">{{$attendance->attendance_status}}</option>
                    <?php 
                      endforeach
                    ?>
                </select>

              </div>
          </div>
          <div class='form-group clearfix'>
            <label for='comments' class='col-xs-3'>Comments</label>
              <div class='col-xs-9 input-group'>
                <textarea name="comments" class='form-control'>
                  
                </textarea>
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
<script type="text/javascript">
  $('#table1').DataTable();
  function getAthleteIDTrainingID(athlete_id,training_id)
  {
    $('#hidden_training_id').val(training_id);
    $('#hidden_athlete_id').val(athlete_id);
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
