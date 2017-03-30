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
              <div class="text-muted bootstrap-admin-box-title clearfix">Edit Executive board members
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
              <ul class='nav nav-pills nav-justified'>
                  <li id='org_info'><a href="#Org-info" data-toggle="tab">Organization Information</a></li>
                  <li id='contact_info'><a href="#Contact-info" data-toggle="tab">Contact Person Information</a></li>
                  <li><a href="#Management-info" data-toggle="tab">Secretariate Information</a></li>
                  <li class='active'><a href="#Advisory-info" data-toggle="tab">Executive Board Information</a></li>
              </ul>
                <form action="{{route('advisory_board_members.update',1)}}" method="post" id='form3'>
                  <div class='form-group'>
                    <input name="_method" type="hidden" value="PATCH">
                    {{csrf_field()}}
                  </div>
                  <div class='form-group'>
                    <label for='ad_name' class='col-xs-2'>Name</label>
                      <div class='col-xs-10 input-group'>
                        <input type="text" name="ad_name" class="form-control" placeholder="Enter advisory board member name here" value="{{$advisory->ad_member_name}}">
                      </div>
                  </div>
                  <div class='form-group'>
                    <label for='ad_designation' class='col-xs-2'>Designation</label>
                      <div class='input-group col-xs-10'>
                        <input type="text" name="ad_designation" class="form-control" placeholder="enter advisory board member designation" value="{{$advisory->ad_member_designation}}">
                      </div>
                  </div>
                  <div class='form-group'>
                    <label for='ad_phone' class='col-xs-2'>Phone</label>
                      <div class='input-group col-xs-10'>
                        <input type="text" name="ad_phone" class="form-control" placeholder="enter phone number" value="{{$advisory->mg_member_phone}}">
                      </div>
                  </div>
                  <div class='form-group'>
                    <label for='ad_email' class='col-xs-2'>Email</label>
                      <div class='input-group col-xs-10'>
                        <input type="text" name="ad_email" class="form-control" placeholder="enter email" value="{{$advisory->mg_member_email}}">
                      </div>
                  </div>
                   <div class='form-group'>
                    <label for='ad_mobile' class='col-xs-2'>Mobile</label>
                      <div class='input-group col-xs-10'>
                        <input type="text" name="ad_mobile" class="form-control" placeholder="enter mobile number" value="{{$advisory->mg_member_mobile}}">
                      </div>
                  </div>
                  <div class='form-group'>
                    <label for='appointment' class='col-xs-2'>Appointment Date</label>
                      <div class='input-group col-xs-10'>
                        <input type="text" name="appointment" class="form-control" placeholder="enter appointment date" value="{{$advisory->appointment_date}}">
                      </div>
                  </div>
                  <div class='form-group'>
                    <div class="col-xs-10 col-xs-offset-2 input-group">
                      <button type='submit' class='btn btn-default col-xs-2 col-xs-offset-7'>Update</button>  
                      <a href="{{route('advisory_board_members.index')}}" class='btn btn-default col-xs-2 col-xs-offset-1 pull-right'> Cancel</a>
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
          window.location="{{url(route('contact_person.edit',Session::get('key2')))}}";
      });
    });
    </script>
  </div>
  <div class='tab-pane fade' id='Org-info'>
   <script type="text/javascript">
    $(function(){
      $('#org_info').click(function(){
          window.location="{{url(route('sport_organization.edit',Session::get('key1')))}}";
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