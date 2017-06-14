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
<div class='container-fluid'>
  <div class="row">
   <!-- content -->
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-11 col-md-offset-1">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="text-muted bootstrap-admin-box-title clearfix">Fiscal Year Information
              <a class='btn btn-success glyphicon glyphicon-plus pull-right' data-toggle='modal' data-target="#addCountryModal">Add Fiscal Year</a> 
               </div>
            </div>
          <div class="bootstrap-admin-panel-content">
          @if(Session::has('success'))
              <div class="alert alert-success">
                {{ Session::get('success') }}
              </div>
          @endif
          <div class='table-responsive'>
            <table class="table table-bordered table-striped" id="table1" width="'100%">
              <thead>
                <tr>
                   <th>Sl. No:</th>
                   <th>Five Year</th>
                   <th>Fiscal year</th>
                   <th style='width:20%'>Action</th>
                </tr>   
               </thead>
               <tbody>
                <?php $id=1?>
                @foreach($fiscal as $fiscals)
                <tr>
                  <td>{{$id++}}</td>
                  <td>{{$fiscals->displayFiveYear->name}}</td>
                  <td>{{$fiscals->fiscal_year}}</td>
                  <td width='200px'>
                  <form id='remove' class="form-group" action="{{route('fiscal.destroy',$fiscals->fiscal_id)}}" method='post'>
                    <input type="hidden" name="_method" value="delete">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <a class="btn btn-info glyphicon glyphicon-edit" data-toggle='modal' data-target='#editModal' onclick='fun_edit({{$fiscals->fiscal_id}})'>Edit</a>

                    <button type="submit" class="btn btn-danger glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete this data?');" name='name'>Delete
                    </button>
                   </form>
                  </td>
                </tr>
                @endforeach
             </tbody>
             </table>
             </div>
             <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('fiscal/view')}}">
            </div>
           </div>
          </div>
        </div>
      </div>
  </div>
</div>
</br>
<!-- Add fiscal Year modal begins-->
<div class="modal fade" id="addCountryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Fiscal Year</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('fiscal.store')}}" method="post">
                <div class='form-group'>
                    {{csrf_field()}}
                </div>
                <div class='form-group clearfix'>
                    <label for='five_yr_plan_id' class='col-xs-2'>Five year Plan:</label>
                        <div class='col-xs-10 input-group'>
                   <select class='form-control' name='five_yr_plan_id' required>
                  <option disabled selected><---Select one---></option>
                  <?php 
                    $five_yr_plan=App\EnumFiveYearPlan::all();
                    foreach($five_yr_plan as $plans):
                  ?>
                  <option value="{{$plans->five_yr_plan_id}}">{{$plans->name}}</option>
                  <?php 
                    endforeach
                  ?>
                </select>
              </div>
                </div>
                 <div class='form-group clearfix'>
                    <label for='fiscal_year' class='col-xs-2'>Fiscal Year:</label>
                        <div class='col-xs-10 input-group'>
                            <input type="text" name="fiscal_year" class="form-control" placeholder="Enter fiscal Year" required>
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
<!-- Ends fiscal Year modal-->
<!-- starts fiscal Year modal -->
<div class="modal fade" id="editModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Fiscal Year</h4>
          </div>
          <div class="modal-body">
            <form action="{{route('update_fiscal')}}" method="post">
              {{ csrf_field() }}
                  <div class='form-group clearfix'>
                    <label for='five_yr_plan_id' class='col-xs-2'>Five year Plan:</label>
                        <div class='col-xs-10 input-group'>
                   <select class='form-control' name='five_yr_plan_id' id="five_yr_plan_id" required>
                  <option disabled selected><---Select one---></option>
                  <?php 
                    $five_yr_plan=App\EnumFiveYearPlan::all();
                    foreach($five_yr_plan as $plans):
                  ?>
                  <option value="{{$plans->five_yr_plan_id}}">{{$plans->name}}</option>
                  <?php 
                    endforeach
                  ?>
                </select>
              </div>
                </div>
                 <div class='form-group clearfix'>
                    <label for='fiscal_year' class='col-xs-2'>Fiscal Year:</label>
                        <div class='col-xs-10 input-group'>
                            <input type="text" name="fiscal_year" id="fiscal_year" class="form-control" placeholder="Enter country name here" required>
                        </div>
                </div>
                <input type="hidden" id="edit_id" name="edit_id">
           
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary glyphicon glyphicon-ok">Update</button>
            <button type="button" class="btn btn-warning glyphicon glyphicon-remove" data-dismiss="modal">Close</button>
          </div>
        </form> 
        </div>
        
      </div>
    </div>
  </div>
<!-- Ends edit fiscal Year modal-->

<script type="text/javascript">
   $(function()
    {
        $('#table1').DataTable(
           {
            "responsive":true,
           "language": {
           "search": "Filter fiscal year:"
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
          $("#edit_id").val(result.fiscal_id);
          $("#five_yr_plan_id").val(result.five_yr_plan_id);
          $("#fiscal_year").val(result.fiscal_year);
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