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
              <div class="text-muted bootstrap-admin-box-title clearfix">Add athlete bio information
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
            <ul class='nav nav-pills nav-justified'>
              <li class='active' id='org'><a href="#" data-toggle="tab">Bio Information</a></li>
              <li id='address'><a href="#Training_info" data-toggle="tab"> Address Information</a></li>
              <li id='training'><a href="#" data-toggle="tab">Qualification and Training Information</a></li>
            </ul>
            <div style='margin-top:20px'></div>
              <form action="{{--route('sport_organization.store')--}}" method="post">
                {{csrf_field()}}
                <div class='form-group'>
                  <label for='title' class='col-xs-2'>Title</label>
                    <div class='col-xs-10 input-group'>
                      <select class='form-control' name='title'>
                        <option></option>
                        <option>Ms.</option>
                        <option>Mrs.</option>
                        <option>Mr.</option>
                      </select>
                    </div>
                </div>
                <div class='form-group'>
                  <label for='first_name' class='col-xs-2'>First Name</label>
                    <div class='col-xs-10 input-group'>
                      <input type="text" name="first_name" class="form-control" placeholder="Enter First Name here">
                    </div>
                </div>
                <div class='form-group'>
                  <label for='last_name' class='col-xs-2'>Last Name</label>
                    <div class='col-xs-10 input-group'>
                      <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name here">
                    </div>
                </div>
                <div class='form-group'>
                  <label for='occupation' class='col-xs-2'>Occupation</label>
                    <div class='col-xs-10 input-group'>
                      <select class='form-control' name='occupation'>
                        <option></option>
                      </select>
                    </div>
                </div>
                <div class='form-group'>
                  <label for='dob' class='col-xs-2'>Date of Birth</label>
                    <div class='col-xs-10 input-group'>
                      <input type="text" name="dob" class="form-control" placeholder="Enter date of birth here">
                    </div>
                </div>
                <div class='form-group'>
                  <label for='pob' class='col-xs-2'>Place of Birth</label>
                    <div class='col-xs-10 input-group'>
                      <input type="text" name="pob" class="form-control" placeholder="Enter place of birth here">
                    </div>
                </div>
                <div class='form-group'>
                  <label for='gender' class='col-xs-2'>Gender</label>
                    <div class='col-xs-10 input-group'>
                      <select class='form-control' name='gender'>
                        <option></option>
                        <option>Female</option>
                        <option>Male</option>
                      </select>
                    </div>
                </div>
                 <div class='form-group'>
                  <label for='height' class='col-xs-2'>Height</label>
                    <div class='col-xs-10 input-group'>
                      <input type="text" name="height" class="form-control" placeholder="Enter Height here">
                    </div>
                </div>
                <div class='form-group'>
                  <label for='weight' class='col-xs-2'>Weight</label>
                    <div class='col-xs-10 input-group'>
                      <input type="text" name="weight" class="form-control" placeholder="Enter Weight here">
                    </div>
                </div><div class='form-group'>
                  <label for='fatherName' class='col-xs-2'>Father's Name</label>
                    <div class='col-xs-10 input-group'>
                      <input type="text" name="fatherName" class="form-control" placeholder="Enter pFather's Name here">
                    </div>
                </div><div class='form-group'>
                  <label for='passport' class='col-xs-2'>Passport No.</label>
                    <div class='col-xs-10 input-group'>
                      <input type="text" name="passport" class="form-control" placeholder="Enter Passport No here">
                    </div>
                </div><div class='form-group'>
                  <label for='cid' class='col-xs-2'>CID</label>
                    <div class='col-xs-10 input-group'>
                      <input type="text" name="cid" class="form-control" placeholder="Enter CID here">
                    </div>
                </div>
                <div class='form-group'>
                  <label for='sport' class='col-xs-2'>Associated Sport</label>
                    <div class='col-xs-10 input-group'>
                      <select class='form-control' name='sport'>
                        <option></option>
                      </select>
                    </div>
                </div>
                <div class='form-group'>
                  <label for='photo' class='col-xs-2'>Photo</label>
                    <div class='col-xs-10 input-group'>
                      <input type="file" name="photo" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                  <div class="col-xs-10 col-xs-offset-2 input-group">
                      <input type="submit" class="btn btn-default col-xs-2 col-xs-offset-7" value="Save">
                      <a href="{{--route('sport_organization.index')--}}" class='btn btn-default col-xs-2 col-xs-offset-1'>Cancel</a>
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
{{-- <script type="text/javascript">
  $(function()
  {
    $('#training').click(function(){
       window.location="{{url(route('training.index'))}}";   
     });
  });
</script> --}}
@endsection
@section('footer')
<div class="container">
  <div class="row">
     @include('includes.footer')
  </div>
</div>
@endsection