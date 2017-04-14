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
	                        <div class="text-muted bootstrap-admin-box-title clearfix">Sport Coach Information<div class="pull-right">Games_ID:{{Session::get('key6')}}</div>
	                        
	                        </div>
	                    </div>
                    	<div class="bootstrap-admin-panel-content">
                         <ul class='nav nav-pills nav-justified'>
                         <li id='game1'><a href="#games_master" data-toggle="tab">Games Information</a></li>
                         <li class='active' id='coach'><a href="#" data-toggle="tab">Sport And Coach Information</a></li>
                         <li id='team'><a href="#" data-toggle="tab">Athlete Team Member</a></li>
                         </ul>
                      	@if(Session::has('success'))
                          <div class="alert alert-success">
                            {{ Session::get('success') }}
                          </div>	
						 	          @endif
                      </br>
        				 			<table class="table table-bordered table-striped table-responsive" id="table1">
        				 				<thead>
        									<tr>
        										<th>Sl. No:</th>
        										<th>Federation</th>
        										<th>Sport</th>
        										<th>Coach</th>
        										<th style='width:20%'>Action</th>
        									</tr>	
        								</thead>
        								<tbody>
        								<?php $id=1 ?>
        								@foreach($sportcoach as $sports)
                        @if($sports->status==0)
        								<tr>
        									<td>{{$id++}}</td>
                          <td>{{$sports->displayFederation->sport_org_name}}</td>
                          <td>{{$sports->displaySport->sport_name}}</td>
        									<td>{{$sports->displayCoach->coach_fname.' '.$sports->displayCoach->coach_mname.' '.$sports->displayCoach->coach_lname}}</td>
        									<td>
        										<form id='remove' class="form-group" action="{{route('sport_coach_master.destroy',$sports->sc_id)}}" method='post'>
        							              <input type="hidden" name="_method" value="delete">
        							              <input type="hidden" name="_token" value="{{ csrf_token() }}">
        							              <a class="btn btn-info glyphicon glyphicon-edit" data-toggle='modal' data-target='#editModal' onclick='fun_edit({{$sports->sc_id}})'>Edit</a>
        							              <button type="submit" class="btn btn-danger glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete this data');" name='name'>Delete
        							              </button>
        							            </form>
        									</td>
        								</tr>
                        @endif
        								@endforeach
        								</tbody>
        					 		</table>
                      <div class='clearfix'>
                       <a class='btn btn-success glyphicon glyphicon-plus pull-right' data-toggle='modal' data-target="#addModal">Add Sport & Coach</a> 
                      <input type="hidden" name="hidden_view" id="hidden_view" value="{{route('view_sportcoach')}}">
                     </div>
                     </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add sport coach modal begins-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Sport Coach</h4>
      </div>
      <div class="modal-body">
       <form action="{{route('sport_coach_master.store')}}" method="post">
          {{csrf_field()}}
         <div class='form-group clearfix'>
            <label for='federation' class='col-xs-3'>Federation:</label>
              <div class='col-xs-9 input-group'>
                <select class='form-control' name='federation'>
                  <option></option>
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

           <div class='form-group clearfix'>
            <label for='sport' class='col-xs-3'>Sport:</label>
              <div class='col-xs-9 input-group'>
                <select class='form-control' name='sport'>
                  <option></option>
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
           <div class='form-group clearfix'>
            <label for='coach' class='col-xs-3'>Coach:</label>
              <div class='col-xs-9 input-group'>
                <select class='form-control' name='coach'>
                  <option></option>
                  <?php 
                    $coach=App\Tbl_Coach::all();
                    foreach($coach as $coachs):
                  ?>
                  <option value="{{$coachs->coach_id}}">{{$coachs->coach_fname.' '.$coachs->coach_mname.' '.$coachs->coach_lname}}</option>
                  <?php 
                    endforeach
                  ?>
                </select>
              </div>
          </div>
           <div class='form-group clearfix'>
                  <label for='comments' class='col-xs-3'>Comments</label>
                    <div class='col-xs-9 input-group'>
                      <textarea type="text" name="comments" class="form-control" placeholder="Enter Comments here" required></textarea>
                    </div>
                </div>
      
       <div class="modal-footer">
          <button type="submit" class="btn btn-primary glyphicon glyphicon-ok">Save</button>
          <button type="button" class="btn btn-warning glyphicon glyphicon-remove" data-dismiss="modal">Cancel</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- ends addModal-->
<!-- begins editModal-->
<div class="modal fade" id="editModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Sport Coach Details</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('update_sportcoach')}}" method="post">
          {{csrf_field()}}
        
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

           <div class='form-group clearfix'>
            <label for='sport' class='col-xs-3'>Sport:</label>
              <div class='col-xs-9 input-group'>
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
           <div class='form-group clearfix'>
            <label for='coach' class='col-xs-3'>Coach:</label>
              <div class='col-xs-9 input-group'>
                <select class='form-control' name='coach' id='coach1'>
                  <?php 
                    $coach=App\Tbl_Coach::all();
                    foreach($coach as $coachs):
                  ?>
                  <option value="{{$coachs->coach_id}}">{{$coachs->coach_fname.' '.$coachs->coach_mname.' '.$coachs->coach_lname}}</option>
                  <?php 
                    endforeach
                  ?>
                </select>
              </div>
          </div>
            <div class='form-group clearfix'>
                  <label for='comments' class='col-xs-3'>Comments</label>
                    <div class='col-xs-9 input-group'>
                      <textarea type="text" name="comments" class="form-control" placeholder="Enter Comments here" id="comments"></textarea>
                    </div>
                </div>
    <input type="hidden" id="edit_id" name="edit_id">
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary glyphicon glyphicon-ok">Update</button>
        <button type="button" class="btn btn-warning glyphicon glyphicon-remove" data-dismiss="modal">Close</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
	 $(function()
    {
        $('#table1').DataTable(
           {
           "language": {
           "search": "Filter sport & coach:"
     }
     }
          );
    });  
  function fun_edit(id)
    {
      var view_url = $("#hidden_view").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          $("#edit_id").val(result.sc_id);
          $("#federation1").val(result.federation);
          $("#sport").val(result.sport);
          $("#coach1").val(result.coach);
          $("#comments").val(result.comments);
        }
      });
    }
</script>
<script type="text/javascript">
  $(function()
  {
    $('#game1').click(function(){
       window.location="{{url(route('games_master.create'))}}";   
     });
  });

$(function()
  {
    $('#team').click(function(){
       window.location="{{url(route('team_master.index'))}}";   
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



