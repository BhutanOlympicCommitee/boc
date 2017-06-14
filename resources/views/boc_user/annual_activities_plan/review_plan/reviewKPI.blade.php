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
              <div class="text-muted bootstrap-admin-box-title clearfix">Review KPI
              </div>
             </div>
            <div class="bootstrap-admin-panel-content">
            <form action='{{route('approved_kpi',$review_kpi->kpi_id)}}' method='post'>
            {{csrf_field()}}
            <div class='row clearfix'>&nbsp;&nbsp;&nbsp;&nbsp;Activity:{{$review_kpi->proposedActivity->activity_name}}</div><br>
            <div class='row clearfix'>
              <div class='col-xs-2'><strong>Proposed</strong></div>
              <div class='col-xs-5'></div>
              <div class='col-xs-5'><strong>Approved</strong></div>
            </div>
            <br>
            <div class='row clearfix'>
              <div class='col-xs-2'>KPI</div>
              <div class='col-xs-5'>
               <input type="text" name="kpi" class='form-control' value='{{$review_kpi->kpi_name}}'>
              </div>
              <div class='col-xs-5'>
               <input type="text" name="approved_kpi" class='form-control' value='{{$review_kpi->kpi_name}}'>
              </div>
            </div>
            <br>
             <div class='row clearfix'>
              <div class='col-xs-2'>KPI Description</div>
              <div class='col-xs-5'>
               <input type="text" name="kpi_description" class='form-control' value='{{$review_kpi->kpi_description}}'>
              </div>
              <div class='col-xs-5'>
               <input type="text" name="approved_kpi_description" class='form-control' value='{{$review_kpi->kpi_description}}'>
              </div>
            </div>
             <br>
             <div class='row clearfix'>
              <div class='col-xs-2'>KPI weight</div>
              <div class='col-xs-5'>
               <input type="text" name="kpi_weight" class='form-control' value='{{$review_kpi->kpi_weight}}'><br>
              </div>
              <div class='col-xs-5'>
               <input type="text" name="approved_kpi_weight" class='form-control' value='{{$review_kpi->kpi_weight}}'><br>
              </div>
            </div>
             <br>
             <div class='row clearfix'>
              <div class='col-xs-2'>Units</div>
              <div class='col-xs-5'>
               <input type="text" name="units" class='form-control' value='{{$review_kpi->unit}}'>
              </div>
              <div class='col-xs-5'>
               <input type="text" name="approved_units" class='form-control' value='{{$review_kpi->unit}}' >
              </div>
            </div>
            <br> 
            <div class='row clearfix'>
              <div class='col-xs-2'>Baseline</div>
              <div class='col-xs-5'>
               <input type="text" name="baseline" class='form-control' value='{{$review_kpi->baseline}}'>
              </div>
              <div class='col-xs-5'>
               <input type="text" name="approved_baseline" class='form-control' value='{{$review_kpi->baseline}}' >
              </div>
            </div>
            <br>     
             <div class='row clearfix'>
              <div class='col-xs-2'>Performance Evaluation</div>
              <div class='col-xs-5'></div>            
              <div class='col-xs-5'></div>
            </div><br>
            <div class='row clearfix'>
              <div class='col-xs-2'>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Good(Target)</span><br><br><br>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Average</span><br><br><br>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Poor</span>
              </div>       
              <div class='col-xs-5'>
               <input type="text" name="good" class='form-control' value='{{$review_kpi->goodRgStart."-".$review_kpi->goodRgEnd}}'><br>
               <input type="text" name="average" class='form-control' value='{{$review_kpi->avgRgStart."-".$review_kpi->avgRgEnd}}'><br>
               <input type="text" name="poor" class='form-control' value='{{$review_kpi->poorRgStart."-".$review_kpi->poorRgEnd}}'>
              </div>
              <div class='col-xs-5'>
               <input type="text" name="approved_good" class='form-control' value='{{$review_kpi->goodRgStart."-".$review_kpi->goodRgEnd}}'><br>
               <input type="text" name="approved_average" class='form-control' value='{{$review_kpi->avgRgStart."-".$review_kpi->avgRgEnd}}'><br>
               <input type="text" name="approved_poor" class='form-control' value='{{$review_kpi->poorRgStart."-".$review_kpi->poorRgEnd}}'>
              </div>
            </div>
             <br>
             <div class="form-group clearfix">
              <button type='submit' class='btn btn-primary col-xs-offset-10 glyphicon glyphicon-ok' name='update1' value='form1'>Update</button>
              <a href="{{route('review_plan.index')}}" class='btn btn-warning pull-right glyphicon glyphicon-remove'>Close</a>
                      
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
@endsection
@section('footer')
<div class="container">
    <div class="row">
        @include('includes.footer')
   
    </div>
</div>
@endsection
               
