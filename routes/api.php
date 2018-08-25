<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('team/{team_id}/addUser/{user_id}/assignRole/{role_id}',"TeamController@assignRole");
Route::get('team/{team_id}/user/{user_id}/removeRole/{role_id}',"TeamController@removeRole");

Route::get('user/{user_id}/roles',"UserController@getUserRoles");
Route::get('user/{user_id}/teams',"UserController@getUserTeams");

Route::resource('user','UserController');
Route::resource('team','TeamController');
Route::resource('role','RoleController');

