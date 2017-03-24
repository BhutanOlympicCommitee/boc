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
              <div class="text-muted bootstrap-admin-box-title clearfix">Edit Sport Organization Profile
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
              <ul class='nav nav-pills nav-justified' id='tabs'>
                  <li class='active' id='org'><a href="#Org-info" data-toggle="tab">Organization Information</a></li>
                  <li class='contact'><a href="#Contact-info" data-toggle="tab">Contact Person Information</a></li>
                  <li id='management'><a href="#Management-info" data-toggle="tab">Secretariate Information</a></li>
                  <li id='advisory'><a href="#Advisory-info" data-toggle="tab">Executive Board Information</a></li>
              </ul>
              <div class='tab-content'>
                <div class='tab-pane fade in active' id='Org-info'>    
                  <form action="{{route('sport_organization.update',$sport->sport_org_id)}}" method="post">
                      <div class='form-group'>
                          <input name="_method" type="hidden" value="PATCH">
                            {{csrf_field()}}
                      </div>
                      <div class='form-group'>
                          <label for='org_id' class='col-xs-2'>Type</label>
                            <div class='col-xs-10 input-group'>
                              <select class='form-control' name='type'>
                              <?php 
                                $enum=App\Enum_sport_org::all();
                                foreach($enum as $enums):
                              ?>
                                <option value="{{$enums->sport_org_type_id}}" <?php 
                                if($enums->sport_org_type_id == $sport->sport_org_type_id){?>
                                  selected
                                <?php }?> >{{$enums->sport_org_type_name}}</option>
                                <?php 
                              endforeach
                              ?>
                              </select>
                            </div>
                      </div>
                      <div class='form-group'>
                        <label for='org_name' class='col-xs-2'>Name</label>
                        <div class='col-xs-10 input-group'>
                          <input type="text" name="org_name" class="form-control" placeholder="Enter organization name here" value="{{$sport->sport_org_name}}">
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='abbreviation' class='col-xs-2'>Abbreviation</label>
                        <div class='input-group col-xs-10'>
                          <input type="text" name="abbreviation" class="form-control" placeholder="Enter abbreviation here" value="{{$sport->sport_org_abbreviation}}">
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='org_web_address' class='col-xs-2'>Web Address</label>
                        <div class='input-group col-xs-10'>
                          <input type="text" name="org_web_address" class="form-control" placeholder="Enter web adress here" value="{{$sport->sport_org_webaddress}}">
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='org_logo' class="col-xs-2">Logo</label>
                        <div class='input-group col-xs-10'>
                          <input type="text" name="org_logo" class="form-control"  value="{{$sport->sport_org_logo}}">
                          <input type="file" name="org_logo" value="{{$sport->sport_org_logo}}">
                        </div>
                        <div class="clearfix"></div>
                      </div>
                      <div class='form-group'>
                        <label for='org_email' class='col-xs-2'>Email</label>
                        <div class='input-group col-xs-10'>
                          <input type="email" name="org_email" class="form-control" placeholder="enter email" value="{{$sport->sport_org_email}}">
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='org_phone' class='col-xs-2'>Phone</label>
                        <div class='input-group col-xs-10'>
                          <input type="text" name="org_phone" class="form-control" placeholder="enter phone number" value="{{$sport->sport_org_phone}}">
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='org_fax' class='col-xs-2'>Fax</label>
                        <div class='input-group col-xs-10'>
                          <input type="text" name="org_fax" class="form-control" placeholder="enter fax number" value="{{$sport->sport_org_fax}}">
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='org_address' class='col-xs-2'>Office Address</label>
                        <div class='input-group col-xs-10'>
                          <textarea type='text' name="org_address" class="form-control" rows=3 placeholder="enter office address">{{$sport->sport_org_office_address}}</textarea>
                        </div>
                      </div>
                      <div class='form-group'>
                        <div class="col-xs-10 col-xs-offset-2 input-group">
                        <button type='submit' class='btn btn-default col-xs-2' name='update1' value='form1'>Update</button>
                        <button type='submit' class='btn btn-default col-xs-2 col-xs-offset-1 next1' name='update1' value='form2'>Next</button>
                        <a href="#Contact-info" data-toggle="tab" class='btn btn-default col-xs-2 col-xs-offset-1 contact'>Skip</a>
                        
                        <a href="{{route('sport_organization.index')}}" class='btn btn-default col-xs-2 col-xs-offset-1'> Cancel</a>
                      </div>
                      </div>
                  </form>
                </div>
                  <div class='tab-pane fade' id='Contact-info'>
                       <script type="text/javascript">
                        $(function(){
                          $('.contact').click(function(){
                              window.location="{{url(route('contact_person.edit',$sport->contact->sport_org_contact_person_id))}}";
                          });
                        });
                       </script>
                    </div>
                  </div>
                    
                    <div class='tab-pane fade' id='Management-info'>
                      <script type="text/javascript">
                        $(function(){
                          $('#management').click(function(){
                              window.location="{{url(route('management_committee.index'))}}";
                          });
                        });
                       </script>
                    </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    $(function()
    {
      //navigation of active class from organization tab to contact info tab on clicking next button
      $('.next1').click(function()
      {
        $('.nav #org').removeClass('active');
        $('.nav #contact').addClass('active');
      }); 
    });
  </script>
@endsection
@section('footer')
<div class="container">
    <div class="row">
        @include('includes.footer')
   
    </div>
</div>
@endsection
               
