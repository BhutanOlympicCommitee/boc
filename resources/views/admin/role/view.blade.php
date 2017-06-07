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
              <div class="text-muted bootstrap-admin-box-title">Role Management</div>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addRoleModel" style="float:right; padding: 2px;">
                <span class="glyphicon glyphicon-plus"></span>
                Add User Role
              </button>
            </div>
            <div class="bootstrap-admin-panel-content">
            <div class="table-responsive">
              <table class="table table-bordered table-striped table-hover" id="role_table">
               <thead>
                 <tr>
                   <th>Sl.No</th>
                   <th>Role Name</th>
                   <th>Description</th>
                   <th style='width:25%'>Action</th>
                 </tr>
               </thead>
               <tbody>
                <?php
                $i = 1; 
                foreach($roles as $role):
                 ?>
               <tr>
                 <td><?php echo $i;?></td>
                 <td><?php echo $role->role_name;?></td>
                 <td><?php echo $role->description;?></td>
                 <td>
                  <button type="button" class="edit_role btn btn-info" data-toggle="modal" data-target="#UpdateRoleModel">
                    <span class="glyphicon glyphicon-edit"></span>
                    Edit
                    <div class="hidden role_id">{{$role->id}}</div>
                    <div class="hidden role_name">{{$role->role_name}}</div>
                    <div class="hidden description">{{$role->description}}</div>
                  </button>
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="{{route('delete_role',['id'=>$role->id])}}" onclick='return confirm("Are you sure?")' class="btn btn-danger"><span class=" glyphicon glyphicon-trash"></span>Delete</a>
                </td>
              </tr>
              <?php 
              $i++;
              endforeach;
              ?>
            </tbody>
          </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<div class="modal fade" id="addRoleModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Role</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('add_role') }}">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="role_name" class="col-md-4 control-label">Role Name</label>
            <div class="col-md-6">
              <input id="role_name" type="text" class="form-control" name="role_name" value="{{ old('role_name') }}" required autofocus>
            </div>
          </div>
          <div class="form-group">
            <label for="description" class="col-md-4 control-label">Description</label>
            <div class="col-md-6">
              <input id="description" type="description" class="form-control" name="description" value="{{ old('description') }}" required>
            </div>
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
<div class="modal fade" id="UpdateRoleModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Role</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('update_role') }}">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="role_name" class="col-md-4 control-label">Role Name</label>
            <div class="col-md-6">
              <input id="role_name" type="text" class="form-control" name="role_name" value="{{ old('role_name') }}" required autofocus>
            </div>
          </div>
          <div class="form-group">
            <label for="description" class="col-md-4 control-label">Description</label>
            <div class="col-md-6">
              <input id="description" type="description" class="form-control" name="description" value="{{ old('description') }}" required>
            </div>
          </div>
          <input type="hidden" name="role_id">
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary glyphicon glyphicon-ok">Update</button>
            <button type="button" class="btn btn-warning glyphicon glyphicon-remove" data-dismiss="modal">Close</button>
            
          </div>
        </form>
      </div>
    </div>
  </div>
  <br>
  <br>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#role_table').DataTable(
           {
           "responsive":true,
           "language": {
           "search": "Search Role:"
     }
     }
      );
      $('.edit_role').click(function(){
        role_name = $(this).find(".role_name").html();
        description = $(this).find(".description").html();
        role_id = $(this).find(".role_id").html();
          $('#UpdateRoleModel input[name=role_name]').val(role_name);
          $('#UpdateRoleModel input[name=description]').val(description);
          $('#UpdateRoleModel input[name=role_id]').val(role_id).prop('disabled',false);
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

