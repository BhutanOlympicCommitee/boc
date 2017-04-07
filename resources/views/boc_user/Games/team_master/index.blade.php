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
                      <div class='row'>
            <div class='col-xs-6 clearfix'>
              <div class='form-group clearfix'>
            <label for='federation' class='col-xs-3'>Federation:</label>
              <div class='col-xs-9 input-group'>
                <select class='form-control' name='federation' id='federation1'>
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
                <select class='form-control' name='sport' id='sport'>
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
        				 			<table class="table table-bordered table-striped table-responsive" id="table1">
        				 				<thead>
        									<tr>
        										<th>Sl. No:</th>
        										<th>Federation</th>
        										<th>Sport</th>
                            <th>Athlete ID</th>
        										<th>Athlete Name</th>
        										<th style='width:20%'>Action</th>
        									</tr>	
        								</thead>
        								<tbody>
        								<?php $id=1 ?>
        								@foreach($team as $teams)
                        @if($teams->status==0)
        								<tr>
        									<td>{{$id++}}</td>
                          <td>{{$teams->displayFederation->sport_org_name}}</td>
                          <td>{{$teams->displaySport->sport_name}}</td>
                          <td>{{$teams->displayAthlete->athlete_id}}</td>
                          <td>{{$teams->displayAthlete->athlete_name}}</td>
        									<td>
        										<form id='remove' class="form-group" action="{{route('team_master.destroy',$teams->team_id)}}" method='post'>
        							              <input type="hidden" name="_method" value="delete">
        							              <input type="hidden" name="_token" value="{{ csrf_token() }}">
        							              <a class="btn btn-info glyphicon glyphicon-edit" data-toggle='modal' data-target='#editModal' onclick='fun_edit({{$teams->team_id}})'>Edit</a>
        							              <button type="submit" class="btn btn-warning glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete this data');" name='name'>Remove
        							              </button>
        							            </form>
        									</td>
        								</tr>
                        @endif
        								@endforeach
        								</tbody>
        					 		</table>
                      {{-- <input type="hidden" name="hidden_view" id="hidden_view" value="{{route('view_team')}}"> --}}
                      <input type="hidden" name="view_details1" id='view_details1' value='{{route('show_athlete_info1')}}'>
                     <input type="hidden" name="view_address1" id='view_address1' value='{{route('show_athlete_address1')}}'>
                      <input type="hidden" name="view_associated_sport1" id='view_associated_sport1' value='{{route('show_associated_sport1')}}'>
                     </div>
                     <div class='clearfix'> <a class='btn btn-success glyphicon glyphicon-plus pull-right' data-toggle='modal' data-target="#addModal">Add Team Member</a> 
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add dzongkhag modal begins-->
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
        
       <div class='row'>
            <div class='col-xs-6 clearfix'>
              <div class='form-group clearfix'>
            <label for='federation' class='col-xs-3'>Federation:</label>
              <div class='col-xs-9 input-group'>
                <select class='form-control' name='federation' id='federation1'>
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
                <select class='form-control' name='sport' id='sport'>
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
          <div style='margin-top:20px'>  
          <table class="table table-bordered table-striped table-responsive" id="table1">
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
                  <input type="checkbox" name="select[]" value='{{$athlete->athlete_id}}'>Select
                  </form>
                </td>
              </tr>
            <?php endforeach?>
            </tbody>
          </table>
         </div>
         <div class="modal-footer">
    
          <button type="submit" class="btn btn-default glyphicon glyphicon-ok">Add</button>
          <button type="button" class="btn btn-default glyphicon glyphicon-remove" data-dismiss="modal">Cancel</button>
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
        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
      </div>
      </div>
    </div>
  </div>
</div>
<!-- ends viewDetails modal-->
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
    $('#coach').click(function(){
       window.location="{{url(route('sport_coach_master.index'))}}";   
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



