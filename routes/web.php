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
    $router->get('/brand/_like', 'UserController@likeBrand');
    $router->get('/brand/_unlike', 'UserController@unlikeBrand');

    $router->get('/article', 'UserController@article');
    $router->get('/article/_like', 'UserController@likeArticle');
    $router->get('/article/_unlike', 'UserController@unlikeArticle');
});
