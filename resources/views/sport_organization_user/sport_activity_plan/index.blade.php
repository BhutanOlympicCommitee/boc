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
              <div class="text-muted bootstrap-admin-box-title">Update Sport Organization Activities</div>
            </div>
            <div class="bootstrap-admin-panel-content">
              <!-- Form for the search functionality -->
               @if(Session::has('success'))
              <div class="alert alert-danger">
                {{ Session::get('success') }}
              </div>
          @endif
              <form action="{{route('sport_activity_plan.store')}}" method="post">
                 <div class='form-group'>
                    {{csrf_field()}}
                </div>
                <div class='form-group clearfix'>
            <label for='five_yr_plan_id' class='col-xs-2'>Five Year Plan:<a class="test">*</a></label>
              <div class='col-xs-10 input-group'>
               <select class='form-control' name='five_yr_plan_id' id="five_year" required>
                <option value="0">Select Five Year Plan</option>
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
          <div class='form-group clearfix'>
            <label for='skra_id' class='col-xs-2'>AKRA:<a class="test">*</a></label>
              <div class='col-xs-10 input-group'>
                  <select class='form-control' name='skra_id' id='skra1' required>
                         <option value=""></option>
                      </select>
              </div>
          </div>
          <div class='form-group clearfix'>
            <label for='skra_activity_id' class='col-xs-2'>BoC Program:<a class="test">*</a></label>
              <div class='col-xs-10 input-group'>
                <select class='form-control' name='skra_activity_id' id='skra_activity_id' required>
                         <option value=""></option>
                      </select>
              </div>
          </div>
            <div class='form-group clearfix'>
                  <label for='wieghtage' class='col-xs-2'>Weightage(%):<a class="test">*</a></label>
                    <div class='col-xs-10 input-group'>
                      <input type="text" name="wieghtage" class="form-control" placeholder="Enter weightage here" required>
                    </div>
                </div>
            </div>
         <div class="modal-footer">
          <button type="submit" class="btn btn-primary glyphicon glyphicon-ok">Save</button>

        </div>
          </form>
         
          </div>
          <div class="clearfix"></div>
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
    var view_url ='{{route('view_skra_activities')}}';
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":five_year_id}, 
        success: function(result){
          $('#skra1').empty();
           $("#skra1").prepend("<option disabled selected>Select AKRA</option>");
          $.each(result,function(key,val)
          {
             $('#skra1').append('<option value="'+val.skra_id+'">'+val.SKRA_name+'</option>');
          });
        }
      });
  });
  $('#skra1').change(function(){
    var akra=$(this).val();
    var view_url='{{route('view_boc_program')}}';
    $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":akra}, 
        success: function(result){
          console.log(result);
          $('#skra_activity_id').empty();
          $("#skra_activity_id").prepend("<option disabled selected>Select boc program</option>");
          $.each(result,function(key,val)
          {
             $('#skra_activity_id').append('<option value="'+val.skra_activity_id+'">'+val.SKRA_activity+'</option>');
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
