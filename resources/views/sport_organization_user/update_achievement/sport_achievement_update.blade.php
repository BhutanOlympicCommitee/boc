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
              <div class="text-muted bootstrap-admin-box-title">Update achievement information
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
              <ul class='nav nav-pills nav-justified'>
                <li class='active' id='reports'><a href="#Report" data-toggle="tab">Activity Report</a></li>
                <li id='participants'><a href="#Participant" data-toggle="tab">Participant Information</a></li>
              </ul>
              <form action='{{route('activities_achieved_report',$approved_activity->activity_id)}}' method='post'>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <div class='tab-content'>
                <div class='tab-pane fade in active' id='Report'><br> 
                  <span><strong>Financial Report</strong></span><br><br>
                  <div class='col-xs-12 form-group'>
                    <label class='col-xs-3'>RGoB Budget Utilization</label>
                      <div class='col-xs-8'>
                        <input type="text" name="rgob" class="form-control" id='rgob' placeholder='please enter rgob budget utilized'>
                        <input type="hidden" name="hidden_rgob" class="form-control" id='hidden_rgob' value='{{$approved_activity->approved_rgob_budget}}' required>
                       </div>
                  </div>
                  <div class='col-xs-12 form-group'>
                    <label class='col-xs-3'>Utilization %</label>
                      <div class='col-xs-8'>
                        <input type="text" name="utilization" class="form-control" id='utilization' placeholder="auto calculated on click">
                      </div>
                  </div>
                  <div class='col-xs-12 form-group'>
                    <label class='col-xs-3'>External Budget Utilization</label>
                      <div class='col-xs-8'>
                        <input type="text" name="external_budget" class="form-control" id='external_budget' placeholder="Enter external budget utilized">
                        <input type="hidden" name="hidden_external_budget" class="form-control" id='hidden_external_budget' value='{{$approved_activity->approved_external_budget}}'>
                      </div>
                  </div>
                  <div class='col-xs-12 form-group'>
                    <label class='col-xs-3'>Utilization %</label>
                      <div class='col-xs-8'>
                        <input type="text" name="utilization_percent" class="form-control" placeholder="Automaically calculated on click" id='utilization_percent'>
                      </div>
                  </div>
                  <span><strong>Physical Report</strong></span><br><br>
                  <div class='table-responsive'>
                    <div class="table-responsive">
                  <table id="table1" class="table table-bordered table-striped ">
                 <thead>
                    <tr>
                        <th>Sl_no:</th>
                        <th>KPI</th>
                        <th>Target Achieved</th>
                        <th>Points Scored</th>
                        <th style="width:5%">Weightage Obtained</th>
                    </tr>   
                </thead>
                <tbody>
                 <?php $id=1;
                  $proposed_kpi=App\Tbl_proposed_KPI::where('activity_id',$approved_activity->activity_id)->get();
                  foreach($proposed_kpi as $kpi):
                  ?>
                  <?php 
                    $approved_kpi=App\Tbl_KPI_approved::where('kpi_id',$kpi->kpi_id)->get();
                    foreach($approved_kpi as $approved):
                 ?>

                  <tr>
                    <td>{{$id++}}</td>
                    <td class='kpi'>{{$approved->approved_kpi_name}}<input type="hidden" name="hidden_value" class="hidden_value" value="{{$approved->kpi_approval_id}}"></td>
                    <td class='td2'><input type="text" name="target[]" class="target" style='width:100px' required></td>
                    <td class='td3'><input type="text" name="rgob_score[]" class="rgob_score" style='width:100px;border:none;'></td>
                    <td class='td1'><input type="text" name="weight[]" style='width:100px' required class="weight"></td>
                   
                    <input type="hidden" name="hidden_id[]" value='{{$approved->kpi_approval_id}}'>
                  </tr>

                <?php endforeach ?>
              <?php endforeach ?>
              </tbody>
              </table>
              </div>
              </div><br>
              <div class='row clearfix'>
                <div class='col-xs-12 form-group'>
                <label class='col-xs-2'>Remarks</label>
                  <div class='col-xs-7'>
                    <textarea class="form-control" name='remarks' rows=5>
                      
                    </textarea>  
                  </div>
              </div>
              </div>
              <div class='clearfix'>
                  <button type='submit' class='btn btn-primary col-xs-offset-10'>Submit</button>
                  <button type='reset' class="btn btn-warning pull-right">Cancel
                  </button>
              </div>
            </div>
          </div> 
        </form>    
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</br>
</br>
<script type="text/javascript">
//calculate RGoB budget utilization
  $('#utilization').click(function()
  {
    var rgob=$('#rgob').val();
    var approved_rgob=$('#hidden_rgob').val();
    var utilization=(rgob/approved_rgob)*100;
    var roundedValue = utilization.toFixed(2);
    $('#utilization').val(roundedValue);
  });
  //Calculate External Budget utilization
  $('#utilization_percent').click(function()
  {
    var external_budget=$('#external_budget').val();
    var approved_external_budget=$('#hidden_external_budget').val();
    var utilization_percent=(external_budget/approved_external_budget)*100;
    var roundedValue = utilization_percent.toFixed(2);
    $('#utilization_percent').val(roundedValue);
  });
  //get target achieved and calculate rgob and external score
  $('#table1 tr').click(function(){
    //var kpi_id=$("#hidden_value").val();
    var kpi_id=$(this).find('input.hidden_value').val();
    var target=$(this).find('input.target').val();
    var view_url="{{route('getScore')}}";
    var score;
    var weight;
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":kpi_id, "target":target}, 
        success: function(result){
          console.log(result);
          score=result;

          var url="{{route('assign_weight')}}";
          $.ajax({
            url:url,
            type:"GET",
            data:{"id":kpi_id,"score":result},
            success:function(result)
            {
              console.log(result);
              weight=result;
            }

          });
        }
      });
      $('.td3').click(function(){
        $(this).find('input.rgob_score').val(score); 
      });
     $('.td1').click(function(){
        $(this).find('input.weight').val(weight);
     });
  });
  $(function()
  {
    $('#participants').click(function(){
       window.location="{{url(route('update_achievement.athlete_achievement'))}}";   
     });
  });

  $('#table1').dataTable({
  'searching':false,
  'responsive':true
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