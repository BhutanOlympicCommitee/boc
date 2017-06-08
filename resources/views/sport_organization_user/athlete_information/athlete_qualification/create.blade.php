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
              <div class="text-muted bootstrap-admin-box-title clearfix">Add athlete Qualification and Training Information<div class="pull-right">Athlete_id:{{Session::get('key')}}</div>
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
            <ul class='nav nav-pills nav-justified'>
              <li id='bio'><a href="#athlete_info" data-toggle="tab">Bio Information</a></li>
              <li id='address'><a href="#athlete_address" data-toggle="tab"> Address Information</a></li>
               <li id='medical'><a href="#athlete_medical" data-toggle="tab"> Medical Records</a></li>
              <li class="active" id='qualification'><a href="#" data-toggle="tab">Qualification and Training Info</a></li>
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
              <form action="{{route('athlete_qualification.store')}}" method="post">
                {{csrf_field()}}
                <div class='form-group clearfix'>
                  <label for='level' class='col-xs-3'>Level:<a class="test">*</a></label>
                    <div class='col-xs-9 input-group'>
                      <select class='form-control' name='type1' required>
                      <option disabled selected>Select One</option>
                   <?php 
                    $qualification=App\Enum_qualification_level::all();
                    foreach($qualification as $qualifications):
                  ?>
                  <option value="{{$qualifications->qualification_level_id}}">{{$qualifications->qualification_level}}</option>
                  <?php 
                    endforeach
                  ?>
                </select>
                    </div>
                </div>
                <div class='form-group clearfix'>
                  <label for='description' class='col-xs-3'>Course Description:<a class="test">*</a></label>
                    <div class='col-xs-9 input-group'>
                      <textarea type='text' name="description" class="form-control" rows=4 placeholder="Enter Course Description here" required></textarea>             
                    </div>
                    </div>
                 <div class='form-group clearfix'>
                  <label for='year' class='col-xs-3'>Year of Completion:<a class="test">*</a></label>
                    <div class='col-xs-9 input-group'>
                  <select name="year" class="form-control" required>
                    <option disabled selected>Select Year</option>
                    <?php 
                    for($i = 1950 ; $i <= date('Y'); $i++){
                      echo "<option value='$i'>$i</option>";
                    }
                    ?>
                  </select> 
                </div>
              </div>
                <div class='form-group clearfix'>
            <label for='type' class='col-xs-3'>Country:<a class="test">*</a></label>
              <div class='col-xs-9 input-group'>
                <select class='form-control' name='type' required>
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
                  <label for='institute' class='col-xs-3'>Institute:<a class="test">*</a></label>
                    <div class='col-xs-9 input-group'>
                      <input type="text" name="institute" class="form-control" placeholder="Enter Institute Name here" required>
                    </div>
                </div>

                <div class="form-group clearfix">
                  <div class="col-xs-10 col-xs-offset-2 input-group">
                      <button type="submit" class="btn btn-primary col-xs-2 col-xs-offset-7 glyphicon glyphicon-ok" value="Save">Save</button>
                      <a href="{{route('athlete_qualification.index')}}" class='btn btn-warning col-xs-2 col-xs-offset-1 glyphicon glyphicon-remove'>Cancel</a>
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
<br>
<br>
<script type="text/javascript">
  $(function()
  {
    $('#address').click(function(){
       window.location="{{url(route('athlete_address.create'))}}";   
     });
  });
   $(function()
  {
    $('#medical').click(function(){
       window.location="{{url(route('athlete_medical.create'))}}";   
     });
  });

  $(function()
  {
    $('#bio').click(function(){
       window.location="{{url(route('athlete_info.create'))}}";   
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