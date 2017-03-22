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
              <div class="text-muted bootstrap-admin-box-title clearfix">Review
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
              <div class='tab-content'>
                <div class='tab-pane fade in active' id='Org-info'>    
                  <form action="{{route('sport_organization.update',$sport->sport_org_id)}}" method="post">
                      <div class='form-group'>
                          <input name="_method" type="hidden" value="PATCH">
                            {{csrf_field()}}
                      </div>
                      <div class='form-group'>
                          <label for='org_id' class='col-xs-2'>Year</label>
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
                          <label for='org_id' class='col-xs-2'>SKRA</label>
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
                          <label for='org_id' class='col-xs-2'>SKRA Activities</label>
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
                        <label for='org_name' class='col-xs-2'>Activity</label>
                        <div class='col-xs-10 input-group'>
                          <input type="text" name="org_name" class="form-control" placeholder="Enter organization name here" value="">
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='abbreviation' class='col-xs-2'>Baseline</label>
                        <div class='input-group col-xs-10'>
                          <input type="text" name="abbreviation" class="form-control" placeholder="Enter abbreviation here" value="">
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='org_web_address' class='col-xs-2'>Target</label>
                        <div class='input-group col-xs-10'>
                          <input type="text" name="org_web_address" class="form-control" placeholder="Enter web adress here" value="">
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='org_logo' class="col-xs-2">Venue</label>
                        <div class='input-group col-xs-10'>
                          <input type="text" name="org_logo" class="form-control"  value="">
                         
                        </div>
                        <div class="clearfix"></div>
                      </div>
                      <div class='form-group'>
                        <label for='org_email' class='col-xs-2'>Time Line</label>
                        <div class='input-group col-xs-10'>
                          <input type="email" name="org_email" class="form-control" placeholder="enter email" value="">
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='org_phone' class='col-xs-2'>Proposed Capital Budget (Million)</label>
                        <div class='input-group col-xs-10'>
                          <input type="text" name="org_phone" class="form-control" placeholder="enter phone number" value="">
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='org_fax' class='col-xs-2'>Proposed Recurring Budget (Million)</label>
                        <div class='input-group col-xs-10'>
                          <input type="text" name="org_fax" class="form-control" placeholder="enter fax number" value="">
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='org_address' class='col-xs-2'>Collaborating Agencies</label>
                        <div class='input-group col-xs-10'>
                          <textarea type='text' name="org_address" class="form-control" rows=3 placeholder="enter office address"></textarea>
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
               
