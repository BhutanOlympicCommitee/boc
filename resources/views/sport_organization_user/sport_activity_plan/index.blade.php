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
              <div class="text-muted bootstrap-admin-box-title">Update Sport Organization Activities</div>
            </div>
            <div class="bootstrap-admin-panel-content">
              <!-- Form for the search functionality -->
               @if(Session::has('success'))
              <div class="alert alert-danger">
                {{ Session::get('success') }}
              </div>
          @endif
              <form action="{{route('sport_activity_plan.store')}}" method="post">
                 <div class='form-group'>
                    {{csrf_field()}}
                </div>
                <div class='form-group clearfix'>
            <label for='five_yr_plan_id' class='col-xs-2'>Five Year Plan:</label>
              <div class='col-xs-10 input-group'>
               <select class='form-control' name='five_yr_plan_id'>
                <option value="0">Select Five Year Plan</option>
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
                  <option value="0">Select AKRA</option>
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
                  <option value="0">Select BoC program</option>
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
                  <label for='wieghtage' class='col-xs-2'>Weightage(%):</label>
                    <div class='col-xs-10 input-group'>
                      <input type="text" name="wieghtage" class="form-control" placeholder="Enter weightage here" required>
                    </div>
                </div>
            </div>
         <div class="modal-footer">
          <button type="submit" class="btn btn-primary glyphicon glyphicon-ok">Save</button>

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
</br>
</br>
@endsection
@section('footer')
<div class="container">
  <div class="row">
    @include('includes.footer')
  </div>
</div>
@endsection
