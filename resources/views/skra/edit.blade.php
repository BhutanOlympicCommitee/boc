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
                	<h2 style='text-align:center'>Edit SKRA</h2>
           		</div>
           		<div class='row col-md-10 col-md-offset-1' style='margin-top:10px'>
                <form action="{{route('skra.update',$skra->skra_id)}}" method="post">
                    <div class='form-group'>
                        <input name="_method" type="hidden" value="PATCH">
                            {{csrf_field()}}
                    </div>
                    <div class='form-group'>
                        <label for='type' class='col-xs-2'>Sport Organization</label>
                            <div class='col-xs-10 input-group'>
                                <select class='form-control' name='type'>
                                    <?php 
                                      $sports=App\Sport_Organization::all();
                                      foreach($sports as $sport):
                                    ?>
                                    <option value="{{$sport->sport_org_id}}" <?php 
                                      if($sport->sport_org_id == $skra->sport_org_id){?>
                                        selected
                                      <?php }?> >{{$sport->sport_org_name}}
                                      </option>
                                      <?php 
                                    endforeach
                                    ?>
                                </select>
                            </div>
                            <div class='clearfix'></div>
                    </div>
                    <div class='form-group'>
                        <label for='skra_name' class='col-xs-2'>SKRA Name</label>
                            <div class='col-xs-10 input-group'>
                                <input type="text" name="skra_name" class="form-control" placeholder="Enter SKRA name here" value="{{$skra->SKRA_name}}">
                            </div>
                    </div>
                    <div class='form-group'>
                        <label for='skra_description' class='col-xs-2'>SKRA Description</label>
                            <div class='input-group col-xs-10'>
                                <textarea type='text' name="skra_description" class="form-control" rows=5 placeholder="enter SKRA description here">{{$skra->SKRA_description}}</textarea>
                            </div>
                    </div>
                    <div class="col-xs-10 col-xs-offset-7">
                        <button type='submit' class='btn btn-default col-xs-2' name='update1' value='form1'>Update</button>
                        <a href="{{--route('sport_organization.index')--}}" class='btn btn-default col-xs-2 col-xs-offset-1'> Cancel</a>
                    </div> 
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection