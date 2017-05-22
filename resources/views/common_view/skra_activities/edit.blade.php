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
              <div class="text-muted bootstrap-admin-box-title">Update AKRA activities
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
              <form action="{{route('skra_activities.update',$skras_edit->skra_activity_id)}}" method="post">
              <input name="_method" type="hidden" value="PATCH">
              {{csrf_field()}}
              <div class='form-group'>
                  <label for='five_year' class='col-xs-3'>Five Year Plan</label>
                    <div class='col-xs-9 input-group'>
                      <select class='form-control' name='five_year' id='five_year'>
                      <option value="" disabled selected>Select five year plan</option>
                        <?php 
                            $fiveYearPlan=App\EnumFiveYearPlan::all();
                            foreach($fiveYearPlan as $five_year):
                          ?>
                          <option value="{{$five_year->five_yr_plan_id}}" <?php if($five_year->five_yr_plan_id==$skras_edit->five_yr_plan_id){?>
                          selected
                          <?php } ?>>{{$five_year->name}}</option>
                          <?php 
                            endforeach
                          ?>
                      </select>

                    </div>
                </div>
                
                <div class='form-group'>
                  <label for='skra' class='col-xs-3'>AKRA</label>
                    <div class='col-xs-9 input-group'>
                       <select class='form-control' name='skra' id='skra1'>
                         <?php 
                            $skras=App\Tbl_SKRA::all();
                            foreach($skras as $skra):
                          ?>
                         <option value="{{$skra->skra_id}}" <?php if($skra->skra_id==$skras_edit->skra_id){?>
                          selected
                          <?php } ?>>{{$skra->SKRA_name}}</option>
                          <?php 
                            endforeach
                          ?>
                      </select>
                    </div>
                </div>
                <div class='form-group'>
                  <label for='type' class='col-xs-3'>Sports Organization</label>
                    <div class='col-xs-9 input-group'>
                      <select class='form-control' name='type' id='type1'>
                        <option value="" disabled selected>Select sport organization</option>
                          <?php 
                            $sports=App\Sport_Organization::all();
                            foreach($sports as $sport):
                          ?>
                          <option value="{{$sport->sport_org_id}}" <?php if($sport->sport_org_id==$skras_edit->sport_org_id){?>
                          selected
                          <?php } ?> >{{$sport->sport_org_name}}</option> 
                          <?php 
                            endforeach
                          ?>
                      </select>

                    </div>
                </div>
                <div class='form-group'>
                    <label for='skra_activity_name' class='col-xs-3'>BOC Program</label>
                      <div class='col-xs-9 input-group'>
                          <input type="text" name="skra_activity_name" class="form-control" placeholder="Enter AKRA activity name here" id='skra_ativity' value='{{$skras_edit->SKRA_activity}}'>
                      </div>
              </div>
              <div class='form-group'>
                    <label for='description' class='col-xs-3'>Description</label>
                      <div class='input-group col-xs-9'>
                          <textarea type='text' name="description" class="form-control" rows=5 placeholder="enter description here">{{$skras_edit->SKRA_description}}</textarea>
                      </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-10 col-xs-offset-2 input-group">
                      <button type="submit" class="btn btn-primary col-xs-2 col-xs-offset-7 glyphicon glyphicon-ok" value="Update">Update</button>
                      <a href="{{route('skra_activities.index')}}" class='btn btn-warning col-xs-2 col-xs-offset-1 glyphicon glyphicon-remove'>Close</a>
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
  // $('#type').change(function()
  // {
  //   var sport_id=$(this).val();
  //   var view_url=$("#hidden_view").val();
  //     $.ajax({
  //       url: view_url,
  //       type:"GET", 
  //       data: {"id":sport_id}, 
  //       success: function(result){
  //         $('#skra1').empty();
  //         $.each(result,function(key,val)
  //         {
  //           $('#skra1').append('<option value="'+val.skra_id+'">'+val.SKRA_name+'</option>');
  //           console.log(val.SKRA_name);
  //         });
  //       }
  //     });
  // });
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
  $("select[name!=five_year] option:not(:selected)").attr('disabled', true);
  $('#type1').click(function()
  {
    $("select[name!=skra1] option:not(:selected)").attr('disabled', false);
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
