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
              <div class="text-muted bootstrap-admin-box-title clearfix">Edit Secretariate Information
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
              <ul class='nav nav-pills nav-justified'>
                <li id='org_info'><a href="#Org-info" data-toggle="tab">Organization Information</a></li>
                <li id='contact_info'><a href="#Contact-info" data-toggle="tab">Contact Person Information</a></li>
                <li class='active'><a href="#Management-info" data-toggle="tab">Secretariate Information</a></li>
                <li><a href="#Advisory-info" data-toggle="tab">Executive Board Information</a></li>
              </ul>
              <form action="{{route('management_committee.update',$management_info->mg_member_id)}}" method="post" id='form3'>
                <div class='form-group'>
                  <input name="_method" type="hidden" value="PATCH">
                  {{csrf_field()}}
                </div>
                <div class='form-group'>
                  <label for='mg_name' class='col-xs-2'>Name</label>
                    <div class='col-xs-10 input-group'>
                      <input type="text" name="mg_name" class="form-control" placeholder="Enter management member name here" value="{{$management_info->mg_member_name}}">
                    </div>
                </div>
                <div class='form-group'>
                  <label for='mg_designation' class='col-xs-2'>Designation</label>
                    <div class='input-group col-xs-10'>
                      <input type="text" name="mg_designation" class="form-control" placeholder="enter member designation" value="{{$management_info->mg_member_designation}}">
                    </div>
                </div>
                <div class='form-group'>
                  <label for='mg_phone' class='col-xs-2'>Phone</label>
                    <div class='input-group col-xs-10'>
                      <input type="text" name="mg_phone" class="form-control" placeholder="enter phone number" value="{{$management_info->mg_member_phone}}">
                    </div>
                </div>
                <div class='form-group'>
                  <label for='mg_email' class='col-xs-2'>Email</label>
                    <div class='input-group col-xs-10'>
                      <input type="text" name="mg_email" class="form-control" placeholder="enter email" value="{{$management_info->mg_member_email}}">
                    </div>
                </div>
                <div class='form-group'>
                  <label for='mg_mobile' class='col-xs-2'>Mobile</label>
                    <div class='input-group col-xs-10'>
                      <input type="text" name="mg_mobile" class="form-control" placeholder="enter mobile number" value="{{$management_info->mg_member_mobile}}">
                    </div>
                </div>
                <div class='form-group'>
                  <label for='appointment' class='col-xs-2'>Appointment Date</label>
                    <div class='input-group col-xs-10'>
                      <input type="text" name="appointment" class="form-control" placeholder="enter appointment date" value="{{$management_info->appointment_date}}">
                    </div>
                </div>
                <div class='form-group'>
                  <div class="col-xs-10 col-xs-offset-2 input-group">
                     <button type='submit' class='btn btn-default col-xs-2 col-xs-offset-7'>Update</button>  
                      <a href="{{route('management_committee.index')}}" class='btn btn-default col-xs-2 col-xs-offset-1 pull-right'> Cancel</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class='tab-pane fade' id='Contact-info'>
   <script type="text/javascript">
    $(function(){
      $('#contact_info').click(function(){
          window.location="{{url(route('contact_person.edit',1))}}";
      });
    });
    </script>
  </div>
  <div class='tab-pane fade' id='Org-info'>
   <script type="text/javascript">
    $(function(){
      $('#org_info').click(function(){
          window.location="{{url(route('sport_organization.edit',4))}}";
      });
    });
    </script>
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
                    
                    
                 