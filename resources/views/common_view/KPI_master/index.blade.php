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
                          <div class="text-muted bootstrap-admin-box-title clearfix">KPI Information
                           <a class='btn btn-success glyphicon glyphicon-plus pull-right' data-toggle='modal' data-target="#addModal">Add</a> 
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
                            <th>Activity</th>
                            <th>KPI</th>
                            <th>Baseline</th>
                            <th>Good(Target)</th>
                            <th>Average</th>
                            <th>Poor</th>
                            <th style='width:20%'>Action</th>
                          </tr> 
                        </thead>
                        <tbody>
                        <?php $id=1 ?>
                        @foreach($kpi as $kpis)
                        <tr>
                          <td>{{$id++}}</td>
                          <td>{{$kpis->proposedActivity->activity_name}}</td>
                          <td>{{$kpis->kpi_name}}</td>
                          <td>{{$kpis->baseline}}</td>
                          <td>{{$kpis->good}}</td>
                          <td>{{$kpis->average}}</td>
                          <td>{{$kpis->poor}}</td>
                          <td>
                            <form class="form-group">
                                    <a class="btn btn-info glyphicon glyphicon-edit" data-toggle='modal' data-target='#editModal' onclick='fun_edit({{$kpis->kpi_id}})'>Edit</a>
                                    </button>
                                  </form>
                          </td>
                        </tr>
                   
                        @endforeach
                        </tbody>
                      </table>
                      <input type="hidden" name="hidden_view" id="hidden_view" value="{{route('view_kpi')}}">
                     </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add dzongkhag modal begins-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add KPI</h4>
      </div>
      <div class="modal-body">
       <form action="{{route('KPI_master.store')}}" method="post">
          {{csrf_field()}}
          <div class='form-group clearfix'>
            <label for='kpi_name' class='col-xs-3'>KPI:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="kpi_name" class="form-control" placeholder="Enter KPI name here" required>
              </div>
          </div>
          <div class='form-group clearfix'>
            <label>KPI Weight</label>
          <div class='form-group clearfix'>
            <label for='RGoB' class='col-xs-3'>RGoB:</label>
              <div class='input-group col-xs-9'>
                <input type="text" name="RGoB"  class="form-control" placeholder="Enter RGoB funding here" required>
              </div>
          </div>
          <div class='form-group clearfix'>
            <label for='external' class='col-xs-3'>External:</label>
              <div class='input-group col-xs-9'>
                <input type="text" name="external"  class="form-control" placeholder="Enter External Funding here">
              </div>
          </div>
        </div>
        <div class='form-group clearfix'>
            <label for='unit' class='col-xs-3'>Units:</label>
              <div class='input-group col-xs-9'>
                <input type="text" name="unit"  class="form-control" placeholder="Enter Unit here" required>
              </div>
          </div>

          <div class='form-group clearfix'>
            <label for='baseline' class='col-xs-3'>Baseline:</label>
              <div class='input-group col-xs-9'>
                <input type="text" name="baseline"  class="form-control" placeholder="Enter baseline here" required>
              </div>
          </div>
           <div class='form-group clearfix'>
            <label>Performance Evaluation</label>
          <div class='form-group clearfix'>
            <label for='good' class='col-xs-3'>Good(Target):</label>
              <div class='input-group col-xs-9'>
                <input type="text" name="good"  class="form-control" placeholder="Enter Target here" required>
              </div>
          </div>
          <div class='form-group clearfix'>
            <label for='average' class='col-xs-3'>Average:</label>
              <div class='input-group col-xs-9'>
                <input type="text" name="average"  class="form-control" placeholder="Enter Target here" required>
              </div>
          </div>
           <div class='form-group clearfix'>
            <label for='poor' class='col-xs-3'>Poor:</label>
              <div class='input-group col-xs-9'>
                <input type="text" name="poor"  class="form-control" placeholder="Enter Target here" required>
              </div>
          </div>
        </div>
      
       <div class="modal-footer">
          <button type="submit" class="btn btn-default glyphicon glyphicon-ok">Save</button>
          <button type="button" class="btn btn-default glyphicon glyphicon-remove" data-dismiss="modal">Cancel</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- ends addModal-->
<!-- begins editModal-->

@endsection
@section('footer')
<div class="container">
    <div class="row">
        @include('includes.footer')
    </div>
</div>
@endsection



