@extends('layouts.app')
@section('nav-bar')
@include('includes.header')
@endsection
@section('side-bar')
    <div class="row">
        @include('includes.sidebar')
    </div>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- content -->
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-11 col-md-offset-1">
                  <div class="panel panel-default">
                        <div class="panel-heading">
                          <div class="text-muted bootstrap-admin-box-title clearfix">KPI Information
                          
                          </div>
                      </div>
                      <div class="bootstrap-admin-panel-content">
                        @if(Session::has('success'))
                          <div class="alert alert-success">
                            {{ Session::get('success') }}
                          </div>  
                        @endif
                        <div class="table-responsive">
                      <table class="table table-bordered table-striped" id="table3">
                        <thead>
                          <tr>
                            <th>Sl. No:</th>
                            <th>Activity</th>
                            <th>KPI</th>
                            <th>Baseline</th>
                            <th>Good(Target)</th>
                            <th>Average</th>
                            <th>Poor</th>
                            <th style='width:10%'>Action</th>
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
                          <td>{{$kpis->goodRgStart.'-'.$kpis->goodRgEnd}}</td>
                          <td>{{$kpis->avgRgStart.'-'.$kpis->avgRgEnd}}</td>
                          <td>{{$kpis->poorRgStart.'-'.$kpis->poorRgEnd}}</td>
                          <td>
                            
                            <a class="btn btn-info glyphicon glyphicon-edit" data-toggle='modal' data-target='#editModal' onclick='kpi_edit({{$kpis->kpi_id}})'>Edit</a>
                                 
                          </td>
                        </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                      <div class='form-group clearfix'>
                     <div class=" col-xs-12 input-group" style='margin-top: 20px' >
                      <a class='btn btn-success glyphicon glyphicon-plus pull-right' data-toggle='modal' data-target="#addModal" onclick="">Add KPI</a> 
                     </div>
                    </div>
                      <input type="hidden" name="hidden_view" id="hidden_view" value="{{route('view_kpi')}}">
                     </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add kpi modal begins-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add KPI:</h4>
      </div>
      <div class="modal-body">
       <form action="{{route('KPI_master.store')}}" method="post">
          {{csrf_field()}}
          <div class='form-group clearfix'>
            <label for='kpi_name' class='col-xs-3'>KPI:<a class="test">*</a></label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="kpi_name" class="form-control" placeholder="Enter KPI name here" required>
              </div>
          </div>
           <div class='form-group clearfix'>
            <label for='kpi_description' class='col-xs-3'>KPI Description:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="kpi_description" class="form-control" placeholder="Enter KPI description" >
              </div>
          </div>
          <div class='form-group clearfix'>
            <label for='kpi_weight' class='col-xs-3'>KPI Weight:<a class="test">*</a></label>
              <div class='input-group col-xs-9'>
                <input type="text" name="kpi_weight"  class="form-control" placeholder="Enter kpi weight here" required>
              </div>
          </div>
         <div class="form-group clearfix">
          <label for="unit"  class='col-xs-3'>Units<a class="test">*</a></label> 
          <div class='col-xs-9 input-group'>
            <select name="unit" id="unit" class="form-control">
              <option disabled selected>
                Select the KPI Unit
              </option>
              <?php 
              $units = App\KPIUnit::all();
              foreach($units as $unit):
                ?>
              <option value="{{$unit->unit_id}}">{{$unit->unit_name}}</option>
            <?php endforeach;?>
          </select> 
        </div>
      </div>

          <div class='form-group clearfix'>
            <label for='baseline' class='col-xs-3'>Baseline:<a class="test">*</a></label>
              <div class='input-group col-xs-9'>
                <input type="text" name="baseline"  class="form-control" placeholder="Enter baseline here" required>
              </div>
          </div>
           <div class='form-group clearfix'>
            <label>Performance Evaluation</label>
          <div class='form-group clearfix'>
            <label for='good' class='col-xs-3'>Good(Target):<a class="test">*</a></label>
              <div class='input-group col-xs-9'>
                <input type="text" name="good"  class="form-control" placeholder="Enter Target here" required>
              </div>
          </div>
          <div class='form-group clearfix'>
            <label for='average' class='col-xs-3'>Average:<a class="test">*</a></label>
              <div class='input-group col-xs-9'>
                <input type="text" name="average"  class="form-control" placeholder="Enter Target here" required>
              </div>
          </div>
           <div class='form-group clearfix'>
            <label for='poor' class='col-xs-3'>Poor:<a class="test">*</a></label>
              <div class='input-group col-xs-9'>
                <input type="text" name="poor"  class="form-control" placeholder="Enter Target here" required>
              </div>
          </div>
        </div>
       <div class="modal-footer">
          <button type="submit" class="btn btn-primary glyphicon glyphicon-ok">Save</button>
          <button type="button" class="btn btn-warning glyphicon glyphicon-remove" data-dismiss="modal">Cancel</button>
        </div>
       
      </form>
      </div>
    </div>
  </div>
</div>
<!-- ends addModal-->
<!-- begins editModal-->
<!-- edit kpi modal begins-->
<div class="modal fade" id="editModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit KPI</h4>
      </div>
      <div class="modal-body">
       <form action="{{route('update_kpi')}}" method="post">
          {{csrf_field()}}
          <div class='form-group clearfix'>
            <label for='kpi_name' class='col-xs-3'>KPI:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="kpi_name" class="form-control" id="kpi_name">
              </div>
          </div>
           <div class='form-group clearfix'>
            <label for='kpi_description' class='col-xs-3'>KPI Description:</label>
              <div class='col-xs-9 input-group'>
                <input type="text" name="kpi_description" class="form-control" id="kpi_description">
              </div>
          </div>
          <div class='form-group clearfix'>
            <label class="col-xs-3">KPI Weight</label>
              <div class='input-group col-xs-9'>
                <input type="text" name="kpi_weight"  class="form-control" id="RGoB" required>
              </div>
          </div>
        <div class="form-group clearfix">
          <label for="unit"  class='col-xs-3'>Units</label> 
          <div class='col-xs-9 input-group'>
            <select name="unit" id="unit" class="form-control">
              <option value="0">
                Select the KPI Unit
              </option>
              <?php 
              $units = App\KPIUnit::all();
              foreach($units as $unit):
                ?>
              <option value="{{$unit->unit_id}}">{{$unit->unit_name}}</option>
            <?php endforeach;?>
          </select> 
        </div>
      </div>

          <div class='form-group clearfix'>
            <label for='baseline' class='col-xs-3'>Baseline:</label>
              <div class='input-group col-xs-9'>
                <input type="text" name="baseline"  class="form-control" id="baseline" placeholder="Enter baseline here" required>
              </div>
          </div>
           <div class='form-group clearfix'>
            <label>Performance Evaluation</label>
          <div class='form-group clearfix'>
            <label for='good' class='col-xs-3'>Good(Target):</label>
              <div class='input-group col-xs-9'>
                <input type="text" name="good"  class="form-control" id="good" placeholder="Enter Target here" required>
              </div>
          </div>
          <div class='form-group clearfix'>
            <label for='average' class='col-xs-3'>Average:</label>
              <div class='input-group col-xs-9'>
                <input type="text" name="average"  class="form-control" id="average" placeholder="Enter Target here" required>
              </div>
          </div>
           <div class='form-group clearfix'>
            <label for='poor' class='col-xs-3'>Poor:</label>
              <div class='input-group col-xs-9'>
                <input type="text" name="poor"  class="form-control" id="poor" placeholder="Enter Target here" required>
              </div>
          </div>
        </div>
       <input type="hidden" id="edit_id" name="edit_id">
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary glyphicon glyphicon-ok">Update</button>
        <button type="button" class="btn btn-warning glyphicon glyphicon-remove" data-dismiss="modal">Close</button>
      </div>
       
      </form>
      </div>
    </div>
  </div>
</div>
</br>
</br>
<!-- ends editModal-->
<script type="text/javascript">
 $(function(){
    $('#table3').DataTable(
      {
         "language": {
           "search": "Filter KPI:",
           "responsive":true
        }
      });
  });
function kpi_edit(id)
    {
      var view_url = $("#hidden_view").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          $("#edit_id").val(result.kpi_id);
          $("#kpi_name").val(result.kpi_name);
          $("#kpi_description").val(result.kpi_description);
          $("#RGoB").val(result.kpi_weight);
          $("#baseline").val(result.baseline);
          $("#good").val(result.goodRgStart+'-'+result.goodRgEnd);
          $("#average").val(result.avgRgStart+'-'+result.avgRgEnd);
          $("#poor").val(result.poorRgStart+'-'+result.poorRgEnd);
          $('select[name="unit"]').val(result.unit);
        }
      });
    }
</script>
<style type="text/css">
a.test {
font-size: 20px;
color: red;
}
</style>
@endsection
@section('footer')
<div class="container">
    <div class="row">
        @include('includes.footer')
    </div>
</div>
@endsection
