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
                                <div class="col-lg-3 col-xs-5">
                                  <!-- small box -->
                                  <div class="small-box bg-aqua">
                                    <div class="inner">
                                      <h3></h3>
                                      <p>Bhutan Football Federation</p>
                                    </div>
                                    <img src="../public/images/Bhutan_F.png" width="200px" height="150">
                                    <a href="http://bhutanolympiccommittee.org/federations/bhutan-football/" target="_blank" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                  </div>
                                </div><!-- ./col -->
                                <div class="col-lg-3 col-xs-5">
                                  <!-- small box -->
                                  <div class="small-box bg-green">
                                    <div class="inner">
                                      <h3></h3>
                                      <p>Bhutan Basket Federation</p>
                                    </div>

                                    <img src="../public/images/Bhutan_B.png" width="200px" height="150">
                                    <a href="http://bhutanolympiccommittee.org/federations/bhutan-basketball-federation/" target="_blank" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                  </div>
                                </div><!-- ./col -->
                                <div class="col-lg-3 col-xs-5">
                                  <!-- small box -->
                                  <div class="small-box bg-red">
                                    <div class="inner">
                                      <h3></h3>
                                      <p>Bhutan Volleyball Federation</p>
                                    </div>
                                    <img src="../public/images/Bhutan_V.jpg" style='border-radius:100px;border:2px solid gray;' width="200px" height="150">
                                    <a href="{{route('country_master.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                  </div>
                                </div><!-- ./col -->
                                <div class="col-lg-3 col-xs-5">
                                  <!-- small box -->
                                  <div class="small-box bg-yellow">
                                    <div class="inner">
                                      <h3></h3>
                                      <p>Bhutan Golf Federation</p>
                                    </div>
                                    <img src="../public/images/Bhutan_G.png" width="200px" height="150">
                                    <a href="{{route('country_master.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
