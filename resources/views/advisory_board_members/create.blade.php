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
              <div class="text-muted bootstrap-admin-box-title clearfix">Create advisory board member
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
                <ul class='nav nav-pills nav-justified'>
                  <li id='org_info'><a href="#Org-info" data-toggle="tab">Organization Information</a></li>
                  <li><a href="#Contact-info" data-toggle="tab">Contact Person Information</a></li>
                  <li id='management_info'><a href="#Management-info" data-toggle="tab">Management Committee Information</a></li>
                  <li class='active'><a href="#Advisory-info" data-toggle="tab">Advisory Board Information</a></li>
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
                <form action='{{route('advisory_board_members.store')}}' method='post'>
                    <div class='form-group'>
                          {{csrf_field()}}
                    </div>
                    <div class='form-group'>
                        <label for='ad_name' class='col-xs-2'>Name</label>
                            <div class='col-xs-10 input-group'>
                                <input type="text" name="ad_name" class="form-control" placeholder="Enter advisory board members name">
                            </div>
                    </div>
                    <div class='form-group'>
                        <label for='ad_designation' class='col-xs-2'>Designation</label>
                            <div class='col-xs-10 input-group'>
                                <input type="text" name="ad_designation" class="form-control" placeholder="Enter advisory board members designation">
                            </div>
                    </div>
                    <div class='form-group'>
                        <label for='ad_phone' class='col-xs-2'>Phone</label>
                            <div class='col-xs-10 input-group'>
                                <input type="text" name="ad_phone" class="form-control" placeholder="Enter advisory board members phone number">
                            </div>
                    </div>
                    <div class='form-group'>
                        <label for='ad_email' class='col-xs-2'>Email</label>
                            <div class='col-xs-10 input-group'>
                                <input type="email" name="ad_email" class="form-control" placeholder="Enter advisory board members email">
                            </div>
                    </div>
                    <div class='form-group'>
                        <label for='ad_mobile' class='col-xs-2'>Mobile</label>
                            <div class='col-xs-10 input-group'>
                                <input type="text" name="ad_mobile" class="form-control" placeholder="Enter advisory board members mobile number">
                            </div>
                    </div>
                    <div class='form-group'>
                        <label for='ad_appointment' class='col-xs-2'>Appointment date</label>
                            <div class='col-xs-10 input-group'>
                                <input type="date" name="ad_appointment" class="form-control" placeholder="enter advisory board members appointment date">
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-10 col-xs-offset-2 input-group">
                          <button type="submit" class="btn btn-default col-xs-2 col-xs-offset-6 glyphicon glyphicon-ok">Save</button>
                          <a href="{{route('advisory_board_members.index')}}" class='btn btn-default col-xs-2 col-xs-offset-1 glyphicon glyphicon-remove'>Cancel</a>
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