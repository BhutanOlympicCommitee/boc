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
              <div class="text-muted bootstrap-admin-box-title clearfix">Add athlete Bio Information
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
            <ul class='nav nav-pills nav-justified'>
              <li class='active' id='org'><a href="#" data-toggle="tab">Bio Information</a></li>
              <li id='address'><a href="#athlete_address" data-toggle="tab"> Address Information</a></li>
               <li id='medical'><a href="#athlete_medical" data-toggle="tab"> Medical Records</a></li>
              <li id='qualification'><a href="#athlete_qualification" data-toggle="tab">Qualification and Training Info</a></li>
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
              <form action="{{route('athlete_info.update',$athlete->athlete_id)}}" method="post" enctype="multipart/form-data">
                 <input name="_method" type="hidden" value="PATCH">
                {{csrf_field()}}
                 <div class='form-group'>
                  <label for='' class='col-xs-2'>Title:</label>
                    <div class='col-xs-10 input-group'>
                      <select class='form-control' name='' disabled>
                        <option>{{$athlete->athlete_title}}</option>
                      </select>
                    </div>
                </div>
                <div class='form-group'>
                  <label for='fname' class='col-xs-2'>First Name:<a class="test">*</a></label>
                    <div class='col-xs-10 input-group'>
                      <input type="text" name="fname" class="form-control" placeholder="Enter First Name here" value="{{$athlete->athlete_fname}}">
                    </div>
                </div>
                <div class='form-group'>
                  <label for='mname' class='col-xs-2'>Middle Name:</label>
                    <div class='col-xs-10 input-group'>
                      <input type="text" name="mname" class="form-control" placeholder="Enter Middle Name here" value="{{$athlete->athlete_mname}}">
                    </div>
                </div>
                <div class='form-group'>
                  <label for='lname' class='col-xs-2'>Last Name:</label>
                    <div class='col-xs-10 input-group'>
                      <input type="text" name="lname" class="form-control" placeholder="Enter Last Name here" value="{{$athlete->athlete_lname}}">
                    </div>
                </div>
                 <div class='form-group'>
                  <label for='occupation' class='col-xs-2'>Occupation:</label>
                    <div class='col-xs-10 input-group'>
                       <select class='form-control' name='occupation'>
                              <?php 
                                $enum=App\Athlete_occupation::all();
                                foreach($enum as $enums):
                              ?>
                                <option value="{{$enums->occupation_id}}" <?php 
                                if($enums->occupation_id == $athlete->athlete_occupation){?>
                                  selected
                                <?php }?> >{{$enums->occupation_name}}</option>
                                <?php 
                              endforeach
                              ?>
                              </select>
                
                    </div>
                </div>
                <div class='form-group'>
                  <label for='dob' class='col-xs-2'>Date of Birth:<a class="test">*</a></label>
                    <div class='col-xs-10 input-group'>
                      <input type="date" name="dob" class="form-control" placeholder="mm-dd-yyyy" value="{{$athlete->athlete_dob}}">
                    </div>
                </div>
                <div class='form-group'>
                  <label for='pob' class='col-xs-2'>Place of Birth:<a class="test">*</a></label>
                    <div class='col-xs-10 input-group'>
                      <input type="text" name="pob" class="form-control" placeholder="Enter place of birth here" value="{{$athlete->athlete_pob}}">
                    </div>
                  </div>
                <div class='form-group'>
                  <label for='gender' class='col-xs-2'>Gender:<a class="test">*</a></label>
                    <div class='col-xs-10 input-group'>
                      <select class='form-control' name='gender' required>
                    <option disabled selected>Select</option>
                  <?php 
                    $gender=App\EnumGender::all();
                    foreach($gender as $genders):
                  ?>
                 <option value="{{$genders->id}}" <?php 
                                if($genders->id == $athlete->athlete_gender){?>
                                  selected
                                <?php }?> >{{$genders->gender}}</option>
                                <?php 
                              endforeach
                              ?>
                              </select>
                    </div>
                </div>
                 <div class='form-group'>
                  <label for='height' class='col-xs-2'>Height(cm):<a class="test">*</a></label>
                    <div class='col-xs-10 input-group'>
                      <input type="text" name="height" class="form-control" placeholder="Enter Height here"  value="{{$athlete->athlete_height}}">
                    </div>
                </div>
                <div class='form-group'>
                  <label for='weight' class='col-xs-2'>Weight(kg):<a class="test">*</a></label>
                    <div class='col-xs-10 input-group'>
                      <input type="text" name="weight" class="form-control" placeholder="Enter Weight here"  value="{{$athlete->athlete_weight}}">
                    </div>
                </div><div class='form-group'>
                  <label for='fathername' class='col-xs-2'>Father's Name</label>
                    <div class='col-xs-10 input-group'>
                      <input type="text" name="fathername" class="form-control" placeholder="Enter Father's Name here"  value="{{$athlete->athlete_fathername}}">
                    </div>
                </div><div class='form-group'>
                  <label for='passportNo' class='col-xs-2'>Passport No.:</a></label>
                    <div class='col-xs-10 input-group'>
                      <input type="text" name="passportNo" class="form-control" placeholder="Enter Passport No here"  value="{{$athlete->athlete_passportNo}}">
                    </div>
                </div><div class='form-group'>
                  <label for='cid' class='col-xs-2'>CID/StdID:<a class="test">*</a></label>
                    <div class='col-xs-10 input-group'>
                      <input type="text" name="cid" class="form-control" placeholder="Enter CID here" id='cid' value="{{$athlete->athlete_cid}}">
                    </div>
                </div>
                <div class='form-group clearfix'>
                  <label for='associatedSport' class='col-xs-2'>Associated Sport:<a class="test">*</a></label>
                    <div class='col-xs-10 input-group'>
                      <select class='form-control' name='associatedSport' required>
                    <option disabled selected>Select</option>
                  <?php 
                    $Asport=App\Associated_Sport::all();
                    foreach($Asport as $sport):
                  ?>
                 <option value="{{$sport->sport_id}}" <?php 
                                if($sport->sport_id == $athlete->athlete_associatedSport){?>
                                  selected
                                <?php }?> >{{$sport->sport_name}}</option>
                                <?php 
                              endforeach
                              ?>
                              </select>
                    </div>
                </div>
                <div class='form-group'>
                  <label for='photo' class='col-xs-2'>Photo:</label>
                    <div class='col-xs-10 input-group'>
            
                       <input type="text" name="photo" class="form-control"  value="{{$athlete->athlete_photo}}">
                        <input type="file" name="photo" value="{{$athlete->athlete_photo}}">
                    </div>
                </div>
                <div class="form-group">
                  <div class="col-xs-10 col-xs-offset-2 input-group">
                      <button type="submit" class="btn btn-primary col-xs-2 col-xs-offset-7 glyphicon glyphicon-ok" value="Save" id='save'>Update</button>
                      <a href="{{route('athlete_info.index')}}" class='btn btn-warning col-xs-2 col-xs-offset-1 glyphicon glyphicon-remove'>Cancel</a>
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
  $('#save').click(function()
  {
    
  });
  $(function()
  {
    $('#address').click(function(){
       window.location="{{url(route('athlete_address.create'))}}";   
     });
  });

  $(function()
  {
    $('#qualification').click(function(){
       window.location="{{url(route('athlete_qualification.create'))}}";   
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