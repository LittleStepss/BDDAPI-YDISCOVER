<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function store(Request $request)
    {
        $users = new User;
        $users->nom = $request->nom;
        $users->prenom = $request->prenom;
        $users->mail = $request->mail;
        $users->password = $request->password;
        $users->success = $request->success;
        $users->save();
        return response()->json([
            "message" => "users Added."
        ], 201);
    }

    public function show($id)
    {
        $users = User::find($id);
        if (!empty($users)) {
            return response()->json($users);
        } else {
            return response()->json([
                "message" => "users not found."
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        if (User::where('id', $id)->exists()) {
            $users = User::find($id);
            $users->nom = is_null($request->nom) ? $users->nom : $request->nom;
            $users->prenom = is_null($request->prenom) ? $users->prenom : $request->prenom;
            $users->mail = is_null($request->mail) ? $users->mail : $request->mail;
            $users->password = is_null($request->password) ? $users->password : $request->password;
            $users->success = is_null($request->success) ? $users->success : $request->success;
            $users->save();
            return response()->json([
                "message" => "user updated."
            ], 404);
        } else {
            return response()->json([
                "message" => "user not found."
            ], 404);
        }
    }

    public function destroy($id)
    {
        if (User::where('id', $id)->exists()) {
            $users = User::find($id);
            $users->delete();

            return response()->json([
                "message" => "user deleted."
            ], 202);
        } else {
            return response()->json([
                "message" => "user not found."
            ], 404);
        }
    }
}