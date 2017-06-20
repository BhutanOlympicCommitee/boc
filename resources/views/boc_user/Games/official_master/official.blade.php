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
	                        <div class="text-muted bootstrap-admin-box-title clearfix">Official engaged with the games<div class="pull-right">Games_ID:{{Session::get('key6')}}</div>
	                        </div>
	                    </div>
                    	<div class="bootstrap-admin-panel-content">
                            <ul class='nav nav-pills nav-justified'>
                                 <li id='game1'><a href="#games_master" data-toggle="tab">Games Information</a></li>
                                 <li id='coach'><a href="#" data-toggle="tab">Sport And Coach Information</a></li>
                                  <li class='active' id="official"><a data-toggle="tab">Officials/CDM</a></li>
                                 <li id='team'><a href="#" data-toggle="tab">Athlete Team Member</a></li>
                            </ul>
                            @if(Session::has('success'))
                              <div class="alert alert-success">
                                {{ Session::get('success') }}
                              </div>    
                            @endif
                            <br />
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="table1">
                                    <thead>
                                      <tr>
                                        <th>Sl. No:</th>
                                        <th>Event</th>
                                        <th>Employee ID</th>
                                        <th>Sport Organization</th>
                                      </tr>   
                                    </thead>
                                    <tbody>
                                    <?php $id=1;?>
                                    @foreach($official as $off)
                                        <tr>
                                            <td>{{$id++}}</td>
                                            <td>{{$off->games->name}}</td>
                                            <td>{{$off->employee_id}}</td>
                                            <td>{{$off->getSportOrganization->sport_org_name}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>
                             <div class='clearfix'>
                               <a class='btn btn-success glyphicon glyphicon-plus pull-right' data-toggle='modal' data-target="#addModal">Add</a> 
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Employee ID</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('getOfficial') }}">
            {{ csrf_field() }}

            <div class="form-group clearfix">
                <label for="name" class="col-md-4 control-label">EmployeeID</label>

                <div class="col-md-6">
                    <input id="name1" type="text" class="form-control" name="name" required autofocus>
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-default">Add</button>
          </div>
          </form>
      </div>
    </div>
</div>
</div>
<script type="text/javascript">
     $(function()
    {
        $('#table1').DataTable(
           {
             'searching':false,
             'responsive':true
             }
          );
    }); 
    $(function()
      {
        $('#team').click(function(){
           window.location="{{url(route('team_master.index'))}}";   
         });
      }); 

$(function()
  {
    $('#coach').click(function(){
       window.location="{{url(route('sport_coach_master.index'))}}";   
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