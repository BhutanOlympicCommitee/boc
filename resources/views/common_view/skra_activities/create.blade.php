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
              <div class="text-muted bootstrap-admin-box-title">Create AKRA activities
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
              @if($errors->any())
                <div class="alert alert-danger">
                  @foreach($errors->all() as $error)
                      <p>{{ $error }}</p>
                  @endforeach
                </div>
              @endif
              <form action="{{route('skra_activities.store')}}" method="post">
                <div class='form-group'>
                    {{csrf_field()}}
                </div>
                <div class='form-group'>
                  <label for='five_year' class='col-xs-3'>Five Year Plan:<a class="test">*</a></label>
                    <div class='col-xs-9 input-group'>
                      <select class='form-control' name='five_year' id='five_year'>
                      <option value="" disabled selected>Select five year plan:<a class="test">*</a></option>
                        <?php 
                            $fiveYearPlan=App\EnumFiveYearPlan::all();
                            foreach($fiveYearPlan as $five_year):
                          ?>
                          <option value="{{$five_year->five_yr_plan_id}}">{{$five_year->name}}</option>
                          <?php 
                            endforeach
                          ?>
                      </select>

                    </div>
                </div>
                <div class='form-group'>
                  <label for='skra' class='col-xs-3'>AKRA:<a class="test">*</a></label>
                    <div class='col-xs-9 input-group'>
                       <select class='form-control' name='skra' id='skra1'>
                         <option value=""></option>
                      </select>
                    </div>
                </div>
                <div class='form-group'>
                  <label for='type' class='col-xs-3'>Sport Organization:<a class="test">*</a></label>
                    <div class='col-xs-9 input-group'>
                      <select class='form-control' name='type' id='type'>
                        <option value="" disabled selected>Select sport organization</option>
                          <?php 
                            $sports=App\Sport_Organization::all();
                            foreach($sports as $sport):
                          ?>

                          <option value="{{$sport->sport_org_id}}">{{$sport->sport_org_name}}</option>
                          <?php 
                            endforeach
                          ?>
                      </select>

                    </div>
                </div>
                <div class='form-group'>
                    <label for='skra_activity_name' class='col-xs-3'>BOC Program:<a class="test">*</a></label>
                      <div class='col-xs-9 input-group'>
                          <input type="text" name="skra_activity_name" class="form-control" placeholder="Enter AKRA activity name here" id='skra_ativity' required>
                      </div>
              </div>
              <div class='form-group'>
                    <label for='description' class='col-xs-3'>Description</label>
                      <div class='input-group col-xs-9'>
                          <textarea type='text' name="description" class="form-control" rows=5 placeholder="enter description here"></textarea>
                      </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-10 col-xs-offset-2 input-group">
                      <button type="submit" class="btn btn-primary col-xs-2 col-xs-offset-7 glyphicon glyphicon-ok" value="Save">Save</button>
                      <a href="{{route('skra_activities.index')}}" class='btn btn-warning col-xs-2 col-xs-offset-1 glyphicon glyphicon-remove'>Cancel</a>
                    </div>
                </div>
                </form>
                <input type="hidden" name="hidden_view" id='hidden_view' value='{{route('view_skra_activities')}}'>
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
  $('#five_year').change(function()
  {
    var five_year_id=$(this).val();
    var view_url = $("#hidden_view").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":five_year_id}, 
        success: function(result){
          $('#skra1').empty();
          $.each(result,function(key,val)
          {
             $('#skra1').append('<option value="'+val.skra_id+'">'+val.SKRA_name+'</option>');
          });
        }
      });
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
