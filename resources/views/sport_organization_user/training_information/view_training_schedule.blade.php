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
              <div class="text-muted bootstrap-admin-box-title clearfix">Training Schedule for each athletes
              <a href="{{route('training.index')}}" class='btn btn-success pull-right'>Back</a>
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
            <div class="table-responsive">
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
                  <th>Coach</th>
              </tr>   
          </thead>
          <tbody>
           <?php $i=1;
            foreach($athletes as $athlete):
            ?>
             @foreach($athlete->training as $training)
           <tr>
             <td>{{$i++}}</td>
             <td>{{$training->day->day_name}}</td>
             <td>{{$training->date}}</td>
             <td>{{$training->session->session_type_name}}</td>
             <td>{{$training->session_name}}</td>
             <td>{{$training->start_time}}</td>
             <td>{{$training->end_time}}</td>
             <td>{{$training->coach->coach_fname.' '.$training->coach->coach_mname.' '.$training->coach->coach_lname}}</td>
           </tr> 

          @endforeach
        <?php endforeach?>
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
<br><br>
<script type="text/javascript">
  $(function(){
    $('#table1').DataTable(
      {
        'resposive':true,
      });
  });
</script>
@endsection
