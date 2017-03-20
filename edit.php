{{-- @section('nav-bar')
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
	                        <div class="text-muted bootstrap-admin-box-title">Update Country Details
	                   		 </div>
	                 	</div> 
	                 	<div class="bootstrap-admin-panel-content">
	                 		@if(Session::has('success'))
						        <div class="alert alert-success">
						          {{ Session::get('success') }}
						        </div>
					 		@endif
					 		<form action="{{route('country_master.update',$country->country_id)}}" method="post">
					 			<div class='form-group'>
						        	<input name="_method" type="hidden" value="PATCH">
						        	{{csrf_field()}}
						      	</div>
						      	<div class='form-group'>
							        <label for='country_name' class='col-xs-2'>Country</label>
							          <div class='col-xs-10 input-group'>
							            <input type="text" name="country_name" class="form-control" placeholder="Enter country name here" value="{{$country->country_name}}">
							          </div>
						    	</div>
						    	<div class='form-group'>
							        <label for='country_code' class='col-xs-2'>Country Code</label>
							          <div class='input-group col-xs-10'>
							            <input type="text" name="country_code" class="form-control" placeholder="enter country code here" value="{{$country->country_code}}">
							          </div>
							    </div>
							    <div class='form-group'>
							    	<div class="col-xs-10 col-xs-offset-2 input-group">
								        <button type='submit' class='btn btn-default col-xs-2 col-xs-offset-7 glyphicon glyphicon-check'>Update</button>  
								        <a href="{{route('country_master.index')}}" class='btn btn-default col-xs-2 col-xs-offset-1 pull-right glyphicon glyphicon-remove'> Cancel</a>
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
 --}}