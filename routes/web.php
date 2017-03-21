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

Route::get('/home', 'HomeController@index');

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

//routes for sport organization
Route::get('sport',['as'=>'sport_organization.index','uses'=>'Sport_Organization_Controller@index']);
Route::get('sport/create',['as'=>'sport_organization.create','uses'=>'Sport_Organization_Controller@create']);
Route::post('sport/store',['as'=>'sport_organization.store','uses'=>'Sport_Organization_Controller@store']);
Route::delete('sport/destroy/{id}',['as'=>'sport_organization.destroy','uses'=>'Sport_Organization_Controller@destroy']);
Route::get('sport/{id}/edit',['as'=>'sport_organization.edit','uses'=>'Sport_Organization_Controller@edit']);
Route::patch('sport/update/{id}',['as'=>'sport_organization.update','uses'=>'Sport_Organization_Controller@update']);

//Routes for contact person for sport organization
Route::get('contact',['as'=>'contact_person.index','uses'=>'ContactPersonController@index']);
Route::get('contact/{id}/edit',['as'=>'contact_person.edit','uses'=>'ContactPersonController@edit']);
Route::patch('contact/update/{id}',['as'=>'contact_person.update','uses'=>'ContactPersonController@update']);
Route::get('contact/create',['as'=>'contact_person.create','uses'=>'ContactPersonController@create']);
Route::post('contact/store',['as'=>'contact_person.store','uses'=>'ContactPersonController@store']);

//Routes for management committee for sport organization
Route::get('management',['as'=>'management_committee.index','uses'=>'ManagementCommitteeController@index']);
// Route::get('management/{id}/edit',['as'=>'management_committee.edit','uses'=>'ManagementCommitteeController@edit']);
// Route::patch('management/update/{id}',['as'=>'management_committee.update','uses'=>'ManagementCommitteeController@update']);
// Route::get('management/create',['as'=>'management_committee.create','uses'=>'ManagementCommitteeController@create']);
Route::post('management/store',['as'=>'management_committee.store','uses'=>'ManagementCommitteeController@store']);
Route::delete('management/destroy/{id}',['as'=>'management_committee.destroy','uses'=>'ManagementCommitteeController@destroy']);
Route::get('management/view', 'ManagementCommitteeController@view')->name('view_management');
Route::post('management/update', 'ManagementCommitteeController@update')->name('update_management');

//Routes for advisory board members for sport organization
Route::get('advisory',['as'=>'advisory_board_members.index','uses'=>'AdvisoryBoardController@index']);
//Route::get('advisory/create',['as'=>'advisory_board_members.create','uses'=>'AdvisoryBoardController@create']);
Route::post('advisory/store',['as'=>'advisory_board_members.store','uses'=>'AdvisoryBoardController@store']);
//Route::get('advisory/{id}/edit',['as'=>'advisory_board_members.edit','uses'=>'AdvisoryBoardController@edit']);
//Route::patch('advisory/update/{id}',['as'=>'advisory_board_members.update','uses'=>'AdvisoryBoardController@update']);
Route::delete('advisory/destroy/{id}',['as'=>'advisory_board_members.destroy','uses'=>'AdvisoryBoardController@destroy']);
Route::get('advisory/view', 'AdvisoryBoardController@view')->name('view_advisory');
Route::post('advisory/update', 'AdvisoryBoardController@update')->name('update_advisory');

//routes for skra
Route::get('skra',['as'=>'skra.index','uses'=>'SKRAController@index']);
// Route::get('skra/create',['as'=>'skra.create','uses'=>'SKRAController@create']);
Route::post('skra/store',['as'=>'skra.store','uses'=>'SKRAController@store']);
// Route::get('skra/{id}/edit',['as'=>'skra.edit','uses'=>'SKRAController@edit']);
// Route::patch('skra/update/{id}',['as'=>'skra.update','uses'=>'SKRAController@update']);
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

//Routes for Sport Organization Activities
Route::get('sport_organization_activities',[
	'uses' => 'Sport_Organization_Controller@view_activities',
	'as' => 'sport_org_activity'
	]);

//Routes for the Review Activities

//Route for Update Achievements 
Route::get('review_activities_achievemenents_update',[
		'uses'=>'ReviewPlanController@getAchievement_update',
		'as'=>'achievement_update'
	]);
//routes for althlete information
Route::get('athlete_bio',['as'=>'athlete.create','uses'=>'AthleteInformationController@create']);

//routes for training information
Route::get('training',['as'=>'training.index','uses'=>'TrainingInformationController@index']);
Route::get('training/create',['as'=>'training.create','uses'=>'TrainingInformationController@create']);
Route::get('training/attendance',['as'=>'training.attendance','uses'=>'TrainingInformationController@trainingAttendanceIndex']);
Route::post('training/store',['as'=>'training.store','uses'=>'TrainingInformationController@store']);
