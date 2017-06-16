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
	           <div class="text-muted bootstrap-admin-box-title clearfix">List And Search Activities
	           </div>
	          </div>
            <div class="bootstrap-admin-panel-content">
              @if(Session::has('success'))
                <div class="alert alert-success">
                  {{ Session::get('success') }}
                </div>	
						 	@endif
              <form action='{{route('searchAKRA')}}' method='post'>
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class='form-group clearfix'>
            <label for='five_yr_plan_id' class='col-xs-2'>Five Year Plan:</label>
              <div class='col-xs-10 input-group'>
               <select class='form-control' name='five_yr_plan_id' id='five_yr_plan_id'>
                <option disabled selected>Select five year plan</option>
                  <?php 
                    $fiveYearPlan=App\EnumFiveYearPlan::all();
                    foreach($fiveYearPlan as $five_year):
                  ?>
                  <option value="{{$five_year->five_yr_plan_id}}">{{$five_year->name}}</option>
                  <?php endforeach ?>
                  </select>
              </div>
          </div>
          <div class='form-group clearfix'>
            <label for='fiscal_id' class='col-xs-2'>Fiscal Year:</label>
              <div class='col-xs-10 input-group'>
                <select class='form-control' name='fiscal_id' id="fiscal_id">
                  <option disabled selected><--Select one--></option>
                  <?php 
                    $fiscalYear=App\fiscal_year::all();
                    foreach($fiscalYear as $fiscal):
                  ?>
                  <option value="{{$fiscal->fiscal_id}}">{{$fiscal->fiscal_year}}</option>
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
                  <option disabled selected>Select akra</option>
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
            <label for='skra_activity_id' class='col-xs-2'>Program:</label>
              <div class='col-xs-10 input-group'>
                <select class='form-control' name='skra_activity_id'>
                  <option value='' disabled selected>Select program</option>
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
          <div class="form-group clearfix">
            <div class="col-xs-12 input-group ">
              <input type="submit" class="btn btn-primary pull-right" value="Search" name='search' id=search>
              </div>
          </div>
          </form>
          <div class="table-responsive">
             <table class="table table-bordered table-striped table-responsive" id="table1">
             <thead>
                <tr>
                      <th>Sl. No:</th>
                      <th>AKRA</th>
                      <th>Programs</th>
                      <th>Activity</th>
                      <th>Venue</th>
                      <th>RGoB Budget</th>
                      <th>External Budget</th>
                      <th style='width:20%'>Action & Status</th>
                </tr>   
            </thead>
            @if(!isset($_POST['search']))
            <tbody id='tbody1'>
             <?php $id=1;?>
              @foreach($search as $searchs)
              <tr>
                <td>{{$id++}}</td>
                <td>{{$searchs->updated_activity->getAKRA->SKRA_name}}</td>
                <td>{{$searchs->updated_activity->getAKRAActivity->SKRA_activity}}</td>
                <td>{{$searchs->activity_name}}</td>
                <td>{{$searchs->activity_venue}}</td>
                <td>{{$searchs->rgob_budget}}</td>
                <td>{{$searchs->external_budget}}</td>
                <td>
                   <form id='edit' class="form-group" action="" method='post'>
                          <input type="hidden" name="_method" value="delete">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          @if($searchs->status==0)
                          <a class="btn btn-info" data-toggle='modal' data-target='#editModal' onclick='editActivities({{$searchs->activity_id}})'>Edit</a>
                          <a class="btn btn-default" href="{{route('search_activity.searchKPI',$searchs->activity_id)}}">KPI</a>
                          <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this data');" name='name'>DEL
                          </button>
                           <a class="btn-warning" style="text-decoration:none;">&nbsp;Sent for Approval&nbsp;</a>
                          @endif
                          @if($searchs->status==1)
                           <a class="btn-success" style="text-decoration:none;">&nbsp;&nbsp;Approved&nbsp;&nbsp;</a>
                          <a class="btn btn-default" href="{{route('search_activity.searchKPI',$searchs->activity_id)}}">KPI</a>
                          @endif
                        </form>
                </td>
              </tr>
            @endforeach
            </tbody>
            @endif
            @if(isset($_POST['search']))
             <tbody id='tbody2'>
             <?php $id=1;
             ?>
              @foreach($search as $searchs)
              <tr>
                <td>{{$id++}}</td>
                @foreach($sport_update as $sport)
                  @if($sport->id==$searchs->weightage_id) 
                    <td>{{$sport->getAKRA->SKRA_name}}</td>
                    <td>{{$sport->getAKRAActivity->SKRA_activity}}</td>
                  @endif 
                @endforeach
                <td>{{$searchs->activity_name}}</td>
                <td>{{$searchs->activity_venue}}</td>
                <td>{{$searchs->rgob_budget}}</td>
                <td>{{$searchs->external_budget}}</td>
                <td>
                   <form id='edit' class="form-group" action="" method='post'>
                          <input type="hidden" name="_method" value="delete">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          @if($searchs->status==0)
                          <a class="btn btn-info" data-toggle='modal' data-target='#editModal' onclick='editActivities({{$searchs->activity_id}})'>Edit</a>
                          <a class="btn btn-default" href="{{route('search_activity.searchKPI',$searchs->activity_id)}}">KPI</a>
                          <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this data');" name='name'>DEL
                          </button>
                           <a class="btn-warning" style="text-decoration:none;">&nbsp;Sent for Approval&nbsp;</a>
                          @endif
                          @if($searchs->status==1)
                           <a class="btn-success" style="text-decoration:none;">&nbsp;&nbsp;Approved&nbsp;&nbsp;</a>
                          <a class="btn btn-default" href="{{route('search_activity.searchKPI',$searchs->activity_id)}}">KPI</a>
                          @endif
                        </form>
                </td>
              </tr>
            @endforeach
            </tbody>
            @endif
          </table>
          </div>
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
       <form action="" method="post">
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
          <label>Collaborating Agencies</label>
           <div class='form-group clearfix'>
            <label for='collaborating' class='col-xs-3'>Agency:</label>
              <div class='input-group col-xs-9'>
                <input type="text" name="collaborating"  class="form-control" id='collaborating'>
              </div>
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
</br>
</br>
<!--editModal ends here -->
<script type="text/javascript">
  function editActivities(id)
  {
    var activity_id=id;
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
  $('#table1').dataTable({
    'searching':false,
    'responsive':true
  });
   $('#five_yr_plan_id').change(function()
  {
    var five_year_id=$(this).val();
    var view_url ='{{route('view_fiscal_search')}}';
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":five_year_id}, 
        success: function(result){
          $('#fiscal_id').empty();
           $("#fiscal_id").prepend("<option disabled selected><--Select fiscal year--></option>");
          $.each(result,function(key,val)
          {
             $('#fiscal_id').append('<option value="'+val.fiscal_id+'">'+val.fiscal_year+'</option>');
          });
        }
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