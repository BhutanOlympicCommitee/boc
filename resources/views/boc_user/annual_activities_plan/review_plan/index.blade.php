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
              <div class="text-muted bootstrap-admin-box-title">Review Plan
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
              <form action="{{action('ReviewPlanController@index')}}" method='get' id='view'>
                {{csrf_field()}}
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
                 <label for='year' class='col-xs-3
                 '>Year:</label>
                  <div class='col-xs-9 input-group'>
                    <select class='form-control' name='year' id='year'>
                       <option value="0">
                      Select the Year
                    </option>
                    <?php 
                    for($i = 1950 ; $i <= date('Y'); $i++)
                    {
                      echo "<option value=$i >$i</option>";
                    }
                    ?>
                    </select>
                  </div>
                </div>
                <div class='form-group'>
                  <label for='skra' class='col-xs-3'>AKRA:</label>
                    <div class='col-xs-9 input-group'>
                      <select class='form-control' name='skra' id='skra'>
                        <option value="" disabled selected>Select sport organization</option>
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
                  '>AKRA Activity:</label>
                    <div class='col-xs-9 input-group'>
                      <select class='form-control' name='skra_activity' id='skra_activity'>
                        <option value="" disabled selected>Select AKRA activity</option>
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
                  <button class='btn btn-default pull-right' type='submit' name='submit' value='view'>Search</button>
                </span>
              </div>

              </form>
              @if(isset($_GET['submit']))
                <script type="text/javascript">
                  $(function()
                  {
                    $('#view').hide();
                  });
                </script>
                <?php 
                    $sport_id=$_GET['sport_org'];
                    $akra_id=$_GET['skra'];
                    $year=$_GET['year'];  
                    $akra_activity=$_GET['skra_activity'];
                ?>
                <table class="table table-bordered table-striped table-responsive" id="table1">
                    <thead>
                        <tr>
                            <th>Sl. No:</th>
                            <th>Activities</th>
                            <th>Baseline</th>
                            <th>Target</th>
                            <th>Venue</th>
                            <th>Timeline</th>
                            <th>Recurring Budget(MM)</th>
                            <th>Capital Budget(MM)</th>
                            <th>Collaborating Budget</th>
                            <th>Remarks</th>
                            <th>Action</th>
                        </tr>   
                    </thead>
                    <tbody>
                    <?php $id=1;
                    ?>
                    @foreach($review_plan as $review)
                    @if($sport_id==$review->sport_org_id && $year==$review->year_id && $akra_id==$review->skra_id && $akra_activity==$review->skra_activity_id)
                      <tr>
                         <td>{{$id++}}</td>
                         <td>{{$review->activity_name}}</td>
                          <td>{{$review->activity_baseline}}</td>
                          <td>{{$review->activity_target}}</td>
                          <td>{{$review->activity_venue}}</td>
                          <td>{{$review->activity_timeline}}</td>
                          <td>{{$review->proposed_recurring_budget}}</td>
                          <td>{{$review->proposed_capital_budget}}</td>
                          <td>{{$review->collaborating_agency}}</td>
                          <td>{{$review->remarks}}</td>
                          <td>
                            <a href="{{route('review_plan.review',$review->activity_id)}}" class="btn btn-primary">Review</a>
                          </td>
                      </tr>
                    @endif
                    @endforeach
                    </tbody>
                </table>
                </div>  
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript">
</script>
@endsection
@section('footer')
<div class="container">
    <div class="row">
        @include('includes.footer')
    </div>
</div>
@endsection

                
                               
                             