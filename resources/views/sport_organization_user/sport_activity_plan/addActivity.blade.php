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
<div class='container'>
  <div class="row">
   <!-- content -->
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="text-muted bootstrap-admin-box-title clearfix">Sport Organization Activities 
          
               </div>
            </div>
            <div class="bootstrap-admin-panel-content">
            @if(Session::has('success'))
                <div class="alert alert-success">
                  {{ Session::get('success') }}
                </div>
            @endif
            <table class="table table-bordered table-striped table-responsive" id="table1">
              <thead>
              <?php $i=1;?>
                  <tr>
                      <th>Sl. No:</th>
                      <th>AKRA</th>
                      <th>BoC Program</th>
                      <th>Activity</th>
                      <th>Venue</th>
                      <th>RGoB Budget</th>
                      <th>External Budget</th>
                      <th style='width:20%'>Action</th>
                  </tr>   
              </thead>
              <tbody>
              <?php $id=1 ?>
              @foreach($addActivity as $activity)
              <tr>
                  <td>{{$id++}}</td>
                  <td>{{$activity->updated_activity->getAKRA->SKRA_name}}</td>
                  <td>{{$activity->updated_activity->getAKRAActivity->SKRA_activity}}</td>
                  <td>{{$activity->activity_name}}</td>
                  <td>{{$activity->activity_venue}}</td>
                  <td>{{$activity->rgob_budget}}</td>
                  <td>{{$activity->external_budget}}</td>
                  <td>
                      <form class="form-group">
                        <a class="btn btn-info glyphicon glyphicon-edit" data-toggle='modal' data-target='#editModal' onclick='editActivities({{$activity->activity_id}})'>Edit</a>
                        <a class="btn btn-success glyphicon glyphicon-check" href="{{route('KPI_master.index', $activity->activity_id)}}">KPI</a>
                        </button>
                      </form>
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
<!-- editModal begins-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Activities</h4>
      </div>
      <div class="modal-body">
       <form action="update_proposed_activities" method="post">
          {{csrf_field()}}
          <input type="hidden" name="hidden_edit_id" id='hidden_edit_id'>
          <div class='form-group clearfix'>
            <label for='activity' class='col-xs-3'>Activity:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="activity" class="form-control" id='activity'>
              </div>
          </div>
          <div class='form-group clearfix'>
            <label for='venue' class='col-xs-3'>Venue:</label>
            <div class='col-xs-9 input-group'>
              <input type="text" name="venue" class="form-control" id='venue'>
            </div>
          </div>
        <div class='form-group clearfix'>
            <label>Time Line:</label>
          <div class='form-group clearfix'>
            <label for='quarter' class='col-xs-3'>Quarter:</label>
            <div class='col-xs-9 input-group'>
              <select class='form-control' name='quarter' id='quarter'>
                <option value="" disabled selected>Select quarter</option>
                  <?php 
                      $enum_quarter=App\Enum_quarter::all();
                      foreach($enum_quarter as $quarter):
                    ?>
                    <option value="{{$quarter->quarter_id}}">{{$quarter->quarter_name}}</option>
                    <?php 
                      endforeach
                    ?>
                </select>
            </div>
          </div>
          <div class='form-group clearfix'>
            <label for='actual' class='col-xs-3'>Actual:</label>
              <div class='input-group col-xs-9'>
                <input type="text" name="actual"  class="form-control" id='actual'>
              </div>
          </div>
        </div>
         <div class='form-group clearfix'>
            <label>Source of Funding:</label>
          <div class='form-group clearfix'>
            <label for='rgob_budget' class='col-xs-3'>Budget RGOB:</label>
            <div class='col-xs-9 input-group'>
              <input type="text" name="rgob_budget" class="form-control" id='rgob_budget'>
            </div>
          </div>
          <div class='form-group clearfix'>
            <label for='external_budget' class='col-xs-3'>External Budget:</label>
              <div class='input-group col-xs-9'>
                <input type="text" name="external_budget"  class="form-control" id='external_budget'>
              </div>
          </div>
          <div class='form-group clearfix'>
            <label for='external_source' class='col-xs-3'>External Source:</label>
              <div class='input-group col-xs-9'>
                <input type="text" name="external_source"  class="form-control" id='external_source'>
              </div>
          </div>
        </div>
        <div class='form-group clearfix'>
            <label for='collaborating' class='col-xs-3'>Collaborating Agency:</label>
              <div class='input-group col-xs-9'>
                <input type="text" name="collaborating"  class="form-control" id='collaborating'>
              </div>
          </div>
       <div class="modal-footer">
          <button type="submit" class="btn btn-primary glyphicon glyphicon-ok">Update</button>
          <button type="button" class="btn btn-warning glyphicon glyphicon-remove" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
<!--editModal ends here -->
<script type="text/javascript">
  function editActivities(id)
  {
    var url='{{route('editActivities')}}';
    $.ajax({
        url: url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          $('#hidden_edit_id').val(result.activity_id);
          $('#activity').val(result.activity_name);
          $('#venue').val(result.activity_venue);
          $('#quarter').val(result.quarter_timeline);
          $('#actual').val(result.actual_timeline);
          $('#rgob_budget').val(result.rgob_budget);
          $('#external_budget').val(result.external_budget);
          $('#external_source').val(result.external_source);
          $('#collaborating').val(result.collaborating_agency);
        }
      });
  }
</script>
<script type="text/javascript">
$(function()
    {
        $('#table1').DataTable(
           {
           "language": {
           "search": "Filter Activity:"
     }
     }
          );
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