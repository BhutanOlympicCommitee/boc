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
                            <div class="text-muted bootstrap-admin-box-title">User Management</div>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addUserModal" style="float:right; padding: 2px;">
                                <span class="glyphicon glyphicon-plus"></span>
                                Add User
                            </button>
                        </div>
                        <div class="bootstrap-admin-panel-content">
                            <table class="table table-bordered table-striped table-responsive table-hover" id="user_table">
                             <thead>
                                 <tr>
                                     <th>Sl.No</th>
                                     <th>Name</th>
                                     <th>Email Address</th>
                                     <th>User Role</th>
                                     <th style='width:25%'>Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                <?php
                                $i = 1; 
                                foreach($users as $user):
                                 ?>
                             <tr>
                                 <td><?php echo $i;?></td>
                                 <td><?php echo $user->name;?></td>
                                 <td><?php echo $user->email;?></td>
                                 <td>
                                     <?php
                                     $role = App\Role::find($user->role_id);
                                     echo $role->role_name;
                                     ?>
                                 </td>
                                 <td>
                                    <button type="button" class="edit_user btn btn-info" data-toggle="modal" data-target="#updateUserModal" onclick='onClickValue({{$user->role_id}})'>
                                        <span class="glyphicon glyphicon-edit"></span>
                                        Edit
                                        <div class="hidden user_id">{{$user->id}}</div>
                                        <div class="hidden name">{{$user->name}}</div>
                                        <div class="hidden email">{{$user->email}}</div>
                                        <div class="hidden role_id">{{$user->role_id}}</div>
                                    </button>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="{{route('delete_user',['id'=>$user->id])}}" onclick='return confirm("Are you sure?")' class="btn btn-danger"><span class=" glyphicon glyphicon-trash"></span>Delete</a>
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
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add User</h4>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('insert_user') }}">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Name</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                </div>
            </div>
            <div class="form-group">
                <label for="user_role" class="col-md-4 control-label">User Role</label>

                <div class="col-md-6">
                  <select  name="user_role" class="col-md-6 form-control" required>
                    <option value="0">Select the User Role</option>
                    <?php
                    $roles = App\Role::all();
                    foreach($roles as $role):
                        ?>
                    <option value="{{$role->id}}">{{$role->role_name}}</option>
                <?php endforeach;?>
            </select>
        </div>
    </div>
     <div class="form-group">
                <label for="federation_type" class="col-md-4 control-label">Organization Type</label>

                <div class="col-md-6">
                  <select  name="federation_type" class="col-md-6 form-control" required>
                    <option value="0">Select the Organization Type</option>
                    <?php
                    $org_type = App\BOC_or_Federation_type::all();
                    foreach($org_type as $org):
                        ?>
                    <option value="{{$org->federation_id}}">{{$org->boc_or_federation_type}}</option>
                <?php endforeach;?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
        </div>
    </div>

    <div class="form-group">
        <label for="password" class="col-md-4 control-label">Password</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control" name="password" required>
        </div>
    </div>

    <div class="form-group">
        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        </div>
    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary glyphicon glyphicon-ok">Register</button>
                        <button type="button" class="btn btn-warning glyphicon glyphicon-remove" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="updateUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Update User</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('update_user') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Name</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="user_role" class="col-md-4 control-label">User Role</label>
                    <div class="col-md-6">
                      <select  name="user_role1" class="col-md-6 form-control">
                        <option value="0">Select the User Role</option>
                        <?php
                        $roles = App\Role::all();
                        foreach($roles as $role):
                            ?>
                        <option value="{{$role->id}}">{{$role->role_name}}</option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
        <input type="hidden" name="user_id">
        <div class="form-group">
            <label for="email" class="col-md-4 control-label">E-Mail Address</label>
            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{$user->email}}" required>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary glyphicon glyphicon-ok">Update</button>
        <button type="button" class="btn btn-warning glyphicon glyphicon-remove" data-dismiss="modal">Close</button>
    </div>
</form>
</div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#user_table').DataTable(
           {
           "language": {
           "search": "Search User:"
          }
            }
          );
        $('.edit_user').click(function(){
          name = $(this).find(".name").html();
          user_role = $(this).find(".user_role").html(
            );
          email = $(this).find(".email").html();
          user_id = $(this).find(".user_id").html();
          //alert(user_id);

          $('#updateUserModal input[name=name]').val(name);
          $('#updateUserModal input[name=user_role]').val(user_role);

          $('#updateUserModal input[name=email]').val(email);
          $('#updateUserModal input[name=user_id]').val(user_id).prop('disabled',false);
      });
    });
    function onClickValue(id)
    {
       $('select[name="user_role1"]').val(id);
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

