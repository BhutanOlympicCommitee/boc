<div class='container'>
  <div class="row">
   <!-- content -->
    <div class="col-md-3">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="text-muted bootstrap-admin-box-title clearfix">Dashboard
               </div>
            </div>
            <div class="bootstrap-admin-panel-content">
                <ul class='nav navbar-collapse'>
                    <?php $user_id=session('user_id');  $user = App\User::find($user_id);
                   ?>
                   <li class="active">
                   @if(session('user_id')==1) 
                        <a href="{{route('admin_dashboard')}}"><i class="pull-left glyphicon glyphicon-dashboard"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span>Dashboard</span><i class="glyphicon glyphicon-chevron-right"></i></a>
                    @elseif($user->role_id==4) 
                        <a href="{{route('federationdash')}}"><i class="pull-left glyphicon glyphicon-dashboard"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span>Dashboard</span><i class="glyphicon glyphicon-chevron-right"></i></a>
                    @else
                        <a href="{{route('home')}}"><i class="pull-left glyphicon glyphicon-dashboard"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span>Dashboard</span><i class="glyphicon glyphicon-chevron-right"></i></a>
                    @endif
                </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
  
