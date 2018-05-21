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
    return 'Hello Cherry!';
//    return $router->app->version();
});

$router->group([
    'prefix'    => 'brand',
    'namespace' => 'Brand',
], function ($router) {
    $router->get('/', 'BrandController@index');
    $router->get('/detail', 'BrandController@detail');
});

$router->group([
    'prefix'    => 'user',
    'namespace' => 'User',
], function ($router) {
    $router->get('/brand', 'UserController@brand');
    $router->post('/brand/_like', 'UserController@likeBrand');
    $router->post('/brand/_unlike', 'UserController@unlikeBrand');

    $router->get('/article', 'UserController@article');
    $router->post('/article/_like', 'UserController@likeArticle');
    $router->post('/article/_unlike', 'UserController@unlikeArticle');
});
