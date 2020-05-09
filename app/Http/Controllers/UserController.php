<?php

namespace App\Http\Controllers;

use App\User;
use App\Comment;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showOneUser($id)
    {
        $user = User::find($id)->toArray();
        $user['comments'] = Comment::where('object_id', $user['id'])->where('model_id', 1);
        return response()->json($user);
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
