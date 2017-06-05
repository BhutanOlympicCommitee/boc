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
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#UserModal" style="float:right; padding: 2px;">
                                <span class="glyphicon glyphicon-plus"></span>
                                Add User
                            </button>
                        </div>
                        <div class="bootstrap-admin-panel-content">
                        <div class='table-responsive'>
                            <table class="table table-bordered table-striped table-responsive table-hover" id="user_table">
                             <thead>
                                 <tr>
                                     <th>Sl.No</th>
                                     <th>Employee ID</th>
                                     <th>Sport Organization</th>
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
                                 <td><?php echo $user->emp_id;?></td>
                                 <td><?php echo $user->displaySportOrganization->sport_org_name;?></td>
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
                                        <div class="hidden name">{{$user->emp_id}}</div>
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
</div>

<div class="modal fade" id="UserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Employee ID</h4>
    </div>
    <div class="modal-body">
       <form class="form-horizontal" role="form" method="POST" action="{{ route('getEmployee') }}">
            {{ csrf_field() }}

            <div class="form-group clearfix">
                <label for="name" class="col-md-4 control-label">EmployeeID</label>

                <div class="col-md-6">
                    <input id="name1" type="text" class="form-control" name="name" required autofocus>
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-default">Add</button>
          </div>
          </form>
  </div>
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
                    <label for="emp_id" class="col-md-4 control-label">Employee ID</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="emp_id" value="{{$user->emp_id}}" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="user_role" class="col-md-4 control-label">User Role</label>
                    <div class="col-md-6">
                      <select  name="user_role1" class="col-md-6 form-control">
                        <option disabled selected>Select the User Role</option>
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
<br>
<br>
<script type="text/javascript">
    $(document).ready(function(){
        $('#user_table').DataTable(
           {
           "reponsive":true,
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

          $('#updateUserModal input[name=emp_id]').val(name);
          $('#updateUserModal input[name=user_role]').val(user_role);

          $('#updateUserModal input[name=email]').val(email);
          $('#updateUserModal input[name=user_id]').val(user_id).prop('disabled',false);
      });
    });
    function onClickValue(id)
    {
       $('select[name="user_role1"]').val(id);
    }  

    $("#add").click(function(){
      var id=$("#name1").val();
      
        var view_url='{{route("getEmployee")}}';
        alert(view_url);
        $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          console.log(result);
          $("#name").val(result.name);
         
        }
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

