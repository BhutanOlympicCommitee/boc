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
                        <div class="text-muted bootstrap-admin-box-title">Dashboard</div>
                        </div>
                        <div class="bootstrap-admin-panel-content">
                            <div class="row">
                                <div class="col-lg-3 col-xs-6">
                                  <!-- small box -->
                                  <div class="small-box bg-aqua">
                                    <div class="inner">
                                      <h3>{{count($countries)}}</h3>
                                      <p>Registered Sports</p>
                                    </div>
                                    <div class="icon">
                                      <i class="ion-ios-barcode"></i>
                                    </div>
                                    <a href="{{route('country_master.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                  </div>
                                </div><!-- ./col -->
                                <div class="col-lg-3 col-xs-6">
                                  <!-- small box -->
                                  <div class="small-box bg-green">
                                    <div class="inner">
                                      <h3>{{count($dzongkhags)}}</h3>
                                      <p>Sport Organization Activities</p>
                                    </div>
                                    <div class="icon">
                                      <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="{{route('dzongkhag_master.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                  </div>
                                </div><!-- ./col -->
                                <div class="col-lg-3 col-xs-6">
                                  <!-- small box -->
                                  <div class="small-box bg-yellow">
                                    <div class="inner">
                                      <h3>{{count($users)}}</h3>
                                      <p>Coach Infor</p>
                                    </div>
                                    <div class="icon">
                                      <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="{{route('view_user')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                  </div>
                                </div><!-- ./col -->
                                <div class="col-lg-3 col-xs-6">
                                  <!-- small box -->
                                  <div class="small-box bg-red">
                                    <div class="inner">
                                      <h3>{{count($gewogs)}}</h3>
                                      <p>Gewog</p>
                                    </div>
                                    <div class="icon">
                                      <i class="ion ion-pie-graph"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                  </div>
                                </div><!-- ./col -->
                              </div><!-- /.row -->
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
