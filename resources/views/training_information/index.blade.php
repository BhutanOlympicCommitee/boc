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
              <li id='newSchedule'><a href="#" data-toggle="tab"> Create New Training Schedule</a></li>
              <li id='attendance'><a href="#" data-toggle="tab">Training Attendance</a></li>
            </ul>
              <div style='margin-top: 20px'></div>
              <form action="{{route('sport_organization.store')}}" method="post">
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
                  <tr>
                    <td>{{$id++}}</td>
                    <td>Football</td>
                    <td>123</td>
                    <td>Pema</td>
                    <td>10601002699</td>
                    <td>12/3/1995</td>
                    <td>
                        <form class="form-group" action="" method='post'>
                            <input type="hidden" name="_method" value="delete">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <a href="{{--route('training.show')--}}" data-toggle='modal' data-target='#viewDetails' class="btn btn-info" id='details'>Details</a>
                            <a href="{{--route('training.showschedule')--}}" class="btn btn-primary" data-toggle='modal' data-target='#viewTrainingSchedule'>Training Schedule</a>
                        </form>
                    </td>
                  </tr>
              </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
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
                <strong>Title:</strong><br>
                <strong>First Name:</strong><br>
                <strong>Last Name:</strong><br>
                <strong>Occupation:</strong><br>
                <strong>Date of Birth:</strong><br>
                <strong>Place of Birth:</strong><br>
                <strong>Gender:</strong><br>
                <strong>Height:</strong><br>
                <strong>Weight:</strong><br>
                <strong>Father's Name:</strong><br>
                <strong>Phone No.:</strong><br>
                <strong>Mobile No:</strong><br>
                <strong>Email:</strong><br>
                <strong>Passport No.:</strong><br>
                <strong>CID:</strong><br>
                <strong>Associated Sport:</strong>
              </div>
              <div class='col-md-6'>
                <strong>Photo:</strong>
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
</script>
@endsection
@section('footer')
<div class="container">
 <div class="row">
  @include('includes.footer')
  </div>
</div>
@endsection