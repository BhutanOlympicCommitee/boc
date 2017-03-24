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
	                        <div class="text-muted bootstrap-admin-box-title clearfix">Dzongkhag Information
	                         <a class='btn btn-success glyphicon glyphicon-plus pull-right' data-toggle='modal' data-target="#addModal">Add</a> 
	                        </div>
	                    </div>
                    	<div class="bootstrap-admin-panel-content">
                      	@if(Session::has('success'))
                          <div class="alert alert-success">
                            {{ Session::get('success') }}
                          </div>	
						 	          @endif
        				 			<table class="table table-bordered table-striped table-responsive" id="table1">
        				 				<thead>
        									<tr>
        										<th>Sl. No:</th>
        										<th>Country Name</th>
        										<th>Dzongkhg/State Name</th>
        										<th>Dzongkhag/State Code</th>
        										<th>Action</th>
        									</tr>	
        								</thead>
        								<tbody>
        								<?php $id=1 ?>
        								@foreach($dzongkhag as $dzongkhags)
                        @if($dzongkhags->status==0)
        								<tr>
        									<td>{{$id++}}</td>
        									<td>{{$dzongkhags->displayCountry->country_name}}</td>
        									<td>{{$dzongkhags->dzongkhag_name}}</td>
        									<td>{{$dzongkhags->dzongkhag_code}}</td>
        									<td>
        										<form id='remove' class="form-group" action="{{route('dzongkhag_master.destroy',$dzongkhags->dzongkhag_id)}}" method='post'>
        							              <input type="hidden" name="_method" value="delete">
        							              <input type="hidden" name="_token" value="{{ csrf_token() }}">
        							              <a class="btn btn-info glyphicon glyphicon-edit" data-toggle='modal' data-target='#editModal' onclick='fun_edit({{$dzongkhags->dzongkhag_id}})'>Edit</a>
        							              <button type="submit" class="btn btn-warning glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete this data');" name='name'>Remove
        							              </button>
        							            </form>
        									</td>
        								</tr>
                        @endif
        								@endforeach
        								</tbody>
        					 		</table>
                      <input type="hidden" name="hidden_view" id="hidden_view" value="{{route('view_dzongkhag')}}">
                     </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add dzongkhag modal begins-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Dzongkhag</h4>
      </div>
      <div class="modal-body">
       <form action="{{route('dzongkhag_master.store')}}" method="post">
          {{csrf_field()}}
          <div class='form-group'>
            <label for='type' class='col-xs-3'>Country:</label>
              <div class='col-xs-9 input-group'>
                <select class='form-control' name='type'>
                  <?php 
                    $country=App\Mst_country::all();
                    foreach($country as $countries):
                  ?>
                  <option value="{{$countries->country_id}}">{{$countries->country_name}}</option>
                  <?php 
                    endforeach
                  ?>
                </select>
              </div>
          </div>
          <div class='form-group'>
            <label for='dzongkhag_name' class='col-xs-3'>Dzongkhag/state:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="dzongkhag_name" class="form-control" placeholder="Enter dzongkhag/state name here" required>
              </div>
          </div>
          <div class='form-group'>
            <label for='dzongkhag_code' class='col-xs-3'>Dzongkhag/State Code:</label>
              <div class='input-group col-xs-9'>
                <input type="text" name="dzongkhag_code"  class="form-control" placeholder="Enter dzongkhag code here" required>
              </div>
          </div>
      
       <div class="modal-footer">
          <button type="submit" class="btn btn-default glyphicon glyphicon-ok">Save</button>
          <button type="button" class="btn btn-default glyphicon glyphicon-remove" data-dismiss="modal">Cancel</button>
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
        <h4 class="modal-title">Edit Country details</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('update_dzongkhag')}}" method="post">
          {{csrf_field()}}
        <div class='form-group'>
          <label for='type' class='col-xs-3'>Country</label>
            <div class='col-xs-9 input-group'>
              <select class='form-control' name='type' id='type'>
                  <?php 
                      $dzongkhags=App\Mst_country::all();
                      foreach($dzongkhags as $dzong):
              ?>
                <option value="{{$dzong->country_id}}">{{$dzong->country_name}}</option>
               <?php endforeach ?>
              </select>
            </div>
      </div>
         
       <div class='form-group'>
          <label for='dzongkhag_name' class='col-xs-3'>Dzongkhag/State</label>
            <div class='col-xs-9 input-group'>
              <input type="text" name="dzongkhag_name" class="form-control" id='dzongkhag_name' placeholder="Enter dzongkhag/state name here">
            </div>
      </div>
      <div class='form-group'>
        <label for='dzongkhag_code' class='col-xs-3'>Dzongkhag/State Code</label>
        <div class='input-group col-xs-9'>
            <input type="text" name="dzongkhag_code" id='dzongkhag_code' class="form-control" placeholder="enter dzongkhag/state code here">
        </div>
    </div>
    <input type="hidden" id="edit_id" name="edit_id">
      <div class="modal-footer">
        <button type="submit" class="btn btn-info">Update</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
	$(function(){
		$('#table1').DataTable(); 
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
          $("#edit_id").val(result.dzongkhag_id);
          $("#type").val(result.country_id);
          $("#dzongkhag_name").val(result.dzongkhag_name);
          $("#dzongkhag_code").val(result.dzongkhag_code);
        }
      });
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



