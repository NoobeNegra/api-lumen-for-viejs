<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showOneUser($id)
    {
        return response()->json(User::find($id));
    }

    public function create(Request $request)
    {
        $tool = User::create($request->all());

        return response()->json($tool, 201);
    }

    public function update($id, Request $request)
    {
        $tool = User::findOrFail($id);
        $tool->update($request->all());

        return response()->json($tool, 200);
    }
}
