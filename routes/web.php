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


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

///////////////////////////////////PAGE///////////////////////////////////////////////
// Отображение конкретной страницы
Route::get('/{url_key}', ['uses' => 'PageController@indexPage', 'as'=> 'index-page']);

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function()
{
    // Добавление новой страницы
    Route::get('/page/add', ['uses' => 'PageController@addPage', 'as' => 'add-page']);

    // Обработка добавления новой страницы
    Route::post('/page/add',
        [
            'before' => 'csrf',
            'uses' => 'PageController@addPageHandler',
            'as' => 'add-page'
        ]);

    // Получение существующей страницы
    Route::get('/page/update/{id}', ['uses' => 'PageController@updatePage', 'as' => 'update-page']);

    // Обновление существующей страницы
    Route::post('/page/update/{id}',
        [
            'before' => 'csrf',
            'uses' => 'PageController@updatePageHandler',
            'as' => 'update-page'
        ]);

    // Список всех страниц
    Route::get('/page/showlist',['uses' => 'PageController@showListPage', 'as' => 'showlist-page']);

    // Удалить страницу
    Route::get('/page/delete/{id}',['uses' => 'PageController@deletePage', 'as' => 'delete-page']);

    // Отображение страницы
    Route::get('/page/show/{id}', ['uses' => 'PageController@showPage', 'as' => 'show-page']);


    // Создание таблицы
    Route::post('/page/createTable', ['uses' => 'PageController@createTable', 'as' => 'create-table']);

    // Autocomplete
    Route::get('/page/autocoplete/{text}', ['uses' => 'PageController@autocomplete', 'as' => 'autocomplete']);



    //////////////////////////КАТАЛОГ////////////////////////////////////
    // Добавление новой позиции каталога
    Route::get('/category/add', ['uses' => 'Category\CategoryController@add', 'as' => 'add-category']);

    // Получение всех категорий
    Route::get('/category/getAllCategories', ['uses'=>'Category\CategoryController@getAllCategories']);

    // Обработка добавления новой позиции каталога
    Route::post('/category/add',
        [
            'before' => 'csrf',
            'uses' => 'Category\CategoryController@addHandler',
            'as'=>'add-category'
        ]);


    // Отображение существующей позиции каталога
    Route::get('/category/update/{id}',
        [
            'before' => 'csrf',
            'uses' => 'Category\CategoryController@update',
            'as' => 'update-category'
        ]);

    // Обновление существующей позиции каталога
    Route::post('/category/update/{id}',
        [
            'before' => 'csrf',
            'uses' => 'Category\CategoryController@updateHandler',
            'as' => 'update-category'
        ]);

    // Удалить каталог
    Route::get('/category/delete/{id}',['uses' => 'Category\CategoryController@delete', 'as' => 'delete-category']);

    // Список каталогов
    Route::get('/category/list', ['uses' => 'Category\CategoryController@showList', 'as' => 'list-categories']);
    Route::get('/category/list/{id}', ['uses' => 'Category\CategoryController@showList', 'as' => 'list-categories']);

    ///////////////////////////////ПРОДУКЦИЯ/////////////////////////////////////
    // Добавление нового продукта
    Route::get('/product/add', ['uses' => 'Product\ProductController@add', 'as' => 'add-product']);

    // Обработка добавления нового продукта
    Route::post('/porduct/add',
        [
            'before' => 'csrf',
            'uses' => 'Product\ProductController@addHandler',
            'as'=>'add-product'
        ]);

    // Получение существующего товара
    Route::get('/product/update/{id}', ['uses' => 'Product\ProductController@update', 'as' => 'update-product']);

    // Обновление существующего товара
    Route::post('/product/update/{id}',
        [
            'before' => 'csrf',
            'uses' => 'Product\ProductController@updateHandler',
            'as' => 'update-product'
        ]);

    // Удалить продукт
    Route::get('/product/delete/{id}',['uses' => 'Product\ProductController@delete', 'as' => 'delete-product']);

    // Получение изображений товара
    Route::get('/product/getPhoto/{id}', ['uses' => 'Product\ProductController@getPhoto', 'as' => 'photo-product']);

    // Удаление изображения товара
    Route::get('/product/deletePhoto/{id}', ['uses' => 'Product\ProductController@deletePhoto', 'as' => 'delete-photo-product']);


    Route::get('/product/addAttribute', ['uses' => 'Product\ProductController@addAttribute', 'as' => 'add-attribute']);

    // Обработка добавления нового атрибута
    Route::post('/porduct/addAttribute',
        [
            'before' => 'csrf',
            'uses' => 'Product\ProductController@addAttributeHandler',
            'as'=>'add-attribute'
        ]);

    // Получение всех атрибутов
    Route::get('/product/getAllAttributes', ['uses' => 'Product\ProductController@getAllAttributes', 'as' => 'get-all-attributes']);

    Route::post('/product/addAttributeValue/{data}', ['uses' => 'Product\ProductController@addAttributeValue', 'as' => 'add-atribute-value']);

    ////////////////////////////СОЗДАНИЕ ТАБЛИЦ//////////////////////////////
    Route::get('/testAdminLTE', function(){
        return view('test.adminlte');
    });
});






