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
    return view('welcome');
});

Route::get('/wacker', ['uses' => 'WackerController@index', 'as' => 'wacker']);
Route::get('/wacker/catalog', ['uses' => 'WackerController@catalog', 'as' => 'wacker-catalog']);


Route::post('/upload', ['before' => 'csrf', 'uses' => 'UploadController@uploadHandl', 'as' => 'upload']);

///////////////////////////////////PAGE///////////////////////////////////////////////
// Отображение конкретной страницы
Route::get('/{url_key}', ['uses' => 'PageController@indexPage', 'as'=> 'index-page']);

// Добавление новой страницы
Route::get('/admin/page/add', ['uses' => 'PageController@addPage', 'as' => 'add-page']);

// Обработка добавления новой страницы
Route::post('/admin/page/add',
    [
        'before' => 'csrf',
        'uses' => 'PageController@addPageHandler',
        'as' => 'add-page'
    ]);

// Получение существующей страницы
Route::get('/admin/page/update/{id}', ['uses' => 'PageController@updatePage', 'as' => 'update-page']);

// Обновление существующей страницы
Route::post('/admin/page/update/{id}',
    [
        'before' => 'csrf',
        'uses' => 'PageController@updatePageHandler',
        'as' => 'update-page'
    ]);

// Список всех страниц
Route::get('/admin/page/showlist',['uses' => 'PageController@showListPage', 'as' => 'showlist-page']);

// Удалить страницу
Route::get('/admin/page/delete/{id}',['uses' => 'PageController@deletePage', 'as' => 'delete-page']);

// Отображение страницы
Route::get('/admin/page/show/{id}', ['uses' => 'PageController@showPage', 'as' => 'show-page']);


// Создание таблицы
Route::post('/admin/page/createTable', ['uses' => 'PageController@createTable', 'as' => 'create-table']);

// Autocomplete
Route::get('/admin/page/autocoplete/{text}', ['uses' => 'PageController@autocomplete', 'as' => 'autocomplete']);

//////////КАТАЛОГ////////////////////////////////////
// Добавление новой позиции каталога
Route::get('/admin/catalog/add', ['uses' => 'Catalog\CatalogController@addCatalog', 'as' => 'add-catalog']);

// Обработка добавления новой позиции каталога
Route::post('/admin/catalog/add',
    [
        'before' => 'csrf',
        'uses' => 'Catalog\CatalogController@addCatalogHandler',
        'as'=>'add-catalog'
    ]);


// Обновление существующей страницы
Route::post('/admin/product/update/{id}',
    [
        'before' => 'csrf',
        'uses' => 'ProductController@updateHandler',
        'as' => 'update-product'
    ]);

///////////////////////////////ПРОДУКЦИЯ/////////////////////////////////////
// Добавление нового продукта
Route::get('/admin/product/add', ['uses' => 'Product\ProductController@add', 'as' => 'add-product']);

// Обработка добавления нового продукта
Route::post('/admin/porduct/add',
    [
        'before' => 'csrf',
        'uses' => 'Product\ProductController@addHandler',
        'as'=>'add-product'
    ]);

// Получение существующего товара
Route::get('/admin/product/update/{id}', ['uses' => 'Product\ProductController@update', 'as' => 'update-product']);

// Получение изображений товара
Route::get('/admin/product/getPhoto/{id}', ['uses' => 'Product\ProductController@getPhoto', 'as' => 'photo-product']);


////////////////////////////СОЗДАНИЕ ТАБЛИЦ//////////////////////////////
Route::get('/admin/testAdminLTE', function(){
    return view('test.adminlte');
});

