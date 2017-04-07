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
            <form action='{{route('save_attendance')}}' method='post'>
        {{csrf_field()}}
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
                <td><input type="checkbox" name="select[]" value='{{$athlete->athlete_id}}'>Select</td>
              </tr>
            @endforeach
            @endforeach
            </tbody>
          </table>
          <input type="hidden" name="hidden_training_id" value='{{$training->training_id}}'>
          <div class='clearfix'>
            <button type='submit' class="btn btn-info pull-right">save</button>
          </div>
          </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $('#table1').DataTable();
</script>
@endsection
@section('footer')
<div class="container">
    <div class="row">
        @include('includes.footer')
    </div>
</div>
@endsection
