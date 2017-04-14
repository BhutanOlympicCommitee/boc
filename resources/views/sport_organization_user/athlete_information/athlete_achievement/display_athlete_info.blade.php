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
              <div class="text-muted bootstrap-admin-box-title clearfix">Matching athlete information
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
            <form action="" method="post">
                {{csrf_field()}}
                <div class='row'>
                  <div class='col-xs-6 clearfix'>
                    <div class='form-group clearfix'>
                    <label for='year' class='col-xs-3'>Year</label>
                    <div class='col-xs-9 input-group'>
                  <select name="year" class="form-control" required>
                    <option>Select Year
                    </option>
                    <?php 
                    for($i = 1950 ; $i <= date('Y'); $i++){
                      echo "<option value='$i'>$i</option>";
                    }
                    ?>
                  </select> 
                </div>
                   </div>
                  <div class='form-group clearfix'>
            <label for='federation' class='col-xs-3'>Federation:</label>
              <div class='col-xs-9 input-group'>
                <select class='form-control' name='federation'>
                  <option>Select Federation</option>
                  <?php 
                    $sport=App\Sport_Organization::all();
                    foreach($sport as $sports):
                  ?>
                  <option value="{{$sports->sport_org_id}}">{{$sports->sport_org_name}}</option>
                  <?php 
                    endforeach
                  ?>
                </select>
              </div>
          </div>
                  </div>
                  <div class='col-xs-6 clearfix'>
                   <div class='form-group clearfix'>
                  <label for='geames' class='col-xs-3'>Games:</label>
                    <div class='col-xs-9 input-group'>
                      <select class='form-control' name='games' required>
                    <option>Select games</option>
                  <?php 
                    $game=App\Tbl_game_detail::all();
                    foreach($game as $games):
                  ?>
                  <option value="{{$games->gamesdetail_id}}">{{$games->name}}</option>
                  <?php 
                    endforeach
                  ?>
                </select>
                    </div>
                </div>
                   <div class='form-group clearfix'>
                  <label for='associatedSport' class='col-xs-3'>Sport:</label>
                    <div class='col-xs-9 input-group'>
                      <select class='form-control' name='associatedSport' required>
                    <option>Select Sport</option>
                  <?php 
                    $Asport=App\Associated_Sport::all();
                    foreach($Asport as $sport):
                  ?>
                  <option value="{{$sport->sport_id}}">{{$sport->sport_name}}</option>
                  <?php 
                    endforeach
                  ?>
                </select>
                    </div>
                </div>
                  </div>
                </div>
                  <div class="form-group clearfix">
                    <div class="col-xs-12 input-group ">
                      <input type="submit" class="btn btn-default pull-right" value="Search">
                    </div>
                </div>
              </form>
                 <div style='margin-top:20px'>  
          <table class="table table-bordered table-striped table-responsive" id="table">
             <thead>
                <tr>
                    <th>Sl_no:</th>
                    <th>Sport</th>
                    <th>Athlete ID</th>
                    <th>Athlete Name</th>
                    <th>Date of Birth</th>
                    <th>Action</th>
                </tr>   
            </thead>
            <tbody>
             <?php $id=1;
              $athlete_info=App\Athlete_bioinformation::all();
              foreach($athlete_info as $athlete):
              ?>
              <tr>
                <td>{{$id++}}</td>
                <td>{{$athlete->displayAsport->sport_name}}</td>
                <td>{{$athlete->athlete_id}}</td>
                <td>{{$athlete->athlete_fname.' '.$athlete->athlete_mname.' '.$athlete->athlete_lname}}</td>
                <td>{{$athlete->athlete_dob}}</td>
                <td>
                  <form class="form-group" action="" method='post'>
                  <a href="{{--route('training.show')--}}" data-toggle='modal' data-target='#viewDetails1' class="btn btn-info" onclick='view_details({{$athlete->athlete_id}})'>Details</a>
                  <a href="{{--route('training.show')--}}" data-toggle='modal' data-target='#achievement1' class="btn btn-primary" onclick='view_athleteAchievement({{$athlete->athlete_id}})'>Achievement</a>
                  <a href="{{--route('training.show')--}}" data-toggle='modal' data-target='#disciplinary1' class="btn btn-warning" onclick='view_athleteDisciplinary({{$athlete->athlete_id}})'>Disciplinary Action</a>
                  </form>
                </td>
              </tr>
            <?php endforeach?>
            </tbody>
          </table>
         </div>
          <input type="hidden" name="view_details1" id='view_details1' value='{{route('show_athlete_info1')}}'>
                     <input type="hidden" name="view_address1" id='view_address1' value='{{route('show_athlete_address1')}}'>
                      <input type="hidden" name="view_associated_sport1" id='view_associated_sport1' value='{{route('show_associated_sport1')}}'>
                     </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- view details modal begins-->
<div class="modal fade" id="viewDetails1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">View Details</h4>
      </div>
      <div class="modal-body">

        <div class='col-md-8'>
        <label>Title:</label>
        <input type="text" name="title" id='title' style='border-style:none'>
        <br>
        <label>First Name:</label>
         <input type="text" name="fname" id='fname' style='border-style:none'><br>
        <label>Last Name:</label>
        <input type="text" name="lname" id='lname' style='border-style:none'><br>
        <label>Occupation:</label>
        <input type="text" name="occupation" id='occupation' style='border-style:none'><br>
        <label>Date of Birth:</label>
        <input type="text" name="birth_date" id='birth_date' style='border-style:none'><br>
        <label>Place of Birth:</label>
        <input type="text" name="birth_place" id='birth_place' style='border-style:none'><br>
        <label>Gender:</label>
        <input type="text" name="gender" id='gender' style='border-style:none'><br>
        <label>Height:</label>
        <input type="text" name="height" id='height' style='border-style:none'><br>
        <label>Weight:</label>
        <input type="text" name="weight" id='weight' style='border-style:none'><br>
        <label>Father's Name:</label>
        <input type="text" name="father_name" id='father_name' style='border-style:none'><br>
        <label>Phone No.:</label>
        <input type="text" name="phone_no" id='phone_no' style='border-style:none'><br>
        <label>Mobile No:</label>
        <input type="text" name="mobile_no" id='mobile_no' style='border-style:none'><br>
        <label>Email:</label>
        <input type="text" name="email" id='email' style='border-style:none'><br>
        <label>Passport No.:</label>
        <input type="text" name="passport" id='passport' style='border-style:none'><br>
        <label>CID:</label>
        <input type="text" name="cid" id='cid' style='border-style:none'><br>
        <label>Associated Sport:</label>
        <input type="text" name="associated_sport2" id='associated_sport2' style='border-style:none'>
      </div>
      <div class='col-md-4' id='photo'>
      </div>
      <div class='clearfix'></div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
      </div>
      </div>
    </div>
  </div>
</div>
<!-- ends viewDetails modal-->
<!-- start achievement model -->
<div class="modal fade" id="achievement1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Athletes Achievements</h4>
      </div>
      <div class="modal-body">
       <form action="{{route('display_athlete_achievement.store')}}" method="post">
          {{csrf_field()}}
         <div class='form-group clearfix'>
            <label for='medals' class='col-xs-3'>Medal:</label>
              <div class='col-xs-9 input-group'>
                <select class='form-control' name='medals'>
                  <option></option>
                  <?php 
                    $medal=App\Enum_Medal::all();
                    foreach($medal as $medals):
                  ?>
                  <option value="{{$medals->medal_id}}">{{$medals->Type}}</option>
                  <?php 
                    endforeach
                  ?>
                </select>
              </div>
          </div>
                <div class='form-group clearfix'>
                  <label for='date' class='col-xs-3'>Date:</label>
                    <div class='col-xs-9 input-group'>
                      <input type="date" name="date" class="form-control" placeholder="Enter Comments here" required>
                    </div>
                </div>
           <div class='form-group clearfix'>
                  <label for='achievement' class='col-xs-3'>Other Achievements:</label>
                    <div class='col-xs-9 input-group'>
                      <textarea type="text" name="achievement" class="form-control" placeholder="Enter other achievements here" required></textarea>
                    </div>
                </div>
                 <div class='form-group clearfix'>
                  <label for='remark' class='col-xs-3'>Remarks:</label>
                    <div class='col-xs-9 input-group'>
                      <textarea type="text" name="remark" class="form-control" placeholder="Enter Remarks here" required></textarea>
                    </div>
                </div>
       <input type="hidden" name="hidden_athlete_id" id='hidden_athlete_id'>
       <div class="modal-footer">
          <button type="submit" class="btn btn-primary glyphicon glyphicon-ok">Save</button>
          <button type="button" class="btn btn-warning glyphicon glyphicon-remove" data-dismiss="modal">Cancel</button>
        </div>
        
      </form>
      </div>
    </div>
  </div>
</div>

<!-- end achievement model -->
<!-- start achievement model -->
<div class="modal fade" id="disciplinary1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Athletes Disciplinary Actions</h4>
      </div>
      <div class="modal-body">
       <form action="{{route('display_athlete_achievement.Actionstore')}}" method="post">
          {{csrf_field()}}
                <div class='form-group clearfix'>
                  <label for='date_of_action' class='col-xs-3'>Date of Action:</label>
                    <div class='col-xs-9 input-group'>
                      <input type="date" name="date_of_action" class="form-control" placeholder="Enter Comments here" required>
                    </div>
                </div>
                 <div class='form-group clearfix'>
                  <label for='action_end_date' class='col-xs-3'>Action End Date:</label>
                    <div class='col-xs-9 input-group'>
                      <input type="date" name="action_end_date" class="form-control" placeholder="Enter Comments here" required>
                    </div>
                </div>
           <div class='form-group clearfix'>
                  <label for='reason' class='col-xs-3'>Reason:</label>
                    <div class='col-xs-9 input-group'>
                      <textarea type="text" name="reason" class="form-control" placeholder="Enter other achievements here" required></textarea>
                    </div>
                </div>
                 <div class='form-group clearfix'>
                  <label for='remarks' class='col-xs-3'>Remarks:</label>
                    <div class='col-xs-9 input-group'>
                      <textarea type="text" name="remarks" class="form-control" placeholder="Enter Remarks here" required></textarea>
                    </div>
                </div>
                 <input type="hidden" name="hide_athlete_id" id='hide_athlete_id'>
      
       <div class="modal-footer">
          <button type="submit" class="btn btn-primary glyphicon glyphicon-ok">Save</button>
          <button type="button" class="btn btn-warning glyphicon glyphicon-remove" data-dismiss="modal">Cancel</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>

<!-- end achievement model -->
<script type="text/javascript">
 function view_details(id)
  {
    var view_url=$('#view_details1').val();
    var view_address=$('#view_address1').val();
    var view_sport=$('#view_associated_sport1').val();
    var image_path='{{URL::asset('/images/')}}';
    $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          $("#title").val(result.athlete_title);
          $("#fname").val(result.athlete_fname);
          $("#lname").val(result.athlete_lname);
          $("#occupation").val(result.athlete_occupation);
          $("#birth_date").val(result.athlete_dob);
          $("#birth_place").val(result.athlete_pob);
          $("#gender").val(result.athlete_gender);
          $("#height").val(result.athlete_height);
          $("#weight").val(result.athlete_weight);
          $("#father_name").val(result.athlete_fathername);
          $("#passport").val(result.athlete_passportNo);
          $("#cid").val(result.athlete_cid);
          $('#photo').html('<img style="border:3px solid gray; border-radius: 7px; margin-left: 20px;" height="200px" width="200px" src='+image_path+'/'+result.athlete_photo+'>');
          var sport_id=result.athlete_associatedSport;
           $.ajax({
            url: view_sport,
            type:"GET", 
            data: {"id":sport_id}, 
            success: function(result){
              //console.log(result);
              $("#associated_sport2").val(result.sport_name);
            }
          });
         
        }
      });

     $.ajax({
        url: view_address,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          $("#phone_no").val(result.Caddress_phone);
          $("#mobile_no").val(result.Caddress_mobile);
          $("#email").val(result.Caddress_email);
        }
      });
  }
   $(function()
  {
    $('#table').dataTable();
  });

   function view_athleteAchievement(id)
  {
    $('#hidden_athlete_id').val(id);
  }
  function view_athleteDisciplinary(id)
  {
    $('#hide_athlete_id').val(id);
  }
</script>
@endsection
@section('footer')
<div class="container">
 <div class="row">
  @include('includes.footer')
  </div>
</div>
@endsection