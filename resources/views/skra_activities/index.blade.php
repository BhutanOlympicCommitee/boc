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
              <div class="text-muted bootstrap-admin-box-title">AKRA Activities Information
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
              <form action="{{action('SKRA_activities_Controller@index')}}" method='get' id='view'>
                {{csrf_field()}}
                 <div class='form-group'>
                  <label for='type' class='col-xs-2'>Sport Organization:</label>
                    <div class='col-xs-10 input-group'>
                      <select class='form-control' name='type' id='type'>
                        <?php 
                          $sports=App\Sport_Organization::all();
                          foreach($sports as $sport):
                        ?>
                        <option value="{{$sport->sport_org_id}}">{{$sport->sport_org_name}}</option>
                        <?php 
                          endforeach
                        ?>
                      </select>
                     <span class='input-group-btn'>
                        <button class='btn btn-default' type='submit' name='submit' value='view'>Search</button>
                     </span>
                    </div>
                </div>
              </form>
              @if(isset($_GET['submit']))
                <script type="text/javascript">
                  $(function()
                  {
                    $('#view').hide();
                  });
                </script>
                <?php $sport->sport_org_id=$_GET['type'];?>
                <table class="table table-bordered table-striped table-responsive" id="table1">
                    <thead>
                        <tr>
                            <th>Sl. No:</th>
                            <th>AKRA</th>
                            <th>AKRA Activities/NSF Outputs</th>
                            <th>AKRA Activities/NSF Output Description</th>
                            <th>Action</th>
                        </tr>   
                    </thead>
                    <tbody>
                        <?php $id=1?>
                        @foreach($skra_activities as $skra_activity)
                        @if($sport->sport_org_id==$skra_activity->sport_org_id)
                        <tr>
                            <td>{{$id++}}</td>
                            <td>{{$skra_activity->skra->SKRA_name}}</td>
                            <td>{{$skra_activity->SKRA_activity}}</td>
                            <td>{{$skra_activity->SKRA_description}}</td>
                            <td>
                                <form class="form-group" action="{{route('skra_activities.destroy',$skra_activity->skra_activity_id)}}" method='post'>
                                  <input type="hidden" name="_method" value="delete">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <a href="{{route('skra_activities.edit',$skra_activity->skra_activity_id)}}" class="btn btn-info">Edit</a>
                                  <input type="submit" class="btn btn-warning" onclick="return confirm('Are you sure to delete this data');" name='name' value='Remove'>
                                </form>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
                <input type="hidden" name="hidden_view" id="hidden_view" value="{{route('view_skra_activities')}}">
                <div class='form-group clearfix'>
                  <div class="input-group pull-right" style='margin-top:10px'>
                    <a href="{{route('skra_activities.create')}}" class="btn btn-success glyphicon glyphicon-plus">Add</a> 
                  </div>
                </div>  
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(function(){
    $('#table1').DataTable();
});
$('#type').change(function()
  {

    var sport_id=$(this).val();
    var view_url = $("#hidden_view").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":sport_id}, 
        success: function(result){
          $('#skra').empty();
          $.each(result,function(key,val)
          {
            $('#skra').append('<option value="'+val.skra_id+'">'+val.SKRA_name+'</option>');
          });
        }
      });
  });
</script>
@endsection
@section('footer')
<div class="container">
    <div class="row">
        @include('includes.footer')
    </div>
</div>
@endsection

                
                               
                             
                           