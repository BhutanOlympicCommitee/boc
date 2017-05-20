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
              <div class="text-muted bootstrap-admin-box-title">Review Activities Plan
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
              <form action="{{route('searching_functionality')}}" method='post' id='view'>
                {{csrf_field()}}
                <div class='form-group'>
                  <label for='five_year' class='col-xs-3'>Five Year Plan</label>
                    <div class='col-xs-9 input-group'>
                      <select class='form-control' name='five_year' id='five_year'>
                      <option value="" disabled selected>Select five year plan</option>
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
                <div class='form-group'>
                  <label for='sport_org' class='col-xs-3
                  '>Sport Organization:</label>
                    <div class='col-xs-9 input-group'>
                      <select class='form-control' name='sport_org' id='sport_org'>
                        <option value="" disabled selected>Select sport organization</option>
                        <?php 
                          $sports=App\Sport_Organization::all();
                          foreach($sports as $sport):
                        ?>
                        <option value="{{$sport->sport_org_id}}">{{$sport->sport_org_name}}</option>
                        <?php 
                          endforeach
                        ?>
                      </select>
                  </div>
              </div>
                
                <div class='form-group'>
                  <label for='skra' class='col-xs-3'>AKRA:</label>
                    <div class='col-xs-9 input-group'>
                      <select class='form-control' name='skra' id='skra'>
                        <option value="" disabled selected>Select AKRA</option>
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
                <div class='form-group'>
                  <label for='skra_activity' class='col-xs-3
                  '>Programs:</label>
                    <div class='col-xs-9 input-group'>
                      <select class='form-control' name='skra_activity' id='skra_activity'>
                        <option value="" disabled selected>Select Program</option>
                        <?php 
                          $skra_activities=App\Tbl_SKRA_activities::all();
                          foreach($skra_activities as $skra_activity):
                        ?>
                        <option value="{{$skra_activity->skra_activity_id}}">{{$skra_activity->SKRA_activity}}</option>
                        <?php 
                          endforeach
                        ?>
                      </select>
                    </div>
                </div>
              <div class='form-group'>
                <span class='input-group-btn'>
                  <button class='btn btn-primary pull-right' type='submit' name='submit' value='view'>Search</button>
                </span>
              </div>

              </form>
               <div class="table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Sl. No:</th>
                            <th>Activities</th>
                            <th>Venue</th>
                            <th>Timeline Quarter</th>
                            <th>Timeline Actual</th>
                            <th>RGoB Budget</th>
                            <th>External Funding</th>
                            <th>Collaborating Agencies</th>
                            <th>Action</th>
                        </tr>   
                    </thead>
                    <tbody>
                    <?php $id=1;
                    ?>
                    @foreach($review_plan as $review) 
                   
                      <tr>
                         <td>{{$id++}}</td>
                         <td>{{$review->activity_name}}</td>
                          <td>{{$review->activity_venue}}</td>
                          <td>{{$review->quarterTimeline->quarter_name}}</td>
                          <td>{{$review->actual_timeline}}</td>
                          <td>{{$review->rgob_budget}}</td>
                          <td>{{$review->external_budget}}</td>
                          <td>{{$review->collaborating_agency}}</td>
                          <td>
                            @if($review->status==0)
                            <a href="{{route('review_plan.review',$review->activity_id)}}" class="btn btn-info glyphicon glyphicon-edit">Review</a>
                           <a href="{{route('review_plan.reviewKPI',$review->activity_id)}}" class="btn btn-success glyphicon glyphicon-ok">KPI</a>
                           @endif
                           @if($review->status==1)
                             <a class="btn-warning" style="text-decoration:none;">&nbsp;&nbsp;Reviewed&nbsp;&nbsp;</a>
                           <a href="{{route('review_plan.reviewKPI',$review->activity_id)}}" class="btn btn-success glyphicon glyphicon-ok">KPI</a>
                           @endif
                          </td>
                      </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>  
                </div>  
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript">
$('#table1').dataTable(
  {
    'searching':false
     "responsive": true
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

                
                               
                             
