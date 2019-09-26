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


use Laravel\Lumen\Routing\Router;
/** @var Router $router*/
$router->get('/', function () use ($router) {
    return $router->app->version();
});
/*não é necessario informar a / */
$router->group(['prefix'=>'api'],function () use($router){
    $router->group(["prefix"=>"series"],function ()use($router){
        $router->post('',"SeriesController@store");
        $router->get('',"SeriesController@index");
        $router->get('{id}','SeriesController@show');
        $router->put('{id}','SeriesController@update');
        $router->delete('{id}','SeriesController@destroy');

        $router->get('{serieId}/episodios','EpisodiosController@buscaPorSerie');
    });
    $router->group(["prefix"=>"episodios"],function ()use($router){
        $router->post('',"EpisodiosController@store");
        $router->get('',"EpisodiosController@index");
        $router->get('{id}','EpisodiosController@show');
        $router->put('{id}','EpisodiosController@update');
        $router->delete('{id}','EpisodiosController@destroy');
    });

});

