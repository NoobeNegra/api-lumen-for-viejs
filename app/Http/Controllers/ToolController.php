<?php

namespace App\Http\Controllers;

use App\Tool;
use App\User;
use App\Comment;
use App\Exchange;
use Illuminate\Http\Request;

class ToolController extends Controller
{

    public function showAllTools()
    {
        return response()->json(Tool::all());
    }

    public function showOneTool($id)
    {
        $tool = Tool::find($id)->toArray();
        $tool['user'] = User::find($tool['user_id']);
        $tool['comments'] = Comment::where('object_id', $tool['id'])->where('model_id', 2);
        $tool['exchanges'] = Exchange::where('tool_id', $tool['id']);
        return response()->json($tool);
    }

    public function create(Request $request)
    {
        $tool = Tool::create($request->all());

        return response()->json($tool, 201);
    }

    public function update($id, Request $request)
    {
        $tool = Tool::findOrFail($id);
        $tool->update($request->all());

        return response()->json($tool, 200);
    }

    public function delete($id)
    {
        Tool::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}
