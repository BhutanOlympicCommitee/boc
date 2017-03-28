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
              <div class="text-muted bootstrap-admin-box-title clearfix">Review
              </div>
             </div>
            <div class="bootstrap-admin-panel-content">
            <form action='{{route('approved_activities',$review_plan->activity_id)}}' method='post'>
            {{csrf_field()}}
            <div class='row clearfix'>
              <div class='col-xs-4'>Proposed</div>
              <div class='col-xs-4'></div>
              <div class='col-xs-4'>Approved</div>
            </div>
            <br>
            <div class='row clearfix'>
              <div class='col-xs-4'>Year</div>
              <div class='col-xs-4'>
                <select class="form-control" name='year'>
                  <option value='{{$review_plan->year_id}}'>{{$review_plan->year_id}}</option>
                </select>
              </div>
              <div class='col-xs-4'>
                <select class="form-control" name='approved_year'>
                  <option value='{{$review_plan->year_id}}'>{{$review_plan->year_id}}</option>
                </select>
              </div>
            </div>
            <br>
            <div class='row clearfix'>
              <div class='col-xs-4'>SKRA</div>
              <div class='col-xs-4'>
                <select class="form-control" name='skra'>
                  <option value='{{$review_plan->skra_id}}'>{{$review_plan->skra->SKRA_name}}</option>
                </select>
              </div>
              <div class='col-xs-4'>
                <select class="form-control" name='approved_skra'>
                  <option value='{{$review_plan->skra_id}}'>{{$review_plan->skra->SKRA_name}}</option>
                </select>
              </div>
            </div>
             <br>
            <div class='row clearfix'>
              <div class='col-xs-4'>SKRA activities/NSF outputs</div>
              <div class='col-xs-4'>
                <select class="form-control">
                  <option value='{{$review_plan->skra_id}}'>{{$review_plan->skraActivity->SKRA_activity}}</option>
                </select>
              </div>
              <div class='col-xs-4'>
                <select class="form-control" name='approved_skra'>
                  <option value='{{$review_plan->skra_id}}'>{{$review_plan->skraActivity->SKRA_activity}}</option>
                </select>
              </div>
            </div>
             <br>
            <div class='row clearfix'>
              <div class='col-xs-4'>Activity</div>
              <div class='col-xs-4'>
               <input type="text" name="activity" class='form-control' value='{{$review_plan->activity_name}}'>
              </div>
              <div class='col-xs-4'>
               <input type="text" name="approved_activity" class='form-control' value='{{$review_plan->activity_name}}'>
              </div>
            </div>
             <br>
            <div class='row clearfix'>
              <div class='col-xs-4'>Baseline</div>
              <div class='col-xs-4'>
               <input type="text" name="baseline" class='form-control' value='{{$review_plan->activity_baseline}}'>
              </div>
              <div class='col-xs-4'>
               <input type="text" name="approved_baseline" class='form-control' value='{{$review_plan->activity_baseline}}'>
              </div>
            </div>
             <br>
             <div class='row clearfix'>
              <div class='col-xs-4'>Target</div>
              <div class='col-xs-4'>
               <input type="text" name="target" class='form-control' value='{{$review_plan->activity_target}}'>
              </div>
              <div class='col-xs-4'>
               <input type="text" name="approved_target" class='form-control' value='{{$review_plan->activity_target}}' >
              </div>
            </div>
             <br>
             <div class='row clearfix'>
              <div class='col-xs-4'>Venue</div>
              <div class='col-xs-4'>
               <input type="text" name="venue" class='form-control' value='{{$review_plan->activity_venue}}'>
              </div>
              <div class='col-xs-4'>
               <input type="text" name="approved_venue" class='form-control' value='{{$review_plan->activity_venue}}'>
              </div>
            </div>
             <br>
             <div class='row clearfix'>
              <div class='col-xs-4'>Time Line</div>
              <div class='col-xs-4'>
               <input type="text" name="timeline" class='form-control' value='{{$review_plan->activity_timeline}}'>
              </div>
              <div class='col-xs-4'>
               <input type="text" name="approved_timeline" class='form-control' value='{{$review_plan->activity_timeline}}'>
              </div>
            </div>
             <br>
             <div class='row clearfix'>
              <div class='col-xs-4'>Proposed Capital Budget(million)</div>
              <div class='col-xs-4'>
               <input type="text" name="capital_budget" class='form-control' value='{{$review_plan->proposed_capital_budget}}'>
              </div>
              <div class='col-xs-4'>
               <input type="text" name="approved_capital_budget" class='form-control' value='{{$review_plan->proposed_capital_budget}}'> 
              </div>
            </div>
             <br>
             <div class='row clearfix'>
              <div class='col-xs-4'>Proposed Recurring Budget(million)</div>
              <div class='col-xs-4'>
               <input type="text" name="recurring_budget" class='form-control' value='{{$review_plan->proposed_recurring_budget}}'>
              </div>
              <div class='col-xs-4'>
               <input type="text" name="approved_recurring_budget" class='form-control' value='{{$review_plan->proposed_recurring_budget}}'>
              </div>
            </div>
             <br>
            <div class='row clearfix'>
              <div class='col-xs-4'>Collaborating Agencies</div>
              <div class='col-xs-4'>
               <input type="text" name="collaborating_agency" class='form-control' value='{{$review_plan->collaborating_agency}}'>
              </div>
              <div class='col-xs-4'>
               <input type="text" name="approved_collaborating_agency" class='form-control' value='{{$review_plan->collaborating_agency}}' >
              </div>
            </div>
            <br>         
              <button type='submit' class='btn btn-info col-xs-offset-10' name='update1' value='form1'>Update</button>
              <a href="{{route('review_plan.index')}}" class='btn btn-warning pull-right'> Cancel</a>
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
               
