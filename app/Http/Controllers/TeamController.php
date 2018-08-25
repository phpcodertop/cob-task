<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Team;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller{

    public function assignRole($team_id, $user_id, $role_id){
        $team = Team::findOrFail($team_id);
        $user = User::findOrFail($user_id);
        $role = Team::findOrFail($role_id);
        // check if user already has this role
        $queryExist =  DB::table('role_team')
                            ->where('user_id',$user->id)
                            ->where('team_id',$team->id)
                            ->where('role_id',$role->id)
                            ->count();
        if($queryExist >= 1){
            return response()->json("User Already Assigned this role", 401);
        }

        $query = DB::table('role_team')->insert([
            'user_id' => $user->id,
            'team_id' => $team->id,
            'role_id' => $role->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        return response()->json("Role Assigned Successfully.", 201);
    }

    public function removeRole($team_id, $user_id, $role_id){
        $team = Team::findOrFail($team_id);
        $user = User::findOrFail($user_id);
        $role = Team::findOrFail($role_id);
        // check if user already has this role
        $queryExist =  DB::table('role_team')
            ->where('user_id',$user->id)
            ->where('team_id',$team->id)
            ->where('role_id',$role->id)
            ->count();
        if($queryExist < 1){
            return response()->json("Role Not Found for the user", 401);
        }

        $queryExist =  DB::table('role_team')
            ->where('user_id',$user->id)
            ->where('team_id',$team->id)
            ->where('role_id',$role->id)
            ->delete();
        return response()->json("Role Removed Successfully.", 201);
    }

    public function index(){
        return Team::all();
    }

    public function show(Team $team){
        return $team;
    }

    public function store(Request $request){
        $rules = [
            'name' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 401);
        }
        $team = Team::create($request->all());

        return response()->json($team, 201);
    }

    public function update(Request $request, Team $team){
        $rules = [
            'name' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 401);
        }
        $team->update($request->all());

        return response()->json($team, 200);
    }

    public function destroy(Team $team){
        $team->delete();

        return response()->json(null, 204);
    }

}
