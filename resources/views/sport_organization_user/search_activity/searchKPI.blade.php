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
	           <div class="text-muted bootstrap-admin-box-title clearfix">List And Search KPIs
	           </div>
	          </div>
            <div class="bootstrap-admin-panel-content">
              @if(Session::has('success'))
                <div class="alert alert-success">
                  {{ Session::get('success') }}
                </div>	
						 	@endif
              <form action='{{route('searchKPI')}}' method='post'>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class='form-group clearfix'>
              <label for='five_yr_plan_id' class='col-xs-2'>Five Year Plan:</label>
              <div class='col-xs-10 input-group'>
               <select class='form-control' name='five_yr_plan_id'>
                <option disabled selected>Select five year plan</option>
                  <?php 
                    $fiveYearPlan=App\EnumFiveYearPlan::all();
                    foreach($fiveYearPlan as $five_year):
                  ?>
                  <option value="{{$five_year->five_yr_plan_id}}">{{$five_year->name}}</option>
                  <?php 
                    endforeach
                  ?>
                  </select>
              </div>
          </div>
          <div class='form-group clearfix'>
            <label for='skra_id' class='col-xs-2'>AKRA:</label>
              <div class='col-xs-10 input-group'>
                 <select class='form-control' name='skra_id' id='skra1'>
                  <option disabled selected>Select AKRA</option>
                         <?php 
                            $skras=App\Tbl_SKRA::all();
                            foreach($skras as $skra):
                          ?>
                         <option value="{{$skra->skra_id}}">{{$skra->SKRA_name}}</option>
                          <?php 
                            endforeach
                          ?>
                      </select>
              </div>
          </div>
              <div class='form-group clearfix'>
            <label for='skra_activity_id' class='col-xs-2'>BoC Program:</label>
              <div class='col-xs-10 input-group'>
                <select class='form-control' name='skra_activity_id'>
                  <option disabled selected>Select BoC program</option>
                  <?php 
                    $skra=App\Tbl_SKRA_activities::all();
                    foreach($skra as $skras):
                  ?>
                  <option value="{{$skras->skra_activity_id}}">{{$skras->SKRA_activity}}</option>
                  <?php 
                    endforeach
                  ?>
                </select>
              </div>
          </div>    
          <div class='form-group clearfix'>
            <label for='activity' class='col-xs-2'>Activity:</label>
              <div class='col-xs-10 input-group'>
                <select class='form-control' name='activity'>
                  <option disabled selected>Select Activity</option>
                  <?php 
                    $activity=App\Tbl_proposed_sport_org_activity::all();
                    foreach($activity as $activities):
                  ?>
                  <option value="{{$activities->activity_id}}">{{$activities->activity_name}}</option>
                  <?php 
                    endforeach
                  ?>
                </select>
              </div>
          </div>    
          <div class="form-group clearfix">
            <div class="col-xs-12 input-group ">
              <input type="submit" class="btn btn-primary pull-right" value="Search" name='search'>
              </div>
          </div>
          </form>
          <div class="table-responsive">
             <table class="table table-bordered table-striped" id="table1">
             <thead>
                <tr>
                  <th>Sl. No:</th>
                  <th>Activity</th>
                  <th>KPI</th>
                  <th>Baseline</th>
                  <th>Good(Target)</th>
                  <th>Average</th>
                  <th>Poor</th>
                  <th style='width:20%'>Action & Status</th>
                </tr>  
            </thead>
           {{-- @if(!isset($_POST['search'])) --}}
            <tbody>
             <?php $id=1;
              //$search=App\Tbl_proposed_KPI::all();
             ?>
             @foreach($searchkpi as $searchs)
              <tr>
                <td>{{$id++}}</td>
                <td>{{$searchs->proposedActivity->activity_name}}</td>
                <td>{{$searchs->kpi_name}}</td>
                <td>{{$searchs->baseline}}</td>
                <td>{{$searchs->goodRgStart.'-'.$searchs->goodRgEnd}}</td>
                <td>{{$searchs->avgRgStart.'-'.$searchs->avgRgEnd}}</td>
                <td>{{$searchs->poorRgStart.'-'.$searchs->poorRgEnd}}</td>
                <td>
                   <form id='remove' class="form-group" action="" method='post'>
                          <input type="hidden" name="_method" value="delete">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          @if($searchs->status==0)

                          <a class="btn btn-info glyphicon glyphicon-edit" data-toggle='modal' data-target='#editModal' onclick='kpi_edit1({{$searchs->kpi_id}})'>Edit</a>
                          <button type="submit" class="btn btn-danger glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete this data');" name='name'>Delete

        
                          </button>
                          <a class=" btn-warning" onclick='' style="text-decoration:none;">&nbsp;&nbsp;Sent for Approval&nbsp;&nbsp;</a>
                          @endif
                  </form>
                        @if($searchs->status==1)
                        <a class=" btn-success" onclick='' style="text-decoration:none;">&nbsp;&nbsp;Approved&nbsp;&nbsp;</a>
                        @endif
                </td>
              </tr>
              @endforeach
            </tbody>
            {{-- @endif --}}
          </table>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- edit kpi modal begins-->
<div class="modal fade" id="editModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit KPI</h4>
      </div>
      <div class="modal-body">
       <form action="{{route('update_kpi')}}" method="post">
          {{csrf_field()}}
          <div class='form-group clearfix'>
            <label for='kpi_name' class='col-xs-3'>KPI:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="kpi_name" class="form-control" id="kpi_name" placeholder="Enter KPI name here" required>
              </div>
          </div>
          <div class='form-group clearfix'>
            <label>KPI Weight</label>
          <div class='form-group clearfix'>
            <label for='RGoB' class='col-xs-3'>RGoB:</label>
              <div class='input-group col-xs-9'>
                <input type="text" name="RGoB"  class="form-control" id="RGoB" placeholder="Enter RGoB funding here" required>
              </div>
          </div>
          <div class='form-group clearfix'>
            <label for='external' class='col-xs-3'>External:</label>
              <div class='input-group col-xs-9'>
                <input type="text" name="external"  class="form-control" id="external1" placeholder="Enter External Funding here">
              </div>
          </div>
        </div>
        <div class='form-group clearfix'>
            <label for='unit' class='col-xs-3'>Units:</label>
              <div class='input-group col-xs-9'>
                <input type="text" name="unit"  class="form-control" id="unit" placeholder="Enter Unit here" required>
              </div>
          </div>

          <div class='form-group clearfix'>
            <label for='baseline' class='col-xs-3'>Baseline:</label>
              <div class='input-group col-xs-9'>
                <input type="text" name="baseline"  class="form-control" id="baseline" placeholder="Enter baseline here" required>
              </div>
          </div>
           <div class='form-group clearfix'>
            <label>Performance Evaluation</label>
          <div class='form-group clearfix'>
            <label for='good' class='col-xs-3'>Good(Target):</label>
              <div class='input-group col-xs-9'>
                <input type="text" name="good"  class="form-control" id="good" placeholder="Enter Target here" required>
              </div>
          </div>
          <div class='form-group clearfix'>
            <label for='average' class='col-xs-3'>Average:</label>
              <div class='input-group col-xs-9'>
                <input type="text" name="average"  class="form-control" id="average" placeholder="Enter Target here" required>
              </div>
          </div>
           <div class='form-group clearfix'>
            <label for='poor' class='col-xs-3'>Poor:</label>
              <div class='input-group col-xs-9'>
                <input type="text" name="poor"  class="form-control" id="poor" placeholder="Enter Target here" required>
              </div>
          </div>
        </div>
       <input type="hidden" id="edit_id" name="edit_id">
      <div class="modal-footer">

        <button type="submit" class="btn btn-primary glyphicon glyphicon-ok">Update</button>
        <button type="button" class="btn btn-warning glyphicon glyphicon-remove" data-dismiss="modal">Close</button>

      </div>
      </form>
      </div>
    </div>
  </div>
</div>
</br>
</br>
<!-- ends editModal-->
<script type="text/javascript">
 $(function(){
    $('#table1').DataTable(
      {
        'searching':false,
        'responsive':true
      });
  });
  function kpi_edit1(id)
  {
    var view_url='{{route('view_kpi')}}';
    $.ajax({
      url: view_url,
      type:"GET", 
      data: {"id":id}, 
      success: function(result){
        console.log(result);
        $("#edit_id").val(result.kpi_id);
        $("#kpi_name").val(result.kpi_name);
        $("#RGoB").val(result.RGoB);
        $("#external1").val(result.external);
        $("#unit").val(result.unit);
        $("#baseline").val(result.baseline);
        $("#good").val(result.good);
        $("#average").val(result.average);
        $("#poor").val(result.poor);
      }
    });
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