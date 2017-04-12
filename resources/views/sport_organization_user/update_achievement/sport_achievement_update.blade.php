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
              <div class="text-muted bootstrap-admin-box-title">Update achievement information
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
              <ul class='nav nav-pills nav-justified'>
                <li class='active' id='reports'><a href="#Report" data-toggle="tab">Report tab</a></li>
                <li id='participants'><a href="#Participant" data-toggle="tab">Participant Information tab</a></li>
              </ul>
              <form action='' method='post'>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <div class='tab-content'>
                <div class='tab-pane fade in active' id='Report'><br> 
                  <span><strong>Financial Report</strong></span><br><br>
                  <div class='col-xs-12 form-group'>
                    <label class='col-xs-3'>RGoB Budget Utilization</label>
                      <div class='col-xs-8'>
                        <input type="text" name="rgob" class="form-control" id='rgob' placeholder='please enter rgob budget utilization'>
                        <input type="hidden" name="hidden_rgob" class="form-control" id='hidden_rgob' value='{{$approved_activity->approved_rgob_budget}}'>
                       </div>
                  </div>
                  <div class='col-xs-12 form-group'>
                    <label class='col-xs-3'>Utilization %</label>
                      <div class='col-xs-8'>
                        <input type="text" name="utilization" class="form-control" id='utilization' placeholder="auto calculated on click">
                      </div>
                  </div>
                  <div class='col-xs-12 form-group'>
                    <label class='col-xs-3'>External Budget Utilization</label>
                      <div class='col-xs-8'>
                        <input type="text" name="external_budget" class="form-control" id='external_budget' placeholder="Enter external budget utilization">
                        <input type="hidden" name="external_budget" class="form-control" id='hidden_external_budget' value='{{$approved_activity->approved_external_budget}}'>
                      </div>
                  </div>
                  <div class='col-xs-12 form-group'>
                    <label class='col-xs-3'>Utilization %</label>
                      <div class='col-xs-8'>
                        <input type="text" name="utilization_percent" class="form-control" placeholder="Automaically calculated on click" id='utilization_percent'>
                      </div>
                  </div>
                  <span><strong>Physical Report</strong></span><br><br>
                  <table class="table table-bordered table-striped table-responsive" id="table1">
                 <thead>
                    <tr>
                        <th>Sl_no:</th>
                        <th>KPI</th>
                        <th>Weight(RGoB)</th>
                        <th>Weight(External)</th>
                        <th>Target Achieved</th>
                        <th>Points Scored(RGoB)</th>
                        <th>Points Scored(External)</th>
                    </tr>   
                </thead>
                <tbody>
                 <?php $id=1;
                  $proposed_kpi=App\Tbl_proposed_KPI::where('activity_id',$approved_activity->activity_id)->get();
                  foreach($proposed_kpi as $kpi):
                  ?>
                  <?php 
                    $approved_kpi=App\Tbl_KPI_approved::where('kpi_id',$kpi->kpi_id)->get();
                    foreach($approved_kpi as $approved):
                 ?>
                  <tr>
                    <td>{{$id++}}</td>
                    <td>{{$approved->approved_kpi_name}}</td>
                    <td class='td1'>{{$approved->approved_RGoB}}</td>
                    <td class='external'>{{$approved->approved_external}}</td>
                    <td class='td2'><input type="text" name="target" id="target" style='width:100px'></td>
                    <td class='td3'><input type="text" name="rgob_score" id="rgob_score" style='width:100px;border:none;' placeholder="double click"></td>
                    <td class='td4'><input type="text" name="external_score" id="external_score" style='width:100px;border:none;' placeholder="double click"></td>
                  </tr>
                <?php endforeach ?>
              <?php endforeach ?>
              </tbody>
              </table><br>
              <div class='row clearfix'>
                <div class='col-xs-12 form-group'>
                <label class='col-xs-2'>Remarks</label>
                  <div class='col-xs-7'>
                    <textarea class="form-control" rows=5>
                      
                    </textarea>  
                  </div>
              </div>
              </div>
                  <button type='submit' class='btn btn-default col-xs-offset-10'>Submit</button>
<<<<<<< HEAD
                  <button type="submit" class="btn btn-warning pull-right" onclick="return confirm('Are you sure to delete this data');" name='name'>Cancel
                  </button>
              </form>
            
              </div>
              <div class='tab-content fade' id='Participant' ><br>
              <div class='row clearfix'>
                <form action='#' method='post'>
                <div class='col-xs-12 form-group'>
                  <label class='col-xs-3'>CID/Student ID</label>
                    <div class='col-xs-9'>
                      <input type="text" name="cid" class="form-control">
                     </div>
                </div>
                <div class='col-xs-12 form-group'>
                  <label class='col-xs-3'>Name</label>
                    <div class='col-xs-9'>
                      <input type="text" name="name" class="form-control">
                    </div>  
                </div>
                </div>
                <div class='form-group clearfix'>
                  <button type="submit" class="btn btn-warning pull-right" name='name'>Search
                  </button>
                </div>
              </form>
              <!-- if particpants not found show this form -->
             <!--  <form action='#' method='poast'>
                 <div class='col-xs-12 form-group'>
                <label class='col-xs-3'>CID/Student ID</label>
                  <div class='col-xs-9'>
                    <input type="text" name="cid" class="form-control">
                  </div>  
              </div>
              <div class='col-xs-12 form-group'>
                <label class='col-xs-3'>Name</label>
                  <div class='col-xs-9'>
                    <input type="text" name="name" class="form-control">
                  </div>  
              </div>
              <div class='col-xs-12 form-group'>
                <label class='col-xs-3'>Date of Birth</label>
                  <div class='col-xs-9'>
                    <input type="text" name="dob" class="form-control">
                  </div>  
              </div>
              <div class=" col-xs-12  form-group">
                <label class='col-xs-3'>Dzongkhag</label> 
                  <div class='col-xs-9'>
                  <select name="dzongkhag" class="form-control">
                    <option value="0">
                      Select the Dzongkhag
                    </option>
                    <?php 
                    $dzongkhags = App\MstDzongkhag::all();
                    foreach($dzongkhags as $dzongkhag):
                      ?>
                    <option value="{{$dzongkhag->dzongkhag_id}}">{{$dzongkhag->dzongkhag_name}}</option>
                  <?php endforeach;?>
                </select> 
                </div>
              </div>
              <div class=" col-xs-12  form-group">
                <label class='col-xs-3'>Gewog</label> 
                  <div class='col-xs-9'>
                  <select name="gewog" class="form-control">
                    <option value="0">
                      Select the gewog
                    </option>
                    <?php 
                    $gewogs = App\Gewog::all();
                    foreach($gewogs as $gewog):
                      ?>
                    <option value="{{ $gewog->gewog_id}}">{{ $gewog->gewog_name}}</option>
                  <?php endforeach;?>
                </select> 
                </div>
              </div>
               <div class='col-xs-12 form-group'>
                <label class='col-xs-3'>Villege</label>
                  <div class='col-xs-9'>
                    <input type="text" name="villege" class="form-control">
                  </div>  
              </div>
              <div class=" col-xs-12  form-group">
                <label class='col-xs-3'>Occupation</label> 
                  <div class='col-xs-9'>
                  <select name="occupation" class="form-control">
                    <option value="0">
                      Select the occupation
                    </option>
                    <?php 
                    $occupations = App\Athlete_occupation::all();
                    foreach($occupations as $occupation):
                      ?>
                    <option value="{{$occupation->occupation_id}}">{{$occupation->occupation_name}}</option>
                  <?php endforeach;?>
                </select> 
                </div>
              </div>
              <div class='col-xs-12 form-group'>
                <label class='col-xs-3'>Father's Name</label>
                  <div class='col-xs-9'>
                    <input type="text" name="father_name" class="form-control">
                  </div>  
              </div>
              <div class='col-xs-12 form-group'>
                <label class='col-xs-3'>Mobile</label>
                  <div class='col-xs-9'>
                    <input type="text" name="mobile" class="form-control">
                  </div>  
              </div>
              <div class='col-xs-12 form-group'>
                <label class='col-xs-3'>Email</label>
                  <div class='col-xs-9'>
                    <input type="text" name="email" class="form-control">
                  </div>  
              </div>
              <div class=' col-xs-12 form-group clearfix'>
              <label for='contact_address' class='col-xs-3'>Contact Address</label>
                  <div class='col-xs-9'>
                      <textarea name="contact_address" id='contact_address' class="form-control" rows=3></textarea> 
                </div>
             </div>
             <button type='submit' class='btn btn-default col-xs-offset-10'>Submit</button>
                  <a href='#' class="btn btn-warning pull-right" name='name'>Cancel
                  </a>
              </form> -->
            <!-- show if the match is found-->
              <table class="table table-bordered table-striped table-responsive" id="table1">
                 <thead>
                    <tr>
                        <th>Sl_no:</th>
                        <th>CID/Student ID</th>
                        <th>Name</th>
                        <th>Dzongkhag</th>
                        <th>Gewog</th>
                        <th>Villege</th>
                        <th>Father's Name</th>
                        <th>Action</th>
                    </tr>   
                </thead>
                <tbody>
              <?php $id=1;
              $athlete=App\Athlete_bioinformation::all();
              foreach($athlete as $athletes):
              ?>
              <tr>
                <td>{{$id++}}</td>
                <td>{{$athletes->athlete_cid}}</td>
                <td>{{$athletes->athlete_fname.' '.$athletes->athlete_mname.' '.$athletes->athlete_lname}}</td>
                <td>{{$athletes->getAthleteAddress->getDzongkhag->dzongkhag_name}}</td>
                <td>{{$athletes->getAthleteAddress->getGewog->gewog_name}}</td>
                <td>{{$athletes->getAthleteAddress->Paddress_village}}</td>
                <td>{{$athletes->athlete_fathername}}</td>
                <td>
                      <button class='btn btn-info' data-toggle='modal' data-target='#updateParticipantsModal'>Update</button>
                  </td>
                  </tr>
                @endforeach
              </tbody>
              </table>
              </div>           
=======
                  <a href='#' class="btn btn-warning pull-right">Cancel
                  </a>
>>>>>>> 776497c8bcbf5caef7f535bcae137b2b7af6ee28
            </div>
          </div>
        </form>
        
      </div>
    </div>
  </div>
</div>
<<<<<<< HEAD
<!-- update Modal -->
<div class="modal fade" id="updateParticipantsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Update participants details</h4>
      </div>
      <div class="modal-body">
       <form action='#{{--route('management_committee.store')--}}' method='post'>
           {{csrf_field()}}
             <div class="form-group clearfix">
                  <label for="activity"  class='col-xs-3'>Activity</label> 
                  <div class='col-xs-9 input-group'>
                  <select name="activity" class="form-control">
                    <option value="0">
                      Select the Activity
                    </option>
                    <?php 
                    $activity = App\Tbl_sport_org_activities_approved::all();
                    foreach($activity as $activities):
                      ?>
                    <option value="{{$activities->activity_id}}">{{$activities->approved_activity_name}}</option>
                  <?php endforeach;?>
                </select> 
                </div>
            </div>
              <div class="form-group clearfix">
                  <label for="timeline"  class='col-xs-3'>Activity Timeline</label> 
                  <div class='col-xs-9 input-group'>
                  <select name="timeline" class="form-control">
                      <option value="0">
                      Select the Activity
                    </option>
                    <?php 
                    $activity = App\Tbl_sport_org_activities_approved::all();
                    foreach($activity as $activities):
                      ?>
                    <option value="{{$activities->activity_id}}">{{$activities->approved_actual_timeline}}</option>
                  <?php endforeach;?>
                </select> 
                </div>
            </div>
               <div class="form-group clearfix">
                  <label for="year"  class='col-xs-3'>Activity Venue</label> 
                  <div class='col-xs-9 input-group'>
                  <select name="year" class="form-control">
                      <option value="0">
                      Select the Activity
                    </option>
                    <?php 
                    $activity = App\Tbl_sport_org_activities_approved::all();
                    foreach($activity as $activities):
                      ?>
                    <option value="{{$activities->activity_id}}">{{$activities->approved_activity_venue}}</option>
                  <?php endforeach;?>
                </select> 
                </div>
            </div>
            <div class="form-group clearfix">
                  <label for="year"  class='col-xs-3'>Sport</label> 
                  <div class='col-xs-9 input-group'>
                  <select name="year" class="form-control">
                    <option value="0">
                      Select the sport
                    </option>
                    <?php 
                    $asso_sports = App\Associated_Sport::all();
                    foreach($asso_sports as $asso_sport):
                      ?>
                    <option value="{{$asso_sport->sport_id}}">{{$asso_sport->sport_name}}</option>
                  <?php endforeach;?>
                </select> 
                </div>
            </div>
             <div class="form-group clearfix">
                  <label for="medal"  class='col-xs-3'>Medal/Certificate</label> 
                  <div class='col-xs-9 input-group'>
                  <select name="medal" class="form-control">
                    <option value="0">
                      Select metal
                    </option>
                    <?php 
                    $medals = App\Enum_Medal::all();
                    foreach($medals as $medal):
                      ?>
                    <option value="{{$medal->medal_id}}">{{$medal->Type}}</option>
                  <?php endforeach;?>
                </select> 
                </div>
              </div>
              <div class='form-group clearfix'>
              <label for='remark' class='col-xs-3'>Remarks</label>
                  <div class='col-xs-9 input-group'>
                      <textarea name="remark" id='remark' class="form-control" rows=3></textarea> 
                </div>
           </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default glyphicon glyphicon-ok" name='next' id='next'>Save</button>
          <button  class="btn btn-warning glyphicon glyphicon-remove" data-dismiss="modal">Cancel</button>
        </div>
      </form>
      </div>
    </div>
  </div>
=======
>>>>>>> 776497c8bcbf5caef7f535bcae137b2b7af6ee28
</div>
</div>
</div>
<script type="text/javascript">
//calculate RGoB budget utilization
  $('#utilization').click(function()
  {
    var rgob=$('#rgob').val();
    var approved_rgob=$('#hidden_rgob').val();
    var utilization=(rgob/approved_rgob)*100;
    var roundedValue = utilization.toFixed(2);
    $('#utilization').val(roundedValue);
  });

  //Calculate External Budget utilization
  $('#utilization_percent').click(function()
  {
    var external_budget=$('#external_budget').val();
    var approved_external_budget=$('#hidden_external_budget').val();
    var utilization_percent=(external_budget/approved_external_budget)*100;
    var roundedValue = utilization_percent.toFixed(2);
    $('#utilization_percent').val(roundedValue);
  });
  //get target achieved and calculate rgob and external score
  $('#table1 tr').click(function(){
    var rgob_weight=$(this).find('td.td1').text();
    var external=$(this).find('td.external').text();
    var target=$(this).find('input').val();
    var rgob_score=(target/rgob_weight)*100;
    var roundedValue1 = rgob_score.toFixed(2);
    var external_score=(target/external)*100;
    var roundedValue2= external_score.toFixed(2);
    checkAchievement(roundedValue1,roundedValue2);
  });
  function checkAchievement(rgob_score,external_score)
  {
    $('.td3').click(function()
    {
      if(rgob_score==0)
      {
        $(this).find('input').val('');
      }
      else if(rgob_score==100 || rgob_score>50)
      {
        $(this).find('input').val(rgob_score+'%'+'good');
      }
      else if(rgob_score==50 || rgob_score>25)
      {
         $(this).find('input').val(rgob_score+'%'+'average');
      }
      else if(rgob_score==25 || rgob_score<25)
      {
        $(this).find('input').val(rgob_score+'%'+'poor');
      }
    });
    $('.td4').click(function()
    {
      if(external_score==0)
      {
        $(this).find('input').val('');
      }
      else if(external_score==100 || external_score>50)
      {
        $(this).find('input').val(external_score+'%'+'good');
      }
      else if(external_score==50 || external_score>25)
      {
         $(this).find('input').val(external_score+'%'+'average');
      }
      else if(external_score==25 || external_score<25)
      {
        $(this).find('input').val(external_score+'%'+'poor');
      }
    });
  }
  $('#table1').dataTable(
    {
        "paging":   false,
        "ordering": false,
        "info":     false,
        'searching':false
    } );
</script>
@endsection
@section('footer')
<div class="container">
  <div class="row">
    @include('includes.footer')
  </div>
</div>
@endsection