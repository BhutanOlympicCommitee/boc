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
                	<h2 style='text-align:center'>Create SKRA information</h2>
           		</div>
           		<div class='row col-md-10 col-md-offset-1' style='margin-top:10px'>
                    @if($errors->any())
                        <div class="alert alert-danger">
                          @foreach($errors->all() as $error)
                              <p>{{ $error }}</p>
                          @endforeach
                        </div>
                    @endif
                    <form action="{{route('skra.store')}}" method="post">
                        <div class='form-group'>
                            {{csrf_field()}}
                        </div>
                        <div class='form-group'>
                          <label for='type' class='col-xs-2'>Type</label>
                            <div class='col-xs-10 input-group'>
                              <select class='form-control' name='type'>
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
                            <label for='skra_name' class='col-xs-2'>SKRA Name</label>
                                <div class='col-xs-10 input-group'>
                                    <input type="text" name="skra_name" class="form-control" placeholder="Enter SKRA name here" value="">
                                </div>
                        </div>
                        <div class='form-group'>
                            <label for='skra_description' class='col-xs-2'>SKRA Description</label>
                                <div class='input-group col-xs-10'>
                                    <textarea type='text' name="skra_description" class="form-control" rows=5 placeholder="enter skra description here"></textarea>
                                </div>
                        </div>
                        <div class="col-xs-10 col-xs-offset-2">
                            <div class="form-group">
                                <input type="submit" class="btn btn-default col-xs-2 col-xs-offset-7" value="Submit">
                                <a href="{{--route('sport_organization.index')--}}" class='btn btn-default col-xs-2 col-xs-offset-1'>Cancel</a>
                            </div>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection