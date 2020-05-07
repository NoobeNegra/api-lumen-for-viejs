<?php

namespace App\Http\Controllers;

use App\Tool;
use Illuminate\Http\Request;

class ToolController extends Controller
{

    public function showAllTools()
    {
        return response()->json(Tool::all());
    }

    public function showOneTool($id)
    {
        return response()->json(Tool::find($id));
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
