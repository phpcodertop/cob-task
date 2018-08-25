# cob-task
The task is as follows: 

The goal is to create a simple REST API using either Laravel or Lumen. The task is estimated to take 2-4 hours.


The API should be able to do the following:

CRUD functionality for a “user” and a “team” entity.

A user can be assigned to multiple teams.

List what teams the users belongs to.


The user should have a name and email property, the team should have a title.


Optional:

       Write tests

       Set a user as team owner

       Assign different roles to users

       Validate input

// All routes 
<pre><code>
+--------+-----------+-----------------------------------------------------------+--------------+--------------------------------------------------+----------
--+
| Domain | Method    | URI                                                       | Name         | Action                                           | Middlewar
e |
+--------+-----------+-----------------------------------------------------------+--------------+--------------------------------------------------+----------
--+
|        | GET|HEAD  | /                                                         |              | Closure                                          | web
  |
|        | POST      | api/role                                                  | role.store   | App\Http\Controllers\RoleController@store        | api
  |
|        | GET|HEAD  | api/role                                                  | role.index   | App\Http\Controllers\RoleController@index        | api
  |
|        | GET|HEAD  | api/role/create                                           | role.create  | App\Http\Controllers\RoleController@create       | api
  |
|        | DELETE    | api/role/{role}                                           | role.destroy | App\Http\Controllers\RoleController@destroy      | api
  |
|        | PUT|PATCH | api/role/{role}                                           | role.update  | App\Http\Controllers\RoleController@update       | api
  |
|        | GET|HEAD  | api/role/{role}                                           | role.show    | App\Http\Controllers\RoleController@show         | api
  |
|        | GET|HEAD  | api/role/{role}/edit                                      | role.edit    | App\Http\Controllers\RoleController@edit         | api
  |
|        | GET|HEAD  | api/team                                                  | team.index   | App\Http\Controllers\TeamController@index        | api
  |
|        | POST      | api/team                                                  | team.store   | App\Http\Controllers\TeamController@store        | api
  |
|        | GET|HEAD  | api/team/create                                           | team.create  | App\Http\Controllers\TeamController@create       | api
  |
|        | GET|HEAD  | api/team/{team_id}/addUser/{user_id}/assignRole/{role_id} |              | App\Http\Controllers\TeamController@assignRole   | api
  |
|        | GET|HEAD  | api/team/{team_id}/user/{user_id}/removeRole/{role_id}    |              | App\Http\Controllers\TeamController@removeRole   | api
  |
|        | GET|HEAD  | api/team/{team}                                           | team.show    | App\Http\Controllers\TeamController@show         | api
  |
|        | PUT|PATCH | api/team/{team}                                           | team.update  | App\Http\Controllers\TeamController@update       | api
  |
|        | DELETE    | api/team/{team}                                           | team.destroy | App\Http\Controllers\TeamController@destroy      | api
  |
|        | GET|HEAD  | api/team/{team}/edit                                      | team.edit    | App\Http\Controllers\TeamController@edit         | api
  |
|        | POST      | api/user                                                  | user.store   | App\Http\Controllers\UserController@store        | api
  |
|        | GET|HEAD  | api/user                                                  | user.index   | App\Http\Controllers\UserController@index        | api
  |
|        | GET|HEAD  | api/user/create                                           | user.create  | App\Http\Controllers\UserController@create       | api
  |
|        | GET|HEAD  | api/user/{user_id}/roles                                  |              | App\Http\Controllers\UserController@getUserRoles | api
  |
|        | GET|HEAD  | api/user/{user_id}/teams                                  |              | App\Http\Controllers\UserController@getUserTeams | api
  |
|        | DELETE    | api/user/{user}                                           | user.destroy | App\Http\Controllers\UserController@destroy      | api
  |
|        | PUT|PATCH | api/user/{user}                                           | user.update  | App\Http\Controllers\UserController@update       | api
  |
|        | GET|HEAD  | api/user/{user}                                           | user.show    | App\Http\Controllers\UserController@show         | api
  |
|        | GET|HEAD  | api/user/{user}/edit                                      | user.edit    | App\Http\Controllers\UserController@edit         | api
  |
+--------+-----------+-----------------------------------------------------------+--------------+--------------------------------------------------+----------
--+
</code></pre>
