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
<div class='container'>
  <div class="row">
   <!-- content -->
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="text-muted bootstrap-admin-box-title clearfix">Country Information
            	<a class='btn btn-success glyphicon glyphicon-plus pull-right' data-toggle='modal' data-target="#addCountryModal">Add</a> 
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
                   <th>Nationality</th>
                   <th>Country Code</th>
                   <th style='width:20%'>Action</th>
                </tr>   
               </thead>
               <tbody>
                <?php $id=1?>
                @foreach($country as $countries)
                @if($countries->status==0)
                <tr>
                  <td>{{$id++}}</td>
                  <td>{{$countries->country_name}}</td>
                  <td>{{$countries->country_nationality}}</td>
                  <td>{{$countries->country_code}}</td>
                  <td width='200px'>
                  <form id='remove' class="form-group" action="{{route('country_master.destroy',$countries->country_id)}}" method='post'>
                    <input type="hidden" name="_method" value="delete">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <a class="btn btn-info glyphicon glyphicon-edit" data-toggle='modal' data-target='#editModal' onclick='fun_edit({{$countries->country_id}})'>Edit</a>

                    <button type="submit" class="btn btn-warning glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete this data??');" name='name'>Remove
                    </button>
                   </form>
                  </td>
                </tr>
                @endif
                @endforeach
             </tbody>
             </table>
             <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('country/view')}}">
            </div>
           </div>
          </div>
        </div>
      </div>
  </div>
</div>
<!-- Add country modal begins-->
<div class="modal fade" id="addCountryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Country</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('country_master.store')}}" method="post">
                <div class='form-group'>
                    {{csrf_field()}}
                </div>
                <div class='form-group clearfix'>
                    <label for='country_name' class='col-xs-2'>Country Name:</label>
                        <div class='col-xs-10 input-group'>
                            <input type="text" name="country_name" class="form-control" placeholder="Enter country name here" required>
                        </div>
                </div>
                 <div class='form-group clearfix'>
                    <label for='country_nationality' class='col-xs-2'>Nationality:</label>
                        <div class='col-xs-10 input-group'>
                            <input type="text" name="country_nationality" class="form-control" placeholder="Enter country name here" required>
                        </div>
                </div>
                <div class='form-group clearfix'>
                    <label for='country_code' class='col-xs-2'>Country Code:</label>
                        <div class='input-group col-xs-10'>
                            <input type="text" name="country_code" class="form-control" placeholder="Enter country code here" required>
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
<!-- Ends addCountry modal-->
<!-- starts editCOuntry modal -->
<div class="modal fade" id="editModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Country details</h4>
          </div>
          <div class="modal-body">
            <form action="{{route('update_country')}}" method="post">
              {{ csrf_field() }}
                <div class="form-group">
                  <label for="country_name">Country Name:</label>
                  <input type="text" class="form-control" id="country_name" name="country_name">
                </div>
                 <div class="form-group">
                  <label for="country_nationality">Nationality:</label>
                  <input type="text" class="form-control" id="country_nationality" name="country_nationality">
                </div>
                <div class="form-group">
                  <label for="country_code">Country Code:</label>
                  <input type="text" class="form-control" id="country_code" name="country_code">
                </div>
                <input type="hidden" id="edit_id" name="edit_id">
           
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-info">Update</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form> 
        </div>
        
      </div>
    </div>
<!-- Ends edit country modal-->>

<script type="text/javascript">
   $(function()
    {
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
          $("#edit_id").val(result.country_id);
          $("#country_name").val(result.country_name);
          $("#country_nationality").val(result.country_nationality);
          $("#country_code").val(result.country_code);
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