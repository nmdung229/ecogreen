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


// Trang chủ
Route::get('/', [ 'as' => 'shop.home', 'uses' => 'ShopController@index']);

Route::get('/cart', [ 'as' => 'shop.cart', 'uses' => 'CartController@index']);
Route::get('/cart/add',['as' => 'cart.add', 'uses' => 'CartController@addProduct']);
Route::get('/cart/delete',['as' => 'cart.delete', 'uses' => 'CartController@deleteProduct']);
Route::get('/cart/getData',['as' => 'cart.getData', 'uses' => 'CartController@getDatafromSession']);
Route::get('/cart/checkout',['as' => 'cart.checkOut', 'uses' => 'CartController@checkOut']);


Route::get('product', [ 'as' => 'shop.product', 'uses' => 'ShopController@productIndex']);

Route::get('productdetail', [ 'as' => 'shop.product.show', 'uses' => 'ShopController@productDetail']);

Route::get('productByCategory/{id}', [ 'as' => 'shop.product.byCategory', 'uses' => 'ShopController@productByCategory']);



Route::get('login', [ 'as' => 'getUserLogin', 'uses' => 'ShopController@login']);

Route::get('blog', [ 'as' => 'blog', 'uses' => 'ShopController@blog']);
Route::get('blog/{id}', [ 'as' => 'blog.detail', 'uses' => 'ShopController@blogDetail']);
// Đăng ký user
Route::get('register', [ 'as' => 'getCreateMembership', 'uses' => 'ShopController@createUser'] );
Route::post('register', [ 'as' => 'postCreateMembership', 'uses' => 'ShopController@storeUser']);

//Route::resource('admin', 'AdminController');
Route::resource('contact', 'ContactController');

// Login admin
Route::get('admin/login', [ 'as' => 'getLogin', 'uses' => 'AdminController@getLogin']);
Route::post('admin/login', [ 'as' => 'postLogin', 'uses' => 'AdminController@postLogin']);
Route::get('admin/logout', [ 'as' => 'getLogout', 'uses' => 'AdminController@getLogout']);
// Gom nhóm route trang admin

Route::group([ 'middleware' => '\App\Http\Middleware\checkAdminLogin' ,'prefix' => 'admin', 'as' => 'admin.'],  function () {
    Route::get('/','AdminController@index')->name('dashboard');
//    Route::get('/login', [ 'as' => 'getLogin', 'uses' => 'AdminController@getLogin']);
//    Route::post('/login', [ 'as' => 'postLogin', 'uses' => 'AdminController@postLogin']);
//    Route::get('/logout', [ 'as' => 'getLogout', 'uses' => 'AdminController@getLogout']);
    // QL category
    Route::resource('category','CategoryController');
    // QL product
    Route::get('product/find', [ 'as' => 'product.find', 'uses' => 'ProductController@search' ]);


    Route::resource('product', 'ProductController');
    // QL banner
    Route::resource('banner', 'BannerController');
    // QL Order
    Route::resource('order', 'OrderController');
    // QL brand
    Route::resource('brand', 'BrandController');
    // QL vendor
    Route::resource('vendor', 'VendorController');
    // QL User
    Route::resource('user', 'UserController');
    // QL User
    Route::resource('post', 'PostController');
});

