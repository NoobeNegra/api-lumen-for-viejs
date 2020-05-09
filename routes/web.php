<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('comments/{model_name}/{object_id}',  ['uses' => 'CommentController@showAllComments']);
    $router->post('comment', ['uses' => 'CommentController@create']);
    $router->delete('comment/{id}', ['uses' => 'CommentController@delete']);
    $router->put('comment/{id}', ['uses' => 'CommentController@update']);

    $router->get('exchanges',  ['uses' => 'ExchangeController@showAllExchanges']);
    $router->get('exchange/{id}',  ['uses' => 'ExchangeController@showOneExchange']);
    $router->post('exchange', ['uses' => 'ExchangeController@create']);
    $router->put('exchange/{id}', ['uses' => 'ExchangeController@update']);

    $router->get('tools',  ['uses' => 'ToolController@showAllTools']);
    $router->get('tool/{id}',  ['uses' => 'ToolController@showOneTool']);
    $router->post('tool', ['uses' => 'ToolController@create']);
    $router->put('tool/{id}', ['uses' => 'ToolController@update']);

    $router->get('user/{id}',  ['uses' => 'UserController@showOneUser']);
    $router->post('user', ['uses' => 'UserController@create']);
    $router->put('user/{id}', ['uses' => 'UserController@update']);
});
