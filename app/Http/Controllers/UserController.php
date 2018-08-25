<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller{

    public function getUserRoles($user_id){
        $user = User::findOrFail($user_id);
        return response()->json(["roles" => $user->roles], 201);
    }

    public function getUserTeams($user_id){
        $user = User::findOrFail($user_id);
        return response()->json(["teams" => $user->teams->unique()], 201);
    }

    public function index(){
        return User::all();
    }

    public function show(User $user){
        return $user;
    }

    public function store(Request $request){
        $rules = [
            'name' => 'required',
            'email' => 'required|unique:users'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 401);
        }
        $user = User::create($request->all());

        return response()->json($user, 201);
    }

    public function update(Request $request, User $user){
        $rules = [
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$user->id
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 401);
        }
        $user->update($request->all());

        return response()->json($user, 200);
    }

    public function destroy(User $user){
        $user->delete();

        return response()->json(null, 204);
    }

}
