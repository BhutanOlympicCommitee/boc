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
               <div class='tab-content'>
                <div class='tab-pane fade in active' id='Report'><br> 
                  <span><strong>Financial Report</strong></span><br><br>
                  <div class='col-xs-12 form-group'>
                    <label class='col-xs-3'>RGoB Budget Utilization</label>
                      <div class='col-xs-8'>
                        <input type="text" name="rgob" class="form-control">
                       </div>
                  </div>
                  <div class='col-xs-12 form-group'>
                    <label class='col-xs-3'>Utilization %</label>
                      <div class='col-xs-8'>
                        <input type="text" name="utilization" class="form-control">
                      </div>
                  </div>
                  <div class='col-xs-12 form-group'>
                    <label class='col-xs-3'>External Budget Utilization</label>
                      <div class='col-xs-8'>
                        <input type="text" name="external_budget" class="form-control">
                      </div>
                  </div>
                  <div class='col-xs-12 form-group'>
                    <label class='col-xs-3'>Utilization %</label>
                      <div class='col-xs-8'>
                        <input type="text" name="utilization_percent" class="form-control">
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
                 <?php $id=1?>
                 {{-- @foreach($athlete_info as $athlete) --}}
                  <tr>
                    <td>{{$id++}}</td>
                    <td>{{'jfgkdf'}}</td>
                    <td>{{'jfgjfg'}}</td>
                    <td>{{'fhgjfdg'}}</td>
                    <td>{{'fjghfdg'}}</td>
                    <td>{{'fjgjdfgkkkh'}}</td>
                    <td>{{'jfkk'}}</td>
                  </tr>
                  {{-- @endforeach --}}
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
          
                <form class="form-group" action="{{--route('sport_organization.destroy',$sport->sport_org_id)--}}" method='post'>
                  <input type="hidden" name="_method" value="delete">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type='submit' class='btn btn-default col-xs-offset-10'>Submit</button>
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
              <form action='#' method='poast'>
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
              </form>
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
                 <?php $id=1?>
                 {{-- @foreach($athlete_info as $athlete) --}}
                  <tr>
                    <td>{{$id++}}</td>
                    <td>{{'jfgkdf'}}</td>
                    <td>{{'jfgjfg'}}</td>
                    <td>{{'fhgjfdg'}}</td>
                    <td>{{'fjghfdg'}}</td>
                    <td>{{'fjgjdfgkkkh'}}</td>
                    <td>{{'jfkk'}}</td>
                    <td> 
                      <button class='btn btn-info' data-toggle='modal' data-target='#updateParticipantsModal'>Update</button>
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
</div>
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
           <div class='form-group'>
              <label for='activity' class='col-xs-3'>Activity</label>
                  <div class='col-xs-9 input-group'>
                      <input type="text" name="activity" class="form-control" id='activity'>
                </div>
           </div>
           <div class='form-group clearfix'>
              <label for='activity_timeline' class='col-xs-3'>Activity Timeline</label>
                  <div class='col-xs-9 input-group'>
                      <input type="text" name="activity_timeline" class="form-control" id='activity_timeline'>
                </div>
           </div>
           <div class='form-group clearfix'>
              <label for='activity_venue' class='col-xs-3'>Activity Venue</label>
                  <div class='col-xs-9 input-group'>
                      <input type="text" name="activity_venue" id='activity_venue' class="form-control">
                </div>
           </div>
            <div class="form-group">
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
             <div class="form-group">
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
</div>
<!-- end update modal -->
@endsection
@section('footer')
<div class="container">
  <div class="row">
    @include('includes.footer')
  </div>
</div>
@endsection