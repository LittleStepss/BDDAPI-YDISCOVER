<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UserController extends Controller
{
    public function index()
    {
        $User = Users::all();
        return response()->json($User);
    }

    public function store(Request $request)
    {
        $User = new Users;
        $User->name = $request->name;
        $User->secret_identity = $request->secret_identity;
        $User->gender = $request->gender;
        $User->hair_color = $request->hair_color;
        $User->original_planet = $request->original_planet;
        $User->save();
        return response()->json([
            "message" => "User Added."
        ], 201);
    }

    public function show($id)
    {
        $User = Users::find($id);
        if (!empty($User)) {
            return response()->json($User);
        } else {
            return response()->json([
                "message" => "User not found."
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        if (Users::where('id', $id)->exists()) {
            $User = Users::find($id);
            $User->name = is_null($request->name) ? $User->name : $request->name;
            $User->secret_identity = is_null($request->secret_identity) ? $User->secret_identity : $request->secret_identity;
            $User->gender = is_null($request->gender) ? $User->gender : $request->gender;
            $User->hair_color = is_null($request->hair_color) ? $User->hair_color : $request->hair_color;
            $User->original_planet = is_null($request->original_planet) ? $User->original_planet : $request->original_planet;
            $User->save();
            return response()->json([
                "message" => "User updated."
            ], 404);
        } else {
            return response()->json([
                "message" => "User not found."
            ], 404);
        }
    }

    public function destroy($id)
    {
        if (Users::where('id', $id)->exists()) {
            $User = Users::find($id);
            $User->delete();

            return response()->json([
                "message" => "User deleted."
            ], 202);
        } else {
            return response()->json([
                "message" => "User not found."
            ], 404);
        }
    }
}
