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
	                        <div class="text-muted bootstrap-admin-box-title clearfix">Dungkhug Information
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
        										<th>Dzongkhag Name</th>
        										<th>Dungkhag Name</th>
        										<th>Dungkhag Code</th>
        										<th style='width:20%'>Action</th>
        									</tr>	
        								</thead>
        								<tbody>
        								<?php $id=1 ?>
        								@foreach($dungkhag as $dungkhags)
                        @if($dungkhags->status==0)
        								<tr>
        									<td>{{$id++}}</td>
        									<td>{{$dungkhags->displayDzongkhag->dzongkhag_name}}</td>
        									<td>{{$dungkhags->dungkhag_name}}</td>
        									<td>{{$dungkhags->dungkhag_code}}</td>
        									<td>
        										<form id='remove' class="form-group" action="{{route('dungkhag_master.destroy',$dungkhags->dungkhag_id)}}" method='post'>
        							              <input type="hidden" name="_method" value="delete">
        							              <input type="hidden" name="_token" value="{{ csrf_token() }}">

        							              <a class="btn btn-info glyphicon glyphicon-edit" data-toggle='modal' data-target='#editModal' onclick='fun_edit({{$dungkhags->dungkhag_id}})'>Edit</a>
        							              
                                    <button type="submit" class="btn btn-warning glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete this data');" name='name'>Remove
        							              </button>
        							            </form>
        									</td>
        								</tr>
                        @endif
        								@endforeach
        								</tbody>
        					 		</table>
                      <input type="hidden" name="hidden_show" id="hidden_show" value="{{route('view_dungkhag')}}">
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
        <h4 class="modal-title" id="myModalLabel">Add Dungkhag</h4>
      </div>
      <div class="modal-body">
       <form action="{{route('dungkhag_master.store')}}" method="post">
          {{csrf_field()}}
          <div class='form-group'>
            <label for='type' class='col-xs-3'>Dzongkhag:</label>
              <div class='col-xs-9 input-group'>
                <select class='form-control' name='type'>
                  <option></option>
                  <?php 
                    $dzongkhag=App\MstDzongkhag::all();
                    foreach($dzongkhag as $dzongkhags):
                  ?>
                  <option value="{{$dzongkhags->dzongkhag_id}}">{{$dzongkhags->dzongkhag_name}}</option>
                  <?php 
                    endforeach
                  ?>
                </select>
              </div>
          </div>
          <div class='form-group'>
            <label for='dungkhag_name' class='col-xs-3'>Dungkhag:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="dungkhag_name" class="form-control" placeholder="Enter dungkhag name here" required>
              </div>
          </div>
          <div class='form-group'>
            <label for='dungkhag_code' class='col-xs-3'>Dungkhag Code:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="dungkhag_code"  class="form-control" placeholder="Enter dungkhag code here" required>
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
<!-- editModal begins-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Dungkhag</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('dungkhag_master.store')}}" method="post">
          {{csrf_field()}}
          <div class='form-group'>
            <label for='type' class='col-xs-3'>Dzongkhag:</label>
              <div class='col-xs-9 input-group'>
                <select class='form-control' name='type' id='type'>
                  <option></option>
                  <?php 
                    $dzongkhag=App\MstDzongkhag::all();
                    foreach($dzongkhag as $dzongkhags):
                  ?>
                  <option value="{{$dzongkhags->dzongkhag_id}}">{{$dzongkhags->dzongkhag_name}}</option>
                  <?php 
                    endforeach
                  ?>
                </select>
              </div>
          </div>
          <div class='form-group'>
            <label for='dungkhag_name' class='col-xs-3'>Dungkhag:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="dungkhag_name" class="form-control" placeholder="Enter dungkhag name here" id='dungkhag' required >
              </div>
          </div>
          <div class='form-group'>
            <label for='dungkhag_code' class='col-xs-3'>Dungkhag Code:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="dungkhag_code"  class="form-control" placeholder="Enter dungkhag code here" id='dungkhag_code' required>
              </div>
          </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-info">Update</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
      </div>
      <input type="hidden" name="edit_id" id='edit_id'>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- editModal ends here-->
<script type="text/javascript">
  $(function()
  {
    $('#table1').dataTable();
  });
  function fun_edit(id)
  {
    var view_url = $("#hidden_show").val();
    $.ajax({
      url: view_url,
      type:"GET", 
      data: {"id":id}, 
      success: function(result){
        //console.log(result);
        $("#edit_id").val(result.dungkhag_id);
        $("#type").val(result.dzongkhag_id);
        $("#dungkhag").val(result.dungkhag_name);
        $("#dungkhag_code").val(result.dungkhag_code);
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



