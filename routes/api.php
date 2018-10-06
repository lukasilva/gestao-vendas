<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login', 'UserController@login')->name('login-api');
Route::post('register', 'UserController@register');
Route::resource('produto', 'ProdutoController');
Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'UserController@details')->middleware('role:admin');
    Route::resource('pessoa', 'PessoaController')->middleware('role:admin');
    Route::resource('categoria', 'CategoriaController')->middleware('role:admin');
    Route::resource('compra', 'CompraController')->middleware('role:cliente|vendedor');
});

