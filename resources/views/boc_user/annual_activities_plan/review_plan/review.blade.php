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
              <div class="text-muted bootstrap-admin-box-title clearfix">Review Program
              </div>
             </div>
            <div class="bootstrap-admin-panel-content">
            <form action='{{route('approved_activities',$review_plan->activity_id)}}' method='post'>
            {{csrf_field()}}
            <div class='row clearfix'>Program:{{$review_plan->updated_activity->getAKRAActivity->SKRA_activity}}</div><br>
            <div class='row clearfix'>
              <div class='col-xs-2'><strong>Proposed</strong></div>
              <div class='col-xs-5'></div>
              <div class='col-xs-5'><strong>Approved</strong></div>
            </div>
            <br>
            <div class='row clearfix'>
              <div class='col-xs-2'>Activity</div>
              <div class='col-xs-5'>
               <input type="text" name="activity" class='form-control' value='{{$review_plan->activity_name}}'>
              </div>
              <div class='col-xs-5'>
               <input type="text" name="approved_activity" class='form-control' value='{{$review_plan->activity_name}}'>
              </div>
            </div>
             <br>
             <div class='row clearfix'>
              <div class='col-xs-2'>Venue</div>
              <div class='col-xs-5'>
               <input type="text" name="venue" class='form-control' value='{{$review_plan->activity_venue}}'>
              </div>
              <div class='col-xs-5'>
               <input type="text" name="approved_venue" class='form-control' value='{{$review_plan->activity_venue}}'>
              </div>
            </div>
             <br>
             <div class='row clearfix'>
              <div class='col-xs-2'>Time Line</div>
              <div class='col-xs-5'></div>
              <div class='col-xs-5'></div>
            </div><br>
            <div class='row clearfix'>
              <div class='col-xs-2'>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Quarter</span><br><br><br>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Actual</span>
              </div>
              <div class='col-xs-5'>
               <input type="text" name="quarter" class='form-control' value='{{$review_plan->quarter_timeline}}'><br>
               <input type="text" name="actual" class='form-control' value='{{$review_plan->actual_timeline}}'>
              </div>
              <div class='col-xs-5'>
               <input type="text" name="approved_quarter" class='form-control' value='{{$review_plan->quarter_timeline}}'><br>
               <input type="text" name="approved_actual" class='form-control' value='{{$review_plan->actual_timeline}}'>
              </div>
            </div>
             <br>
             <div class='row clearfix'>
              <div class='col-xs-2'>Source of Funding</div>
              <div class='col-xs-5'></div>            
              <div class='col-xs-5'></div>
            </div><br>
            <div class='row clearfix'>
              <div class='col-xs-2'>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Budget RGoB</span><br><br><br>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;External Budget</span><br><br><br>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;External Source</span>
              </div>       
              <div class='col-xs-5'>
               <input type="text" name="rgob" class='form-control' value='{{$review_plan->rgob_budget}}'><br>
               <input type="text" name="external" class='form-control' value='{{$review_plan->external_budget}}'><br>
               <input type="text" name="source" class='form-control' value='{{$review_plan->external_source}}'>
              </div>
              <div class='col-xs-5'>
               <input type="text" name="approved_rgob" class='form-control' value='{{$review_plan->rgob_budget}}'><br>
               <input type="text" name="approved_external" class='form-control' value='{{$review_plan->external_budget}}'><br>
               <input type="text" name="approved_source" class='form-control' value='{{$review_plan->external_source}}'>
              </div>
            </div>
             <br>
            <div class='row clearfix'>
              <div class='col-xs-2'>Collaborating Agency</div>
              <div class='col-xs-5'>
               <input type="text" name="collaborating_agency" class='form-control' value='{{$review_plan->collaborating_agency}}'>
              </div>
              <div class='col-xs-5'>
               <input type="text" name="approved_collaborating_agency" class='form-control' value='{{$review_plan->collaborating_agency}}' >
              </div>
            </div>
            <br>   
              <button type='submit' class='btn btn-primary col-xs-offset-10 glyphicon glyphicon-ok' name='update1' value='form1'>Update</button>
              <a href="{{route('review_plan.index')}}" class='btn btn-warning pull-right glyphicon glyphicon-remove'>Close</a>
            </form>
            </div>
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
               
