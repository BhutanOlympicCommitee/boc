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
                          
                          </div>
                      </div>
                      <div class="bootstrap-admin-panel-content">
                        @if(Session::has('success'))
                          <div class="alert alert-success">
                            {{ Session::get('success') }}
                          </div>  
                        @endif
                      <table class="table table-bordered table-striped table-responsive" id="table3">
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
                          <td>{{$kpis->good}}</td>
                          <td>{{$kpis->average}}</td>
                          <td>{{$kpis->poor}}</td>
                          <td>
                            <form class="form-group">
                                    <a class="btn btn-info glyphicon glyphicon-edit" data-toggle='modal' data-target='#editModal' onclick='kpi_edit({{$kpis->kpi_id}})'>Edit</a>
                                    </button>
                                  </form>
                          </td>
                        </tr>
                        @endforeach
                        </tbody>
                      </table>
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
                <input type="text" name="kpi_name" class="form-control" id="kpi_name" placeholder="Enter KPI name here" required>
              </div>
          </div>
          <div class='form-group clearfix'>
            <label>KPI Weight</label>
          <div class='form-group clearfix'>
            <label for='RGoB' class='col-xs-3'>RGoB:</label>
              <div class='input-group col-xs-9'>
                <input type="text" name="RGoB"  class="form-control" id="RGoB" placeholder="Enter RGoB funding here" required>
              </div>
          </div>
          <div class='form-group clearfix'>
            <label for='external' class='col-xs-3'>External:</label>
              <div class='input-group col-xs-9'>
                <input type="text" name="external"  class="form-control" id="external1" placeholder="Enter External Funding here">
              </div>
          </div>
        </div>
        <div class='form-group clearfix'>
            <label for='unit' class='col-xs-3'>Units:</label>
              <div class='input-group col-xs-9'>
                <input type="text" name="unit"  class="form-control" id="unit" placeholder="Enter Unit here" required>
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
<!-- ends editModal-->
<script type="text/javascript">
function kpi_edit(id)
    {
      var view_url = $("#hidden_view").val();
      $.ajax({
        url: view_url,
        alert(url);
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          // console.log(result);
          $("#edit_id").val(result.kpi_id);
          $("#kpi_name").val(result.kpi_name);
          $("#RGoB").val(result.RGoB);
          $("#external1").val(result.external1);
          $("#unit").val(result.unit);
          $("#baseline").val(result.baseline);
          $("#good").val(result.good);
          $("#average").val(result.average);
          $("#poor").val(result.poor);
        }
      });

</script>
<script type="text/javascript">
 $(function()
    {
        $('#table3').DataTable(
           {
           "language": {
           "search": "Filter KPI:"
     }
     }
          );
    });  
  function kpi_edit(id)
  {
    var view_url = $("#hidden_view").val();
    var kpi_id=id;
    $.ajax({
      url: view_url,
      type:"GET", 
      data:{"id":kpi_id}, 
      success: function(result){
        console.log(result);
      }
    });
    }
</script>
@endsection
@section('footer')
<div class="container">
    <div class="row">
        @include('includes.footer')
    </div>
</div>
@endsection



