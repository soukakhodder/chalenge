<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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
$router->group(['prefix'=>'api'], function () use ($router) {
    $router->get('/eleves','EleveController@index');
    $router->post('/eleves','EleveController@store');
    $router->put('/eleves/{id}','EleveController@update');
    $router->delete('/eleves/{id}','EleveController@delete');
    $router->get('/peres','PereController@index');
    $router->post('/peres','PereController@store');
    $router->put('/peres/{id}','PereController@update');
    $router->delete('/peres/{id}','PereController@delete');
    $router->get('/entree','DateEntreController@index');
    $router->get('/entree/{id}','DateEntreController@show');
    $router->post('/entree','DateEntreController@store');
    $router->put('/entree/{id}','DateEntreController@update');
    $router->delete('/entree/{id}','DateEntreController@delete');
});