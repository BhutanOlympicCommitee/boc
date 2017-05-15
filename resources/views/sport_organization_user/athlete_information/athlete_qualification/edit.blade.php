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
              <div class="text-muted bootstrap-admin-box-title clearfix">Edit athlete Qualification and Training Information<div class="pull-right">Athlete_id:{{Session::get('key')}}</div>
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
            <ul class='nav nav-pills nav-justified'>
              <li id="bio"><a href="#athlete_info" data-toggle="tab">Bio Information</a></li>
              <li id="address"><a href="#athlete_address" data-toggle="tab"> Address Information</a></li>
              <li class="active" id='qualification'><a href="#" data-toggle="tab">Qualification and Training Info</a></li>
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
              <form action="{{route('athlete_qualification.update',$athletes->qualification_id)}}" method="post">
                {{csrf_field()}}
                <div class='form-group'>
                  <label for='level' class='col-xs-3'>Level</label>
                    <div class='col-xs-9 input-group'>
                      <select class='form-control' name='type1'>
        
                   <?php 
                    $qualification=App\Enum_qualification_level::all();
                    foreach($qualification as $qualifications):
                  ?>
                  <option value="{{$qualifications->qualification_level_id}}" <?php 
                                if($qualifications->qualification_level_id == $athletes->qualification_level_id){?>
                                  selected
                                <?php }?> >{{$qualifications->qualification_level}}</option>
                                <?php 
                              endforeach
                              ?>
                    endforeach
                  ?>

                </select>
                    </div>
                </div>
                <div class='form-group'>
                  <label for='description' class='col-xs-3'>Course Description</label>
                    <div class='col-xs-9 input-group'>
                      <textarea type='text' name="description" class="form-control" rows=4>{{$athletes->qualification_description}}</textarea>             
                    </div>
                  </div>
                 <div class='form-group'>
                  <label for='year' class='col-xs-3'>Year of Completion</label>
                    <div class='col-xs-9 input-group'>
                  <select name="year" class="form-control">
                    <option>
                      {{$athletes->qualification_year}}
                    </option>
                    <?php 
                    for($i = 1950 ; $i <= date('Y'); $i++){
                      echo "<option value='$i'>$i</option>";
                    }
                    ?>
                  </select> 
                </div>
              </div>
                 <div class='form-group'>
                          <label for='country' class='col-xs-3'>Type</label>
                            <div class='col-xs-9 input-group'>
                              <select class='form-control' name='type'>
                              <?php 
                                $country=App\Mst_country::all();
                                foreach($country as $athlete):
                              ?>
                                <option value="{{$athlete->country_id}}" <?php 
                                if($athlete->country_id == $athletes->country_id){?>
                                  selected
                                <?php }?> >{{$athlete->country_name}}</option>
                                <?php 
                              endforeach
                              ?>
                              </select>
                            </div>
                      </div>
                 <div class='form-group'>
                  <label for='institute' class='col-xs-3'>Institute</label>
                    <div class='col-xs-9 input-group'>
                      <input type="text" name="institute" class="form-control" placeholder="Enter Institute Name here" value="{{$athletes->qualification_institute}}">
                    </div>
                </div>

                <div class="form-group">
                  <div class="col-xs-9 col-xs-offset-8 input-group">
                       <button type='submit' class='btn btn-primary col-xs-2 glyphicon glyphicon-ok' name='update1' value='form1'>Update</button>
                      <a href="{{route('athlete_qualification.index')}}" class='btn btn-warning col-xs-2 col-xs-offset-1 glyphicon glyphicon-remove'>Cancel</a>
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