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
                  <label for='type' class='col-xs-3'>Type</label>
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
                  <label for='skra' class='col-xs-3'>AKRA</label>
                    <div class='col-xs-9 input-group'>
                       <select class='form-control' name='skra' id='skra'>
                         <option value=""></option>
                      </select>
                    </div>
                </div>
                <div class='form-group'>
                    <label for='skra_activity_name' class='col-xs-3'>AKRA Activity/NSF Output</label>
                      <div class='col-xs-9 input-group'>
                          <input type="text" name="skra_activity_name" class="form-control" placeholder="Enter AKRA activity name here" id='skra_ativity'>
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
                      <input type="submit" class="btn btn-default col-xs-2 col-xs-offset-7" value="Submit">
                      <a href="{{route('skra_activities.index')}}" class='btn btn-default col-xs-2 col-xs-offset-1'>Cancel</a>
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
{{-- <script type="text/javascript">
$("#type").change(function() {
  if ($(this).data('options') == undefined) {
    /*Taking an array of all options-2 and kind of embedding it on the type*/
    $(this).data('options', $('#skra option').clone());
  }
  var id = $(this).val();
  var options = $(this).data('options').filter('[value=' + id + ']');
  $('#skra').html(options);
});
</script> --}}
<script type="text/javascript">
  $('#type').change(function()
  {
    var sport_id=$(this).val();
    var view_url = $("#hidden_view").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":sport_id}, 
        success: function(result){
          $('#skra').empty();
          $.each(result,function(key,val)
          {
            $('#skra').append('<option value="'+val.skra_id+'">'+val.SKRA_name+'</option>');
          });
        }
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
