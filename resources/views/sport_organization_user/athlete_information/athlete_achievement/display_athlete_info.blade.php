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
              <div class="text-muted bootstrap-admin-box-title clearfix">Matching athlete information
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
            <form action="" method="post">
                {{csrf_field()}}
                <div class='row'>
                  <div class='col-xs-6 clearfix'>
                    <div class='form-group'>
                    <label for='from' class='col-xs-2'>Year</label>
                      <div class='col-xs-10 input-group'>
                        <input type="text" name="from" class="form-control" placeholder="Enter from date here">
                      </div>
                   </div>
                   <div class='form-group'>
                    <label for='day' class='col-xs-2'>Games</label>
                      <div class='col-xs-10 input-group'>
                        <select class='form-control' name='day'>
                          <option value="" disabled selected>Select day</option>
                          <?php $enum_day=App\EnumDaytable::all();
                        foreach($enum_day as $day):
                          ?>
                        <option value={{$day->day_id}}>{{$day->day_name}}</option>
                      <?php endforeach ?>
                        </select>
                      </div>
                  </div>
                  </div>
                  <div class='col-xs-6 clearfix'>
                    <div class='form-group'>
                    <label for='to' class='col-xs-2'>Federation </label>
                      <div class='col-xs-10 input-group'>
                        <input type="text" name="to" class="form-control" placeholder="Enter to date here">
                      </div>
                   </div>
                   <div class='form-group'>
                    <label for='coach' class='col-xs-2'>Sport</label>
                      <div class='col-xs-10 input-group'>
                        <select class='form-control' name='coach'>
                          <option value="" disabled selected>Select coach</option>
                          <?php $coach=App\Tbl_Coach::all();
                            foreach($coach as $coach):
                              ?>
                            <option value={{$coach->coach_id}}>{{$coach->coach_fname.' '.$coach->coach_mname.' '.$coach->coach_lname}}</option>
                          <?php endforeach ?>
                        </select>
                      </div>
                  </div>
                  </div>
                </div>
                  <div class="form-group clearfix">
                    <div class="col-xs-12 input-group ">
                      <input type="submit" class="btn btn-default pull-right" value="Search">
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