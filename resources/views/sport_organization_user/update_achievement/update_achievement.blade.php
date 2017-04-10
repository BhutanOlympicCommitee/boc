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
              <form action="{{}}" method="post">
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
                  <label for="year"  class='col-xs-3'>AKRA</label> 
                  <div class='col-xs-9 input-group'>
                  <select name="year" class="form-control">
                    <option value="0">
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
                <label for="year"  class='col-xs-3'>Program</label> 
                <div class='col-xs-9 input-group'>
                <select name="year" class="form-control">
                  <option value="0">
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
          </form>
          <!-- Table Displayed using searching parameters -->
          <table class="table table-bordered table-striped table-responsive">
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
              {{-- @foreach($approved_activity as $approved) --}}
              <tr>
                <td>{{$i++}}</td>
                <td>dfjkfd</td>
                <td>dgfdg</td>
                <td>dfgdg</td>
                <td>dgfdg</td>
                <td>vbfgf</td>
                <td>fhfgh</td>
                <td>
                  <a href='{{route('activities_update_achievement')}}' type="button" class="edit_user btn btn-info" >
                    <span class="glyphicon glyphicon-erase"></span>
                    Update
                  </a>
                </td>
              </tr>
              {{-- @endforeach --}}
            </tbody>
          </table>
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
