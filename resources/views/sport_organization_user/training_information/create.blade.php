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
                  <div class='form-group'>
                    <label for='from' class='col-xs-2'>From</label>
                      <div class='col-xs-10 input-group'>
                        <input type="text" name="from" class="form-control" placeholder="Enter from date here">
                      </div>
                  </div>
                  <div class='form-group'>
                    <label for='to' class='col-xs-2'>To </label>
                      <div class='col-xs-10 input-group'>
                        <input type="text" name="to" class="form-control" placeholder="Enter to date here">
                      </div>
                  </div>
                  <div class='form-group'>
                    <label for='day' class='col-xs-2'>Day</label>
                      <div class='col-xs-10 input-group'>
                        <select class='form-control' name='day'>
                          <option value="" disabled selected>Select day</option>
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
                        <th>Day</th>
                        <th>Date</th>
                        <th>Session Name</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Action</th>
                    </tr>   
                </thead>
                <tbody>
                 <?php $id=1?>
                  <tr>
                    <td>{{$id++}}</td>
                    <td>Monday</td>
                    <td>21/3/17</td>
                    <td>sjdfhg</td>
                    <td>9</td>
                    <td>5</td>
                    <td>
                      <form class="form-group" action="" method='post'>
                          <input type="hidden" name="_method" value="delete">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <a href="{{--route('training.show')--}}" class="btn btn-info">Edit</a>
                           <a href="" class="btn btn-primary" data-toggle='modal' data-target='#viewParticipants'>View Participants</a>
                        </form>
                    </td>
                  </tr>
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
                 <div class='form-group'>
                    <label for='day' class='col-xs-2'>Day</label>
                      <div class='col-xs-10 input-group'>
                        <select class='form-control' name='day'>
                          <option value="" disabled selected>Select Day</option>
                        </select>
                      </div>
                  </div>
                  <div class='form-group'>
                    <label for='date' class='col-xs-2'>Date </label>
                      <div class='col-xs-10 input-group'>
                        <input type="text" name="date" class="form-control" placeholder="Enter date here">
                      </div>
                  </div>
                  <div class='form-group'>
                    <label for='session_name' class='col-xs-2'>Session Name </label>
                      <div class='col-xs-10 input-group'>
                        <input type="text" name="session_name" class="form-control" placeholder="Enter session name here">
                      </div>
                  </div>
                  <div class='form-group'>
                    <label for='session_type' class='col-xs-2'>Session Type</label>
                      <div class='col-xs-10 input-group'>
                        <select class='form-control' name='session_type'>
                          <option value="" disabled selected>Select session type</option>
                        </select>
                      </div>
                  </div>
                <div class='form-group'>
                  <label for='start_time' class='col-xs-2'>Start Time </label>
                    <div class='col-xs-10 input-group'>
                      <input type="text" name="start_time" class="form-control" placeholder="Enter start time here">
                    </div>
                  </div>
                  <div class='form-group'>
                    <label for='end_time' class='col-xs-2'>End Time</label>
                      <div class='col-xs-10 input-group'>
                        <input type="text" name="end_time" class="form-control" placeholder="Enter end time here">
                      </div>
                  </div>
                   <div class='form-group'>
                    <label for='venue' class='col-xs-2'>Venue</label>
                      <div class='col-xs-10 input-group'>
                        <input type="text" name="venue" class="form-control" placeholder="Enter venue here">
                      </div>
                  </div>
                   <div class='form-group'>
                    <label for='comments' class='col-xs-2'>Comments</label>
                      <div class='col-xs-10 input-group'>
                        <textarea name='comments' class='form-control'></textarea>
                      </div>
                  </div>
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
                 <?php $id=1?>
                  <tr>
                    <td>{{$id++}}</td>
                    <td>123</td>
                    <td>Pema</td>
                    <td>10601002699</td>
                    <td>23/3/17</td>
                    <td><input type="checkbox" name="select">Select</td>
                  </tr>
                </tbody>
              </table>
             
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
    $('#table1').DataTable();
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
