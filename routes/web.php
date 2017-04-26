<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/admin.dashboard', 'HomeController@admin')->name('admin_dashboard');
Route::get('/home', 'HomeController@index')->name('home');

//Route for Custome Login
Route::post('/login',['uses'=>'LoginController@login','as'=>'login_custome']);

//Route for user managements
//view the user details
Route::get('user',['uses'=>'UserController@index','as'=>'view_user']);
//insert the user information
Route::post('user_add',['uses'=>'UserController@postUser','as'=>'insert_user'
  ]);
//update the user information
Route::post('update_user',['uses'=>'UserController@updateUser','as'=>'update_user']);
//Delete the user information
Route::get('delete_user/{id}',['uses'=>'UserController@deleteUser','as'=>'delete_user']);


//Route for the roles
Route::get('role',['uses'=>'RoleController@index','as'=>'view_role']);
//insert the role information
Route::post('role.add',['uses'=>'RoleController@postRole','as'=>'add_role']);
//update the role information
Route::post('role.update',['uses'=>'RoleController@updateRole','as'=>'update_role']);
//Delete the role information
Route::get('role.delete/{id}',['uses'=>'RoleController@deleteRole','as'=>'delete_role']);

//routes for master country
Route::get('country',['as'=>'country_master.index','uses'=>'MasterCountryController@index']);

Route::post('country/store',['as'=>'country_master.store','uses'=>'MasterCountryController@store']);

Route::delete('country/destroy/{id}',['as'=>'country_master.destroy','uses'=>'MasterCountryController@destroy']);

Route::get('country/view', 'MasterCountryController@view');
Route::post('country/update', 'MasterCountryController@update')->name('update_country');

//routes for dzongkhag
Route::get('dzongkhag',['as'=>'dzongkhag_master.index','uses'=>'DzongkhagController@index']);
Route::post('dzongkhag/store',['as'=>'dzongkhag_master.store','uses'=>'DzongkhagController@store']);
Route::delete('dzongkhag/destroy/{id}',['as'=>'dzongkhag_master.destroy','uses'=>'DzongkhagController@destroy']);
Route::get('dzongkhag/view', 'DzongkhagController@view')->name('view_dzongkhag');
Route::post('dzongkhag/update', 'DzongkhagController@update')->name('update_dzongkhag');

//routes for dungkhag
Route::get('dungkhag',['as'=>'dungkhag_master.index','uses'=>'DungkhagController@index']);
Route::post('dungkhag/store',['as'=>'dungkhag_master.store','uses'=>'DungkhagController@store']);
Route::delete('dungkhag/destroy/{id}',['as'=>'dungkhag_master.destroy','uses'=>'DungkhagController@destroy']);
Route::get('dungkhag/view', 'DungkhagController@show')->name('view_dungkhag');
Route::post('dungkhag/update', 'DungkhagController@update')->name('update_dungkhag');

//routes for gewog
Route::get('gewog',['as'=>'gewog_master.index','uses'=>'GewogController@index']);
Route::post('gewog/store',['as'=>'gewog_master.store','uses'=>'GewogController@store']);
Route::delete('gewog/destroy/{id}',['as'=>'gewog_master.destroy','uses'=>'GewogController@destroy']);
Route::get('gewog/view', 'GewogController@show')->name('view_gewog');
Route::post('gewog/update', 'GewogController@update')->name('update_gewog');

//routes for sport organization
Route::get('sport',['as'=>'sport_organization.index','uses'=>'Sport_Organization_Controller@index']);
Route::post('sport/search',['as'=>'sport_organization.search','uses'=>'Sport_Organization_Controller@searchSportOrganization']);
Route::get('sport/create',['as'=>'sport_organization.create','uses'=>'Sport_Organization_Controller@create']);
Route::post('sport/store',['as'=>'sport_organization.store','uses'=>'Sport_Organization_Controller@store']);
Route::delete('sport/destroy/{id}',['as'=>'sport_organization.destroy','uses'=>'Sport_Organization_Controller@destroy']);
Route::get('sport/{id}/edit',['as'=>'sport_organization.edit','uses'=>'Sport_Organization_Controller@edit']);
Route::patch('sport/update/{id}',['as'=>'sport_organization.update','uses'=>'Sport_Organization_Controller@update']);

//route for sports
//routes for gewog
Route::get('asport',['as'=>'associated_sport_types.index','uses'=>'AssociatedSportController@index']);
Route::post('asport/store',['as'=>'associated_sport_types.store','uses'=>'AssociatedSportController@store']);
Route::delete('asport/destroy/{id}',['as'=>'associated_sport_types.destroy','uses'=>'AssociatedSportController@destroy']);
Route::get('asport/view', 'AssociatedSportController@show')->name('view_asport');
Route::post('asport/update', 'AssociatedSportController@update')->name('update_asport');


//Routes for contact person for sport organization
Route::get('contact',['as'=>'contact_person.index','uses'=>'ContactPersonController@index']);
Route::get('contact/{id}/edit',['as'=>'contact_person.edit','uses'=>'ContactPersonController@edit']);
Route::patch('contact/update/{id}',['as'=>'contact_person.update','uses'=>'ContactPersonController@update']);
Route::get('contact/create',['as'=>'contact_person.create','uses'=>'ContactPersonController@create']);
Route::post('contact/store',['as'=>'contact_person.store','uses'=>'ContactPersonController@store']);

//Routes for management committee for sport organization
Route::get('management',['as'=>'management_committee.index','uses'=>'ManagementCommitteeController@index']);
Route::post('management/store',['as'=>'management_committee.store','uses'=>'ManagementCommitteeController@store']);
Route::delete('management/destroy/{id}',['as'=>'management_committee.destroy','uses'=>'ManagementCommitteeController@destroy']);
Route::get('management/view', 'ManagementCommitteeController@view')->name('view_management');
Route::post('management/update', 'ManagementCommitteeController@update')->name('update_management');

//Routes for advisory board members for sport organization
Route::get('advisory',['as'=>'advisory_board_members.index','uses'=>'AdvisoryBoardController@index']);
Route::post('advisory/store',['as'=>'advisory_board_members.store','uses'=>'AdvisoryBoardController@store']);
Route::delete('advisory/destroy/{id}',['as'=>'advisory_board_members.destroy','uses'=>'AdvisoryBoardController@destroy']);
Route::get('advisory/view', 'AdvisoryBoardController@view')->name('view_advisory');
Route::post('advisory/update', 'AdvisoryBoardController@update')->name('update_advisory');

//routes for skra
Route::get('skra',['as'=>'skra.index','uses'=>'SKRAController@index']);
Route::post('skra/store',['as'=>'skra.store','uses'=>'SKRAController@store']);
Route::get('skra/view', 'SKRAController@view')->name('view_skra');
Route::post('skra/update', 'SKRAController@update')->name('update_skra');
Route::delete('skra/destroy/{id}',['as'=>'skra.destroy','uses'=>'SKRAController@destroy']);

//routes for skra activities
Route::get('skra_activity',['as'=>'skra_activities.index','uses'=>'SKRA_activities_Controller@index']);
Route::get('skra_activity/create',['as'=>'skra_activities.create','uses'=>'SKRA_activities_Controller@create']);
Route::post('skra_activity/store',['as'=>'skra_activities.store','uses'=>'SKRA_activities_Controller@store']);
Route::delete('skra_activity/destroy/{id}',['as'=>'skra_activities.destroy','uses'=>'SKRA_activities_Controller@destroy']);
Route::get('skra_activity/view', 'SKRA_activities_Controller@view')->name('view_skra_activities');
Route::get('skra_activity/{id}/edit',['as'=>'skra_activities.edit','uses'=>'SKRA_activities_Controller@edit']);
Route::patch('skra_activity/update/{id}',['as'=>'skra_activities.update','uses'=>'SKRA_activities_Controller@update']);

//Routes for Sport Organization Activities
Route::get('sport_organization_activities',[
	'uses' => 'Sport_Organization_Controller@viewActivities',
	'as' => 'sport_org_activity'
	]);
Route::post('sport_organization_activities',[
	'uses' => 'Sport_Organization_Controller@addActivities',
	'as' => 'add_sport_org_activity'
	]);

//Routes for the Review Activities
//Route::resource('review_plan','ReviewPlanController');
Route::get('review_plan',['as'=>'review_plan.index','uses'=>'ReviewPlanController@index']);
Route::get('review_plan/{id}/review',['as'=>'review_plan.review','uses'=>'ReviewPlanController@review']);
Route::get('review_plan/{id}/showKPI',['as'=>'review_plan.reviewKPI','uses'=>'ReviewPlanController@showKPI']);
Route::post('review_plan/{id}/approved_activity',['as'=>'approved_activities','uses'=>'ReviewPlanController@approved_activities']);
Route::get('review_plan/{id}/review_kpi',['as'=>'review_plan.kpi','uses'=>'ReviewPlanController@reviewKPI']);

//Route::get('review_plan/update_achievement','ReviewPlanController@updateSportAchievement')->name('activities_update_athlete_achievement');
Route::get('review_plan/{id}/update_achievement','ReviewPlanController@updateSportAchievement')->name('activities_update_achievement');
Route::get('update_achievement',['as'=>'update_achievement.athlete_achievement','uses'=>'ReviewPlanController@athlete_achievement']);
Route::post('review_plan/storeAthleteAchievement',['as'=>'update_achievement.storeAthleteAchievement','uses'=>'ReviewPlanController@storeAthleteAchievement']);
Route::post('review_plan/storeAthlete',['as'=>'update_achievement.storeAthlete','uses'=>'ReviewPlanController@storeAthlete']);
Route::get('update_achievement/view', 'ReviewPlanController@view')->name('view_update_achievement');

Route::post('review_plan/{id}/achievement_report','ReviewPlanController@storeActivitiesAchievedReport')->name('activities_achieved_report');
Route::post('search_participants','ReviewPlanController@searchParticipants')->name('search_participants');

//searching functionalities 
Route::post('review_plan/search','ReviewPlanController@searchActivities')->name('searching_functionality');
//Route for Update Achievements 
Route::get('review_activities_achievemenents_update',[
		'uses'=>'ReviewPlanController@getAchievement_update',
		'as'=>'achievement_update'
	]);
Route::post('search_approved_activities','ReviewPlanController@searchApprovedActivities')->name('searchApprovedActivities');


//routes for althlete information
Route::get('athlete_info',['as'=>'athlete_info.create','uses'=>'AthleteInformationController@create']);
Route::post('athlete_info',['as'=>'athlete_info.store','uses'=>'AthleteInformationController@store']);
Route::get('athlete_info/{id}/edit',['as'=>'athlete_info.edit','uses'=>'AthleteInformationController@edit']);

//route for athlete address
Route::get('athlete_address','AthleteAddressController@create')->name('athlete_address.create');
Route::post('athlete_address',['as'=>'athlete_address.store','uses'=>'AthleteAddressController@store']);
Route::get('athlete_address/view', 'AthleteAddressController@view')->name('view_athlete_address');
Route::get('athlete_address/view1', 'AthleteAddressController@view1')->name('view1_athlete_address');
Route::get('athlete_address/{id}/edit',['as'=>'athlete_address.edit','uses'=>'AthleteAddressController@edit']);

//route for athlete address
Route::get('athlete',['as'=>'athlete_qualification.index','uses'=>'AthleteQualificationController@index']);
Route::get('athlete_qualification',['as'=>'athlete_qualification.create','uses'=>'AthleteQualificationController@create']);
Route::post('athlete_qualification',['as'=>'athlete_qualification.store','uses'=>'AthleteQualificationController@store']);
Route::delete('athlete_qualification/destroy/{id}',['as'=>'athlete_qualification.destroy','uses'=>'AthleteQualificationController@destroy']);
Route::get('athlete_qualification/view', 'AthleteQualificationController@view')->name('view_athlete_qualification');
Route::get('athlete_qualification/{id}/edit',['as'=>'athlete_qualification.edit','uses'=>'AthleteQualificationController@edit']);
Route::post('athlete_qualification/update/{id}',['as'=>'athlete_qualification.update','uses'=>'AthleteQualificationController@update']);
Route::delete('athlete_qualification/destroy/{id}',['as'=>'athlete_qualification.destroy','uses'=>'AthleteQualificationController@destroy']);

//Routes for Sport Organization Activities
//routes for training information
Route::get('training',['as'=>'training.index','uses'=>'TrainingInformationController@index']);
Route::get('training/create',['as'=>'training.create','uses'=>'TrainingInformationController@create']);
Route::get('training/attendance',['as'=>'training.attendance','uses'=>'TrainingInformationController@trainingAttendanceIndex']);
Route::post('training/store',['as'=>'training.store','uses'=>'TrainingInformationController@store']);
Route::get('training/view', 'TrainingInformationController@view')->name('show_athlete_info');
Route::get('training/view1', 'TrainingInformationController@show')->name('show_athlete_address');
Route::get('training/view2', 'TrainingInformationController@showAssociatedSport')->name('show_associated_sport');
Route::post('training/update', 'TrainingInformationController@update')->name('update_training_schedule');
Route::get('training/get_schedule_info', 'TrainingInformationController@getTrainingSchedule')->name('get_training_schedule');
Route::get('training/view_athlete_training', 'TrainingInformationController@showAthleteTrainingSchedule')->name('view_athlete_training');
Route::get('training/view_training_schedule', 'TrainingInformationController@getTrainingSchedule')->name('view_training_schedule');
Route::post('training/save_attendance',['as'=>'save_attendance','uses'=>'TrainingInformationController@saveAthleteAttendance']);
Route::get('training/{id}/show_athlete_training', 'TrainingInformationController@viewAthleteTrainingSchedule')->name('showAthleteSchedule');
Route::get('training/{id}/view_training_participants', 'TrainingInformationController@viewTrainingParticipants')->name('showTrainingParticipants');
Route::get('training/{id}/athlete_attendance', 'TrainingInformationController@takeAthleteAttendance')->name('athlete_attendance');
Route::post('training/search','TrainingInformationController@searchSportCoach')->name('search_training_info');
Route::post('search_training_schedule','TrainingInformationController@searchTrainingSchedule')->name('search_training_schedule');
Route::post('search_training_attendance','TrainingInformationController@searchTrainingAttendance')->name('search_training_attendance');

//Routes for coach
Route::get('coach',['as'=>'coach_master.index','uses'=>'CoachController@index']);
Route::post('coach/store',['as'=>'coach_master.store','uses'=>'CoachController@store']);
Route::post('coach/storeSeperation',['as'=>'coach_master.storeSeperation','uses'=>'CoachSeperationController@store']);
Route::get('coach/view', 'CoachController@view')->name('view_coach');
Route::post('coach/update', 'CoachController@update')->name('update_coach');
Route::post('coach/search','CoachController@searchCoachInformation')->name('search_coach_info');

//routes for Games
Route::get('games',['as'=>'games_master.create','uses'=>'GamesController@create']);
Route::post('games',['as'=>'games_master.store','uses'=>'GamesController@store']);
// Route::get('athlet/{id}/edit',['as'=>'athlete_info.edit','uses'=>'AthleteInformationController@edit']);

//routes for sport & coach
Route::get('sportcoach',['as'=>'sport_coach_master.index','uses'=>'SportCoachController@index']);
Route::post('sportcoach/store',['as'=>'sport_coach_master.store','uses'=>'SportCoachController@store']);
Route::delete('sportcoach/destroy/{id}',['as'=>'sport_coach_master.destroy','uses'=>'SportCoachController@destroy']);
Route::get('sportcoach/view', 'SportCoachController@view')->name('view_sportcoach');
Route::post('sportcoach/update', 'SportCoachController@update')->name('update_sportcoach');

//routes for team member
Route::get('team',['as'=>'team_master.index','uses'=>'TeamMemberController@index']);
Route::post('team/store',['as'=>'team_master.store','uses'=>'TeamMemberController@store']);
Route::delete('team/destroy/{id}',['as'=>'team_master.destroy','uses'=>'TeamMemberController@destroy']);
//Route::get('team/view', 'TeamMemberController@view')->name('view_team');
Route::post('team/update', 'TeamMemberController@update')->name('update_team');
Route::get('team/view_athlete', 'TeamMemberController@view')->name('show_athlete_info1');
Route::get('team/view_address', 'TeamMemberController@show')->name('show_athlete_address1');
Route::get('team/view_sport', 'TeamMemberController@showAssociatedSport')->name('show_associated_sport1');
Route::post('team/sport_coach_search','TeamMemberController@searchSportCoach')->name('search_sport_coach');
Route::post('team/athlete_function','AthleteInformationController@updateAthleteFunction')->name('editAthleteFunction');
Route::get('team/search_athlete','TeamMemberController@searchAthlete')->name('search_team_athletes');

//Routes for athlete achievement and displinary action 
Route::get('athlete_achievement','AchievementAndDisplinaryAction@displayAthleteInfo')->name('display_matching_athlete');
Route::post('athlete_achievement/store',['as'=>'display_athlete_achievement.store','uses'=>'AchievementAndDisplinaryAction@store']);
Route::post('athlete_achievement/Actionstore',['as'=>'display_athlete_achievement.Actionstore','uses'=>'AchievementAndDisplinaryAction@Actionstore']);
Route::post('athlete_achievement/search','AchievementAndDisplinaryAction@searchSportCoach')->name('search_games');


//update sport org activities
Route::get('sport_activity',['as'=>'sport_activity_plan.index','uses'=>'UpdateSportActivityController@index']);
Route::post('sport_activity/store',['as'=>'sport_activity_plan.store','uses'=>'UpdateSportActivityController@store']);
// Route::post('sport_activity/update',['as'=>'sport_activity_plan.edit','uses'=>'UpdateSportActivityController@update']);
Route::get('sport_activity/{id}/edit',['as'=>'sport_activity_plan.edit','uses'=>'UpdateSportActivityController@edit']);
Route::patch('sport_activity/update/{id}',['as'=>'sport_activity_plan.update','uses'=>'UpdateSportActivityController@update']);
Route::get('sport_activity',['as'=>'sport_activity_plan.addActivity','uses'=>'UpdateSportActivityController@addActivity']);
Route::get('sport_activity/edit_activity', 'UpdateSportActivityController@editActivities')->name('editActivities');

//routes for KPI

Route::post('kpi/store',['as'=>'KPI_master.store','uses'=>'KPIController@store']);
Route::get('kpi/edit_kpi','KPIController@update_kpi')->name('view_kpi');

Route::post('kpi/update', 'KPIController@update')->name('update_kpi');
Route::post('kpi/{id}/approved_kpi',['as'=>'approved_kpi','uses'=>'KPIController@addApprovedKPI']);
Route::get('kpi/{id}',['as'=>'KPI_master.index','uses'=>'KPIController@index_kpi']);

Route::post('sport_activity/update_proposed_activity', 'UpdateSportActivityController@updateProposedActivities')->name('update_proposed_activities');

//routes for search activities
Route::get('searchActivity',['as'=>'search_activity.search','uses'=>'Sport_Organization_Controller@search']);
//routes for search activities
Route::get('searchKPI',['as'=>'search_activity.searchKPI','uses'=>'KPIController@searchKPI']);
Route::post('listKPI','KPIController@listAndSearchKPI')->name('searchKPI');

//route for search akra activites
Route::post('searchAKRA_activity','SKRA_activities_Controller@searchAKRAactivity')->name('searchAKRA');
Route::post('searchAKRA','SKRA_activities_Controller@searchAKRAactivity')->name('searchAKRA');
