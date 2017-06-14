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
              <div class="text-muted bootstrap-admin-box-title">Update Sport Organization Activity</div>
            </div>
            <div class="bootstrap-admin-panel-content">
              <!-- Form for the search functionality -->
              <form action="{{route('sport_activity_plan.update',$sport_activity_edit->id)}}" method="post">
                 <div class='form-group'>
                    {{csrf_field()}}
                </div>
                <div class='form-group clearfix'>
            <label for='five_yr_plan_id' class='col-xs-2'>Five Year Plan:</label>
              <div class='col-xs-10 input-group'>
                <select class='form-control' name='five_yr_plan_id' id='five_year' disabled>
                      <option value="" disabled selected>Select five year plan</option>
                        <?php 
                            $fiveYearPlan=App\EnumFiveYearPlan::all();
                            foreach($fiveYearPlan as $five_year):
                          ?>
                          <option value="{{$five_year->five_yr_plan_id}}" <?php if($five_year->five_yr_plan_id==$sport_activity_edit->five_yr_plan_id){?>
                          selected
                          <?php } ?>>{{$five_year->name}}</option>
                          <?php 
                            endforeach
                          ?>
                      </select>
              </div>
          </div>
          <div class='form-group clearfix'>
            <label for='skra_id' class='col-xs-2'>AKRA:</label>
              <div class='col-xs-10 input-group'>
                <select class='form-control' name='skra_id' id='skra1' disabled>
                         <?php 
                            $skras=App\Tbl_SKRA::all();
                            foreach($skras as $skra):
                          ?>
                         <option value="{{$skra->skra_id}}" <?php if($skra->skra_id==$sport_activity_edit->skra_id){?>
                          selected
                          <?php } ?>>{{$skra->SKRA_name}}</option>
                          <?php 
                            endforeach
                          ?>
                      </select>
              </div>
          </div>
              <div class='form-group clearfix'>
            <label for='skra_activity_id' class='col-xs-2'>Program:</label>
              <div class='col-xs-10 input-group'>
                <select class='form-control' name='skra_activity_id' disabled>
                  <option>Select BoC program</option>
                  <?php 
                    $skra=App\Tbl_SKRA_activities::all();
                    foreach($skra as $skras):
                  ?>
                  <option value="{{$skras->skra_activity_id}}"<?php if($skras->skra_activity_id==$sport_activity_edit->skra_activity_id){?>
                          selected
                  <?php } ?>>{{$skras->SKRA_activity}}</option>
                  <?php 
                    endforeach
                  ?>
                </select>
              </div>
          </div>
            <div class='form-group clearfix'>
                  <label for='wieghtage' class='col-xs-2'>Weightage(%):</label>
                    <div class='col-xs-10 input-group'>
                      <input type="text" name="wieghtage" class="form-control" placeholder="Enter weightage here"  id='wieghtage' value='{{$sport_activity_edit->wieghtage}}' disabled>
                    </div>
                </div>
            </div>
         <div class="modal-footer">
             <a class='btn btn-success glyphicon glyphicon-plus pull-right' data-toggle='modal' data-target="#addModal">Add Activities</a> 
                          
        </div>
          </form>
         
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<!-- Add activity modal begins-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Activities</h4>
      </div>
      <div class="modal-body">
       <form action="{{route('add_sport_org_activity')}}" method="post">
          {{csrf_field()}}
          <div class='form-group clearfix'>
            <label for='activity' class='col-xs-3'>Activity:<a class="test">*</a></label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="activity" class="form-control" placeholder="Enter Activity name here" required>
              </div>
          </div>
          <div class='form-group clearfix'>
            <label for='venue' class='col-xs-3'>Venue:<a class="test">*</a></label>
            <div class='col-xs-9 input-group'>
              <input type="text" name="venue" class="form-control" placeholder="Enter Venue here" required>
            </div>
          </div>
        <div class='form-group clearfix'>
            <label>Time Line:</label>
             <div class='form-group'>
            <label for='fiscal_year' class='col-xs-3'>Fiscal Year:</label>
              <div class='col-xs-9 input-group'>
                <select class='form-control' name='fiscal_year'>
                  <option><--Select one--></option>
                  <?php 
                    $fiscalYear=App\fiscal_year::where('five_yr_plan_id',Session::get('five_year_id'))->get();
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
            <label for='quarter' class='col-xs-3'>Quater:<a class="test">*</a></label>
            <div class='col-xs-9 input-group'>
              <select class='form-control' name='quarter' id='five_year' required>
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
            <label for='actual' class='col-xs-3'>Actual:<a class="test">*</a></label>
              <div class='input-group col-xs-9'>
                <input type="text" name="actual"  class="form-control" placeholder="Month date - month date, year" required>
              </div>
          </div>
        </div>
         <div class='form-group clearfix'>
            <label>Source of Funding:</label>
          <div class='form-group clearfix'>
            <label for='rgob_budget' class='col-xs-3'>RGOB Budget(Nu):<a class="test">*</a></label>
            <div class='col-xs-9 input-group'>
              <input type="text" name="rgob_budget" class="form-control" placeholder="Enter RGoB budget here" required>
            </div>
          </div>
          <div class='form-group clearfix'>
            <label for='external_budget' class='col-xs-3'>External Budget(Nu):</label>
              <div class='input-group col-xs-9'>
                <input type="text" name="external_budget"  class="form-control" placeholder="Enter actual budget" value="0">
              </div>
          </div>
          <div class='form-group clearfix'>
            <label for='external_source' class='col-xs-3'>External Source:</label>
              <div class='input-group col-xs-9'>
                <input type="text" name="external_source"  class="form-control" placeholder="enter external source" >
              </div>
          </div>
        </div>
        <div class='form-group clearfix'>
          <label>Collaborating Agencies</label>
          <div class='form-group clearfix'>
            <label for='collaborating' class='col-xs-3'>Agency:</label>
              <div class='input-group col-xs-9'>
                <input type="text" name="collaborating"  class="form-control" placeholder="enter collaborating agency">
              </div>
              </div>
              </div>
          </div>

      
       <div class="modal-footer">
          <button type="submit" class="btn btn-primary glyphicon glyphicon-ok">Save</button>
          <button type="button" class="btn btn-warning glyphicon glyphicon-remove" data-dismiss="modal">Cancel</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- ends addModal-->
</br>
</br>
<style type="text/css">
a.test {
font-size: 20px;
color: red;
}
</style>
@endsection
@section('footer')
<div class="container">
  <div class="row">
    @include('includes.footer')
  </div>
</div>
@endsection
