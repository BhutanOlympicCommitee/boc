<div class='container'>
  <div class="row">
   <!-- content -->
    <div class="col-md-3">
      <div class="row">
        <div class="col-md-12 col-md-offset-1">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="text-muted bootstrap-admin-box-title clearfix"><strong>Menu</strong>
               </div>
            </div>
            <div class="bootstrap-admin-panel-content">
                <ul class="nav navbar-collapse bootstrap-admin-navbar-side">
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
                    <li>
                        <ul class="nav nav-list nav-menu-list-style">
                            <input type='hidden' name='role_id' value='{{$user->role_id}}' id='role_id'>
                            @if($user->role_id==1)
                            <li>
                                <ul class="nav">
                                    <li><a href="{{route('view_user')}}"><i class='pull-left glyphicon glyphicon-circle-arrow-right'></i>&nbsp;&nbsp;&nbsp;User</a></li>
                                    <li><a href="{{route('view_role')}}"><i class='pull-left glyphicon glyphicon-circle-arrow-right'></i>&nbsp;&nbsp;&nbsp;Role</a></li>
                                    <li><a href="{{route('country_master.index')}}"><i class='pull-left glyphicon glyphicon-circle-arrow-right'></i>&nbsp;&nbsp;&nbsp;<span>Country</span></a></li>
                                    <li><a href="{{route('dzongkhag_master.index')}}"><i class='pull-left glyphicon glyphicon-circle-arrow-right'></i>&nbsp;&nbsp;&nbsp;<span>Dzongkhag/State</span></a></li>
                                    <li><a href="{{route('dungkhag_master.index')}}"><i class='pull-left glyphicon glyphicon-circle-arrow-right'></i>&nbsp;&nbsp;&nbsp;<span>Dungkhag</span></a></li>
                                    <li><a href="{{route('gewog_master.index')}}"><i class='pull-left glyphicon glyphicon-circle-arrow-right'></i>&nbsp;&nbsp;&nbsp;<span>Gewog</span></a></li>
                                </ul>
                            </li>
                            @endif
                            @if($user->role_id!=1)
                                <li id="sport_organization"><a href="#" class="tree-toggle nav-header"><i class="pull-left glyphicon glyphicon-list"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span>Sport Organization Profile</span><span class="menu-collapsible-icon glyphicon glyphicon-chevron-right"></span></a>
                                    <ul class="nav nav-list tree bullets">
                                        <li><a href="{{route('sport_organization.index')}}"><i class='pull-left glyphicon glyphicon-circle-arrow-right'></i>&nbsp;&nbsp;&nbsp;<span>Sport Organization Profile</span></a></li>
                                    </ul>
                                </li>
                                <li id="associated_sport"><a href="#" class="tree-toggle nav-header"><i class="pull-left glyphicon glyphicon-list"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span>Associated Sport</span><span class="menu-collapsible-icon glyphicon glyphicon-chevron-right"></span></a>
                                    <ul class="nav nav-list tree bullets">
                                         <li><a href="{{route('associated_sport_types.index')}}"><i class='pull-left glyphicon glyphicon-circle-arrow-right'></i>&nbsp;&nbsp;&nbsp;<span>Types of Sport in BOC</span></a></li>
                                       </ul>
                                </li>
                                <li id="skra_activity"><a href="#" class="tree-toggle nav-header"><i class="pull-left glyphicon glyphicon-list"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span>Annual Activities Plan</span><span class="menu-collapsible-icon glyphicon glyphicon-chevron-right"></span></a>
                                    <ul class="nav nav-list tree bullets">
                                        <li id="skra"><a href='{{route('skra.index')}}'><i class='pull-left glyphicon glyphicon-circle-arrow-right glyphicon-align-right'></i>&nbsp;&nbsp;&nbsp;<span>AKRAs</span></a></li>
                                        <li><a href="{{route('skra_activities.index')}}"><i class='pull-left glyphicon glyphicon-circle-arrow-right'></i>&nbsp;&nbsp;&nbsp;<span>BOC programs</span></a></li>
                                        <li id="review_plan"><a href="{{route('review_plan.index')}}"><i class='pull-left glyphicon glyphicon-circle-arrow-right'></i>&nbsp;&nbsp;&nbsp;<span>Review Activities</span></a></li>
                                    </ul>
                                </li>
                                 <li id="achievement"><a href="#" class="tree-toggle nav-header"><i class="pull-left glyphicon glyphicon-list"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span>Activity and Achievement</span><span class="menu-collapsible-icon glyphicon glyphicon-chevron-right"></span></a>
                                    <ul class="nav nav-list tree bullets">
                                        <li><a href="{{route('sport_org_activity')}}"><i class='pull-left glyphicon glyphicon-circle-arrow-right'></i>&nbsp;&nbsp;&nbsp;<span>Sport Organization Activities</span></a></li>
                                        <li><a href="{{route('search_activity.search')}}"><i class='pull-left glyphicon glyphicon-circle-arrow-right'></i>&nbsp;&nbsp;&nbsp;<span>List And Search Activities</span></a></li>
                                         <li><a href="{{route('achievement_update')}}"><i class='pull-left glyphicon glyphicon-circle-arrow-right'></i>&nbsp;&nbsp;&nbsp;<span>Update Achievements</span></a></li>   
                                    </ul>
                                </li>
                                <li id="coach_profile"><a href="#" class="tree-toggle nav-header"><i class="pull-left glyphicon glyphicon-list"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span>Coach Profile</span><span class="menu-collapsible-icon glyphicon glyphicon-chevron-right"></span></a>
                                    <ul class="nav nav-list tree bullets">
                                     <li><a href="{{route('coach_master.index')}}"><i class='pull-left glyphicon glyphicon-circle-arrow-right'></i>&nbsp;&nbsp;&nbsp;<span>Coach Info</span></a></li>
                                   </ul>
                                </li>
                                 <li id="games"><a href="#" class="tree-toggle nav-header"><i class="pull-left glyphicon glyphicon-list"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span>Games Profile</span><span class="menu-collapsible-icon glyphicon glyphicon-chevron-right"></span></a>
                                    <ul class="nav nav-list tree bullets">
                                         <li><a href="{{route('games_master.create')}}"><i class='pull-left glyphicon glyphicon-circle-arrow-right'></i>&nbsp;&nbsp;&nbsp;<span>Games Info</span></a></li>
                                    </ul>
                                </li>
                                <li id="athlete_info"><a href="#" class="tree-toggle nav-header"><i class="pull-left glyphicon glyphicon-list"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span>Athlete Information</span><span class="menu-collapsible-icon glyphicon glyphicon-chevron-right"></span></a>
                                    <ul class="nav nav-list tree bullets">
                                        <li><a href="{{route('athlete_info.index')}}"><i class='pull-left glyphicon glyphicon-circle-arrow-right'></i>&nbsp;&nbsp;&nbsp;<span>Athlete Info</span></a></li>
                                    </ul>
                                    <ul class="nav nav-list tree bullets">
                                        <li id='athlete_achievement'><a href="{{route('display_matching_athlete')}}"><i class='pull-left glyphicon glyphicon-circle-arrow-right'></i>&nbsp;&nbsp;&nbsp;<span>Athlete achievement</span></a></li>
                                    </ul>
                                </li>
                                <li id="training"><a href="#" class="tree-toggle nav-header"><i class="pull-left glyphicon glyphicon-list"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span>Training Information</span><span class="menu-collapsible-icon glyphicon glyphicon-chevron-right"></span></a>
                                    <ul class="nav nav-list tree bullets">
                                        <li><a href="{{route('training.index')}}"><i class='pull-left glyphicon glyphicon-circle-arrow-right'></i>&nbsp;&nbsp;&nbsp;<span>Training Info</span></a></li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</br>
</br>
<script type="text/javascript">
    $('.tree-toggle').click(function()
    {
        $(this).parent().children('ul.tree').toggle(200);

    });
    $(function(){
        $('.tree-toggle').parent().children('ul.tree').toggle(200);
    });
    $('#skra_activity').hide();
   var user_id=$('#role_id').val();
   if(user_id==2)
   {
     $('#sport_organization').show();
     $('#skra_activity').show();
     $('#achievement').hide();
     $('#coach_profile').hide();
     $('#games').show();
     $('#training').hide();
     $('#associated_sport').show();
     $('#athlete_info').show();
     $('#athlete_achievement').hide();
   }
   if (user_id==4)
   {
    $('#associated_sport').hide();
    $('#skra_activity').hide();
    $('#skra').hide();
    $('#sport_organization').hide();
    $('#review_plan').hide();
    $('#achievement').show();
    $('#coach_profile').show();
    $('#games').hide();
    $('#athlete_info').show();
    $('#training').show();
   }
</script>
  