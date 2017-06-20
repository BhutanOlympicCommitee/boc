@extends('layouts.app')
@section('nav-bar')
@include('includes.header')
@endsection
@section('side-bar')
    <div class="row">
        @include('includes.sidebar')
    </div>
@endsection
@section('content')
<div class="container-fluid">
  <div class="row">
    <!-- content -->
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-11 col-md-offset-1">
          <div class="panel panel-default">
            <div class="panel-heading">
	           <div class="text-muted bootstrap-admin-box-title clearfix">Add Athlete Team Member
	           </div>
	          </div>
            <div class="bootstrap-admin-panel-content">
              <ul class='nav nav-pills nav-justified'>
                <li id='game1'><a href="#games_master" data-toggle="tab">Games Information</a></li>
                <li id='coach'><a href="#" data-toggle="tab">Sport And Coach Information</a></li>
                <li class='active' id='team'><a href="#" data-toggle="tab">Athlete Team Member</a></li>
              </ul>
              @if(Session::has('success'))
                <div class="alert alert-success">
                  {{ Session::get('success') }}
                </div>	
						 	@endif
              </br>
              <form action='{{route('search_sport_coach')}}' method='POST'>
                <input type="hidden" name="_token" value='{{csrf_token()}}'>
              <div class='row'>
               <div class='col-xs-6 clearfix'>
                <div class='form-group clearfix'>
                 <label for='federation' class='col-xs-3'>Federation:</label>
                  <div class='col-xs-9 input-group'>
                   <select class='form-control' name='federation' id='federation1'>
                    <option disabled selected>Select sport organization</option>
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
                <label for='sport' class='col-xs-2'>Sport:</label>
                  <div class='col-xs-10 input-group'>
                    <select class='form-control' name='sport' id='sport1'>
                      <option disabled selected>Select associated sport</option>
                      <?php 
                        $asport=App\Associated_Sport::all();
                        foreach($asport as $asports):
                      ?>
                      <option value="{{$asports->sport_id}}">{{$asports->sport_name}}</option>
                      <?php 
                        endforeach
                      ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class='form-group clearfix'>
              <button type='submit' class='btn btn-primary pull-right' name='submit'>Search</button>
            </div>
            </form>
            <div class="table-responsive">
             <table class="table table-bordered table-striped" id="table1">
              <thead>
                <tr>
                  <th>Sl. No:</th>
                  <th>Federation</th>
                  <th>Sport</th>
                  <th>Athlete Name</th>
                  <th>Athlete function</th>
                  <th>Game ID</th>
                  <th style='width:20%'>Action</th>
                </tr> 
              </thead>
              <tbody>
              <?php $id=1 ?>
              @foreach($team as $teams)
              @foreach($teams->games as $team_member)
              <tr>
                <td>{{$id++}}</td>
                <td>{{$teams->displayAsport->Sport->sport_org_name}}</td>
                <td>{{$teams->displayAsport->sport_name}}</td>
                <td>{{$teams->athlete_fname.' '.$teams->athlete_mname.' '.$teams->athlete_lname}}</td>
                <td>{{$teams->displayAthleteFunction->athlete_function_name}}</td>
                <td>{{$team_member->gamesdetail_id}}</td>
                <td>
                  <form id='remove' class="form-group" action="{{route('team_master.destroy',$teams->athlete_id,$team_member->gamesdetail_id)}}" method='post'>
                          <input type="hidden" name="_method" value="delete">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <a class="btn btn-info glyphicon glyphicon-edit" name='name' onclick='editAthleteFunction({{$teams->athlete_id}})'>Edit
                          </a>
                          <input type="hidden" name="hidden_game_id" value={{$team_member->gamesdetail_id}}>
                          <button type="submit" class="btn btn-danger glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete this data');" name='name'>Delete
                          </button>
                        </form>
                </td>
              </tr>
              @endforeach
              @endforeach
              </tbody>
            </table> 
          </div>
            <input type="hidden" name="view_details1" id='view_details1' value='{{route('show_athlete_info1')}}'>
           <input type="hidden" name="view_address1" id='view_address1' value='{{route('show_athlete_address1')}}'>
            <input type="hidden" name="view_associated_sport1" id='view_associated_sport1' value='{{route('show_associated_sport1')}}'>
            @if(isset($_POST['submit']))
               <div class='clearfix' id='add_team_member'> 
                  <a href='#' class='btn btn-success glyphicon glyphicon-plus pull-right' data-toggle='modal' data-target="#addModal">Add Team Member</a> 
                </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Add team memeber modal begins-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Select Athlete for Team</h4>
      </div>
      <div class="modal-body">
          <form action="{{route('team_master.store')}}" method="post">
          {{csrf_field()}}
          <div style='margin-top:20px'>  
            <div class="table-responsive">
          <table class="table table-bordered table-striped table-responsive" id="table2">
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
             $team=App\Athlete_bioinformation::all();?>
              @foreach($team as $teams)
              @if($teams->athlete_associatedSport==Session::get('sport_id'))
              <tr>
                <td>{{$id++}}</td>
                <td>{{$teams->displayAsport->sport_name}}</td>
                <td>{{$teams->athlete_id}}</td>
                <td>{{$teams->athlete_fname.' '.$teams->athlete_mname.' '.$teams->athlete_lname}}</td>
                <td>{{$teams->athlete_dob}}</td>
                <td>
                  <a data-toggle='modal' data-target='#viewDetails1' class="btn btn-info" onclick='view_details({{$teams->athlete_id}})'>Details</a>
                  <input type="checkbox" name="select[]" value='{{$teams->athlete_id}}'>Select
                </td>
              </tr>
              @endif
           @endforeach
            </tbody>
          </table>
         </div>
         </div>
         <div class="modal-footer">
          <button type="submit" class="btn btn-primary glyphicon glyphicon-ok">Add</button>
          <button type="button" class="btn btn-warning glyphicon glyphicon-remove" data-dismiss="modal">Cancel</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- ends addModal-->
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
<div class="modal fade" id="editFunction" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Athlete Function Only</h4>
      </div>
      <div class="modal-body">
       <form action="{{route('editAthleteFunction')}}" method="post">
          {{csrf_field()}}
        <div class='form-group clearfix'>
          <label for='ath_function' class='col-xs-3'>Athlete Function:</label>
            <div class='col-xs-9 input-group'>
              <select class='form-control' name='ath_function' id='sport'>
                <option disabled selected>Select athlete function</option>
                  <?php 
                    $ath_function=App\AthleteFunction::all();
                    foreach($ath_function as $function):
                  ?>
                <option value="{{$function->athlete_function_id}}">{{$function->athlete_function_name}}</option>
                  <?php 
                    endforeach
                  ?>
              </select>
              <input type="hidden" name="hidden_id" id='hidden_id'>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info ">Update</button>
          <button type="button" class="btn btn-warning glyphicon glyphicon-remove" data-dismiss="modal">Cancel</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
</div>
</br>
</br>
<script type="text/javascript">
 function view_details(id)
  {
    var view_url=$('#view_details1').val();
    var view_address=$('#view_address1').val();
    var view_sport=$('#view_associated_sport1').val();
    var image_path='{{URL::asset('/images/')}}';
    var url='{{route("get_occupation")}}';
    var url1='{{route("get_gender")}}';
    $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          $("#title").val(result.athlete_title);
          $("#fname").val(result.athlete_fname);
          $("#lname").val(result.athlete_lname);
           var occupation=result.athlete_occupation;
          $.ajax({
            url:url,
            type:"GET",
            data:{'id':occupation},
            success:function(result)
            {
               $("#occupation").val(result.occupation_name);
            }
          });
          $("#birth_date").val(result.athlete_dob);
          $("#birth_place").val(result.athlete_pob);
          var gender=result.athlete_gender;
          $.ajax({
            url:url1,
            type:'GET',
            data:{"id":gender},
            success:function(result)
            {
              $("#gender").val(result.gender);
            }
          });
         
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
function editAthleteFunction(id)
{
  $('#hidden_id').val(id);
  $('#editFunction').modal('show');
}

$(function()
  {
    $('#coach').click(function(){
       window.location="{{url(route('sport_coach_master.index'))}}";   
     });
  });

$('#table1').dataTable(
  {
     "language": 
     {
     "search": "Filter athlete with game ID:",
     'responsive':true
    }
});
$('#table2').dataTable(
  {
     "language": 
     {
     "search": "Filter athlete:",
     'responsive':true
    }
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



