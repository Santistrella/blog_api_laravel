<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Class routes

use App\Http\Middleware\ApiAuthMiddleware;


Route::get('/', function () {
    return view('welcome');
});

// Rutas prueba
Route::get('/pruebas/animales', 'PruebasController@index');
Route::get('/test-orm', 'PruebasController@testOrm');
    
// RUTAS API

    // Rutas de  prueba

    /*
    Route::get('/usuario/pruebas', 'UserController@pruebas');
    Route::get('/categorias/pruebas', 'CategoryController@pruebas');
    Route::get('/entrada/pruebas', 'PostController@pruebas');

    */

    // Rutas controlador de usuarios

    Route::post('/api/register', 'UserController@register');
    Route::post('/api/login', 'UserController@login');
    Route::put('/api/user/update', 'UserController@update');
    Route::post('/api/user/upload','UserController@upload')->middleware(ApiAuthMiddleware::class);
    Route::get('/api/user/avatar/{filename}', 'UserController@getImage');
    Route::get('/api/user/detail/{user}', 'UserController@detail');

    // Rutas controlador de categorías

    Route::resource('/api/category', 'CategoryController');

    // Rutas controlador de posts

    Route::resource('/api/post', 'PostController');
    Route::post('/api/post/upload','PostController@upload');
    Route::get('/api/post/image/{filename}', 'PostController@getImage');
    Route::get('/api/post/category/{id}', 'PostController@getPostByCategory');
    Route::get('/api/post/user/{id}', 'PostController@getPostByUser');