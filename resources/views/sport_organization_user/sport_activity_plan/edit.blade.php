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
                <select class='form-control' name='five_yr_plan_id' id='five_year'>
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
                <select class='form-control' name='skra_id' id='skra1'>
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
            <label for='skra_activity_id' class='col-xs-2'>BoC Program:</label>
              <div class='col-xs-10 input-group'>
                <select class='form-control' name='skra_activity_id'>
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
                  <label for='wieghtage' class='col-xs-2'>Wieghtage(%):</label>
                    <div class='col-xs-10 input-group'>
                      <input type="text" name="wieghtage" class="form-control" placeholder="Enter wieghtage here"  id='wieghtage' value='{{$sport_activity_edit->wieghtage}}'>
                    </div>
                </div>
            </div>
         <div class="modal-footer">
          <button type="submit" class="btn btn-default glyphicon glyphicon-ok">Add Activities</button>

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

@endsection
@section('footer')
<div class="container">
  <div class="row">
    @include('includes.footer')
  </div>
</div>
@endsection
