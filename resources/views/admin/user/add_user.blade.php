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
<div class="row">
        <!-- content -->
  <div class="col-md-12">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="text-muted bootstrap-admin-box-title">Add User</div>
            </div>
            <div class="bootstrap-admin-panel-content">
              <form class="form-horizontal" role="form" method="POST" action="{{ route('insert_user') }}">
                 {{ csrf_field() }}
                  <?php 
                    $id=Session::get('employeeID');
                     $serverName = "192.168.1.100"; 
                      $connectionInfo = array( "Database"=>"boc", "UID"=>"sa", "PWD"=>"P@ssw0rd");
                      $conn = sqlsrv_connect( $serverName, $connectionInfo);

                      if( $conn )
                      {
                         $sql="SELECT * from HR.DtlEmployeeDetails WHERE EmpNo='$id'";
                         $stmt = sqlsrv_query( $conn, $sql );
                          if( $stmt === false) 
                          {
                              die( print_r( sqlsrv_errors(), true) );
                          }
                          while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
                          {
                              echo '<div class="form-group">
                              <label for="employ_id" class="col-md-4 control-label">EmployeeID</label>

                                  <div class="col-md-6">
                                      <input id="employ_id" type="text" class="form-control" name="employ_id" value="'.$row["EmpNo"].'" required autofocus>
                                  </div>
                             </div>';
                            echo '<div class="form-group">
                              <label for="name" class="col-md-4 control-label">Name</label>

                                  <div class="col-md-6">
                                      <input id="name" type="text" class="form-control" name="name" value="'.$row["FirstName"].' '.$row['MiddleName'].' '.$row['LastName'].'" required autofocus>
                                  </div>
                             </div>';
                             echo '<div class="form-group">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="'.$row['EmailID'].'" required>
                                </div>
                            </div>';

                          }
                          sqlsrv_free_stmt( $stmt);
                      }
                      else
                      {
                           echo "Connection could not be established.<br />";
                           die( print_r( sqlsrv_errors(), true));          
                      }?>

               
                   
                        {{-- <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus> --}}
                    
                <div class="form-group clearfix">
                    <label for="user_role" class="col-md-4 control-label">User Role</label>

                    <div class="col-md-6">
                      <select  name="user_role" class="col-md-6 form-control" required>
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
             <div class="form-group">
                <label for="federation_type" class="col-md-4 control-label">Sport Organization</label>

                <div class="col-md-6">
                  <select  name="federation_type" class="col-md-6 form-control" required>
                    <option disabled selected>Select the Sport Organization</option>
                    <option value='boc'>boc</option>
                     <?php
                    $sport_organization= App\Sport_Organization::all();
                    foreach($sport_organization as $sport):
                        ?>
                    <option value="{{$sport->sport_org_name}}">{{$sport->sport_org_name}}</option>
                <?php endforeach;?>
                  </select>
        </div>
    </div>

          <div class="form-group clearfix">
              <label for="password" class="col-md-4 control-label">Password</label>

              <div class="col-md-6">
                  <input id="password" type="password" class="form-control" name="password" required>
              </div>
          </div>

          <div class="form-group clearfix">
              <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

              <div class="col-md-6">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
              </div>
          </div>
           <div class="form-group clearfix">
              <div class='col-md-4'></div>
              <div class="col-md-6">
                 <button type="submit" class="btn btn-primary glyphicon glyphicon-ok pull-right">Register</button>
              </div>
          </div>
            </form>
          </div>
       
            </div>
          </div>
        </div>
    </div>
  </div>
@endsection
