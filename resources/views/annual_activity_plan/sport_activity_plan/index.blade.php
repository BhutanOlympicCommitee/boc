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
              <div class="text-muted bootstrap-admin-box-title">Sport Organization Activity</div>
            </div>
            <div class="bootstrap-admin-panel-content">
              <!-- Form for the search functionality -->
              <form action="{{}}" method="post">
                <div class="form-group col-md-6">
                  <label for="year">Year</label> 
                  <select name="year" class="form-control">
                    <option value="0">
                      Select the Year
                    </option>
                    <?php 
                    for($i = 1950 ; $i <= date('Y'); $i++){
                      $y = $i + 1;
                      echo "<option value='<?php echo $i; ?>'>$i-$y</option>";
                    }
                    ?>
                  </select> 
                </div>
                <div class="form-group col-md-6">
                  <label for="year">SKRA</label> 
                  <select name="year" class="form-control">
                    <option value="0">
                      Select the SKRA
                    </option>
                    <?php 
                    $skras = App\Tbl_SKRA::all();
                    foreach($skras as $skra):
                      ?>
                    <option value="{{$skra->skra_id}}">{{$skra->SKRA_description}}</option>
                  <?php endforeach;?>
                </select> 
              </div>
              <div class="form-group">
                <label for="year">SKRA Activities</label> 
                <select name="year" class="form-control">
                  <option value="0">
                    Select the SKRA Activities
                  </option>
                  <?php 
                  $skra_activities = App\Tbl_SKRA_activities::all();
                  foreach($skra_activities as $skra):
                    ?>
                  <option value="{{$skra->skra_activity_id}}">{{$skra->SKRA_activity}}</option>
                <?php endforeach;?>
              </select> 
            </div>
          </form>
          <!-- Table Displayed using searching parameters -->
          <table class="table table-bordered table-striped table-responsive">
            <thead>
              <th>Sl.No</th>
              <th>Activities</th>
              <th>Baseline</th>
              <th>Target</th>
              <th>Venue</th>
              <th>Timeline</th>
              <th>Recurring Budget</th>
              <th>Capital Budget</th>
              <th>Collaborating Agencies</th>
              <th>Action</th>
            </thead>
            <tbody>
              <?php 
              $i = 1;

              ?>
              <td>{{$i}}</td>
              <td>hg</td>
              <td>hgf</td>
              <td>fgh</td>
              <td>fgh</td>
              <td>fh</td>
              <td>fh</td>
              <td>fh</td>
              <td>fh</td>
              <td>
                <button type="button" class="edit_user btn btn-info" data-toggle="modal" data-target="#sport_activity">
                  <span class="glyphicon glyphicon-erase"></span>
                  Edit
                </button>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <a href="#" onclick='return confirm("Are you sure?")' class="btn btn-warning"><span class=" glyphicon glyphicon-remove"></span>Delete</a>
              </td>
            </tbody>
          </table>
          <br>
          <div class="form-group" style="float:right;">
            <button type="button" class=" btn btn-success" data-toggle="modal" data-target="#add_sport_activity">
            <span class="glyphicon glyphicon-plus"></span>
            Add
            </button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<!-- Model to Edit the Sport Activity -->
<div class="modal fade" id="sport_activity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Sport Activities</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('update_user') }}">
          {{ csrf_field() }}
          <div class="col-md-10">
            <div class="form-group">
              <label for="year">Year</label> 
              <select name="year" class="form-control">
                <option value="0">
                  Select the Year
                </option>
                <?php 
                for($i = 1950 ; $i <= date('Y'); $i++){
                  $y = $i + 1;
                  echo "<option value='<?php echo $i; ?>'>$i-$y</option>";
                }
                ?>
              </select> 
            </div>    
            <div class="form-group">
              <label for="year">SKRA</label> 
              <select name="year" class="form-control">
                <option value="0">
                  Select the SKRA
                </option>
                <?php 
                $skras = App\Tbl_SKRA::all();
                foreach($skras as $skra):
                  ?>
                <option value="{{$skra->skra_id}}">{{$skra->SKRA_description}}</option>
              <?php endforeach;?>
              </select> 
            </div>
            <div class="form-group">
              <label for="year">SKRA Activities</label> 
              <select name="year" class="form-control">
                <option value="0">
                  Select the SKRA Activities
                </option>
                <?php 
                $skra_activities = App\Tbl_SKRA_activities::all();
                foreach($skra_activities as $skra):
                  ?>
                <option value="{{$skra->skra_activity_id}}">{{$skra->SKRA_activity}}</option>
              <?php endforeach;?>
              </select> 
            </div>
            <div class="form-group">
              <label for="activity">Activity</label> 
              <input type="text" name="activity" class="form-control">
            </div>
            <div class="form-group">
              <label for="baseline">Baseline</label> 
              <input type="text" name="baseline" class="form-control">
            </div>
            <div class="form-group">
              <label for="target">Target</label> 
              <input type="text" name="target" class="form-control">
            </div>
            <div class="form-group">
              <label for="venue">Venue</label> 
              <input type="text" name="venue" class="form-control">
            </div>
            <div class="form-group">
              <label for="timeline">Timeline</label> 
              <input type="text" name="timeline" class="form-control">
            </div>
            <div class="form-group">
              <label for="proposed_capital_budget">Proposed Capital Budget(Million)</label> 
              <input type="text" name="proposed_capital_budget" class="form-control">
            </div>
            <div class="form-group">
              <label for="proposed_recurring_budget">Proposed Recurring Budget(Million)</label> 
              <input type="text" name="proposed_recurring_budget" class="form-control">
            </div>
            <div class="form-group">
              <label for="collaborating_agency">Collaborating Agencies</label> 
              <input type="text" name="collaborating_agency" class="form-control">
            </div>
          </div>
     </div>
    <br>
    <div class="clearfix"></div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Save Changes</button>
    </div>
    </form>
</div>
</div>
</div>

<!--Model to add new Activity -->
<div class="modal fade" id="add_sport_activity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New Activities</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('update_user') }}">
          {{ csrf_field() }}
          <div class="col-md-10">
            <div class="form-group">
              <label for="year">Year</label> 
              <select name="year" class="form-control">
                <option value="0">
                  Select the Year
                </option>
                <?php 
                for($i = 1950 ; $i <= date('Y'); $i++){
                  $y = $i + 1;
                  echo "<option value='<?php echo $i; ?>'>$i-$y</option>";
                }
                ?>
              </select> 
            </div>    
            <div class="form-group">
              <label for="year">SKRA</label> 
              <select name="year" class="form-control">
                <option value="0">
                  Select the SKRA
                </option>
                <?php 
                $skras = App\Tbl_SKRA::all();
                foreach($skras as $skra):
                  ?>
                <option value="{{$skra->skra_id}}">{{$skra->SKRA_description}}</option>
              <?php endforeach;?>
              </select> 
            </div>
            <div class="form-group">
              <label for="year">SKRA Activities</label> 
              <select name="year" class="form-control">
                <option value="0">
                  Select the SKRA Activities
                </option>
                <?php 
                $skra_activities = App\Tbl_SKRA_activities::all();
                foreach($skra_activities as $skra):
                  ?>
                <option value="{{$skra->skra_activity_id}}">{{$skra->SKRA_activity}}</option>
              <?php endforeach;?>
              </select> 
            </div>
            <div class="form-group">
              <label for="activity">Activity</label> 
              <input type="text" name="activity" class="form-control">
            </div>
            <div class="form-group">
              <label for="baseline">Baseline</label> 
              <input type="text" name="baseline" class="form-control">
            </div>
            <div class="form-group">
              <label for="target">Target</label> 
              <input type="text" name="target" class="form-control">
            </div>
            <div class="form-group">
              <label for="venue">Venue</label> 
              <input type="text" name="venue" class="form-control">
            </div>
            <div class="form-group">
              <label for="timeline">Timeline</label> 
              <input type="text" name="timeline" class="form-control">
            </div>
            <div class="form-group">
              <label for="proposed_capital_budget">Proposed Capital Budget(Million)</label> 
              <input type="text" name="proposed_capital_budget" class="form-control">
            </div>
            <div class="form-group">
              <label for="proposed_recurring_budget">Proposed Recurring Budget(Million)</label> 
              <input type="text" name="proposed_recurring_budget" class="form-control">
            </div>
            <div class="form-group">
              <label for="collaborating_agency">Collaborating Agencies</label> 
              <input type="text" name="collaborating_agency" class="form-control">
            </div>
          </div>
    </div>
    <br>
    <div class="clearfix"></div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Save Changes</button>
    </div>
    </form>
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
