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
	                        <div class="text-muted bootstrap-admin-box-title clearfix">Country Information
	                        {{-- <a  class="btn btn-success glyphicon glyphicon-plus pull-right" href='{{route('country_master.create')}}'>Add</a> --}}
	                       
	                        <button class='btn btn-info' id='add' >Add</button>	
	                        </div>
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
										<th>Country Code</th>
										<th>Action</th>
									</tr>	
								</thead>
								<tbody>
									<?php $id=1?>
									@foreach($country as $countries)
									@if($countries->status==0)
									<tr>
										<td>{{$id++}}</td>
										<td>{{$countries->country_name}}</td>
										<td>{{$countries->country_code}}</td>
										<td width='200px'>
											<form id='remove' class="form-group" action="{{route('country_master.destroy',$countries->country_id)}}" method='post'>
								              <input type="hidden" name="_method" value="delete">
								              <input type="hidden" name="_token" value="{{ csrf_token() }}">
								              <a href="{{route('country_master.edit',$countries->country_id)}}" class="btn btn-primary glyphicon glyphicon-edit">Edit</a>	
								               {{-- <button class='btn btn-info' data-toggle='modal' data-target='#modal-1'>Edit</button>	 --}}					 
								              <button type="submit" class="btn btn-danger glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete this data??');" name='name'>Remove
								              </button>
								            </form>
										</td>
									</tr>
									@endif
									@endforeach
								</tbody>
							</table>

						</div>
        			</div>
    			</div>
    		</div>
    	</div>
    </div>
    <div class='modal fade' id='modal-1'>
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal'>&times;</button>
					<h3 class='modal-title'>This is modal</h3>
				</div>
			</div>
		</div>
	</div>
</div>
   
<script type="text/javascript">
	$(function(){
		$('#table1').DataTable();
	});
</script>
<script type="text/javascript">
	$(function(){
		$('#add').click(function()
		{
			('#modal-1').modal('show');
		});
	});
</script>
</script>
@endsection 
@section('footer')
<div class="container">
    <div class="row">
        @include('includes.footer')
    </div>
</div>
@endsection
