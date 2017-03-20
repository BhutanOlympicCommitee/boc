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
	                        <div class="text-muted bootstrap-admin-box-title ">Create new country
	                  	    </div>
	                  	</div>
	                  	<div class="bootstrap-admin-panel-content">
                  	    	@if($errors->any())
							    <div class="alert alert-danger">
							      @foreach($errors->all() as $error)
							          <p>{{ $error }}</p>
							      @endforeach
							    </div>
							@endif
							<form action="{{route('country_master.store')}}" method="post">
								<div class='form-group'>
							        {{csrf_field()}}
							    </div>
							    
							    <div class='form-group'>
							    	<label for='country_name' class='col-xs-2'>Country</label>
							        	<div class='col-xs-10 input-group'>
							          		<input type="text" name="country_name" class="form-control" placeholder="Enter country name here">
							        	</div>
							    </div>
							    <div class='form-group'>
							    	<label for='country_code' class='col-xs-2'>Country Code</label>
							        	<div class='input-group col-xs-10'>
							          		<input type="text" name="country_code" class="form-control" placeholder="Enter country code here">
							        	</div>
							    </div>
							    <div class="form-group">
							    	<div class="col-xs-10 col-xs-offset-2 input-group">
							        	<button type="submit" class="btn btn-default col-xs-offset-6 glyphicon glyphicon-ok">Save</button>
							        	<a href="{{route('country_master.index')}}" class='btn btn-default col-xs-offset-1 glyphicon glyphicon-remove'>Cancel</a>
							      	</div>
						   		</div> 
							</form>
	                  	</div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>
@endsection
@section('footer')
<div class="container">
    <div class="row">
        @include('includes.footer')
    </div>
</div>
@endsection

