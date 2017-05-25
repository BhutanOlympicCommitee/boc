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
              <div class="text-muted bootstrap-admin-box-title">Achievement update</div>
            </div>
            <div class="bootstrap-admin-panel-content">
              <!-- Form for the search functionality -->
              <form action="{{route('searchApprovedActivities')}}" method="post">
                  <input type="hidden" name="_token" value={{csrf_token()}}>
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
                <div class="form-group">
                  <label for="akra"  class='col-xs-3'>AKRA</label> 
                  <div class='col-xs-9 input-group'>
                  <select name="akra" class="form-control">
                    <option disabled selected>
                      Select the AKRA
                    </option>
                    <?php 
                    $skras = App\Tbl_SKRA::all();
                    foreach($skras as $skra):
                      ?>
                    <option value="{{$skra->skra_id}}">{{$skra->SKRA_description}}</option>
                  <?php endforeach;?>
                </select> 
                </div>
              </div>
              <div class="form-group ">
                <label for="program"  class='col-xs-3'>Program</label> 
                <div class='col-xs-9 input-group'>
                <select name="program" class="form-control">
                  <option disabled selected>
                    Select the program
                  </option>
                  <?php 
                  $skra_activities = App\Tbl_SKRA_activities::all();
                  foreach($skra_activities as $skra):
                    ?>
                  <option value="{{$skra->skra_activity_id}}">{{$skra->SKRA_activity}}</option>
                <?php endforeach;?>
              </select> 
              </div>
            </div>
            <div class='form-group clearfix'>
              <button class='pull-right btn btn-primary' type='submit'>Search</button>
            </div>
          </form>
          <!-- Table Displayed using searching parameters -->
          <div class="table-responsive">
          <table class="table table-bordered table-striped" id='table1'>
            <thead>
              <th>Sl.No</th>
              <th>Activities</th>
              <th>Timeline Quarter</th>
              <th>Timeline Actual Dates</th>
              <th>Venue</th>
              <th>RGoB Budget</th>
              <th>External Budget</th>
              <th>Action</th>
            </thead>
            <tbody>
              <?php 
              $i = 1;

              ?>
               @foreach($approved_activity as $approved)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$approved->approved_activity_name}}</td>
                <td>{{$approved->approved_quarter_timeline}}</td>
                <td>{{$approved->approved_actual_timeline}}</td>
                <td>{{$approved->approved_activity_venue}}</td>
                <td>{{$approved->approved_rgob_budget}}</td>
                <td>{{$approved->approved_external_budget}}</td>
                <td>
                  <a href='{{route('activities_update_achievement',$approved->activity_approval_id)}}' type="button" class="edit_user btn btn-info" >
                    <span class="glyphicon glyphicon-erase"></span>
                    Update
                  </a>
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
</br>
</br>
<script type="text/javascript">
  $('#table1').dataTable({
  'searching':false,
  'responsive':true
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
