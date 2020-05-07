<?php

namespace App\Http\Controllers;

use App\Exchange;
use App\LogExchange;
use Illuminate\Http\Request;

class ExchangeController extends Controller
{

    public function showAllExchanges()
    {
        return response()->json(Exchange::all());
    }

    public function showOneExchange($id)
    {
        return response()->json(Exchange::find($id));
    }

    public function create(Request $request)
    {
        $exchange = Exchange::create($request->all());
        $log = LogExchange::create([$exchange->id(), $request->get('state_id')]);

        return response()->json($exchange, 201);
    }

    public function update($id, Request $request)
    {
        $exchange = Exchange::findOrFail($id);
        $exchange->update($request->all());
        $log = LogExchange::create([$id, $request->get('state_id')]);
        return response()->json($exchange, 200);
    }
}
