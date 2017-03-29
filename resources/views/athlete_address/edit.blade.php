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
              <div class="text-muted bootstrap-admin-box-title clearfix">Edit athlete Qualification and Training Information
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
            <ul class='nav nav-pills nav-justified'>
              <li id='bio'><a href="#athlete_info" data-toggle="tab">Bio Information</a></li>
              <li class="active" id='address'><a href="#athlete_address" data-toggle="tab"> Address Information</a></li>
              <li id='qualification'><a href="#" data-toggle="tab">Qualification and Training Information</a></li>
            </ul>
            <div style='margin-top:20px'></div>
             @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-success">
                      {{ Session::get('success') }}
                    </div>
                @endif
               <form action="{{route('athlete_address.update',$athletes->address_id)}}" method="post">
                {{csrf_field()}}
                <div>Permanent Address</div>
                <div class='form-group'>
            <label for='type1' class='col-xs-2'>Dzongkhag</label>
              <div class='col-xs-10 input-group'>
                <select class='form-control' name='type1' id='type1' required>
                  <option></option>
                  <?php 
                    $dzongkhag=App\MstDzongkhag::all();
                    foreach($dzongkhag as $dzongkhags):
                  ?>
                  <option value="{{$dzongkhags->dzongkhag_id}}">{{$dzongkhags->dzongkhag_name}}</option>
                  <?php 
                    endforeach
                  ?>
                </select>
              </div>
          </div>
                <div class='form-group'>
                  <label for='dungkhag' class='col-xs-2'>Dungkhag</label>
                    <div class='col-xs-10 input-group'>
                       <select class='form-control' name='dungkhag' id='dungkhag'>
                         <option value=""></option>
                      </select>
                    </div>
                </div>
                <div class='form-group'>
                  <label for='gewog' class='col-xs-2'>Gewog</label>
                    <div class='col-xs-10 input-group'>
                       <select class='form-control' name='gewog' id='gewog'>
                         <option value=""></option>
                      </select>
                    </div>
                </div>
                <div class='form-group'>
                  <label for='village' class='col-xs-2'>Village</label>
                    <div class='col-xs-10 input-group'>
                      <input type="text" name="village" class="form-control" placeholder="Enter Village Name here" value="{{$athletes->Paddress_village}}" required>
                    </div>
                </div>
                <div>Current Address</div>
               <div class='form-group'>
            <label for='type' class='col-xs-2'>Dzongkhag</label>
              <div class='col-xs-10 input-group'>
                <select class='form-control' name='type' id='type'required>
                  <option></option>
                  <?php 
                    $dzongkhag=App\MstDzongkhag::all();
                    foreach($dzongkhag as $dzongkhags):
                  ?>
                  <option value="{{$dzongkhags->dzongkhag_id}}">{{$dzongkhags->dzongkhag_name}}</option>
                  <?php 
                    endforeach
                  ?>
                </select>
              </div>
          </div>
                
                 <div class='form-group'>
                  <label for='Cdungkhag' class='col-xs-2'>Dungkhag</label>
                    <div class='col-xs-10 input-group'>
                       <select class='form-control' name='Cdungkhag' id='Cdungkhag'>
                         <option value=""></option>
                      </select>
                    </div>
                </div>
                 <div class='form-group'>
                  <label for='email' class='col-xs-2'>Email</label>
                    <div class='col-xs-10 input-group'>
                      <input type="text" name="email" class="form-control" placeholder="Enter email address here" value="{{$athletes->Caddress_email}}">
                    </div>
                </div>
                <div class='form-group'>
                  <label for='phone' class='col-xs-2'>Phone</label>
                    <div class='col-xs-10 input-group'>
                      <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number here" value="{{$athletes->Caddress_phone}}">
                    </div>
                </div><div class='form-group'>
                  <label for='mobile' class='col-xs-2'>Mobile</label>
                    <div class='col-xs-10 input-group'>
                      <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile Number here" value="{{$athletes->Caddress_mobile}}" required>
                    </div>
                </div><div class='form-group'>
                  <label for='caddress' class='col-xs-2'>Contact Address</label>
                    <div class='col-xs-10 input-group'>
                      <textarea type='text' name="caddress" class="form-control" rows=4 placeholder="Enter Contact Address here">{{$athletes->Caddress_caddress}}</textarea>             
                    </div>
                    </div>
                <div class="form-group">
                  <div class="col-xs-10 col-xs-offset-2 input-group">
                      <input type="submit" class="btn btn-default col-xs-2 col-xs-offset-7" value="Save">
                      <a href="{{route('athlete_address.create')}}" class='btn btn-default col-xs-2 col-xs-offset-1'>Cancel</a>
                  </div>
                </div>
                <input type="hidden" name="hidden_view" id='hidden_view' value='{{route('view_athlete_address')}}'> 
              </form>
              
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
    $('#training').click(function(){
       window.location="{{url(route('athlete_info.create'))}}";   
     });
  });
  $(function()
  {
    $('#qualification').click(function(){
       window.location="{{url(route('athlete_qualification.create'))}}";   
     });
  });

  $('#type1').change(function()
  {
    var dzong_id=$(this).val();
    var view_url = $("#hidden_view").val();
    $.ajax({
      url: view_url,
      type:"GET", 
      data: {"id":dzong_id}, 
      success: function(result){
      //console.log(result);
      $('#dungkhag').empty();
       $.each(result,function(key,val)
      {
        $('#dungkhag').append('<option value="'+val.dungkhag_id+'">'+val.dungkhag_name+'</option>');
      });
      }
    });
  });
  $('#type').change(function()
  {
    var dzongkhag_id=$(this).val();
    var view_url = $("#hidden_view").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":dzongkhag_id}, 
        success: function(result){
          //console.log(result);
          $('#Cdungkhag').empty();
          $.each(result,function(key,val)
          {
            $('#Cdungkhag').append('<option value="'+val.dungkhag_id+'">'+val.dungkhag_name+'</option>');
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