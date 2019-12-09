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

$router->group(['prefix' => 'api/'], function ($app) {
    $app->post('login/','AuthController@authenticate');
});

$router->group(['prefix' => 'api/v1/','middleware' => 'jwt.auth'], function() use ($router) {
    $router->post('checklist/','ChecklistController@store');
    $router->get('checklist/', 'ChecklistController@index');
    $router->get('checklist/{checklistId}/', 'ChecklistController@show');
    $router->patch('checklist/{checklistId}/', 'ChecklistController@update');
    $router->delete('checklist/{checklistId}/', 'ChecklistController@destroy');
    $router->get('checklists/histories', 'HistoryController@index');
    $router->get('checklists/histories/{historyId}', 'HistoryController@show');
});