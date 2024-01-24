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

Route::get('sobre-mi', function () {
    return view('front.sobremi');
})->name('sobre-mi');



Route::get('articulos/{slug}', [
    'uses'  =>  'ArticulosController@show',
    'as'    =>  'articulos.show'
]);

Route::get('programas/{slug}', [
    'uses'  =>  'ProgramasController@show',
    'as'    =>  'programas.show'
]);

Route::get('articulos.index', [
    'uses'  =>  'ArticulosController@index',
    'as'    =>  'articulos.index'
]);

Route::get('programas.index', [
    'uses'  =>  'ProgramasController@index',
    'as'    =>  'programas.index'
]);

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

/* Rutas de login */

Route::get('paneladmin', function(){
    return view('auth.login');
});

Route::post('login', 'Auth\LoginController@login')->name('login');

Route::get('login', 'Auth\LoginController@showLoginForm');

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::post('logout', 'Auth\LoginController@logout')->name('logout');

/* Terminan Rutas de login */

/* Rutas del panel de administración */

Route::group(['prefix' => 'admin'], function(){

    Route::resource('categorias','CategoriasController');
    
    Route::get('categorias/{id}/destroy',[
        'uses' => 'CategoriasController@destroy',
        'as' => 'categorias.destroy']);

    Route::get('categorias/{id}/edit',[
        'uses' => 'CategoriasController@edit',
        'as' => 'categorias.edit']);

    Route::put('categorias/{id}/update',[
        'uses' => 'CategoriasController@update',
        'as' => 'categorias.update']);

    Route::resource('tags','TagsController');
    Route::get('tags/{id}/destroy',[
        'uses' => 'TagsController@destroy',
        'as' => 'tags.destroy']);

    Route::get('tags/{id}/edit',[
        'uses' => 'TagsController@edit',
        'as' => 'tags.edit']);

    Route::put('tags/{id}/update',[
    'uses' => 'TagsController@update',
    'as' => 'tags.update']);

    Route::resource('articulos', 'ArticulosController');
    
    Route::get('articulos/{id}/destroy',[
        'uses' => 'ArticulosController@destroy',
        'as' => 'articulos.destroy']);
    
    Route::get('articulos/{id}/edit',[
        'uses' => 'ArticulosController@edit',
        'as' => 'articulos.edit']);
    
    Route::put('articulos/{id}/update',[
    'uses' => 'ArticulosController@update',
    'as' => 'articulos.update']);

    Route::resource('programas', 'ProgramasController');
    
    Route::get('programas/{id}/destroy',[
        'uses' => 'ProgramasController@destroy',
        'as' => 'programas.destroy']);
    
    Route::get('programas/{id}/edit',[
        'uses' => 'ProgramasController@edit',
        'as' => 'programas.edit']);
    
    Route::put('programas/{id}/update',[
    'uses' => 'ProgramasController@update',
    'as' => 'programas.update']);
});

/* Terminan Rutas del panel de administración */

/* Rutas del Front */

Route::get('/', 
    ['uses' => 'FrontController@index',
    'as' => 'front.index']);

Route::get('categorias/{nombreCat}', [
    'uses'  =>  'FrontController@searchCategoria',
    'as'    =>  'front.search.categoria'
]);

Route::get('tags/{nombreTag}', [
    'uses'  =>  'FrontController@searchTag',
    'as'    =>  'front.search.tag'
]);

Route::get('articulos/{slug}', [
    'uses'  =>  'FrontController@viewArticulo',
    'as'    =>  'front.view.articulo'
]);

Route::get('programas/{slug}', [
    'uses'  =>  'FrontSoftController@viewPrograma',
    'as'    =>  'front.view.programa'
]);

Route::get('soft-apoyo', 
    ['uses' => 'FrontSoftController@index',
    'as' => 'front.softapoyo']);

