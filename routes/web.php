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
Route::get('/', ['uses' => 'WackerController@index', 'as' => 'wacker']);

Route::get('/test', function() {
  phpinfo();
});
Route::get('/wacker/catalog/{id}', ['uses' => 'WackerController@catalog', 'as' => 'wacker-catalog']);
Route::get('/catalog/{slug}', ['uses' => 'WackerController@detail', 'as' => 'wacker-detail']);

Route::post('/upload', ['before' => 'csrf', 'uses' => 'UploadController@uploadHandl', 'as' => 'upload']);
// Получение файлов
Route::get('/getFiles/{id}', ['uses' => 'UploadController@getFiles', 'as' => 'get-files']);
// Удаление изображения товара
Route::get('/deleteFile/{id}', ['uses' => 'UploadController@deleteFile', 'as' => 'delete-file']);


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/exit', function() {
    Auth::logout();
    return redirect()->route('wacker');
});

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


  ////////////////////////////НОВОСТИ//////////////////////////////////////////////////
  // Добавление новости
  Route::get('/news/add', ['uses' => 'News\NewsController@add', 'as' => 'add-news']);
  // Обновление существующей новости
  Route::post('/news/update/{id}',
    [
      'before' => 'csrf',
      'uses' => 'News\NewsController@update',
      'as' => 'update-news'
    ]);

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
    Route::post('/product/add',
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


    Route::get('/product/addAttribute', ['uses' => 'Product\ProductController@addAttribute', 'as' => 'add-attribute']);


    Route::get('/product/uploadCsv', ['uses' => 'Product\ProductController@uploadCsv', 'as' => 'tnved-csv']);
    Route::post('/product/uploadCsvHandl',
        [
            'before' => 'csrf',
            'uses' => 'Product\ProductController@uploadCsvHandler',
            'as'=>'csv-upload'
        ]);

  Route::get('/product-line/{id}', ['uses' => 'Product\ProductController@elementsLine', 'as' => 'product-elements-line']);
  Route::get('/special-product/', ['uses' => 'Product\ProductController@special', 'as' => 'special']);

    /////////////////////////////////////////////////////АТРИБУТЫ//////////////////////////////////////////////////////////////
    // установка атрибутов для типа продукта
    Route::get('/product/setAttributes', ['uses' => 'Product\ProductController@setAttributes', 'as' => 'set-attributes']);
    Route::post('/product/bindAttributes/{attributes}', ['uses' => 'Product\ProductController@bindAttributes', 'as' => 'bind-attributes']);
    Route::post('/product/bindAttributesUpdate', ['before' => 'csrf','uses' => 'Product\ProductController@bindAttributesUpdate', 'as' => 'bind-attributes']);
    // Обработка добавления нового атрибута
    Route::post('/porduct/addAttribute',
        [
            'before' => 'csrf',
            'uses' => 'Product\ProductController@addAttributeHandler',
            'as'=>'add-attribute'
        ]);
    // Получение всех атрибутов
    Route::get('/product/getAllAttributes', ['uses' => 'Product\ProductController@getAllAttributes', 'as' => 'get-all-attributes']);
    // Получение атрибутов заданного типа продукции
    Route::get('/product/getAttributes/{id}', ['uses' => 'Product\ProductController@getAttributes', 'as' => 'get-attributes']);
    Route::get('/product/attributes/{id}', ['uses' => 'Product\ProductController@attributes', 'as' => 'attributes']);
    Route::get('/product/existAttributes/{id}', ['uses' => 'Product\ProductController@existAttributes', 'as' => 'exist-attributes']);
    Route::post('/product/saveAttributes', ['before' => 'csrf', 'uses' => 'Product\ProductController@saveAttributes', 'as' => 'save-attributes']);
    Route::post('/product/addAttributeValue/{data}', ['uses' => 'Product\ProductController@addAttributeValue', 'as' => 'add-atribute-value']);
    Route::post('/porduct/updateAttribute',
        [
            'before' => 'csrf',
            'uses' => 'Product\ProductController@updateAttribute',
            'as'=>'upd-attribute'
        ]);


    //Линейка продукции
    Route::get('product/lines', ['uses' => 'Product\ProductController@lines', 'as' => 'lines-product']);
    Route::get('product/line', ['uses' => 'Product\ProductController@line', 'as' => 'line-product']);
    Route::get('/product/getAllTypeProducts', ['uses' => 'Product\ProductController@allTypeProduct', 'as' => 'type-product']);


    ////////////////////////////////////ТИП ПРОДУКЦИИ/////////////////////////////////////////////
    // Добавление типа продукции
    Route::get('product/typeProduct/add', ['uses' => 'TypeProduct\TypeProductController@add', 'as' => 'type-product-add']);
    // Обработка добавления типа продукции
    Route::post('/product/typeProduct/add',
        [
            'before' => 'csrf',
            'uses' => 'TypeProduct\TypeProductController@addHandler',
            'as'=>'type-product-add'
        ]);
    // Обновление типа продукции
    Route::get('product/typeProduct/update/{id}', ['uses' => 'TypeProduct\TypeProductController@update', 'as' => 'type-product-update']);
    // Обработка обновления типа продукции
    Route::post('/product/typeProduct/update/{id}',
        [
            'before' => 'csrf',
            'uses' => 'TypeProduct\TypeProductController@updateHandler',
            'as'=>'type-product-update'
        ]);
    // Список типов продукции
    Route::get('/product/typeProduct/list',['uses' => 'TypeProduct\TypeProductController@showList', 'as' => 'list-type-product']);




    ///////////////////////////////////////АТРИБУТЫ/////////////////////////////////////////////////////
    // Создание нового атрибута
    Route::get('product/attribute/create', ['uses' => 'Product\ProductController@createAttribute', 'as' => 'create-attribute']);
    // Обработка создания нового атрибута
    Route::post('/product/attribute/create',
        [
            'before' => 'csrf',
            'uses' => 'Product\ProductController@createAttributeHandler',
            'as'=>'create-attribute'
        ]);


    // Добавление производителя
    Route::get('product/producer/add', ['uses' => 'Product\ProductController@addProducer', 'as' => 'add-producer']);
    Route::post('/product/producer/add',
        [
            'before' => 'csrf',
            'uses' => 'Product\ProductController@addProducerHandler',
            'as'=>'add-producer'
        ]);

  // Изображения продукта
  Route::get('product-images/{id}', ['uses' => 'Product\ProductController@images', 'as' => 'product-images']);


  /////////////////////////ЛИНЕЙКА ПРОДУКЦИИ///////////////////////////////////////
  // Добавление линейки продукции
  Route::get('product/line/add', ['uses' => 'LineProduct\LineProductController@add', 'as' => 'add-line']);
  Route::post('/product/line/add',
      [
          'before' => 'csrf',
          'uses' => 'LineProduct\LineProductController@addHandler',
          'as'=>'add-line'
      ]);
  // Обновление линейки продукции
  Route::get('product/line/update/{id}', ['uses' => 'LineProduct\LineProductController@update', 'as' => 'update-line']);
  // Обработка обновления линейки продукции
  Route::post('/product/line/update/{id}',
    [
      'before' => 'csrf',
      'uses' => 'LineProduct\LineProductController@updateHandler',
      'as'=>'update-line'
    ]);
  // Список линейки продукции
  Route::get('/product/line/list',['uses' => 'LineProduct\LineProductController@showList', 'as' => 'list-line']);

    ////////////////////////////СОЗДАНИЕ ТАБЛИЦ//////////////////////////////
    Route::get('/testAdminLTE', function(){
        return view('test.adminlte');
    });
});






