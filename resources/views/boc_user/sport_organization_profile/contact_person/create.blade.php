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
              <div class="text-muted bootstrap-admin-box-title clearfix">Create Contact Person Information
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
                <ul class='nav nav-pills nav-justified'>
                  <li id='org_info'><a href="#Org-info" data-toggle="tab">Organization Information</a></li>
                  <li class='active'><a href="#Contact-info" data-toggle="tab">Contact Person Information</a></li>
                  <li id='management_info'><a href="#Management-info" data-toggle="tab">Secretariate Information</a></li>
                  <li><a href="#Advisory-info" data-toggle="tab">Executive Board Information</a></li>
                </ul>
  
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
                        <label for='contact_name' class='col-xs-2'>Contact Person:<a class="test">*</a></label>
                            <div class='col-xs-10 input-group'>
                                <input type="text" name="contact_name" class="form-control" placeholder="Enter contact Person name" required>
                            </div>
                     </div>
                      <div class='form-group'>
                        <label for='contact_designation' class='col-xs-2'>Designation:<a class="test">*</a></label>
                            <div class='col-xs-10 input-group'>
                                <input type="text" name="contact_designation" class="form-control" placeholder="Enter contact Person Designation" required>
                            </div>
                     </div>
                    <div class='form-group'>
                        <label for='contact_phone' class='col-xs-2'>Phone</label>
                            <div class='col-xs-10 input-group'>
                                <input type="text" name="contact_phone" class="form-control" placeholder="Enter contact person phone number" id='contact_phone'>
                            </div>
                    </div>
                    <div class='form-group'>
                        <label for='contact_fax' class='col-xs-2'>Fax:<a class="test">*</a></label>
                            <div class='col-xs-10 input-group'>
                                <input type="text" name="contact_fax" class="form-control" placeholder="Enter contact person fax number" id='contact_fax' required>
                            </div>
                     </div>
                    <div class='form-group'>
                        <label for='contact_email' class='col-xs-2'>Email</label>
                            <div class='col-xs-10 input-group'>
                                <input type="email" name="contact_email" class="form-control" placeholder="Enter contact person email">
                            </div>
                    </div>
                    <div class='form-group'>
                        <label for='contact_mobile' class='col-xs-2'>Mobile:<a class="test">*</a></label>
                            <div class='col-xs-10 input-group'>
                                <input type="text" name="contact_mobile" class="form-control" placeholder="Enter contact person mobile number" id='contact_mobile' required>
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-10 col-xs-offset-2 input-group">

                            <input type="submit" class="btn btn-primary col-xs-2 col-xs-offset-4" value="Next" id='next'>

                            <a href="{{route('management_committee.index')}}" class='btn btn-default col-xs-2 col-xs-offset-1'>Skip</a>
                            <a href="{{route('sport_organization.index')}}" class='btn btn-warning col-xs-2 col-xs-offset-1 glyphicon glyphicon-remove'>Cancel</a>
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
  $('#next').click(function()
  {
    var pnumber=$('#contact_phone').val();
    var fax_number=$('#contact_fax').val();
    var mobile_number=$('#contact_mobile').val();
    if(!$.isNumeric(pnumber) || pnumber.length!=8)
    {
      alert('Please enter 8 digits numeric phone number');
      return false;
    }
    else if(!$.isNumeric(fax_number)|| fax_number.length!=8)
    {
      alert('Please enter 8 digits numeric fax number');
      return false;
    }
    else if(!$.isNumeric(mobile_number)|| mobile_number.length!=8)
    {
      alert('Please enter 8 digits numeric mobile number');
      return false;
    }
    else 
      return true;
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