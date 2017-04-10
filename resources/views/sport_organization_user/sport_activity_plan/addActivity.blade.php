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
<div class='container'>
  <div class="row">
   <!-- content -->
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="text-muted bootstrap-admin-box-title clearfix">Sport Organization Activities 
          
               </div>
            </div>
            <div class="bootstrap-admin-panel-content">
            @if(Session::has('success'))
                <div class="alert alert-success">
                  {{ Session::get('success') }}
                </div>
            @endif
            <table class="table table-bordered table-striped table-responsive" id="table1">
                                        <thead>
                                            <tr>
                                                <th>Sl. No:</th>
                                                <th>AKRA</th>
                                                <th>BoC Program</th>
                                                <th>Activity</th>
                                                <th>Venue</th>
                                                <th>RGoB Budget</th>
                                                <th>External Budget</th>
                                                <th style='width:20%'>Action</th>
                                            </tr>   
                                        </thead>
                                        <tbody>
                                        <?php $id=1 ?>
                                        
                                        <tr>
                                            <td>{{$id++}}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <form class="form-group">
                                                  <a class="btn btn-info glyphicon glyphicon-edit" data-toggle='modal' data-target='#editModal' onclick=''>Edit</a>
                                                  <a class="btn btn-success glyphicon glyphicon-check" data-toggle='modal' data-target='#editModal' onclick=''>KPI</a>
                                                  
                                                  </button>
                                                </form>
                                            </td>
                                        </tr>
                       
                                        </tbody>
                                    </table>
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