<?php

use Illuminate\Support\Facades\Route;

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



Route::get('/clear', function() {
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('config:cache');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    return 'Cleared!';
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'FrontController@index')->name('index');
Route::get('/category/{id}', 'FrontController@category')->name('category');
Route::get('/subcategory/{subcategory_slug}', 'FrontController@subcategory')->name('subcategory');
Route::get('/product/{product_slug}', 'FrontController@product')->name('product');

// cart
Route::get('/cart', 'CartController@cart')->name('cart.index');
Route::post('/cart/add', 'CartController@add')->name('cart.store');
Route::post('/cart/update', 'CartController@update')->name('cart.update');
Route::post('/cart/remove', 'CartController@remove')->name('cart.remove');
Route::post('/cart/clear', 'CartController@clear')->name('cart.clear');

// wishlist
Route::get('/wishlist/{product_slug}', 'CartController@wishlist')->name('wishlist');
Route::get('wishlist-detail', 'CartController@wishlist_detail')->name('wishlist_detail');


Route::get('/shipping', 'ShippingController@shippinindex')->name('shipping.index');
Route::post('/shipping/add', 'ShippingController@add')->name('shipping.store');
Route::get('/success', 'ShippingController@success')->name('success');

Route::get('/customer', 'ShippingController@index')->name('loginPage');
Route::post('/customer/login', 'ShippingController@login')->name('customer.login');
Route::post('/customer/register', 'ShippingController@register')->name('customer.register');

Route::get('/customer/dashoard/login', 'ShippingController@customer_dashoard')->name('customer_dashoard.login');
Route::get('/customer/dashoard', 'ShippingController@c_dashoard')->name('customer_dashoard');


  Route::group(['prefix' => 'admin'], function () {

   //dasboard route
  Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard');
     //Route::resource('roles',RolesController::class);
  


	//roles create route

    Route::get('roles', 'Admin\RolesController@index')->name('admin.roles');
    Route::get('roles/create','Admin\RolesController@create')->name('admin.roles.create');
    Route::post('roles/store', 'Admin\RolesController@store')->name('admin.roles.store');
    Route::get('roles/edit/{id}','Admin\RolesController@edit')->name('admin.roles.edit');
    Route::post('roles/update/','Admin\RolesController@update')->name('admin.roles.update');

    Route::delete('roles/delete/{id}','Admin\RolesController@destroy')->name('admin.roles.delete');



    //users create route

  Route::get('users', 'Admin\UsersController@index')->name('admin.users');
    Route::get('users/create','Admin\UsersController@create')->name('admin.users.create');
    Route::post('users/store', 'Admin\UsersController@store')->name('admin.users.store');
    Route::get('users/edit/{id}','Admin\UsersController@edit')->name('admin.users.edit');
    Route::post('users/update/','Admin\UsersController@update')->name('admin.users.update');

    Route::delete('users/delete/{id}','Admin\UsersController@destroy')->name('admin.users.delete');





     //permission create route

  Route::get('permission', 'Admin\PermissionController@index')->name('admin.permission');
    Route::get('permission/create','Admin\PermissionController@create')->name('admin.permission.create');
    Route::post('permission/store', 'Admin\PermissionController@store')->name('admin.permission.store');
    Route::get('permission/edit/{id}','Admin\PermissionController@edit')->name('admin.permission.edit');
    Route::get('permission/view/{id}','Admin\PermissionController@view')->name('admin.permission.view');
    Route::post('permission/update/','Admin\PermissionController@update')->name('admin.permission.update');

    Route::delete('permission/delete/{id}','Admin\PermissionController@destroy')->name('admin.permission.delete');


    //profile route


    Route::get('profile', 'Admin\ProfileController@index')->name('admin.profile');
    Route::get('profile/edit/{id}', 'Admin\ProfileController@edit')->name('admin.profile.edit');
    Route::put('profile/update/{id}', 'Admin\ProfileController@update')->name('admin.profile.update');

    Route::post('password/update','Admin\ProfileController@updatePassword')->name('admin.password.update');



    // Login Routes
    Route::get('/login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login/submit', 'Admin\Auth\LoginController@login')->name('admin.login.submit');

    // Logout Routes
    Route::post('/logout/submit', 'Admin\Auth\LoginController@logout')->name('admin.logout.submit');

    // Forget Password Routes
    Route::get('/password/reset', 'Admin\Auth\ForgetPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset/submit', 'Admin\Auth\ForgetPasswordController@reset')->name('admin.password.update12');

        // category

        Route::get('category', 'Admin\CategoryController@index')->name('admin.category');
        Route::get('category/create','Admin\CategoryController@create')->name('admin.category.create');
        Route::post('category/store', 'Admin\CategoryController@store')->name('admin.category.store');
        Route::get('category/edit/{id}','Admin\CategoryController@edit')->name('admin.category.edit');
        Route::post('category/update/','Admin\CategoryController@update')->name('admin.category.update');
        Route::delete('category/delete/{id}','Admin\CategoryController@destroy')->name('admin.category.delete');
    
        // subcategory
        Route::get('subcategory', 'Admin\SubcategoryController@index')->name('admin.subcategory');
        Route::get('subcategory/create','Admin\SubcategoryController@create')->name('admin.subcategory.create');
        Route::post('subcategory/store', 'Admin\SubcategoryController@store')->name('admin.subcategory.store');
        Route::get('subcategory/edit/{id}','Admin\SubcategoryController@edit')->name('admin.subcategory.edit');
        Route::post('subcategory/update/','Admin\SubcategoryController@update')->name('admin.subcategory.update');
        Route::delete('subcategory/delete/{id}','Admin\SubcategoryController@destroy')->name('admin.subcategory.delete');
    
        // product
        Route::get('product', 'Admin\ProductController@index')->name('admin.product');
        Route::get('product/create','Admin\ProductController@create')->name('admin.product.create');
        Route::post('product/store', 'Admin\ProductController@store')->name('admin.product.store');
        Route::get('product/edit/{id}','Admin\ProductController@edit')->name('admin.product.edit');
        Route::post('product/update','Admin\ProductController@update')->name('admin.product.update');
        Route::delete('product/delete/{id}','Admin\ProductController@destroy')->name('admin.product.delete');

        Route::get('product-details/{id}','Admin\ProductController@product_details')->name('admin.product_details.view');
         // Ajax route
        Route::get('/findProductName', 'Admin\ProductController@findProductName');

        // product add through this page
        Route::get('product/feature', 'Admin\ProductController@feature')->name('admin.product.feature');
        Route::post('product/feature-store', 'Admin\ProductController@feature_store')->name('admin.product.feature_store');
        Route::get('product/detail', 'Admin\ProductController@detail')->name('admin.product.detail');
        Route::post('product/detail-store', 'Admin\ProductController@detail_store')->name('admin.product.detail_store');
        Route::get('product/size-fit', 'Admin\ProductController@size_fit')->name('admin.product.size_fit');
        Route::post('product/size-fit-store', 'Admin\ProductController@size_fit_store')->name('admin.product.size_fit_store');
        Route::get('product/image', 'Admin\ProductController@image')->name('admin.product.image');
        Route::post('product/image-store', 'Admin\ProductController@image_store')->name('admin.product.image_store');
        // end for now

        // Edit Size
        Route::get('product/size-edit/{id}', 'Admin\ProductController@size_edit')->name('admin.product.size_edit');
        Route::post('product/size-update', 'Admin\ProductController@size_update')->name('admin.product.size_update');
        // Edit Feature
        Route::get('product/feature-edit/{id}', 'Admin\ProductController@feature_edit')->name('admin.product.feature_edit');
        Route::post('product/feature-update', 'Admin\ProductController@feature_update')->name('admin.product.feature_update');
        // Edit size and fit
        Route::get('product/size-fit-edit/{id}', 'Admin\ProductController@size_fit_edit')->name('admin.product.size_fit_edit');
        Route::post('product/size-fit-update', 'Admin\ProductController@size_fit_update')->name('admin.product.size_fit_update');
        // Edit detail care
        Route::get('product/detail-care-edit/{id}', 'Admin\ProductController@detail_care_edit')->name('admin.product.detail_care_edit');
        Route::post('product/detail-care-update', 'Admin\ProductController@detail_care_update')->name('admin.product.detail_care_update');
        // Edit image
        Route::get('product/image-edit/{id}', 'Admin\ProductController@image_edit')->name('admin.product.image_edit');
        Route::post('product/image-update', 'Admin\ProductController@image_update')->name('admin.product.image_update');
        // feature
        Route::get('product/stock-edit/{id}', 'Admin\ProductController@stock_edit')->name('admin.product.stock_edit');
        Route::post('product/stock-update', 'Admin\ProductController@stock_update')->name('admin.product.stock_update');



        // Stock
        Route::get('stock', 'Admin\StockController@index')->name('admin.stock');
        Route::get('stock/create','Admin\StockController@create')->name('admin.stock.create');
        Route::post('stock/store', 'Admin\StockController@store')->name('admin.stock.store');
        Route::delete('stock/delete/{id}','Admin\StockController@destroy')->name('admin.stock.delete');
        Route::get('stock/edit/{id}','Admin\StockController@edit')->name('admin.stock.edit');
        Route::post('stock/update/','Admin\StockController@update')->name('admin.stock.update');
        Route::delete('stock/delete/{id}','Admin\StockController@destroy')->name('admin.stock.delete');

        // Size
        Route::get('size', 'Admin\SizeController@index')->name('admin.size');
        Route::get('size/create','Admin\SizeController@create')->name('admin.size.create');
        Route::post('size/store', 'Admin\SizeController@store')->name('admin.size.store');
        Route::get('size/edit/{id}','Admin\SizeController@edit')->name('admin.size.edit');
        Route::post('size/update/','Admin\SizeController@update')->name('admin.size.update');
        Route::delete('size/delete/{id}','Admin\SizeController@destroy')->name('admin.size.delete');

        Route::get('order','Admin\OrderController@index')->name('admin.order');
        Route::get('/new/order','Admin\OrderController@neworder')->name('admin.new_order');
        Route::get('/order/detail/{id}','Admin\OrderController@detail')->name('admin.order.detail');
        Route::post('/order/store','Admin\OrderController@store')->name('admin.order.store');
        Route::post('/order/destroy/{id}','Admin\OrderController@destroy')->name('admin.order.destroy');
        Route::get('/order/print/{id}','Admin\OrderController@print')->name('admin.order.print');
        Route::post('/order/update/','Admin\OrderController@update')->name('admin.order.update');

        // currency
        Route::get('currency', 'Admin\CurrencyController@index')->name('admin.currency');
        Route::get('currency/create','Admin\CurrencyController@create')->name('admin.currency.create');
        Route::post('currency/store', 'Admin\CurrencyController@store')->name('admin.currency.store');
        Route::get('currency/edit/{id}','Admin\CurrencyController@edit')->name('admin.currency.edit');
        Route::post('currency/update/','Admin\CurrencyController@update')->name('admin.currency.update');
        Route::delete('currency/delete/{id}','Admin\CurrencyController@destroy')->name('admin.currency.delete');

       

});

Route::group(['prefix' => 'user'], function () {

  Route::get('user-order','Admin\OrderController@user_pending_order')->name('user_pending_order');
  Route::get('user-order-history','Admin\OrderController@order_history')->name('order_history');
  Route::get('/user-order-detail/{id}','Admin\OrderController@user_order_detail')->name('user_order_detail');


});

