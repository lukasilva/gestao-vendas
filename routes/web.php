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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/checkout', 'CheckoutController@index')->name('checkout');

Route::get('/produto/{id}', 'ProdutoController@show')->name('produto');

Route::get('/passpot', function () {
    return view('auth.passport');
});


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::get('/cadastro-lista', function () {
        return view('cadastro-lista');
    });

    // Route::get('cadastro', 'PessoaController@register')->middleware('role:admin');
});