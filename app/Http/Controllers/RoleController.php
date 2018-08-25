<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller{

    public function index(){
        return Role::all();
    }

    public function show(Role $role){
        return $role;
    }

    public function store(Request $request){
        $rules = [
            'name' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 401);
        }
        $role = Role::create($request->all());

        return response()->json($role, 201);
    }

    public function update(Request $request, Role $role){
        $rules = [
            'name' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 401);
        }
        $role->update($request->all());

        return response()->json($role, 200);
    }

    public function destroy(Role $role){
        $role->delete();

        return response()->json(null, 204);
    }

}
