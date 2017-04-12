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
	           <div class="text-muted bootstrap-admin-box-title clearfix">List And Search KPIs
	           </div>
	          </div>
            <div class="bootstrap-admin-panel-content">
              @if(Session::has('success'))
                <div class="alert alert-success">
                  {{ Session::get('success') }}
                </div>	
						 	@endif
              <div class='form-group clearfix'>
            <label for='five_yr_plan_id' class='col-xs-2'>Five Year Plan:</label>
              <div class='col-xs-10 input-group'>
               <select class='form-control' name='five_yr_plan_id'>
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
                  <option>Select BoC program</option>
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
            <label for='skra_activity_id' class='col-xs-2'>Activity:</label>
              <div class='col-xs-10 input-group'>
                <select class='form-control' name='skra_activity_id'>
                  <option>Select Activity</option>
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
                    <input type="submit" class="btn btn-default pull-right" value="Search">
                    </div>
                </div>
             <table class="table table-bordered table-striped table-responsive" id="table1">
             <thead>
                <tr>
                      <th>Sl. No:</th>
                            <th>Activity</th>
                            <th>KPI</th>
                            <th>Baseline</th>
                            <th>Good(Target)</th>
                            <th>Average</th>
                            <th>Poor</th>
                            <th style='width:20%'>Action</th>
                          </tr> 
                </tr>   
            </thead>
            <tbody>
             <?php $id=1;
              $search=App\Tbl_proposed_KPI::all();
              foreach($search as $searchs):
              ?>
              <tr>
                <td>{{$id++}}</td>
                <td>{{$searchs->proposedActivity->activity_name}}</td>
                <td>{{$searchs->kpi_name}}</td>
                <td>{{$searchs->baseline}}</td>
                <td>{{$searchs->good}}</td>
                <td>{{$searchs->average}}</td>
                <td>{{$searchs->poor}}</td>
                <td>
                   <form id='remove' class="form-group" action="" method='post'>
                          <input type="hidden" name="_method" value="delete">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <a class="btn btn-info glyphicon glyphicon-edit" data-toggle='modal' data-target='#editModal' onclick='kpi_edit({{$searchs->kpi_id}})'>Edit</a>
                          <button type="submit" class="btn btn-warning glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete this data');" name='name'>Remove
                          </button>
                        </form>
                </td>
              </tr>
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
        <button type="submit" class="btn btn-info">Update</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
       
      </form>
      </div>
    </div>
  </div>
</div>
<!-- ends editModal-->
<script type="text/javascript">
 $(function(){
    $('#table3').DataTable();
  });
</script>
<script type="text/javascript">
function kpi_edit(id)
    {
      var view_url = $("#hidden_view").val();
      $.ajax({
        url: view_url,
        alert(url);
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          // console.log(result);
          $("#edit_id").val(result.kpi_id);
          $("#kpi_name").val(result.kpi_name);
          $("#RGoB").val(result.RGoB);
          $("#external1").val(result.external1);
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