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
              <div class="text-muted bootstrap-admin-box-title">Add Official</div>
            </div>
            <div class="bootstrap-admin-panel-content">
             <ul class='nav nav-pills nav-justified'>
                 <li id='game1'><a href="#games_master" data-toggle="tab">Games Information</a></li>
                 <li id='coach'><a href="#" data-toggle="tab">Sport And Coach Information</a></li>
                  <li class='active' id="official"><a data-toggle="tab">Officials/CDM</a></li>
                 <li id='team'><a href="#" data-toggle="tab">Athlete Team Member</a></li>
            </ul>
            <br>
              <form class="form-horizontal" role="form" method="POST" action="{{ route('save_official') }}">
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
                              <label for="employ_id" class="col-md-4 control-label">EmployeeID:<a class="test">*</a></label>

                                  <div class="col-md-6">
                                      <input id="employ_id" type="text" class="form-control" name="employ_id" value="'.$row["EmpNo"].'" required autofocus disabled>
                                  </div>
                             </div>';
                            echo '<div class="form-group">
                              <label for="name" class="col-md-4 control-label">Name:<a class="test">*</a></label>

                                  <div class="col-md-6">
                                      <input id="name" type="text" class="form-control" name="name" value="'.$row["FirstName"].' '.$row['MiddleName'].' '.$row['LastName'].'" required autofocus>
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
                      <div class="form-group">
                        <label for="game_name" class="col-md-4 control-label">Game Event:<a class="test">*</a></label>

                            <div class="col-md-6">
                              <?php $games=App\Tbl_game_detail::where('gamesdetail_id',Session::get('key6'))->first();?>
                                <input id="game_name" type="text" class="form-control" disabled value="{{$games->name}}">
                            </div>
                       </div>
             <div class="form-group">
                <label for="federation_type" class="col-md-4 control-label">Sport Organization:<a class="test">*</a></label>

                <div class="col-md-6">
                  <select  name="federation_type" class="col-md-6 form-control" required>
                    <option disabled selected>Select the Sport Organization</option>
                     <?php
                    $sport_organization= App\Sport_Organization::all();
                    foreach($sport_organization as $sport):
                        ?>
                    <option value="{{$sport->sport_org_id}}">{{$sport->sport_org_name}}</option>
                <?php endforeach;?>
                  </select>
             </div>
            </div>
            
           <div class="form-group clearfix">
              <div class='col-md-4'></div>
              <div class="col-md-6">
                 <button type="submit" class="btn btn-primary glyphicon glyphicon-ok pull-right">Save</button>
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
  <style type="text/css">
a.test {
font-size: 20px;
color: red;
}
</style>
@endsection
