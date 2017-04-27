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
                                      <h3>{{count($sport_organization)}}</h3>
                                      <p>Sport Organizations</p>
                                    </div>
                                    <div class="icon">
                                      <i class="ion-ios-barcode"></i>
                                    </div>
                                    <a href="{{route('sport_organization.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                  </div>
                                </div><!-- ./col -->
                                <div class="col-lg-3 col-xs-6">
                                  <!-- small box -->
                                  <div class="small-box bg-green">
                                    <div class="inner">
                                      <h3>{{count($sport)}}</h3>
                                      <p>Registerd Sports</p>
                                    </div>
                                    <div class="icon">
                                      <i class="ion-ios7-football-outline"></i>
                                    </div>
                                    <a href="{{route('associated_sport_types.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                  </div>
                                </div><!-- ./col -->
                                <div class="col-lg-3 col-xs-6">
                                  <!-- small box -->
                                  <div class="small-box bg-yellow">
                                    <div class="inner">
                                      <h3>{{count($akra)}}</h3>
                                      <p>AKRAs</p>
                                    </div>
                                    <div class="icon">
                                      <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="{{route('skra.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                  </div>
                                </div><!-- ./col -->
                                <div class="col-lg-3 col-xs-6">
                                  <!-- small box -->
                                  <div class="small-box bg-red">
                                    <div class="inner">
                                      <h3>{{count($boc_program)}}</h3>
                                      <p>BOC programs</p>
                                    </div>
                                    <div class="icon">
                                      <i class="ion ion-pie-graph"></i>
                                    </div>
                                    <a href="{{route('skra_activities.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
