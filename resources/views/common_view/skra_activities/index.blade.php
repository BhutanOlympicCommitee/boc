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
            <?php 
              $user_id=session('user_id');
              $user=App\User::find($user_id);
                ?>
              @if($user->role_id==4)
                <script type="text/javascript">
                  $(function()
                  {
                    $('#view').hide();
                  });
                </script>
                <table class="table table-bordered table-striped table-responsive" id="table1">
                    <thead>
                        <tr>
                            <th>Sl. No:</th>
                            <th>AKRA</th>
                            <th>BOC Programs</th>
                            <th>BOC Program Description</th>
                            <th>Action</th>
                        </tr>   
                    </thead>
                    <tbody>
                        <?php $id=1?>
                        @foreach($skra_activities as $skra_activity)
                        @if($user->sport_organization==$skra_activity->getSportOrganization->sport_org_name)
                        @if($skra_activity->status==0)
                        <tr>
                            <td>{{$id++}}</td>
                            <td>{{$skra_activity->skra->SKRA_name}}</td>
                            <td>{{$skra_activity->SKRA_activity}}</td>
                            <td>{{$skra_activity->SKRA_description}}</td>
                            <td>
                                <form class="form-group" action="{{route('skra_activities.destroy',$skra_activity->skra_activity_id)}}" method='post'>
                                  <input type="hidden" name="_method" value="delete">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <a href="{{route('skra_activities.edit',$skra_activity->skra_activity_id)}}" class="btn btn-info glyphicon glyphicon-edit">Edit</a>
                                  <button type="submit" class="btn btn-danger glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete this data');" name='name' value='Remove'>Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endif
                        @endif
                        @endforeach
                    </tbody>
                </table>
                 <div class='form-group clearfix'>
                  <div class="input-group pull-right" style='margin-top:10px'>
                    <a href="{{route('skra_activities.create')}}" class="btn btn-success glyphicon glyphicon-plus">Add BoC Program</a> 
                  </div>   
              @endif 
              <form action="{{action('SKRA_activities_Controller@index')}}" method='get' id='view'>
                {{csrf_field()}}
                 <div class='form-group'>
                  <label for='type' class='col-xs-2'>Five Year Plan:</label>
                    <div class='col-xs-10 input-group'>
                      <select class='form-control' name='type'>
                        <option value="0">Select Five Year Plan</option>
                          <?php 
                            $fiveYearPlan=App\EnumFiveYearPlan::all();
                            foreach($fiveYearPlan as $five_year):
                          ?>
                          <option value="{{$five_year->five_yr_plan_id}}">{{$five_year->name}}</option>
                          <?php 
                            endforeach
                          ?>
                          </select>
                     <span class='input-group-btn'>
                        <button class='btn btn-primary' type='submit' name='submit' value='view'>Search</button>
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
               
                <table class="table table-bordered table-striped table-responsive" id="table1">
                    <thead>
                        <tr>
                            <th>Sl. No:</th>
                            <th>AKRA</th>
                            <th>BOC Programs</th>
                            <th>BOC Program Description</th>
                            <th>Action</th>
                        </tr>   
                    </thead>
                    <tbody>
                        <?php $id=1?>
                        @foreach($skra_activities as $skra_activity)
                        @if($_GET['type']==$skra_activity->five_yr_plan_id)
                        @if($skra_activity->status==0)
                        {{-- @if($sport->sport_org_id==$skra_activity->sport_org_id) --}}
                        <tr>
                            <td>{{$id++}}</td>
                            <td>{{$skra_activity->skra->SKRA_name}}</td>
                            <td>{{$skra_activity->SKRA_activity}}</td>
                            <td>{{$skra_activity->SKRA_description}}</td>
                            <td>
                                <form class="form-group" action="{{route('skra_activities.destroy',$skra_activity->skra_activity_id)}}" method='post'>
                                  <input type="hidden" name="_method" value="delete">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <a href="{{route('skra_activities.edit',$skra_activity->skra_activity_id)}}" class="btn btn-info glyphicon glyphicon-edit">Edit</a>
                                  <button type="submit" class="btn btn-danger glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete this data');" name='name' value='Remove'>Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endif
                        @endif
                        @endforeach
                    </tbody>
                </table>
                <div class='form-group clearfix'>
                  <div class="input-group pull-right" style='margin-top:10px'>
                    <a href="{{route('skra_activities.create')}}" class="btn btn-success glyphicon glyphicon-plus">Add BoC Program</a> 
                  </div>
                </div>  
                @endif
                <input type="hidden" name="hidden_view" id="hidden_view" value="{{route('view_skra_activities')}}">
                
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
 $(function()
    {
        $('#table1').DataTable(
           {
           "language": {
           "search": "Search BoC Programs:"
     }
     }
          );
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

                
                               
                             
                           