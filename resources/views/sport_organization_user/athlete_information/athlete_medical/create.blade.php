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
              <div class="text-muted bootstrap-admin-box-title clearfix">Add athlete Medical Records<div class="pull-right">Athlete_id:{{Session::get('key')}}</div>
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
            <ul class='nav nav-pills nav-justified'>
              <li class='active' id='org'><a href="#" data-toggle="tab">Bio Information</a></li>
              <li id='address'><a href="#athlete_address" data-toggle="tab"> Address Information</a></li>
               <li class='active' id='medical'><a href="#athlete_medical" data-toggle="tab"> Medical Records</a></li>
              <li id='qualification'><a href="#athlete_qualification" data-toggle="tab">Qualification and Training Info</a></li>
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
              <form action="{{route('athlete_medical.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
               
                <div class='form-group'>
                  <label for='date' class='col-xs-2'>Date of Checkup</label>
                    <div class='col-xs-10 input-group'>
                      <input type="date" name="date" class="form-control" placeholder="">
                    </div>
                </div>
                <div class='form-group'>
                  <label for='checked' class='col-xs-2'>Checked By</label>
                    <div class='col-xs-10 input-group'>
                      <input type="text" name="checked" class="form-control" placeholder="Enter Name of Docter here">
                    </div>
                </div>
                <div class='form-group'>
                  <label for='weight' class='col-xs-2'>Weight</label>
                    <div class='col-xs-10 input-group'>
                      <input type="text" name="weight" class="form-control" placeholder="Enter weight here">
                    </div>
                </div>

                 <div class='form-group'>
                  <label for='height' class='col-xs-2'>Height</label>
                    <div class='col-xs-10 input-group'>
                      <input type="text" name="height" class="form-control" placeholder="Enter height here">
                    </div>
                </div>

                  <div class='form-group'>
                  <label for='condition' class='col-xs-2'>Condition</label>
                    <div class='col-xs-10 input-group'>
                      <select class='form-control' name='condition'>
                        <option></option>
                        <option>Healthy</option>
                        <option>Average</option>
                        <option>Weak</option>
                      </select>
                    </div>
                </div>
  
                <div class='form-group'>
                  <label for='remarks' class='col-xs-2'>Remarks</label>
                    <div class='col-xs-10 input-group'>
                      <textarea type="text" name="remarks" class="form-control" placeholder="Enter remark here"></textarea>
                    </div>
                </div>
                <div class="form-group">
                  <div class="col-xs-10 col-xs-offset-2 input-group">
                      <button type="submit" class="btn btn-primary col-xs-2 col-xs-offset-7 glyphicon glyphicon-ok" value="Save" id='save'>Save</button>
                      <a href="{{route('athlete_medical.create')}}" class='btn btn-warning col-xs-2 col-xs-offset-1 glyphicon glyphicon-remove'>Cancel</a>
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
<script type="text/javascript">
  $(function()
  {
    $('#address').click(function(){
       window.location="{{url(route('athlete_address.create'))}}";   
     });
  });

  $(function()
  {
    $('#qualification').click(function(){
       window.location="{{url(route('athlete_qualification.create'))}}";   
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