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
              <div class="text-muted bootstrap-admin-box-title clearfix">Create Contact Person Info
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
                <ul class='nav nav-pills nav-justified'>
                  <li id='org_info'><a href="#Org-info" data-toggle="tab">Organization Information</a></li>
                  <li class='active'><a href="#Contact-info" data-toggle="tab">Contact Person Information</a></li>
                  <li id='management_info'><a href="#Management-info" data-toggle="tab">Management Committee Information</a></li>
                  <li><a href="#Advisory-info" data-toggle="tab">Advisory Board Information</a></li>
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
                <form action="{{route('contact_person.store')}}" method='post'>
                    <div class='form-group'>
                        {{csrf_field()}}
                    </div>
                    <div class='form-group'>
                        <label for='contact_name' class='col-xs-2'>Contact Person</label>
                            <div class='col-xs-10 input-group'>
                                <input type="text" name="contact_name" class="form-control" placeholder="Enter contact Person name">
                            </div>
                     </div>
                    <div class='form-group'>
                        <label for='contact_phone' class='col-xs-2'>Phone</label>
                            <div class='col-xs-10 input-group'>
                                <input type="text" name="contact_phone" class="form-control" placeholder="Enter contact person phone number">
                            </div>
                    </div>
                    <div class='form-group'>
                        <label for='contact_fax' class='col-xs-2'>Fax</label>
                            <div class='col-xs-10 input-group'>
                                <input type="text" name="contact_fax" class="form-control" placeholder="Enter contact person fax number">
                            </div>
                     </div>
                    <div class='form-group'>
                        <label for='contact_email' class='col-xs-2'>Email</label>
                            <div class='col-xs-10 input-group'>
                                <input type="email" name="contact_email" class="form-control" placeholder="Enter contact person email">
                            </div>
                    </div>
                    <div class='form-group'>
                        <label for='contact_mobile' class='col-xs-2'>Mobile</label>
                            <div class='col-xs-10 input-group'>
                                <input type="text" name="contact_mobile" class="form-control" placeholder="Enter contact person mobile number">
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-10 col-xs-offset-2 input-group">
                            <input type="submit" class="btn btn-default col-xs-2 col-xs-offset-4" value="Next">
                            <a href="{{route('management_committee.index')}}" class='btn btn-default col-xs-2 col-xs-offset-1'>Skip</a>
                            <a href="{{route('sport_organization.index')}}" class='btn btn-default col-xs-2 col-xs-offset-1'>Cancel</a>
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