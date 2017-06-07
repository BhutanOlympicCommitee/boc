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
              <div class="text-muted bootstrap-admin-box-title clearfix">Add Games Information
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
            <ul class='nav nav-pills nav-justified'>
              <li class='active' id='game'><a href="#" data-toggle="tab">Games Information</a></li>
              <li id='sportcoach'><a href="#sport_coach_master" data-toggle="tab">Sport And Coach Information</a></li>
              <li id='team'><a href="#athlete_qualification" data-toggle="tab">Athlete Team Member</a></li>
            </ul>
            <div style='margin-top:20px'></div>
             @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-success">
                      {{ Session::get('success') }}
                    </div>
                @endif
              <form action="{{route('games_master.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                 <div class='form-group clearfix'>
                  <label for='year' class='col-xs-2'>Games Event Year:<a class="test">*</a></label>
                    <div class='col-xs-10 input-group'>
                  <select name="year" class="form-control" required>
                    <option disabled selected>Select Year
                    </option>
                    <?php 
                    for($i = 1950 ; $i <= date('Y'); $i++){
                      echo "<option value='$i'>$i</option>";
                    }
                    ?>
                  </select> 
                </div>
              </div>
            <div class='form-group clearfix'>
             <label for='type' class='col-xs-2'>Type:<a class="test">*</a></label>
              <div class='col-xs-10 input-group'>
                <select class='form-control' name='type' required>
                  <option disabled selected>Select</option>
                  <?php 
                    $EnumGame=App\Enum_GameType::all();
                    foreach($EnumGame as $games):
                  ?>
                  <option value="{{$games->gametype_id}}">{{$games->type}}</option>
                  <?php 
                    endforeach
                  ?>
                </select>
              </div>
          </div>
                 <div class='form-group clearfix'>
                  <label for='name' class='col-xs-2'>Name:<a class="test">*</a></label>
                    <div class='col-xs-10 input-group'>
                      <input type="text" name="name" class="form-control" placeholder="Enter Games event Name here" required>
                    </div>
                </div>
               <div class='form-group clearfix'>
             <label for='country' class='col-xs-2'>Country:<a class="test">*</a></label>
              <div class='col-xs-10 input-group'>
                <select class='form-control' name='country' required>
                  <option disabled selected>Select Country</option>
                   <?php 
                  $serverName = "192.168.1.100"; 
                  $connectionInfo = array( "Database"=>"boc", "UID"=>"sa", "PWD"=>"P@ssw0rd");
                  $conn = sqlsrv_connect( $serverName, $connectionInfo);
                  if( $conn )
                  {
                     $sql="SELECT * from MASTER.mstCountry";
                     $stmt = sqlsrv_query( $conn, $sql );
                      if( $stmt === false) 
                      {
                          die( print_r( sqlsrv_errors(), true) );
                      }
                      while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
                      {
                        echo '<option value='.$row["CountryID"].'>'.$row['CountryName'].'</option>';
                      }
                      sqlsrv_free_stmt( $stmt);
                      }
                      else
                      {
                       echo "Connection could not be established.<br />";
                       die( print_r( sqlsrv_errors(), true));          
                      }
                ?>
                </select>
              </div>
          </div>
                <div class='form-group clearfix'>
                  <label for='venue' class='col-xs-2'>Venue:<a class="test">*</a></label>
                    <div class='col-xs-10 input-group'>
                      <input type="text" name="venue" class="form-control" placeholder="Enter event venue here" required>
                    </div>
                </div>
                <div class='form-group clearfix'>
                  <label for='startdate' class='col-xs-2'>Start Date:<a class="test">*</a></label>
                    <div class='col-xs-10 input-group'>
                      <input type="date" name="startdate" class="form-control" placeholder="Enter date of birth here" required>
                    </div>
                </div>
                <div class='form-group clearfix'>
                  <label for='enddate' class='col-xs-2'>End Date:<a class="test">*</a></label>
                    <div class='col-xs-10 input-group'>
                      <input type="date" name="enddate" class="form-control" placeholder="Enter place of birth here" required>
                    </div>
                  </div>
                <div class='form-group clearfix'>
                  <label for='comments' class='col-xs-2'>Comments:</label>
                    <div class='col-xs-10 input-group'>
                      <textarea type="text" name="comments" class="form-control" placeholder="Enter Comments here" ></textarea>
                    </div>
                </div>
                <div class="form-group">
                  <div class="col-xs-10 col-xs-offset-2 input-group">
                      <button type="submit" class="btn btn-primary col-xs-2 col-xs-offset-7 glyphicon glyphicon-ok" value="Save">Save</button>
                      <a href="{{route('games_master.create')}}" class='btn btn-warning col-xs-2 col-xs-offset-1 glyphicon glyphicon-remove'>Cancel</a>
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
</br>
</br>
<script type="text/javascript">
  $(function()
  {
    $('#sportcoach').click(function(){
       window.location="{{url(route('sport_coach_master.index'))}}";   
     });
  });
</script>
<style type="text/css">
a.test {
font-size: 20px;
color: red;
}
</style>
@endsection
@section('footer')
<div class="container">
  <div class="row">
     @include('includes.footer')
  </div>
</div>
@endsection