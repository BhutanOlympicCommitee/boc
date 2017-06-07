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
              <div class="text-muted bootstrap-admin-box-title clearfix">Create Sport Organization Profile
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
              <ul class='nav nav-pills nav-justified'>
                <li class='active' id='org'><a href="#Org-info" data-toggle="tab">Organization Information</a></li>
                <li id='contact'><a href="#Contact-info" data-toggle="tab">Contact Person Information</a></li>
                <li id='management'><a href="#Management-info" data-toggle="tab">Secretariate Information</a></li>
                <li id='advisory'><a href="#Advisory-info" data-toggle="tab">Executive Board Information</a></li>
              </ul>
                  <form action="{{route('sport_organization.store')}}" method="post" enctype="multipart/form-data">
                    <div class='form-group'>
                      {{csrf_field()}}
                    </div>
                    <div class='form-group'>
                      <label for='type' class='col-xs-2'>Type:<a class="test">*</a></label>
                        <div class='col-xs-10 input-group'>
                          <select class='form-control' name='type'>
                            <option disabled selected>Select Sport organization</option>
                            <?php 
                              $enum=App\Enum_sport_org::all();
                              foreach($enum as $enums):
                            ?>
                            <option value="{{$enums->sport_org_type_id}}">{{$enums->sport_org_type_name}}</option>
                            <?php 
                              endforeach
                            ?>
                          </select>
                        </div>
                    </div>
                    <div class='form-group'>
                      <label for='org_name' class='col-xs-2'>Name:<a class="test">*</a></label>
                        <div class='col-xs-10 input-group'>
                          <input type="text" name="org_name" class="form-control" placeholder="Enter organization name here" required>
                        </div>
                    </div>
                    <div class='form-group'>
                      <label for='abbreviation' class='col-xs-2'>Abbreviation:<a class="test">*</a></label>
                        <div class='input-group col-xs-10'>
                          <input type="text" name="abbreviation" class="form-control" placeholder="Enter abbreviation here" required>
                        </div>
                    </div>
                    <div class='form-group'>
                      <label for='org_web_address' class='col-xs-2'>Web Address:</label>
                        <div class='input-group col-xs-10'>
                          <input type="text" name="org_web_address" class="form-control" placeholder="Enter web adress here">
                        </div>
                    </div>
                    <div class='form-group'>
                      <label for='org_logo' class="col-xs-2">Logo:<a class="test">*</a></label>
                        <div class='input-group col-xs-10'>
                          <input type="file" name="org_logo" class="form-control" required>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class='form-group'>
                      <label for='org_email' class='col-xs-2'>Email:</label>
                        <div class='input-group col-xs-10'>
                          <input type="email" name="org_email" class="form-control" placeholder="enter email">
                        </div>
                    </div>
                    <div class='form-group'>
                      <label for='org_phone' class='col-xs-2'>Phone:<a class="test">*</a></label>
                        <div class='input-group col-xs-10'>
                          <input type="text" name="org_phone" class="form-control" placeholder="enter phone number" id='org_phone' required>
                        </div>
                    </div>
                    <div class='form-group'>
                      <label for='org_fax' class='col-xs-2'>Fax:<a class="test">*</a></label>
                        <div class='input-group col-xs-10'>
                          <input type="text" name="org_fax" class="form-control" placeholder="enter fax number" id='org_fax' required>
                        </div>
                    </div>
                    <div class='form-group'>
                      <label for='org_address' class='col-xs-2'>Office Address:<a class="test">*</a></label>
                        <div class='input-group col-xs-10'>
                          <textarea type='text' name="org_address" class="form-control" rows=5 placeholder="enter office address" required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                          <div class="col-xs-10 col-xs-offset-2 input-group">

                            <input type="submit" class="btn btn-primary col-xs-2 col-xs-offset-7  glyphicon glyphicon-step-forward" value="Next" id='next'>

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
    var pnumber=$('#org_phone').val();
    var fax_number=$('#org_fax').val();
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

           		