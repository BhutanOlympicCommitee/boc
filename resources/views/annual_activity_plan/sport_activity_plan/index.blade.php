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
                  <label for="skra">SKRA</label> 
                  <select name="skra" class="form-control">
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
                <label for="skra_activity">SKRA Activities</label> 
                <select name="skra_activity" class="form-control">
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
              <th>Recurring Budget(Million)</th>
              <th>Capital Budget(Million)</th>
              <th>Collaborating Agencies</th>
              <th>Action</th>
            </thead>
            <tbody>
              <?php 
              $i = 1;
              $sport_activities =App\Tbl_sport_org_activities::all();
              foreach($sport_activities as $spt_acti):
              ?>
            <tr>
              <td>{{$i}}</td>
              <td>{{$spt_acti->activity_name}}</td>
              <td>{{$spt_acti->activity_baseline}}</td>
              <td>{{$spt_acti->activity_target}}</td>
              <td>{{$spt_acti->activity_venue}}</td>
              <td>{{$spt_acti->activity_timeline}}</td>
              <td>{{$spt_acti->proposed_recurring_budget}}</td>
              <td>{{$spt_acti->proposed_capital_budget}}</td>
              <td>{{$spt_acti->collaborating_agency}}</td>
              <td>
                <button type="button" class=" edit_activity btn btn-info" data-toggle="modal" data-target="#edit_sport_activity">
                  <span class="glyphicon glyphicon-erase"></span>
                  Edit
                  <div class="hidden year">{{$spt_acti->year}}</div>
                  <div class="hidden akra">{{$spt_acti->skra_id}}</div>
                  <div class="hidden akra_activity">{{$spt_acti->skra_activity_id}}</div>
                  <div class="hidden activity">{{$spt_acti->activity_name}}</div>
                  <div class="hidden baseline">{{$spt_acti->activity_baseline}}</div>
                  <div class="hidden target">{{$spt_acti->activity_target}}</div>
                  <div class="hidden venue">{{$spt_acti->activity_venue}}</div>
                  <div class="hidden timeline">{{$spt_acti->activity_timeline}}</div>
                  <div class="hidden proposed_capital_budget">{{$spt_acti->proposed_capital_budget}}</div>
                  <div class="hidden proposed_recurring_budget">{{$spt_acti->proposed_recurring_budget}}</div>
                  <div class="hidden collaborating_agency">{{$spt_acti->collaborating_agency}}</div>
                  <div class="hidden activity_id">{{$spt_acti->activity_id}}</div>
                </button>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <a href="{{route('delete_sport_org_activity',['id'=>$spt_acti->activity_id])}}" onclick='return confirm("Are you sure?")' class="btn btn-warning"><span class=" glyphicon glyphicon-remove"></span>Delete</a>
              </td>
            </tr>
              <?php 
              $i++;
              endforeach;
              ?>
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
<!-- Model to Add the Sport Activity -->
<div class="modal fade" id="add_sport_activity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Sport Activities</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('add_sport_org_activity') }}">
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
                  ?>
                  <option value="{{$i}}">{{$i}}</option>
                <?php
                }
                ?>
              </select> 
            </div>    
            <div class="form-group">
              <label for="skra">AKRA</label> 
              <select name="skra" class="form-control">
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
            <div class="form-group">
              <label for="skra_activity">AKRA Activities</label> 
              <select name="skra_activity" class="form-control">
                <option value="0">
                  Select the AKRA Activities
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

<!--Model to update  Activity -->
<div class="modal fade" id="edit_sport_activity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Sport Activities</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('update_sport_activities',[]) }}">
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
                  ?>
                  <option value="{{$i}}">{{$i}}</option>
                <?php
                }
                ?>
              </select> 
            </div>    
            <div class="form-group">
              <label for="skra">AKRA</label> 
              <select name="skra" class="form-control">
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
            <div class="form-group">
              <label for="skra_activity">AKRA Activities</label> 
              <select name="skra_activity" class="form-control">
                <option value="0">
                  Select the AKRA Activities
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
          <input type="hidden" name="activity_id">
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
<script type="text/javascript">
    $(document).ready(function(){
        $('.edit_activity').click(function(){
          //alert('Hello');
          //year = $(this).find(".year").html();
          //akra = $(this).find(".akra").html();
          //akra_activity = $(this).find(".akra_activity").html();
          activity = $(this).find(".activity").html();
          baseline = $(this).find(".baseline").html();
          target = $(this).find(".target").html();
          venue = $(this).find(".venue").html();
          timeline = $(this).find(".timeline").html();
          proposed_capital_budget = $(this).find(".proposed_capital_budget").html();
          proposed_recurring_budget = $(this).find(".proposed_recurring_budget").html();
          collaborating_agency = $(this).find(".collaborating_agency").html();
          activity_id = $(this).find('.activity_id').html();

          //alert(activity_id);

         // $('#update_sport_activity input[name=year]').val(year);
          //$('#update_sport_activity input[name=akra]').val(akra);
          //$('#update_sport_activity input[name=akra_activity]').val(akra_activity);

          $('#edit_sport_activity input[name=activity]').val(activity);
          $('#edit_sport_activity input[name=baseline]').val(baseline);
          $('#edit_sport_activity input[name=target]').val(target);
          $('#edit_sport_activity input[name=venue]').val(venue);
          $('#edit_sport_activity input[name=timeline]').val(timeline);
          $('#edit_sport_activity input[name=proposed_capital_budget]').val(proposed_capital_budget);
          $('#edit_sport_activity input[name=proposed_recurring_budget]').val(proposed_recurring_budget);
          $('#edit_sport_activity input[name=collaborating_agency]').val(collaborating_agency);
          $('#edit_sport_activity input[name=activity_id]').val(activity_id);
      });
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
