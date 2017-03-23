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
              <div class="text-muted bootstrap-admin-box-title clearfix">Create Secretariate Information
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
              <ul class='nav nav-pills nav-justified'>
                <li id='org_info'><a href="#Org-info" data-toggle="tab">Organization Information</a></li>
                <li><a href="#Contact-info" data-toggle="tab">Contact Person Information</a></li>
                <li class='active'><a href="#Management-info" data-toggle="tab">Secretariate Information</a></li>
                <li><a href="#Advisory-info" data-toggle="tab">Executive Board Information</a></li>
              </ul>
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
                <form action='{{route('management_committee.store')}}' method='post'>
                    <div class='form-group'>
                          {{csrf_field()}}
                    </div>
                    <div class='form-group'>
                        <label for='mg_name' class='col-xs-2'>Name</label>
                            <div class='col-xs-10 input-group'>
                                <input type="text" name="mg_name" class="form-control" placeholder="Enter management member name">
                          </div>
                     </div>
                     <div class='form-group'>
                        <label for='mg_designation' class='col-xs-2'>Designation</label>
                            <div class='col-xs-10 input-group'>
                                <input type="text" name="mg_designation" class="form-control" placeholder="Enter management member designation">
                          </div>
                     </div>
                     <div class='form-group'>
                        <label for='mg_phone' class='col-xs-2'>Phone</label>
                            <div class='col-xs-10 input-group'>
                                <input type="text" name="mg_phone" class="form-control" placeholder="Enter management member phone number">
                          </div>
                     </div>
                     <div class='form-group'>
                        <label for='mg_email' class='col-xs-2'>Email</label>
                            <div class='col-xs-10 input-group'>
                                <input type="email" name="mg_email" class="form-control" placeholder="Enter management member email">
                          </div>
                     </div>
                    <div class='form-group'>
                        <label for='mg_mobile' class='col-xs-2'>Mobile</label>
                            <div class='col-xs-10 input-group'>
                                <input type="text" name="mg_mobile" class="form-control" placeholder="Enter management member mobile number">
                          </div>
                    </div>
                    <div class='form-group'>
                        <label for='mg_appointment' class='col-xs-2'>Appointment date</label>
                            <div class='col-xs-10 input-group'>
                                <input type="date" name="mg_appointment" class="form-control" placeholder="enter management member appointment date">
                          </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-10 col-xs-offset-2 input-group">
                          <button type="submit" class="btn btn-default col-xs-2 col-xs-offset-6 glyphicon glyphicon-ok">Save</button>
                          <a href="{{route('management_committee.index')}}" class='btn btn-default col-xs-2 col-xs-offset-1 glyphicon glyphicon-remove'>Cancel</a>
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
@endsection
@section('footer')
<div class="container">
    <div class="row">
        @include('includes.footer')
   
    </div>
</div>
@endsection