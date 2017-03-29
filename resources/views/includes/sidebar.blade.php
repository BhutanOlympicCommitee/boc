<div class="container">
    <!-- left, vertical navbar & content -->
    <div class="row col-md-12">
        <!-- left, vertical navbar -->
        <div class="col-md-3 bootstrap-admin-col-left">
            <ul class="nav navbar-collapse collapse bootstrap-admin-navbar-side">
                <li class="active">
                    <a href="home"><i class="pull-left glyphicon glyphicon-dashboard"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span>Dashboard</span><i class="glyphicon glyphicon-chevron-right"></i></a>
                </li>
                <li>
                    <ul class="nav nav-list nav-menu-list-style">
                        <li><a href="#" class="tree-toggle nav-header"><i class="pull-left glyphicon glyphicon-list"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span>Master</span><span class="menu-collapsible-icon glyphicon glyphicon-chevron-right"></span></a>
                            <ul class="nav nav-list tree bullets">
                                <li><a href="{{route('view_user')}}"><i class='pull-left glyphicon glyphicon-circle-arrow-right'></i>&nbsp;&nbsp;&nbsp;User</a></li>
                                <li><a href="{{route('view_role')}}"><i class='pull-left glyphicon glyphicon-circle-arrow-right'></i>&nbsp;&nbsp;&nbsp;Role</a></li>
                                <li><a href="{{route('country_master.index')}}"><i class='pull-left glyphicon glyphicon-circle-arrow-right'></i>&nbsp;&nbsp;&nbsp;<span>Country</span></a></li>
                                <li><a href="{{route('dzongkhag_master.index')}}"><i class='pull-left glyphicon glyphicon-circle-arrow-right'></i>&nbsp;&nbsp;&nbsp;<span>Dzongkhag/State</span></a></li>
                                <li><a href="{{route('dungkhag_master.index')}}"><i class='pull-left glyphicon glyphicon-circle-arrow-right'></i>&nbsp;&nbsp;&nbsp;<span>Dungkhag</span></a></li>
                                <li><a href="{{route('gewog_master.index')}}"><i class='pull-left glyphicon glyphicon-circle-arrow-right'></i>&nbsp;&nbsp;&nbsp;<span>Gewog</span></a></li>
                            </ul>
                        </li>
                <li><a href="#" class="tree-toggle nav-header"><i class="pull-left glyphicon glyphicon-list"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span>Sport Organization Profile</span><span class="menu-collapsible-icon glyphicon glyphicon-chevron-right"></span></a>
                    <ul class="nav nav-list tree bullets">
                        <li><a href="{{route('sport_organization.index')}}"><i class='pull-left glyphicon glyphicon-circle-arrow-right'></i>&nbsp;&nbsp;&nbsp;<span>Sport Organization Profile</span></a></li>
                    </ul>
                </li>
                <li><a href="#" class="tree-toggle nav-header"><i class="pull-left glyphicon glyphicon-list"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span>Annual Activities Plan</span><span class="menu-collapsible-icon glyphicon glyphicon-chevron-right"></span></a>
                    <ul class="nav nav-list tree bullets">
                        <li><a href='{{route('skra.index')}}'><i class='pull-left glyphicon glyphicon-circle-arrow-right glyphicon-align-right'></i>&nbsp;&nbsp;&nbsp;<span>AKRAs</span></a></li>
                        <li><a href="{{route('skra_activities.index')}}"><i class='pull-left glyphicon glyphicon-circle-arrow-right'></i>&nbsp;&nbsp;&nbsp;<span>AKRA activities</span></a></li>
                        <li><a href="{{route('sport_org_activity')}}"><i class='pull-left glyphicon glyphicon-circle-arrow-right'></i>&nbsp;&nbsp;&nbsp;<span>Sport Organization Activities</span></a></li>
                        <li><a href="{{route('review_plan.index')}}"><i class='pull-left glyphicon glyphicon-circle-arrow-right'></i>&nbsp;&nbsp;&nbsp;<span>Review Activities</span></a></li>
                        <li><a href="{{route('achievement_update')}}"><i class='pull-left glyphicon glyphicon-circle-arrow-right'></i>&nbsp;&nbsp;&nbsp;<span>Update Achievements</span></a></li>
                    </ul>
                </li>
                <li><a href="#" class="tree-toggle nav-header"><i class="pull-left glyphicon glyphicon-list"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span>Athlete Information</span><span class="menu-collapsible-icon glyphicon glyphicon-chevron-right"></span></a>
                    <ul class="nav nav-list tree bullets">
                        <li><a href="{{route('athlete_info.create')}}"><i class='pull-left glyphicon glyphicon-circle-arrow-right'></i>&nbsp;&nbsp;&nbsp;<span>Athlete Info</span></a></li>
                    </ul>
                </li>
                <li><a href="#" class="tree-toggle nav-header"><i class="pull-left glyphicon glyphicon-list"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span>Training Information</span><span class="menu-collapsible-icon glyphicon glyphicon-chevron-right"></span></a>
                    <ul class="nav nav-list tree bullets">
                        <li><a href="{{route('training.index')}}"><i class='pull-left glyphicon glyphicon-circle-arrow-right'></i>&nbsp;&nbsp;&nbsp;<span>Training Info</span></a></li>
                    </ul>
                </li>       
            </ul>
        </li>
    </ul>
</div>
</div>
</div>
<script type="text/javascript">
    $('.tree-toggle').click(function()
    {
        $(this).parent().children('ul.tree').toggle(200);

    });
    $(function(){
        $('.tree-toggle').parent().children('ul.tree').toggle(200);
    });


</script>
